<?php

namespace App\Http\Controllers;

use PDF;
use Mail;
use Exception;
use App\Program;
use App\Session;
use App\Student;
use App\StudentDebt;

// use Nette\Utils\Image;
use App\Mail\Welcome;
use App\ProgramCourse;
use App\StudentResult;
use App\StudentContact;
use App\StudentMedical;
use App\StudentAcademic;
use App\Mail\PasswordReset;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\RegisteredCourse;
use App\Models\StudentCreditLoad;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminStudentsController extends Controller
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
    public function authorize()
    {
        return true;
    }

    public function create()
    {
        $this->authorize('create',Student::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::where('status',1)->pluck('name','id');
        return view('students.admin.create',compact('programs', 'sessions'));
    }
    function getloginurl()
    {
        return 'https://admissions.veritas.edu.ng/students/login';
    }
    public function store(Request $request)
    {
        // $this->authorize('create',Student::class);


        $student = new Student();
        if($request->serial_no !== 0 AND $student->checkSerial($request->serial_no) === false)
        {
         $student->id = $request->serial_no;
        }
        $student->user_id =$request->user_id;
        $student->surname = $request->surname;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->title = $request->title;
        $student->dob = $request->dob;

        $student->nationality = $request->nationality;
        $student->state = $request->state;
        $student->lga_name = $request->lga_name;


        $student->address = $request->address;
        $student->password = Hash::make('welcome');
        $student->status = 1;

        //temprary username
        $student->username = "temporary@veritas.edu.ng";

       // process Passport upload
        if($request->hasFile('passport'))
        {
            $img1 = ($request->file('passport'));

                $passport = ($img1);
                $student->passport = $passport;
        } // end Passport

        //process Signature upload
        if($request->hasFile('signature'))
        {
            $img2 = ($request->file('signature'));


                $signature =($img2);
                $student->signature = $signature;
        } // end Signature
        if($request->hasFile('passport'))
        {
            $img1 = Image::make($request->file('passport'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
                $passport = base64_encode($img1->encode()->encoded);
                $student->passport = $passport;
        } // end Passport


        //process Signature upload
        if($request->hasFile('signature'))
        {
            $img2 = Image::make($request->file('signature'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

                $signature = base64_encode($img2->encode()->encoded);
                $student->signature = $signature;
        } // end Signature


       // emergency contacts or sponsor

        $contact = new StudentContact();
        $contact->surname = $request->esurname;
        $contact->other_names = $request->eother_names;
        $contact->phone = $request->ephone;
        $contact->email = $request->eemail;



        $contact->address = $request->eaddress;

        // academic information
        $academic = new StudentAcademic();
        $academic->mode_of_entry = $request->mode_of_entry;
        $academic->mode_of_study = $request->mode_of_study;

        $academic->entry_session_id = $request->entry_session_id;
        $academic->program_id = $request->program_id;

        // $academic->program_type = $request->program_type;


        // medical information
        $medical = new StudentMedical();

        $medical->blood_group = $request->blood_group;
        $medical->genotype = $request->genotype;






        DB::beginTransaction(); //Start transaction!

        try {

            //saving logic here
            // $student->id=$this->studentID($request->only('program_id', 'entry_session_id', 'program_type'));
            $student->save();
// dd($student);
            // save contact
            $contact->student_id = $student->id;
            $contact->save();

           //save academic
           $academic->student_id = $student->id;
           $academic->mat_no = $student->setMatNo($request->program_id, $request->entry_session_id, $student->id, $request->mode_of_entry);
           $academic->save();

            //save medical
            $medical->student_id = $student->id;
            $medical->save();





            // $student->id=$student->studentID($request->only('program_id', 'entry_session_id', 'program_type'));
            $student->username = $student->setVunaMail();
            $student->save();

           //Data That will be deisplayed at the email address portal
           $mailData = [
            'title' => 'Welcome to Institute of Consecrated Life in Africa (InCLA) Portal',
            'msg' => 'Your Student account have been created , please click on the button below to Login and Reset Your Password',
            'url' => $this->getloginUrl() ,
            // 'url' => $this->getBaseUrl().'/='.base64_encode($req->idcard),
             'surname'=>$request->surname." ".$request->first_name." ".$request->middle_name,
            'email' => $student->username,
            'name_no'=>'Matric Number : ',
            'identity_no'=> $academic->mat_no,
            'password' => 'welcome'

        ];
        //   Mail::to($request->email)->send(new Welcome($mailData));
        //   Mail::to('noreply@veritas.edu.ng')->send(new Welcome($mailData));
          //end of email address sending
        } // end try


          catch(\Exception $e)
            {
            //failed logic here
             DB::rollback();
            //  return view('login');


            return redirect()->route('student.create')
            ->with('error',"Errors in creating Student information.".$e);
             }

             DB::commit();
             return redirect()->route('student.show', $student->id)
             ->with('success','Student created successfully, an email has been sent to the student with his Matriculation Number and Login details');

    } //end store

    public function show($id)
    {
        $this->authorize('show',Student::class);
        $student = Student::findOrFail($id);
        $contact = $student->contact;
        $academic = $student->academic;
        $medical = $student->medical;

        return view('students.admin.show',compact('student','contact','academic','medical'));
    }


    function moveSession() {
        //$this->authorize('approveResult',ProgramCourse::class);
     dd("Save Disabled..");
      $status = "";
        $students = $this->getActiveUnderGrad();
        $num = count($students);
        $status.="This session migration will affect ".$num." students listed below. <br />";

        //start transaction
        DB::beginTransaction(); //Start transaction!
        try {
            foreach ($students as $student)
            {
                $academic = StudentAcademic::findOrFail($student->academic_id);
                if($academic->level == 400)
                {
                    $academic->level = 1000;
                    $status.= "Setting Student ID ".$academic->mat_no." academic status to graduated ..... <br /> ";
                }
                elseif ($academic->level < 400)
                {
                    $academic->level += 100;
                    $status.= "Moving Student ID ".$academic->mat_no." level to ". $academic->level." ..... <br /> ";
                }
                //$academic->save();
            }
        } // end try
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('staff.home')
                ->with('error',"Errors while moving session <br />".$e);
        }
        $status .= " Finalizing transaction ..... <br /> ";
        DB::commit();
        $status .= " Transaction Completed ..... <br /> ";
        return redirect()->route('staff.home')
            ->with('success',$status);

    } // end moveSession()



    public function list()
    {
        $this->authorize('list',Student::class);
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
        ->orderBy('id','DESC')->paginate(50);

        return view('students.admin.list',compact('students'));
    } //end list

    public function listLevel($encode)
    {
        $this->authorize('search', Student::class);
        $level = base64_decode($encode);
        // dd($level);
        $sum = "LIST OF $level LEVEL STUDENTS";
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level)
        {
            $query->where('level', '=', $level)->orderBy('program_id');
        })->orderBy('id')->orderBy('surname')->paginate(2000);
        return view('students.admin.plain_list',compact('students','sum'));
    } //end list



    public function listSession($level)
    {
        $this->authorize('search', Student::class);
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level)
        {
            $query->where('entry_session_id', '=', $level)->orderBy('program_id');
        })->orderBy('id')->orderBy('surname')->paginate(2000);
        return view('students.admin.plain_list_session',compact('students'));
    } //end list


    public function listLevelRegistered($level)
    {
        $this->authorize('search', Student::class);
        $session = new Session();
        $students = Student::distinct('students.id')->with(['contact','academic'])
            ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
            ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
            ->where('semester_registrations.session_id',$session->currentSession())
            ->where('semester_registrations.semester', $session->currentSemester())
            ->where('student_academics.level',$level)
            ->paginate(1000);
        return view('students.admin.join_list',compact('students'));
    } //end list


    public function search()
    {
        $this->authorize('search', Student::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        return view('students.admin.search',compact('programs'));
    } //end search


    public function find(Request $request)
    {
       $this->authorize('search', Student::class);
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
        ->where('surname', 'like', '%'.$request->data.'%')
        ->whereHas('academic')
        ->orWhere('id', $request->data)
        ->orWhere('first_name', 'like', '%'.$request->data.'%')
        ->orWhere('middle_name', 'like', '%'.$request->data.'%')
        ->orWhere('phone', 'like', '%'.$request->data.'%')
        ->orWhere('email', 'like', '%'.$request->data.'%')
        //add full matric search
        //->orWhereHas('academic', function ($query) use ($request){
            //$query->where('mat_no', '=', $request->data);
        //})
        ->orderBy('id')
        ->orderBy('surname')
        ->paginate(200);
        if(count($students) > 0)
        {
            $request->session()->flash('message', '');
            return view('students.admin.list',compact('students'));
        }
        else
        {
                     return redirect()->back()
            ->with('error','No Matching student record found. Try to search again !');
        }

    } // end find


    public function findMatric(Request $request)
    {

       $this->authorize('search',Student::class);
        // $this->validate($request, [
        //     'data' => 'required|string|max:50',
        //     ],

        //     $messages = [
        //         'data'    => 'Please provide the students ID only.',
        // ]);

        $students = Student::with(['academic'])->where('id', [$request->data])
        ->orwhere('username',  'like', '%'.$request->data.'%' )
            ->paginate(50);

      if(count($students) > 0)
        {
            $request->session()->flash('message', '');
            return view('students.admin.list',compact('students'));
        }

        else
        {
                   return redirect()->back()
            ->with('error','No Matching student record found. Try to search again !');
        }

    } // end find matric

    public function findprogram(Request $request)
    {
       $this->authorize('search', Student::class);
    //  dd($request->program_id,$request->level );
      $program_id = $request->program_id;
      $level =$request->level;
       {
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($request)
        {
            $query
            ->Where ('level', '=', $request->level)
            ->where('program_id', '=', $request->program_id )

            ->orderBy('program_id');

        })->orderBy('id')->orderBy('surname')->paginate(2000);
        return view('students.admin.plain_list',compact('students'));
    }
}//end list





    public function edit($id)
    {
        $this->authorize('edit',Student::class);
        $student = Student::findOrFail($id);
        return view('students.admin.edit',compact('student'));
    } // end edit



    public function update(Request $request, $id)
    {
        $this->authorize('edit',Student::class);
        $validatedData = $request->validate([
        //     'surname' => 'required|string|max:50',
        //     'first_name' => 'required|string|max:50',
        //     'middle_name' => 'sometimes|nullable|string|max:50',
        //     'gender' => 'required|string|max:50',
        //     'phone' => 'required|string|max:50',
        //     'email' => 'required|string|email|max:100',
        //     'title' => 'required|string|max:50',
        //     'dob' => 'required|string|max:50',
        //     'marital_status' => 'required|string|max:50',
        //     'nationality' => 'required|string|max:100',
        //     'state' => 'required|string|max:50',
        //     'lga_name' => 'required|string|max:100',
        //     'city' => 'required|string|max:50',
        //     'hobbies' => 'required|string|max:200',
        //     'religion' => 'required|string|max:50',
        //     'address' => 'required|string|max:200',
            'passport' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
            'signature' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',

        ],

            $messages = [
                'passport.dimensions'    => 'Passport Image is too small. Must be at least 400px wide.',
                'signature.dimensions'    => 'Signature is too small. Must be at least 400px wide.',
            ]);

        $student = Student::findOrFail($id);

        $student->surname = $request->surname;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->title = $request->title;
        $student->dob = $request->dob;


        $student->state = $request->state;
        $student->lga_name = $request->lga_name;

        $student->address = $request->address;

        //process Passport upload
        if($request->hasFile('passport'))
        {
            $img1 = Image::make($request->file('passport'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

                $passport = base64_encode($img1->encode()->encoded);
                $student->passport = $passport;
        } // end Passport

        //process Signature upload
        if($request->hasFile('signature'))
        {
            $img2 = Image::make($request->file('signature'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

                $signature = base64_encode($img2->encode()->encoded);
                $student->signature = $signature;
        } // end Signature

        try {
            //saving logic here
            $student->save();
        } // end try

        catch(\Exception $e)
        {
            return redirect()->route('student.edit',$id)
            ->with('error',"Errors in updating Student profile.");
        }

        return redirect()->route('student.show', $student->id)
        ->with('success','Student profile updated successfully');

    } //end update


    public function reset(Request $request)
    {
        $this->authorize('reset',Student::class);
        // $this->validate($request, [
        //     'id' => 'required|integer',
        // ]);
        $student = Student::findOrFail($request->id);
        $student->password = Hash::make("welcome");
        $student->save();

        try {
            $message = "Your ECampus password was reset successfully. <br />
<br />
Username: ".$student->username."   <br />
Password: welcome <br />
Regards and stay safe. <br />
Email: ict@veritas.edu.ng. <br />
ICT Unit<br />
 Institute of Consecrated Life in Africa (InCLA)<br />
";

            //Mail::to($student->email)->send(new PasswordReset($message));


        } catch (Exception $ex) {
            //run error notification
            //dd($ex);
        }


        return redirect()->route('student.show', $student->id)
            ->with('success','You have Successfully Reset '.$student->full_name.' password to  " welcome " ');
    } // end reset

    public function emailList($level)
    {
        $this->authorize('list',Student::class);
        $session = new Session();
        if($level == 1000) {
            $students = Student::distinct('students.id')->with(['contact', 'academic'])
                ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
                ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
                ->where('semester_registrations.session_id', $session->currentSession())
                ->where('semester_registrations.semester', $session->currentSemester())
                ->get();
        }
        else
        {
            $students = Student::distinct('students.id')->with(['contact', 'academic'])
                ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
                ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
                ->where('semester_registrations.session_id', $session->currentSession())
                ->where('semester_registrations.semester', $session->currentSemester())
                ->where('student_academics.level', $level)
                ->get();
        }
        $emails = "";
        $cycle = ($students->count() < 400) ? 1 : round($students->count()/400);

        $chunks = $students->chunk(ceil($students->count() / $cycle));
        foreach ($chunks as $keys => $chunk)
        {
            foreach ($chunk as $key => $student)
            {
                $emails .= $student->email . ", ";
            }
            $emails.= "<br /> <br /><br /> <br /><br /> <br />".($keys+1)."<br /> <br /><br /> <br /><br /> <br />";
        }


        $data = strtolower($emails);

        return view('students.admin.plain',compact('data'));
    } //end emailList



    public function contactEmailList($level)
    {
        $this->authorize('list',Student::class);
        $session = new Session();
        if($level == 1000) {
            $contacts = StudentContact::distinct('student_contacts.student_id')
                ->join('student_academics', 'student_contacts.student_id', '=', 'student_academics.student_id')
                ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
                ->where('semester_registrations.session_id', $session->currentSession())
                ->where('semester_registrations.semester', $session->currentSemester())
                ->get();
        }
        else
        {
            $contacts = StudentContact::distinct('student_contacts.student_id')
                ->join('student_academics', 'student_contacts.student_id', '=', 'student_academics.student_id')
                ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
                ->where('semester_registrations.session_id', $session->currentSession())
                ->where('semester_registrations.semester', $session->currentSemester())
                ->where('student_academics.level', $level)
                ->get();
        }
        $emails = "";
        $cycle = round($contacts->count()/300) +1;
        $unique = array();
        $chunks = $contacts->chunk(ceil($contacts->count() / $cycle));
        foreach ($chunks as $keys => $chunk)
        {
            foreach ($chunk as $key => $contact)
            {
                if (filter_var($contact->email, FILTER_VALIDATE_EMAIL))
                {
                   if(!in_array($contact->email, $unique))
                   {
                       $emails .= $contact->email . ", ";
                       array_push($unique, $contact->email);
                   }
                }
               if(strtolower($contact->email) != strtolower($contact->email_2))
                {
                    if (filter_var($contact->email, FILTER_VALIDATE_EMAIL))
                    {
                        if(!in_array($contact->email_2, $unique))
                        {
                            $emails .= $contact->email_2 . ", ";
                            array_push($unique, $contact->email_2);
                        }
                    }
                }
            }
            $emails.= "<br /> <br /><br /> <br /><br /> <br />".($keys+1)."<br /> <br /><br /> <br /><br /> <br />";
        }

        $data = strtolower($emails);

        return view('students.admin.plain',compact('data'));
    } //end contactEmailList($level)





    function getActiveUnderGrad() {

        $session = new Session();
        $students = Student::distinct('students.id')->with(['academic'])
            ->select('student_academics.id AS academic_id', 'students.*')
            ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
            ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
            ->where('semester_registrations.session_id',$session->currentSession())
            ->where('student_academics.level', '<',700)
            ->get();
        return $students;

    }  // end getActiveUnderGrad()

    public function disable(Request $request)
    {
        $this->authorize('disable', Student::class);
        $student = Student::findOrFail($request->id);
        $name = $student->fullName;
        $student->status = $request->status;
        $student->save();
        return redirect()->route('student.list')
            ->with('success', $name.' '.$request->action.' successfully');
    }


    public function view($id)
    {
        // $this->authorize('view',Student::class);
        $student = Student::findOrFail($id);
        $contact = $student->contact;
        $academic = $student->academic;
        $medical = $student->medical;

        return view('students.admin.view',compact('student','contact','academic','medical'));
    } //end show


    public function transcript($encode)
    {
        $this->authorize('transcript',Student::class);

        $student_id = base64_decode($encode);
        $student = Student::with('academic')->with('registered_courses')->find($student_id);
        $academic = $student->academic;
        $session_ids = RegisteredCourse::where('student_id', $student_id)->distinct('session')->pluck('session');
        $session_ids = $session_ids->toArray();
        $registered_courses = RegisteredCourse::where('student_id', $student_id)->get();
        //dd($registered_courses->where('session', 15));
        $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1' => function ($query) use ($student_id) {

            $query->where('student_id', $student_id);
            $query->where('semester', '1');
        }, 'registered_courses2' => function ($query) use ($student_id) {
            $query->where('student_id', $student_id);
            $query->where('semester', '2');
        }])->get();
        return view('students.admin.transcript',compact('student','academic','sessions', 'registered_courses'));
    } //end transcript

//03-05-2023

function getActivePostGrad() {

    $session = new Session();
    $students = Student::distinct('students.id')->with(['academic'])
        ->select('student_academics.id AS academic_id', 'students.*')
        ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
        ->join('semester_registrations', 'student_academics.student_id', '=', 'semester_registrations.student_id')
        ->where('semester_registrations.session_id',$session->currentSession())
        ->where('student_academics.level', '>=', 700 ,'<=',900)
        ->get();
    return $students;

}  // end getActivePostGrad()


public function getGradStudent($level)
{
    if ($level == 1000) {
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level) {
                $query->where('level', '=', $level)->orderBy('program_id');
            })->orderBy('id')->orderBy('surname')->paginate(2000);
    } elseif ($level >= 700 && $level <= 900) {
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level) {
                $query->whereBetween('level', [700, 900])->orderBy('program_id');
            })->orderBy('id')->orderBy('surname')->paginate(2000);
    } elseif ($level > 100 && $level <= 600) {
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level) {
                $query->whereBetween('level', [100, 600])->orderBy('program_id');
            })->orderBy('id')->orderBy('surname')->paginate(1000);
    } else {
        $students = collect(); // or return an error message
    }

    return view('students.admin.plain_list', compact('students'));
}



