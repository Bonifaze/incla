<?php

namespace App\Http\Controllers;

use PDF;
use Exception;
use App\Remita;
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
use App\Models\MatricCount;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use App\SemesterRegistration;
use Illuminate\Validation\Rule;
use App\Models\StudentCreditLoad;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AdminStudentsControllerApplicant extends Controller
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

    function getloginurl()
    {
        return 'https://admissions.veritas.edu.ng/students/login';
    }

    public function create()
    {
        // $this->authorize('create', Student::class);

        // Fetch available programs and sessions
        $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
        $sessions = Session::where('status', 1)->value('id');

        // Get the current user's details
        $applicantsDetails = DB::table('users')
            ->where('users.id', session('userid'))
            ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
            ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
            ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
            ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
            ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'academic_record.*', 'uploads.*')
            ->first();

        // Dynamically fetch the program ID based on the course_program from the user's data
        if ($applicantsDetails && isset($applicantsDetails->course_program)) {
            $programId = DB::table('programs')
                ->where('name', $applicantsDetails->course_program)
                ->value('id');
            $applicantsDetails->program_id = $programId ?? null; // Add program_id to the details
        }

        //Debug and return the data
         // dd($applicantsDetails);
        //dd($sessions);

        return view('admissions.students.admin.create', compact('applicantsDetails', 'programs', 'sessions'));
    }






    public function store(Request $request)
    {
          // Check if a student record already exists for this user
    $existingStudent = Student::where('user_id', session('userid'))->first();

    if ($existingStudent) {
        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Matriculation Number Already Generated </div>';

        return Redirect::back()->with('approvalMsg', $approvalMsg);


    }
        $applicantsDetails = DB::table('users')
        ->where('users.id', session('userid'))
        ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
        ->leftJoin('academic_record', 'academic_record.user_id', '=', 'users.id')
        ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
        ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
        ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'academic_record.*', 'uploads.*')
        ->first();
       // dd($request);

        $student = new Student();

        if($request->serial_no !== 0 AND $student->checkSerial($request->serial_no) === false)
        {
         $student->id = $request->serial_no;
        }
        $student->user_id =session('userid');
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
        // $student->city = $request->city;

        $student->address = $request->address;
        $student->password = Hash::make('welcome');
        $student->status = 1;

        //temprary username
        $student->username = "temporary@edu.ng";
        // Include the passport (use the applicant's existing image if required)
        $student->passport = $request->passport ?? $applicantsDetails->passport;
        $student->signature = $request->signature ?? $applicantsDetails->signature;


       // emergency contacts or sponsor

        $contact = new StudentContact();
        $contact->surname = $request->esurname;
        $contact->other_names = $request->eother_names;
        $contact->phone = $request->ephone;
        $contact->email = $request->eemail;
        $contact->title = $request->etitle;

        $contact->address = $request->eaddress;

        // academic information
        $academic = new StudentAcademic();
        $academic->mode_of_entry = $request->mode_of_entry;
        $academic->entry_session_id = $request->entry_session_id;
        $academic->program_id = $request->program_id;
        $academic->level = 100;
        $academic->mode_of_study = 'Full Time';
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

            // save contact
            $contact->student_id = $student->id;
            $contact->save();

            // DB::table('remitas')->where('user_id', $request->user_id)
            // ->update([

            //     'student_id' => $student->id

            // ]);

            //save academic
            $academic->student_id = $student->id;
            $academic->mat_no = $student->setMatNo($request->program_id, $request->entry_session_id, $student->id);
            $academic->save();

            $medical->student_id = $student->id;
            $medical->save();

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
                'password' => 'welcome',
                'note'=>''

            ];
              Mail::to($request->email)->send(new Welcome($mailData));
              Mail::to('noreply@veritas.edu.ng')->send(new Welcome($mailData));
              Mail::to('lifeofrence@gmail.com')->send(new Welcome($mailData));
              //end of email address sending
            } // end try


          catch(\Exception $e)
            {

            //failed logic here
             DB::rollback();
            //  return view('login');

             $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> ERROR '.$e->getMessage();' </div>';
            //$approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>  Sorry try again or contact ICT Unit </div>';
            return Redirect::back()->with('approvalMsg', $approvalMsg);
            // return redirect('/students/create')->with('approvalMsg', $approvalMsg);
            // return redirect()->route('student.create')
            // ->with('error',"Errors in creating Student information.".$e);
             }

             DB::commit();
             return redirect()->route('admissions.student.show', $student->id)
             ->with('success','Student created successfully and Matriculation number and Login details has been sent to your email');

            //  $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> scuesss </div>';
            //  return redirect('/students/show')->with('approvalMsg', $approvalMsg);


    }  //end store


    public function showapplicant($id)
    {
        // $this->authorize('show',Student::class);
        $student = Student::findOrFail($id);
        $contact = $student->contact;
        $academic = $student->academic;
        $medical = $student->medical;

        return view('admissions.students.admin.show',compact('student','contact','academic','medical'));
    }


    // protected function studentID(array $fields)
    // {
    //     $program_id = $fields['program_id'];
    //     $entry_session_id = $fields['entry_session_id'];
    //     $program_type = $fields['program_type'];
    //     // $modeOfEntry = $fields['mode_of_entry'];

    //     $sess = Session::find($entry_session_id);
    //     $session = $sess->getCode();

    //     $program_students_count = DB::table('student_academics')->where('program_id', $program_id)
    //     ->where('entry_session_id', $entry_session_id)
    //     ->where('program_type', $program_type)->count();

    //     $new_number = $program_students_count + 1;

    //     $program = DB::table('programs')->find($program_id);
    //     $program_code = $program->code;

    //     $formatted_num = sprintf('%04d', $new_number);

    //     // $matric_number = 'VUG/'.$program_code.'/'. $session . '/'. $formatted_num;

    //     $student_ID= $program_code.''.$formatted_num;
    //     // dd($matric_number);
    //     return $student_ID;
    // }

    protected function genMatricNumber(array $fields)
    {
        $program_id = $fields['program_id'];
        $entry_session_id = $fields['entry_session_id'];
        // $program_type = $fields['program_type'];
        // $modeOfEntry = $fields['mode_of_entry'];

        $sess = Session::find($entry_session_id);
        $session = $sess->getCode();

        $matric_count = MatricCount::where('program_id', $program_id)->where('session_id', $entry_session_id)->first();
        if (!is_null($matric_count))
        {
            $program_students_count = $matric_count->count;
        }else
        {
            $program_students_count = 0;
        }

        DB::table('student_academics')->where('program_id', $program_id)
            ->where('entry_session_id', $entry_session_id);
        // ->where('mode_of_entry', $modeOfEntry)->count();
        // ->where('program_type', $program_type)->count();

        $new_number = $program_students_count + 1;

        $program = DB::table('programs')->find($program_id);
        $program_code = $program->code;
        // $deg = $program->masters;

        $formatted_num = sprintf('%04d', $new_number);


        // $deg = str_replace(".","",$deg);
        // $deg = str_replace(")","",$deg);
        // $deg = str_replace("(","",$deg);
        // $deg = str_replace(" ","",$deg);

        $matric_number= 'InCLA/'.$program_code.'/'.$session.''.$formatted_num;
        // switch ($modeOfEntry) {
        //     case "UTME":
        //         $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "DE":
        //         $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "TRANSFER":
        //         $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "PGD":
        //         $matric_number = "VPG/PGD/".$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "MSc":
        //         $matric_number = "VPG/".$deg."/".$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "PhD":
        //         $matric_number = "VPG/PHD/".$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "MBA":
        //             $matric_number = "VPG/MBA/".$session.'/'.$program_code.''.$formatted_num;
        //         break;
        //     case "MPA":
        //             $matric_number = "VPG/MPA/".$session.'/'.$program_code.''.$formatted_num;
        //             break;
        //     default:
        //      $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        // }

        // $matric_number = 'VUG/'.$program_code.'/'. $session . '/'. $formatted_num;

        // $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        // dd($matric_number);
        return $matric_number;
    }



    public function selfcreate()
    {
        // $this->authorize('create',Student::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::where('status',1)->pluck('name','id');
        return view('students.admin.selfcreate',compact('programs', 'sessions'));
    }

    public function selfstore(Request $request)
    {
        // $this->authorize('create',Student::class);


        $student = new Student();
        if($request->serial_no !== 0 AND $student->checkSerial($request->serial_no) === false)
        {
         $student->id = $request->serial_no;
        }
        // $student->user_id =$request->user_id;
        $student->surname = $request->surname;
        $student->first_name = $request->first_name;
        $student->middle_name = $request->middle_name;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->title = $request->title;
        $student->dob = $request->dob;
        $student->marital_status = $request->marital_status;
        $student->nationality = $request->nationality;
        $student->state = $request->state;
        $student->lga_name = $request->lga_name;
        // $student->city = $request->city;
        $student->hobbies = $request->hobbies;
        $student->religion = $request->religion;
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
        $contact->title = $request->etitle;
        $contact->relationship = $request->relationship;
        $contact->state = $request->estate;
        $contact->city = $request->ecity;
        $contact->address = $request->eaddress;

        // academic information
        $academic = new StudentAcademic();
        $academic->mode_of_entry = $request->mode_of_entry;
        $academic->mode_of_study = $request->mode_of_study;
        $academic->jamb_no = $request->jamb_no;
        $academic->jamb_score = $request->jamb_score;
        $academic->entry_session_id = $request->entry_session_id;
        $academic->program_id = $request->program_id;
        $academic->level = $request->level;
        // $academic->program_type = $request->program_type;


        // medical information
        $medical = new StudentMedical();
        $medical->physical = $request->physical;
        $medical->blood_group = $request->blood_group;
        $medical->genotype = $request->genotype;
        $medical->condition = $request->condition;
        $medical->allergies = $request->allergies;

        $studentCreditLoad1 = new StudentCreditLoad();
        $studentCreditLoad1->semester =1;
        $studentCreditLoad2 = new StudentCreditLoad();
        $studentCreditLoad2->semester =2;

        $studentDebit = new StudentDebt();

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

            //save CreditLoad firstsemster
            $studentCreditLoad1->student_id=$student->id;
            $studentCreditLoad1->save();

             //save CreditLoad secondsemester
             $studentCreditLoad2->student_id=$student->id;
             $studentCreditLoad2->save();

             $studentDebit->student_id=$student->id;
             $studentDebit->save();

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
          Mail::to($request->email)->send(new Welcome($mailData));
        //   Mail::to('noreply@veritas.edu.ng')->send(new Welcome($mailData));
        //   //end of email address sending
        } // end try


          catch(\Exception $e)
            {
            //failed logic here
             DB::rollback();
            //  return view('login');


            return redirect()->back()
            ->with('error',"Errors in creating Student information.".$e);

             }

             DB::commit();
             return redirect()->back()
             ->with('success','Student Matric  Number'.$academic->mat_no.' created successfully, an email has been sent to you with your Matriculation Number and Login details');

    } //end store





} // end Class
