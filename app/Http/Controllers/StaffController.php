<?php

namespace App\Http\Controllers;

use App\ProgramCourse;
use App\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Staff;
use App\Program;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\StaffPosition;
use App\EmploymentType;
use App\AdminDepartment;
use App\StaffContact;
use App\StaffWorkProfile;



class StaffController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function home()
    {
        $staff = Auth::guard('staff')->user();
        return view('staff.home',compact('staff'));
    }

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

    public function assignRole(Request $request)
    {
        $this->authorize('rbac', Staff::class);
        $staff = Staff::find($request->staff_id);
        $staff->roles()->attach($request->role_id);
        return redirect()->route('staff.security', $staff->id)
        ->with('success','Staff role added successfully');
    }

    public function removeRole(Request $request)
    {
        $this->authorize('rbac', Staff::class);
        $staff = Staff::find($request->staff_id);
        $staff->roles()->detach($request->role_id);
        return redirect()->route('staff.security', $staff->id)
        ->with('success','Staff role removed successfully');
    } // end removeRole

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
            'lga_name' => 'required|string|max:100',
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
        $staff->password = Hash::make('welcome@1');
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
        } // end try

        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('staff.create')
            ->with('error',"Errors in creating Staff information. <br />".$e);
        }

        DB::commit();
        return redirect()->route('staff.show', $staff->id)
        ->with('success','Staff created successfully');

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
        $this->authorize('search', Staff::class);
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

} // end Class
