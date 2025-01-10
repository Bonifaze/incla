<?php

namespace App\Http\Controllers;

use App\College;
use App\Mail\Letters;
use App\ProgramCourse;
use App\Staff;
use App\StudentDebt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Session;
use App\Program;
use App\StudentContact;
use App\StudentAcademic;
use App\StudentMedical;
use App\SemesterRegistration;
use App\StudentResult;
use Mail;

class UtilitiesController extends Controller
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


    public function classOf($session_id)
    {
       $stds = Student::with('academic')
           ->whereHas('academic', function ($query) use ($session_id){
               return $query->where('entry_session_id', '=', $session_id);
           })->get();
       $students = $stds->unique('phone');

        return view('students.admin.plain',compact('students'));
    }

    public function studentsContactLevel($level)
    {
        $cont = new StudentContact();
        $conts = $cont->levelContacts($level);
        $contacts = $conts->unique('email');
        $email = "";
        $email_count = 0;
        foreach ($contacts as $key => $contact)
        {
           // if($email_count > 560 AND $email_count < 640)
            //{
                if (filter_var($contact->email, FILTER_VALIDATE_EMAIL)) {
                    $email .= strtolower($contact->email . ", ");
                }

            //}
            $email_count += 1;
        }
       // $email.= " - 560 - 640";
        dd($email);

        return view('students.admin.plain',compact('students'));
    }


    public function studentsListLevel($level)
    {
        $students = Student::with('academic')
            ->whereHas('academic', function ($query) use ($level){
                return $query->where('level', '=', $level)->orderBy('program_id','ASC');
            })->get();

        return view('students.admin.plain',compact('students'));
    }

    public function studentUnderState()
    {
        //set empty arrays

        //get programs
        //get states
        //for each program
        //for each state, get male active students,  put in array
        //get female active students, put in array
        //send arrays to output
    }
    public function studentOutputState()
    {
        //set empty arrays
        //get programs
        //get states
        //for each program
        //for each state, get male students,
        //put in array where entry session is or (entry session is and mode is DE or Transfer)s
        //same for female students, put in array
        //send arrays to output
    }

    public function staffContactTeaching()
    {
        $lecs = Staff::with('workProfile')
            ->whereHas('workProfile', function ($query) {
                return $query->where('staff_type_id', '=', 1);
            })
            ->where('status', 1)->orderBy('surname', 'DESC')
            ->get();

        $lecturers = $lecs->unique('email');
        $email = "";
        foreach ($lecturers as $key => $lecturer)
        {
             $mail = $lecturer->email;
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                    // Separate string by @ characters (there should be only one)
                    $parts = explode('@', $mail);

                    // Remove and return the last part, which should be the domain
                    $domain = array_pop($parts);
                    if($domain != "veritas.edu.ng")
                    {
                        $email .= strtolower($mail . ", ");
                    }
                }

        }
        dd($email);

        return view('students.admin.plain',compact('students'));
    }


    public function allStaff()
    {
        $stfs = Staff::all();

        $staff = $stfs->unique('email');
        $email = "";
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
                        $email .= strtolower($mail . ", ");
                    }
                }

        }

        dd($email);

        return view('students.admin.plain',compact('students'));
    }


    public function vcLetters()
    {

        // sending email
        try {
            $message = "Letter to Parents, Staff and Students. <br />
<br />
-- <br />
Regards and stay safe. <br />
lawrence christopher <br />
 ICT Unit<br />
 Institute of Consecrated Life in Africa (InCLA)..<br />
";

           Mail::to('lawrencechrisojor@gmail.com')->send(new Letters($message));



        } catch (Exception $ex) {
            dd($ex);
        }

        dd("sent!");
    }


    public function sendStaff()
    {
        $stfs = Staff::all();

        $staff = $stfs->unique('email');
        $email = "";
        $status = "";
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
                    // sending email
                    try {
                        $message = "Letter from the Vice Chancellor to all Staff and Students. <br />
<br />
-- <br />
Regards and stay safe. <br />
lawrence christopher <br />
 ICT Unit<br />
 Institute of Consecrated Life in Africa (InCLA)<br />
";
                        //Mail::to($mail)->send(new Letters($message));
                        $status.= "mail sent to".$mail;
                        $status.="<br />";

                    } catch (Exception $ex) {
                        dd($ex);
                    }


                }
            }

        }
