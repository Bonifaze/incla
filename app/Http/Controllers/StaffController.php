<?php

namespace App\Http\Controllers;

use PDF;
use App\Role;
use App\Staff;
use App\Remita;
use App\Program;
use App\Session;
use App\Mail\Welcome;
use App\StaffContact;
use App\ProgramCourse;
use App\StaffPosition;
use App\EmploymentType;
use App\AdminDepartment;
use App\StaffWorkProfile;
use Illuminate\Http\Request;
use App\Models\BursarySession;
use Illuminate\Validation\Rule;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;
use App\Models\RemitasVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\StaffRoleAssignmentLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Intervention\Image\ImageManagerStatic as Image;



class StaffController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:staff');
    // }

    public function home()
{
    $staff = Auth::guard('staff')->user();

    $totalApplicants = DB::table('usersbiodata')->count();
    $totalRecommended = DB::table('recommended_applicants')->count();
    $totalApproved = DB::table('approved_applicants')->count();
    $totalStudents = DB::table('students')->count();

    $certificateCount = DB::table('users')->where('applicant_type', 'Certificate')->count();
    $licentiateCount = DB::table('users')->where('applicant_type', 'Licentiate')->count();
    $diplomaCount = DB::table('users')->where('applicant_type', 'Diploma')->count();


    return view('staff.home', compact('staff', 'totalApplicants', 'totalRecommended', 'totalApproved', 'totalStudents','certificateCount','licentiateCount','diplomaCount'));
}

    // public function index(): JsonResponse
    // {
    //     $test = Staff::all();
    //     return response()->json($test);
    // }

    public function index()
    {
        $this->authorize('list', Staff::class);
        $staff = Staff::orderBy('status','ASC')->orderBy('surname','ASC')->orderBy('id','DESC')->paginate(100);
        return view('staff.admin.list',compact('staff'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $this->authorize('edit', Staff::class);
        $staff = Staff::find($id);
        $work = $staff->workProfile;
        $contact = $staff->contact;
        return view('staff.show', compact('staff','work','contact'));
    }

    public function view($id)
    {
        $this->authorize('view', Staff::class);
        $staff = Staff::find($id);
        $work = $staff->workProfile;
        $contact = $staff->contact;
        return view('staff.view', compact('staff','work','contact'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function security($id)
    {
        $this->authorize('rbac', Staff::class);
        $staff = Staff::find($id);
        $role = new Role();
        $roles = $role->staffRoles($staff->id);
        $rls = $role->availableRoles($staff->id);
        $perms = $staff->permissions();
        return view('staff.security', compact('staff','roles','rls','perms'));
    }

     public function securitylist()
    {
        $this->authorize('rbac', Staff::class);
        $roles = Role::get();
        $staff = Staff::get();
        // $staff = Auth::guard('staff')->user();
        // dd($staff);
        // $roles = $role->staffRoles();
        // $rls = $role->availableRoles();
        // $perms = $staff->permissions();
        // $roles=RoleStaff::get();
        // $alltasks = DB::table('task_to_role')->where('role_id', $rls = $role->availableRoles)->get();
        return view('staff.securitylist', compact('roles','staff'));
    }

    public function assignRole(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        $this->authorize('rbac', Staff::class);
        $staffToAssign = Staff::find($request->staff_id);
        $staffToAssign->roles()->attach($request->role_id);

        // create log entry
        $log = new StaffRoleAssignmentLog();
        $log->staff_id = $staffToAssign->id;
        $log->role_id = $request->role_id;
        $log->assigned_by = $staff->id;
        $log->save();

        return redirect()->route('staff.security', $staffToAssign->id)
            ->with('success', 'Staff role added successfully');
    }


    public function removeRole(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        $this->authorize('rbac', Staff::class);
        $staffToRemoveRole = Staff::find($request->staff_id);
        $staffToRemoveRole->roles()->detach($request->role_id);

        // create log entry
        $log = new StaffRoleAssignmentLog();
        $log->staff_id = $staffToRemoveRole->id;
        $log->role_id = $request->role_id;
        $log->removed_by = $staff->id;
        $log->save();

        return redirect()->route('staff.security', $staffToRemoveRole->id)
            ->with('success', 'Staff role removed successfully');
    }

    public function create()
    {
        $this->authorize('create', Staff::class);
        $positions = StaffPosition::orderBy('name','ASC')->pluck('name','id');
        $employment_types = EmploymentType::orderBy('name','ASC')->pluck('name','id');
        $employment_types->forget('1');
        $departments = AdminDepartment::orderBy('name','ASC')->pluck('name','id');

        return view('staff.admin.create',compact('positions', 'employment_types','departments'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function getloginurl()
    {
        return 'https://admissions.veritas.edu.ng/staff/login';
    }
    public function store(Request $request)
    {
        $this->authorize('create', Staff::class);
        $this->validate($request, [
            'surname' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'sometimes|nullable|string|max:50',
            'gender' => 'required|string|max:6',
            'phone' => 'required|string|max:50',
            'email' => 'required|string|email|max:100',
            'title' => 'required|string|max:50',
            'dob' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state' => 'required|string|max:50',
            // 'lga_name' => 'required|string|max:100',
            'city' => 'required|string|max:50',
            'maiden_name' => 'sometimes|nullable|string|max:50',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'signature' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',

            // emergency contacts or sponsor
            'esurname' => 'required|string|max:100',
            'eother_names' => 'required|string|max:100',
            'ephone' => 'required|string|max:20',
            'eemail' => 'sometimes|nullable|string|email|max:100',
            'relationship' => 'required|string|max:50',
            'estate' => 'required|string|max:100',
            'eaddress' => 'required|string|max:200',

            // work information
            'staff_no' => 'required|string|max:50',
            'staff_position_id' => 'required|integer',
            'staff_type_id' => 'required|string|max:20',
            'employment_type_id' => 'required|integer',
            'admin_department_id' => 'required|integer',
            'grade_id' => 'required|string|max:100',
            'username' => 'required|string|email|max:50|unique:staff',
            'assumption_date' => 'required|string|max:50',
            'appointment_date' => 'required|string|max:50',
        ],
            $messages = [
                'passport.dimensions'    => 'Passport Image is too small. Must be at least 400px wide.',
                'signature.dimensions'    => 'Signature is too small. Must be at least 400px wide.',
            ]);

        $staff = new Staff();
        $staff->surname = $request->surname;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->gender = $request->gender;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->title = $request->title;
        $staff->dob = $request->dob;
        $staff->marital_status = $request->marital_status;
        $staff->nationality = $request->nationality;
        $staff->state = $request->state;
        $staff->lga_name = $request->lga_name;
        $staff->city = $request->city;
        $staff->maiden_name = $request->maiden_name;
        $staff->religion = $request->religion;
        $staff->address = $request->address;
        $staff->password = Hash::make('welcome@123');
        $staff->status = 1;
        $staff->username = $request->username;

        //process Passport upload
        if($request->hasFile('passport'))
        {
            $img1 = Image::make($request->file('passport'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
                $passport = base64_encode($img1->encode()->encoded);
                $staff->passport = $passport;
        } // end Passport

        //process Signature upload
        if($request->hasFile('signature'))
        {
            $img2 = Image::make($request->file('signature'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

                $signature = base64_encode($img2->encode()->encoded);
                $staff->signature = $signature;
        } // end Signature

        // emergency contacts or sponsor
        $contact = new StaffContact();
        $contact->name = $request->esurname." ".$request->eother_names;
        $contact->phone = $request->ephone;
        $contact->email = $request->eemail;
        $contact->relationship = $request->relationship;
        $contact->state = $request->estate;
        $contact->address = $request->eaddress;

        // work profile
        $work = new StaffWorkProfile();
        $work->staff_no = $request->staff_no;
        $work->staff_position_id = $request->staff_position_id;
        $work->staff_type_id = $request->staff_type_id;
        $work->employment_type_id = $request->employment_type_id;
        $work->admin_department_id = $request->admin_department_id;
        $work->grade_id = $request->grade_id;
        $work->appointment_date = $request->appointment_date;
        $work->assumption_date = $request->assumption_date;
        $work->last_promotion_date = $request->appointment_date;

        DB::beginTransaction(); //Start transaction!

        try {
            //saving logic here
            $staff->save();

            // save contact
            $contact->staff_id = $staff->id;
            $contact->save();

            //save work
            $work->staff_id = $staff->id;
            $work->save();

            //Data That will be deisplayed at the email address portal
            $mailData = [
                'title' => 'Welcome to Institute of Consecrated Life in Africa (InCLA) Portal',
                'msg' => 'Your staff account have been created , please click on the button below to Login and Reset Your Password',
                'url' => $this->getloginUrl() ,
                // 'url' => $this->getBaseUrl().'/='.base64_encode($req->idcard),
                 'surname'=>$request->surname." ".$request->first_name." ".$request->middle_name,
                'email' => $request->username,
                'name_no'=>'Staff Number : ',
                'identity_no'=> $request->staff_no,
                'password' => 'welcome@1',
                'note'=>''

            ];
              Mail::to($request->email)->send(new Welcome($mailData));
              Mail::to('noreply@veritas.edu.ng')->send(new Welcome($mailData));
              //end of email address sending
        } // end try

        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('staff.create')
            ->with('error',"Errors in creating Staff information.");
            // ->with('error',"Errors in creating Staff information. <br />".$e);
        }

        DB::commit();
        return redirect()->route('staff.show', $staff->id)
        ->with('success',"Staff created successfully, an email has been sent to".$request->email."with login details");

    } // end store


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $this->authorize('edit', Staff::class);
       $staff = Staff::findOrFail($id);
       return view('staff.admin.edit',array('staff' => $staff));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('edit', Staff::class);
        $staff = Staff::findOrFail($id);

        //validate unique username
        if($request->username != $staff->username)
        {
            $this->validate($request, [
                'username' => 'required|email|unique:staff',
            ]);
            $staff->username = $request->username;
        } // end valid username

        //
        $this->validate($request, [
            'surname' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'middle_name' => 'sometimes|nullable|string|max:50',
            'gender' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'email' => 'required|string|email|max:100',
            'title' => 'required|string|max:50',
            'dob' => 'required|string|max:50',
            'marital_status' => 'required|string|max:50',
            'nationality' => 'required|string|max:100',
            'state' => 'required|string|max:50',
            'lga_name' => 'required|string|max:100',
            'city' => 'required|string|max:50',
            'maiden_name' => 'sometimes|nullable|string|max:50',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:200',
            'passport' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'signature' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'username' => 'required|string|email|max:255',Rule::unique('staff')->ignore($staff->id),
        ],

        $messages = [
            'passport.dimensions'    => 'Passport Image is too small. Must be at least 400px wide.',
            'signature.dimensions'    => 'Signature is too small. Must be at least 400px wide.',
        ]);

        //process Passport upload
        if($request->hasFile('passport'))
        {
            $img1 = Image::make($request->file('passport'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
                $passport = base64_encode($img1->encode()->encoded);
                $staff->passport = $passport;
        } // end Passport

        //process Signature upload
        if($request->hasFile('signature'))
        {
            $img2 = Image::make($request->file('signature'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
                $signature = base64_encode($img2->encode()->encoded);
                $staff->signature = $signature;
        } // end Signature

        $staff->surname = $request->surname;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->gender = $request->gender;
        $staff->phone = $request->phone;
        $staff->email = $request->email;
        $staff->title = $request->title;
        $staff->dob = $request->dob;
        $staff->marital_status = $request->marital_status;
        $staff->nationality = $request->nationality;
        $staff->state = $request->state;
        $staff->lga_name = $request->lga_name;
        $staff->city = $request->city;
        $staff->maiden_name = $request->maiden_name;
        $staff->religion = $request->religion;
        $staff->address = $request->address;
        $staff->status = $request->status;

        try{
            $staff->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Staff ! <br />');
            return redirect()->route('staff.edit', $staff->id);
        }

        return redirect()->route('staff.show', $staff->id)
        ->with('success','Staff edited successfully');
    }

    public function disable(Request $request)
    {
        $this->authorize('disable', Staff::class);
        // dd($request);
        $staff = Staff::findOrFail($request->id);
        $name = $staff->fullName;
        $staff->status = $request->status;
        $staff->save();
        return redirect()->route('staff.list')
        ->with('success', $name.' '.$request->action.' successfully');
    }


    public function password()
    {
        return view('staff.password');
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'current' => 'required',
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);
        if (!(Hash::check($request->get('current'), Auth::guard('staff')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match the password you provided. Please try again.");
        }
        if ($request->get('password') == 'welcome@1') {
            // The password should not be default
            return redirect()->back()->with("error","Your new password should not be the default password. Please try again.");
        }
        if ($request->get('password') == 'welcome@123') {
            // The password should not be default
            return redirect()->back()->with("error","Your new password should not be the Reset password. Please try again.");
        }

        //Change Password
        $staff = Auth::guard('staff')->user();
        $staff->password = Hash::make($request->get('password'));
        if ((Hash::check($request->get('current'), $staff->password))) {
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
       $staff->save();
        return redirect()->route('staff.home')->with("success","Password changed successfully !");
    }



    /**
     * AJAX Functions
     *
     *
     *
     *
     *
     *
     */


    public function getLecturers(Request $request)
    {
        $program = Program::findOrFail($request->program_id);
       if($program->department->admin) {
           $admin = $program->department->admin->id;

           if ($request->ajax()) {
               $lecturers = Staff::with('workProfile')
                   ->whereHas('workProfile', function ($query) use ($admin) {
                       return $query->where('admin_department_id', '=', $admin);
                   })
                   ->where('status', 1)->orderBy('surname', 'DESC')
                   ->get()->pluck('full_name', 'id');
               return Response($lecturers);
           }
       }
    }


    public function profile()
    {
        $staff = Auth::guard('staff')->user();
        $work = $staff->workProfile;
        $contact = $staff->contact;
        return view('staff.profile', compact('staff','work','contact'));
    }

    public function roles()
    {
        $staff = Auth::guard('staff')->user();
        $role = new Role();
        $roles = $role->staffRoles($staff->id);
        $perms = $staff->permissions();
        $work = $staff->workProfile;
        $contact = $staff->contact;
        return view('staff.roles', compact('staff','perms','roles'));
    }


    public function courses()
    {
        $staff = Auth::guard('staff')->user();
        $session = new Session();
        $pcourses = ProgramCourse::withCount(['results'])->with(['course', 'program', 'lecturer', 'session'])
            ->where('semester', $session->currentSemester())
            ->where('session_id', $session->currentSession())
            ->where('lecturer_id', $staff->id)
            ->orderBy('id','DESC')
            ->orderBy('program_id','ASC')->orderBy('level','ASC')->paginate(40);
        return view('staff.academic.courses', compact('pcourses'));
    }
    public function search()
    {
        //$this->authorize('search', Staff::class);
        return view('staff.admin.search');
    }

    public function find(Request $request)
    {
        $this->authorize('search', Staff::class);
        $staff = Staff::with(['contact', 'workProfile'])
            ->where('surname', 'like', '%'.$request->data.'%')
            ->orWhere('id', $request->data)
            ->orWhere('first_name', 'like', '%'.$request->data.'%')
            ->orWhere('middle_name', 'like', '%'.$request->data.'%')
            ->orWhere('phone', 'like', '%'.$request->data.'%')
            ->orWhere('email', 'like', '%'.$request->data.'%')
           ->orderBy('id')
            ->orderBy('surname')
            ->paginate(50);

        if(count($staff) > 0)
        {
            $request->session()->flash('message', '');
            return view('staff.admin.list',compact('staff'));
        }
        else
        {
            $request->session()->flash('message', 'No Matching staff record found. Try to search again !');
            return view ('staff.admin.search');
        }
    } // end find


    public function reset(Request $request)
    {
        $this->authorize('reset', Staff::class);
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
        $staff = Staff::findOrFail($request->id);
        $staff->password = Hash::make("welcome@123");
        $staff->save();
        return redirect()->route('staff.show', $staff->id)
            ->with('success',$staff->full_name.' password changed to welcome@123 successfully');
    } // end reset


    public function email()
    {
        $staff = Staff::where('status',1)->get();
        $data = collect();
        $emails = "";
        foreach ($staff as $key => $stf)
        {
            $mail = $stf->email;
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                // Separate string by @ characters (there should be only one)
                $parts = explode('@', $mail);

                // Remove and return the last part, which should be the domain
                $domain = array_pop($parts);
                if($domain != "veritas.edu.ng")
                {
                    $mail = strtolower($mail);
                    $data->add($mail);
                    $emails .= $mail . ",";
                }
            }
        }
$data  =  $emails;
        return view('students.admin.plain',compact('data'));

    }



    public function results()
    {
        $staff = Auth::guard('staff')->user();
        $session = new Session();
        $pcourses = ProgramCourse::withCount(['results'])->with(['course', 'program', 'lecturer', 'session'])
            ->where('lecturer_id', $staff->id)
            ->where('approval', 7)
            ->orderBy('session_id','DESC')
            ->orderBy('semester','DESC')
            ->orderBy('program_id','ASC')->orderBy('level','ASC')->paginate(40);
        return view('staff.academic.results', compact('pcourses'));
    }

//CLEARANCE
public function approvePaymentss()
{
    $staff = Auth::guard('staff')->user();
    $sessionBus = BursarySession::where('status',1)->frst();
    // Retrieve paid RRRs with associated student names
    // $paidRRRs = Remitas::where('status_code', '01')
    //     ->join('students', 'remitas.student_id', '=', 'students.id')
    //     ->select('remitas.rrr', 'remitas.amount','remitas.fee_type', 'students.first_name', 'students.surname', 'students.middle_name', 'remitas.transaction_date')
    //     ->orderBy('remitas.transaction_date', 'desc')
    //     ->paginate(10);
    $paidRRRs = Remita::with(['feeType','student','student.academic','users'])
        ->where('status_code',1)
        ->where('authenticate', 'not_confirm')
         ->where('updated_at', '>=', '2022-08-1 13:07:36') // Filter records updated on or after July 19, 2022
        ->orderBy('updated_at','DESC')
        ->paginate(100);
    return view('staff.paymentlists', compact('staff', 'paidRRRs','sessionBus'));
}

public function approvePayments(Request $request)
{
    $staff = Auth::guard('staff')->user();
    $sessionBus = BursarySession::where('status',1)->first();

    $query = Remita::with(['feeType', 'student', 'student.academic', 'users'])
    ->where('status_code', 1)
    ->where('authenticate', 'not_confirm')
    ->orderBy('remitas.updated_at', 'DESC')
    ->join('students', 'students.id', '=', 'remitas.student_id') // Assuming 'student_id' is the common key
    ->leftJoin('users', 'users.id', '=', 'remitas.user_id');

// Check if a search query is provided
if ($request->has('search')) {
    $search = $request->input('search');
    $query->where(function ($q) use ($search) {
        $q->where('students.first_name', 'like', "%$search%") // Use 'students.first_name' to refer to the column in the 'students' table
            ->orWhere('students.surname', 'like', "%$search%")
            ->orWhere('students.middle_name', 'like', "%$search%")
            ->orwhere('users.first_name', 'like', "%$search%") // Use 'users.first_name' to refer to the column in the 'students' table
            ->orWhere('users.surname', 'like', "%$search%")
            ->orWhere('remitas.amount', 'like', "$search")
            ->orWhere('remitas.transaction_date', 'like', "%$search%")
            ->orWhere('remitas.rrr', 'like', "$search");
    });
}

$paidRRRs = $query->paginate(100);

return view('staff.paymentlists', compact('staff', 'paidRRRs', 'sessionBus'));

}


public function remitasVerification(Request $request){
        // dd($request);

        $this->authorize('addremitaservicetype', Session::class);

    	$create = new RemitasVerification();
    		$create->user_id = $request->user_id;
    		$create->student_id = $request->student_id;
            $create->rrr = $request->rrr;
            $create->amount = $request->amount;
            $create->session_id = $request->session_id;
            $create->percentage = $request->percentage;
            $create->staff_id = $request->staff_id;

    		$create->save();

            DB::table('remitas')->where('rrr', $request->rrr)->update([
                'authenticate' => 'confirm',
                'authenticate_by' => $request->staff_id,

            ]);
            DB::commit();
            // dd($create->save());

    	return redirect()->to('/staff/paymentlists')
    	->with('success','Approved '.$request->rrr.' Approved Verification  successfully');

}


public function confirmPayments()
{
    $staff = Auth::guard('staff')->user();
    $paidRRRs = Remita::with(['feeType','student','student.academic','users', 'staff'])
        ->where('status_code',1)
        ->where('authenticate', 'confirm')

        ->orderBy('updated_at','DESC')
        ->paginate(10);
    return view('staff.paymentConfirmlists', compact('staff', 'paidRRRs'));
}

public function staffreport()
{

    $allstaff = Staff::count();
    $activestaff = Staff::where('status',1)->count();
    $acdstaff = Staff::whereHas('workProfile', function ($query) {
        $query->where('staff_type_id',1);
        })->where('status',1)->count();

    $Nacdstaff = Staff::whereHas('workProfile', function ($query) {
        $query->where('staff_type_id',2);
        })->where('status',1)->count();


    return view('staff.admin.report',compact('allstaff','activestaff', 'acdstaff', 'Nacdstaff'));
}

// public function attendance()
// {
//     // NOTE
//     // public function type()
//     // {
//     //     return $this->belongsTo('App\StaffType', 'staff_type_id');
//     // }

//     // public function admin()
//     // {
//     //     return $this->belongsTo('App\AdminDepartment', 'admin_department_id');
//     // }

//         $staff = Staff::with(['workProfile'])->where('status',1)
//         ->orderBy(function($query) {
//             $query->select('staff_type_id')
//                   ->from('staff_types')
//                   ->whereColumn('staff_types.staff_id', 'staff.id')
//                   ->limit(1);
//                 })
//                   ->orderBy(function($query) {
//                     $query->select('level')
//                           ->from('staff_work_profiles')
//                           ->whereColumn('staff_work_profiles.admin_department_id', 'admin_departments.id')
//                           ->limit(1);
//                 })

//                 <th>Staff No.</th>
//                 <th>Last Name</th>
//                 <th>Department</th>
//                 <th>Gender</th>
//                  <th>Marital Status</th>
//                  <th>title</th>
//                  <th>staff_type</th>
//                 <th>First Name</th>

//                 <td>{{ $staff->work->staff_no }}</td>
//                 <td> {{ $staff->surname }}</td>
//                 <td> {{ $staff->work->admin->name }}</td>
//                 <td> {{ $staff->gender }}</td>
//                 <td> {{ $staff->marital_status }}</td>
//                 <td> {{ $staff->title }}</td>
//                 <td> {{ $staff->work->type->name  }}</td>
//                 <td> {{ $staff->first_name }}</td>



// }
} // end Class
