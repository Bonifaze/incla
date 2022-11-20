<?php

namespace App\Http\Controllers;

use PDF;
use Mail;
use App\Program;
use App\Session;
use App\Student;
use App\StudentDebt;
use App\ProgramCourse;
// use Nette\Utils\Image;
use App\StudentResult;
use App\StudentContact;
use App\StudentMedical;
use App\StudentAcademic;
use App\Mail\PasswordReset;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use Illuminate\Validation\Rule;
use App\Models\StudentCreditLoad;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
// use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Exception;

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
        //$this->middleware('auth:student');
    }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // $this->authorize('create',Student::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        // dd($programs);
        $sessions = Session::where('status',1)->pluck('name','id');
        $applicantsDetails = "";
        if (session('usersType') ==  'UTME') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'UTME')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('utme', 'utme.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'utme.*', 'olevel.*', 'uploads.*')
                ->first();
                return view('admissions.students.admin.create',compact('applicantsDetails','programs', 'sessions'));
        } elseif (session('usersType')  ==  'DE') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'DE')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('de', 'de.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'de.*', 'olevel.*', 'uploads.*')
                ->first();
                return view('admissions.students.admin.create',compact('applicantsDetails','programs', 'sessions'));
        } elseif (session('usersType')  ==  'Transfer') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'Transfer')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('transfers', 'transfers.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'transfers.*', 'olevel.*', 'uploads.*')
                ->first();
                return view('admissions.students.admin.create',compact('applicantsDetails','programs', 'sessions'));
        } elseif (session('usersType') ==  'PG') {
            $applicantsDetails = DB::table('users')->where('users.applicant_type', 'PG')
                ->where('users.id', session('userid'))
                ->leftJoin('usersbiodata', 'usersbiodata.user_id', '=', 'users.id')
                ->leftJoin('pgs', 'pgs.user_id', '=', 'users.id')
                ->leftJoin('sponsors', 'sponsors.user_id', '=', 'users.id')
                ->leftJoin('pg_referees', 'pg_referees.user_id', '=', 'users.id')
                ->leftJoin('pg_educations', 'pg_educations.user_id', '=', 'users.id')
                ->leftJoin('olevel', 'olevel.user_id', '=', 'users.id')
                ->leftJoin('uploads', 'uploads.user_id', '=', 'users.id')
                ->select('users.*', 'usersbiodata.*', 'sponsors.*', 'pgs.*', 'olevel.*', 'pg_referees.*', 'pg_educations.*', 'uploads.*')
                ->first();
                return view('admissions.students.admin.create',compact('applicantsDetails','programs', 'sessions'));
        }
        // return view('students.admin.create',compact('applicantsDetails','programs', 'sessions'));
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
            $academic->mat_no = $this->genMatricNumber($request->only('program_id', 'entry_session_id', 'mode_of_entry'));
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

            } // end try


          catch(\Exception $e)
            {
            //failed logic here
             DB::rollback();
            //  return view('login');

             $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> ERROR '.$e->getMessage();' </div>';
            // $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Matriculation number Generated, You can not generate more than once </div>';
            return Redirect::back()->with('approvalMsg', $approvalMsg);
            // return redirect('/students/create')->with('approvalMsg', $approvalMsg);
            // return redirect()->route('student.create')
            // ->with('error',"Errors in creating Student information.".$e);
             }

             DB::commit();
             return redirect()->route('admissions.student.show', $student->id)
             ->with('success','Student created successfully');

            //  $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> scuesss </div>';
            //  return redirect('/students/show')->with('approvalMsg', $approvalMsg);


    } //end store
    public function showapplicant($id)
    {
        // $this->authorize('show',Student::class);
        $student = Student::findOrFail($id);
        $contact = $student->contact;
        $academic = $student->academic;
        $medical = $student->medical;

        return view('admissions.students.admin.show',compact('student','contact','academic','medical'));
    }

    public function show($id)
    {
        $this->authorize('show',Student::class);
        $student = Student::findOrFail($id);
        $contact = $student->contact;
        $academic = $student->academic;
        $medical = $student->medical;

        return view('students.admin.show',compact('student','contact','academic','medical'));
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
        $modeOfEntry = $fields['mode_of_entry'];

        $sess = Session::find($entry_session_id);
        $session = $sess->getCode();

        $program_students_count = DB::table('student_academics')->where('program_id', $program_id)
        ->where('entry_session_id', $entry_session_id)
        ->where('mode_of_entry', $modeOfEntry)->count();
        // ->where('program_type', $program_type)->count();

        $new_number = $program_students_count + 1;

        $program = DB::table('programs')->find($program_id);
        $program_code = $program->code;
        $deg = $program->masters;

        $formatted_num = sprintf('%04d', $new_number);


        $deg = str_replace(".","",$deg);
        $deg = str_replace(")","",$deg);
        $deg = str_replace("(","",$deg);
        $deg = str_replace(" ","",$deg);
        switch ($modeOfEntry) {
            case "UTME":
                $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
                break;
            case "DE":
                $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
                break;
            case "TRANSFER":
                $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
                break;
            case "PGD":
                $matric_number = "VPG/PGD/".$session.'/'.$program_code.''.$formatted_num;
                break;
            case "MSc":
                $matric_number = "VPG/".$deg."/".$session.'/'.$program_code.''.$formatted_num;
                break;
            case "PhD":
                $matric_number = "VPG/PHD/".$session.'/'.$program_code.''.$formatted_num;
                break;
            default:
             $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        }

        // $matric_number = 'VUG/'.$program_code.'/'. $session . '/'. $formatted_num;

        // $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
        // dd($matric_number);
        return $matric_number;
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

    public function listLevel($level)
    {
        $students = Student::with(['contact', 'academic', 'medical', 'academic.program'])
            ->whereHas('academic', function ($query) use ($level)
        {
            $query->where('level', '=', $level)->orderBy('program_id');
        })->orderBy('id')->orderBy('surname')->paginate(2000);
        return view('students.admin.plain_list',compact('students'));
    } //end list


    public function listLevelRegistered($level)
    {
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
        $this->authorize('search',Student::class);
        return view('students.admin.search');
    } //end search


    public function find(Request $request)
    {
        $this->authorize('search',Student::class);
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
        ->paginate(50);
        if(count($students) > 0)
        {
            $request->session()->flash('message', '');
            return view('students.admin.list',compact('students'));
        }
        else
        {
            $request->session()->flash('message', 'No Matching student record found. Try to search again !');
            return view ('students.admin.search');
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
            $request->session()->flash('message', 'No Matching student record found. Try to search again !');
            return view ('students.admin.search');
        }

    } // end find matric


    public function edit($id)
    {
        $this->authorize('edit',Student::class);
        $student = Student::findOrFail($id);
        return view('students.admin.edit',compact('student'));
    } // end edit



    public function update(Request $request, $id)
    {
        $this->authorize('edit',Student::class);
        // $this->validate($request, [
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
        //     'passport' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',
        //     'signature' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=300',

        // ],

        //     $messages = [
        //         'passport.dimensions'    => 'Passport Image is too small. Must be at least 400px wide.',
        //         'signature.dimensions'    => 'Signature is too small. Must be at least 400px wide.',
        //     ]);

        $student = Student::findOrFail($id);

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
        $student->city = $request->city;
        $student->hobbies = $request->hobbies;
        $student->religion = $request->religion;
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
        $this->validate($request, [
            'id' => 'required|integer',
        ]);
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
 Veritas University Abuja<br />
";

            //Mail::to($student->email)->send(new PasswordReset($message));


        } catch (Exception $ex) {
            //run error notification
            //dd($ex);
        }


        return redirect()->route('staff.home', $student->id)
            ->with('success',$student->full_name.' password changed to welcome successfully');
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
        $student = Student::with(['academic','contact'])->findOrFail(base64_decode($encode));
        $academic = $student->academic;
        $registrations = $student->semesterRegistrations;
        $totalCGPA = $student->CGPA();
        return view('students.admin.transcript',compact('student','academic','registrations','totalCGPA'));
    } //end show





} // end Class