dd($status);
    }


    public function sendAllStudents()
    {
        $session = new Session();
        $students = Student::with(['academic','semesterRegistrations'])
            ->whereHas('semesterRegistrations', function ($query) use ($session){
                return $query->where('session_id', '=', $session->currentSession());
            })
            ->orderBy('id','DESC')
            ->get();

        //dd($students->first()->contact->email);
        $status = "";
        $email_count = 0;
        $emails = "";
        $cEmails = "";
        $sent = 0;
        foreach ($students as $key => $student)
        {
            if($email_count > 1200 AND $email_count < 1285)
            {
            $mail = $student->email;
                $contactMail = $student->contact->email;
             if (filter_var($contactMail, FILTER_VALIDATE_EMAIL))
            {
                $cEmails .= $contactMail.",";
            }
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                // Separate string by @ characters (there should be only one)
                $parts = explode('@', $mail);

                // Remove and return the last part, which should be the domain
                $domain = array_pop($parts);
                if($domain != "veritas.edu.ng")
                {
                    $mail = strtolower($mail);
                    // sending email
                    try {
                        $message = "Letter from the Vice Chancellor to all Staff and Students. <br />
<br />
-- <br />
Regards and stay safe. <br />
lawrence christopher <br />
 ICT Unit<br />
 Institute of Consecrated Life in Africa (InCLA)<br />
";
                       // Mail::to($mail)->send(new Letters($message));
                        $emails .= $mail.",";
                        $status.= "mail sent to".$mail;
                        $status.="<br />";
                        $sent +=1;

                    } catch (Exception $ex) {
                        dd($ex);
                    }


                }
            }

        }
            $email_count += 1;
        }
        dd($cEmails);
        $status.="<br />";
        $status.=$sent;
        $status.="<br />";
        return $status;

    }


    public function sendManualStudents()
    {
        $session = new Session();
        $students = Student::with(['academic','semesterRegistrations'])
            ->whereHas('semesterRegistrations', function ($query) use ($session){
                return $query->where('session_id', '=', $session->currentSession());
            })
            ->whereHas('contact', function ($query) use ($session){
                return $query->where('email', '!=', NULL);
            })
            ->orderBy('id','DESC')
            ->get();
        $data = collect();
        $emails = "";
        foreach ($students as $key => $student)
        {
            $mail = $student->contact->email;
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                    // Separate string by @ characters (there should be only one)
                    $parts = explode('@', $mail);

                    // Remove and return the last part, which should be the domain
                    $domain = array_pop($parts);
                    if($domain != "veritas.edu.ng" AND $domain != "gmail.com" AND $domain != "asec-sidi.org" AND $domain != "asec-sldi.org" AND $mail != "hilaryokeke2002@yahoo.co.uk")
                    {
                        $mail = strtolower($mail);
                        $data->add($mail);
                        $emails .= $mail."<br />";
                     }


                }


        }

        $datas = collect();
        $data->add("lawrencechrisojor@gmail.com");
        $data->add("lawrencechrisojor@gmail.com");
        $data->add("lawrencechrisojor@gmail.com");
        $data->add("christopherl@veritas.edu.ng");
        $dt = $data->unique();

        foreach ($dt as $key => $ds)
        {
            //send email
            if($ds != NULL AND $ds != "") {
                try {
                    $message = "Resumption letter from the Vice Chancellor to all Staff, Parents and Students. <br />
<br />
-- <br />
Regards and stay safe. <br />
lawrence christopher <br />
 ICT Unit<br />
 Institute of Consecrated Life in Africa (InCLA)<br />
";
                    Mail::to($ds)->send(new Letters($message));
                    echo "mail sent to " . $ds;
                    echo "<br />";

                } catch (Exception $ex) {
                    dd($ex);
                }
            }
        }

    }




    public function studentsYahooEmail()
    {
        $session = new Session();
        $students = Student::with(['academic','semesterRegistrations'])
            ->whereHas('semesterRegistrations', function ($query) use ($session){
                return $query->where('session_id', '=', 14);
            })
            ->whereHas('contact', function ($query) use ($session){
                return $query->where('email', '!=', NULL)
                    ->orderBy('email','ASC');
            })
            //->orderBy('id','DESC')
            ->get();
        $data = collect();
        $emails = "";
        foreach ($students as $key => $student)
        {
                //$mail = $student->email;
                $mail = $student->contact->email;
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {

                    // Separate string by @ characters (there should be only one)
                    $parts = explode('@', $mail);

                    // Remove and return the last part, which should be the domain
                    $domain = array_pop($parts);
                    if($domain == "yahoo.com" OR $domain == "gmail.com" AND $domain != "veritas.edu.ng")
                    {
                        if($domain != "asec-sidi.org" AND $domain != "asec-sldi.org" AND $mail != "hilaryokeke2002@yahoo.co.uk") {
                            $mail = strtolower($mail);
                            $data->add($mail);
                            $emails .= $mail . ",";
                        }
                    }


                }


        }
        $finalEmails="";
        $datas = $data->unique();
        $datas->values();
        //dd($emails);

        foreach ($data as $key => $dt)
        {
            $finalEmails .= $dt . ",";
            if(fmod($key,400) == 0)
            {
                $finalEmails .= "<br /> ".$key." <br />  <br /> <br />";
            }
        }
       $emails = $finalEmails;
        return view('students.admin.plain2',compact('emails'));
        //dd($emails);
        //return $mails;

    }



    public function staffEmail()
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
        dd($emails);
        $finalEmails="";
        $datas = $data->unique();
        $datas->values();
        foreach ($datas as $key => $dt)
        {
            $finalEmails .= $dt . ",";
            if(fmod($key,100) == 0)
            {
                $finalEmails .= "<br /> ".$key." <br />  <br /> <br />";
            }
        }
        $emails = $finalEmails;
        return view('students.admin.plain2',compact('emails'));
        //dd($emails);
        //return $mails;

    }



    public function studentsDebt()
    {
        $sDebt = new StudentDebt();
        $profile = array();
       for($i = 22; $i < 24; $i++) {
           $profile[$i]['100L'] = $sDebt->programLevelDebt($i,100);
           $profile[$i]['200L'] = $sDebt->programLevelDebt($i,200);

        }
        dd($profile);

    }

    public function uploadAssurance()
    {
        //empty result array
        $suspects = collect([]);
        //get all program courses
        $program_courses = ProgramCourse::with(['results','course'])->where('session_id',14)->where('semester',1)
            ->orderBy('lecturer_id','ASC')->get();
        foreach ($program_courses as $pc)
        {
            $results = StudentResult::with(['programCourse','programCourse.course','programCourse.lecturer','modifiedBy'])->where('program_course_id',$pc->id)
                ->where('total','>',46)->where('modified_by','!=',$pc->lecturer_id)
                ->orderBy('updated_at','ASC')->get();
            if($results->count() < 4)
            {
                $suspects = $suspects->concat($results);
            }
        }
        return view('students.admin.plain3',compact('suspects'));

    }

    public function resultUploadStatus($approval)
    {
        // get colleges with departments and programs
        // get programs with program courses
        $faculties = College::with(['departments','programs','programs.programCourses'])->where('status',1)->get();
       $program_courses = ProgramCourse::with(['program','lecturer','results','course'])
           ->where('session_id',14)
           ->where('semester',2)
           ->where('approval',$approval)
           ->where('level','<',700)
           ->where('lecturer_id','!=',2)
           ->whereHas('results')
           ->orderBy('program_id','DESC')
           ->orderBy('level','DESC')
           ->orderBy('approval','DESC')
           ->get();
       return view('utilities.results', compact('program_courses'));
    }

} // end Class