public function transcriptadmin($encode)
{
    $this->authorize('transcript',Student::class);

    $student_id = base64_decode($encode);
    $student = Student::with('academic')->with('registered_courses')->find($student_id);
    $academic = $student->academic;
    $session_ids = RegisteredCourse::where('student_id', $student_id)->distinct('session')->pluck('session');
    $session_ids = $session_ids->toArray();
    $registered_courses = RegisteredCourse::where('student_id', $student_id)->get();
    //dd($registered_courses->where('session', 15));
    $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1admin' => function ($query) use ($student_id) {

        $query->where('student_id', $student_id);
        $query->where('semester', '1');
    }, 'registered_courses2admin' => function ($query) use ($student_id) {
        $query->where('student_id', $student_id);
        $query->where('semester', '2');
    }])->get();
    return view('results.transcript',compact('student','academic','sessions', 'registered_courses'));
} //end transcriptAdmin



public function studentreport()
{
    // Count of graduated, postgraduate, and undergraduate students
    $graduatedCount = Student::whereHas('academic', function ($query) {
        $query->where('level', 1000);
    })->count();

    $postgraduateCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->count();

    $undergraduateCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->count();

    // Count of male and female students postgraduate
    $maleCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('gender', 'male')->count();

    $femaleCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('gender', 'female')->count();

    // Count of male and female students undergraduate
    $maleCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('gender', 'male')->count();

    $femaleCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('gender', 'female')->count();

    // Count of students based on religion
    $catholicCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('religion', 'Christian(Catholic)')->count();
    $nonCatholicCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('religion', 'Christian(Non-Catholic)')->count();
    $muslimCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('religion', 'Muslim')->count();
    $otherReligionCount = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [100, 600]);
    })->where('religion', 'Others')->count();

    // Count of students based on religion Postgraduate
    $catholicCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('religion', 'Christian(Catholic)')->count();
    $nonCatholicCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('religion', 'Christian(Non-Catholic)')->count();
    $muslimCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('religion', 'Muslim')->count();
    $otherReligionCountPost = Student::whereHas('academic', function ($query) {
        $query->whereBetween('level', [700, 900]);
    })->where('religion', 'Others')->count();

    $undergratedCount6 = Student::whereHas('academic', function ($query) {
        $query->whereBetween('mode_of_entry', ['UTME','DE','TRANSFER'])
        ->where('entry_session_id', 6);
    })->count();

    // Return the counts to the view
    return view('students.admin.report', compact(
        'graduatedCount',
        'postgraduateCount',
        'undergraduateCount',
        'maleCountPost',
        'femaleCountPost',
        'maleCount',
        'femaleCount',
        'catholicCount',
        'nonCatholicCount',
        'muslimCount',
        'otherReligionCount',
        'catholicCountPost',
        'nonCatholicCountPost',
        'muslimCountPost',
        'otherReligionCountPost',
        'undergratedCount6'
    ));
}


function attendance() {
    // Fetch students along with their related contact, academic, medical, and program details
    $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
    // Apply a filter to fetch only students whose academic level is less than 700
    ->whereHas('academic', function ($query) {
        $query->where('level', '<', 100);
    })
    // Order by program_id and level within the academic relation
    ->orderBy(function($query) {
        $query->select('mat_no')
              ->from('student_academics')
              ->whereColumn('student_academics.student_id', 'students.id')
              ->limit(1);
    })
    ->orderBy(function($query) {
        $query->select('level')
              ->from('student_academics')
              ->whereColumn('student_academics.student_id', 'students.id')
              ->limit(1);
    })
    // Order by student ID and surname
    ->orderBy('id')
    ->orderBy('surname')
    // Paginate the results with 50 students per page
    ->paginate(30);

    // Return the view with the students data
    return view('students.admin.plain_list1', compact('students'));
}

public function exportCsv()
{
    $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
        ->whereHas('academic', function ($query) {
            $query->where('level', '<', 700);
        })
        ->orderBy(function($query) {
            $query->select('program_id')
                  ->from('student_academics')
                  ->whereColumn('student_academics.student_id', 'students.id')
                  ->limit(1);
        })
        ->orderBy(function($query) {
            $query->select('level')
                  ->from('student_academics')
                  ->whereColumn('student_academics.student_id', 'students.id')
                  ->limit(1);
        })
        ->orderBy('id')
        ->orderBy('surname')
        ->get();

    $filename = "students.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, [
        'S/N', 'Matric No', 'Last Name', 'Department', 'Level', 'Gender', 'Marital Status', 'Title', 'First Name'
    ]);

    $sn = 1;
    foreach ($students as $student) {
        fputcsv($handle, [
            $sn++,
            $student->academic ? $student->academic->mat_no : 'N/A',
            $student->surname,
            $student->academic && $student->academic->program ? $student->academic->program->name : 'N/A',
            $student->academic ? $student->academic->level : 'N/A',
            $student->gender,
            $student->marital_status,
            $student->title,
            $student->first_name
        ]);
    }

    fclose($handle);

    $headers = [
        'Content-Type' => 'text/csv',
    ];

    return Response::download($filename, $filename, $headers)->deleteFileAfterSend(true);
}


} // end Class
