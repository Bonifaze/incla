<?php

namespace App\Http\Controllers;

use PDF;
use App\Course;
use App\Remita;
use App\Session;
use App\Student;
use App\StudentDebt;
use App\ProgramCourse;
use App\StudentResult;
use App\StudentContact;
use App\StudentMedical;
use App\StudentAcademic;
use App\EvaluationResult;
use App\EvaluationQuestion;
use App\Models\VoucherCode;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use Illuminate\Validation\Rule;
use App\Models\RegisteredCourse;
use App\Models\StudentCreditLoad;
use Illuminate\Support\Facades\DB;
use App\Models\CourseRegistrations;
use App\Models\RemitasVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class StudentsController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Shows student home page
     * Lists test for program courses registered by student and their status
     *
     * @return void
     */




public function sidebaradmission()
{
    $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);

    View::share('courseReg', $courseReg);

    return view('layouts.student');
}





    public function home()
    {
        //
        $student = Auth::guard('student')->user();
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);

    $totalCourses = RegisteredCourse::where('student_id', $student->id)
        ->where('session', $this->getcurrentsession())
        ->count();

    $passedCourses = RegisteredCourse::where('student_id', $student->id)
        ->where('session', $this->getcurrentsession())
        ->where('grade_id', '>', 2)
        ->count();

    $failedCourses = RegisteredCourse::where('student_id', $student->id)
        ->where('session', $this->getcurrentsession())
        ->where('grade_id', 1)
        ->count();

    return view('students.home', compact('student','courseReg', 'totalCourses', 'passedCourses', 'failedCourses'));
}


    public function profile()
    {
        $student = Auth::guard('student')->user();
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        $contact = $student->contact;

        $academic = $student->academic;

        $medical = $student->medical;

        return view('students.profile',compact('student','contact','academic','medical','courseReg'));
    } //end profile

    public function show()
    {
        $student = Auth::guard('student')->user();
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        $contact = $student->contact;

        $academic = $student->academic;

        $medical = $student->medical;

        return view('students.show',compact('student','contact','academic','medical','courseReg'));

    } //end profile

    public function edit($id)
    {
        // $this->authorize('edit',Student::class);
        $student = Student::findOrFail($id);
        return view('students.edit',compact('student'));
    } // end edit

    public function editm($id)
    {
        // $this->authorize('edit', Student::class);
        $medical = StudentMedical::findOrFail($id);
        return view('students.editm',compact('medical'));
    } // end edit
    public function edita($id)
    {
    //    $this->authorize('edit', Student::class);
        $academic = StudentAcademic::findOrFail($id);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::pluck('name','id');
        return view('students.edita',compact('academic', 'programs', 'sessions'));
    } // end edit
    public function editc($id)
    {
        // $this->authorize('edit', Student::class);
        $contact = StudentContact::findOrFail($id);
        return view('students.editc',compact('contact'));
    } // end edit


    public function password()
    {
        //
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        return view('students.password', compact('courseReg'));
    }




    public function changePassword (Request $request)
    {
        //

        $this->validate($request, [

            'current' => 'required',
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);



        if (!(Hash::check($request->get('current'), Auth::guard('student')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match the password you provided. Please try again.");

        }

        //Change Password
        $student = Auth::guard('student')->user();
        $student->password = Hash::make($request->get('password'));

        if ((Hash::check($request->get('current'), $student->password))) {

            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $student->save();

        return redirect()->route('student.home')->with("success","Password changed successfully !");
    }
    
    public function updatecontact(Request $request, $id)
    {
        
        // $this->authorize('edit', Student::class);
        $this->validate($request, [
            'surname' => 'required|string|max:100',
            // 'other_names' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            // 'email' => 'sometimes|nullable|string|email|max:100',


            // 'state' => 'required|string|max:100',
            // 'address' => 'required|string|max:200',
        ]);

        // emergency contacts or sponsor
        $contact = StudentContact::findOrFail($id);
        $contact->surname = $request->surname;
        $contact->other_names = $request->other_names;
        $contact->phone = $request->phone;
        $contact->phone_2 = $request->phone_2;
        $contact->email = $request->email;

        $contact->address = $request->address;

        try {
            $contact->save();
        } // end try
        catch(\Exception $e)
        {
            //failed logic here
            return redirect()->back()
            ->with('error',"Errors in updating Student contact.");
        }
        return redirect()->back()
        ->with('success','Student Contact updated successfully');
    } //end update


    public function updatebio(Request $request, $id)
    {
       
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
            return redirect()->back()
            ->with('error',"Errors in updating Student profile.");
        }

        return redirect()->back()
        ->with('success','Student profile updated successfully');

    } //end update




    private function getcurrentsession(){
        $session = DB::table('sessions')->where('status', 1)
        ->select ('sessions.id')->first();
        $ses=$session->id;
        $currentsession =$ses;
        return $currentsession;
    }

   private function getprevioussession()
        {

                    $session = DB::table('sessions')->where('status', 1)
                    ->select ('sessions.id')->first();
                    $ses=$session->id;
                    // dd($session);
                    $oldsession = $ses-1;
                    // dd($oldsession);
                    return $oldsession;
            }
            public function studentCarryOverCourses($student)
            {


                // $semester = $session->courseRegSemester();
               // $program_courses = $this::with('course')
               $course = DB::table('courses')
               ->leftJoin('registered_courses', 'registered_courses.course_code', '=', 'courses.course_code')

                // ->where('session_id', $this->getcurrentsession())
               // ->where('semester', $semester)
                ->where('program_id',$student->academic->program_id)
                ->where('level',$student->academic->level )
                ->orderBy('level','DESC')
                ->where('registered_courses.status',0)
                // ->whereDoesntHave('results', function ($query) use($session,$student,$semester) {
                //     $query->where('session_id', $session->currentSession())
                //     ->where('semester', $semester)
                    ->where('student_id', $student->id)

                ->get();

                // join table to ensure the program course id doesn't exist

                return $course;

            }

// TO RETUNE COURSE courseRegistration BLADE
    public function courseRegistration()
    {
        $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
        $student = Auth::guard('student')->user();

          $rv = RemitasVerification::select('updated_at')->first();
        $sessions = DB::table('sessions')->where('status', 1)->select('sessions.name', 'sessions.semester')->first();

        $course = new Course();
        $registeredcourses = DB::table('registered_courses')
        ->where('student_id', $student->id)->get();
        // foreach ($registeredcourses as $courseRegCheck){
            //     if ($courseRegCheck->session == $this->getcurrentsession() && $courseRegCheck->student_id == $student->id ) {
                //         return redirect('courseform');
                //     }
                // }
                $prevsession = $this->getprevioussession();
                // return view('staff.auth.login');

        $session = DB::table('sessions')->where('status', 1)
        ->select ('sessions.id')->first();
        // $student = Auth::guard('student')->user();

        $contact = $student->contact;

        $academic = $student->academic;

  if ($sessions->semester == 1 || $sessions->semester == 2) {

            // Calculate the sum of percentages for semester 1
            $semester1PercentageSum = RemitasVerification::where('student_id', $student->id)
                ->sum('percentage');

        // To return courseRegistration blade for student for student in 1000L
        if ($student->academic->level ==100)
        {
            //first semester
            // $courseFirst = DB::table('courses')->where('program_id', $student->academic->program_id);
            $courseFirst = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
            ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
            ->where('program_courses.level',$student->academic->level )
            ->where('program_courses.semester', 1)
            ->where('session_id',$this->getcurrentsession() )
            ->orderBy('course_category','ASC')
            ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();

            //seceond semester
            $courseSecond =DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
            ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
            ->where('program_courses.level',$student->academic->level )
            ->where('program_courses.semester', 2)
            ->where('session_id',$this->getcurrentsession() )
            ->orderBy('course_category','ASC')
            ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();


            $stu_reg_courses = RegisteredCourse::where('student_id', $student->id)->where('session', $session->id)->get();
            $reg_course_ids = [];

            foreach ($stu_reg_courses as $stu_reg_course)
            {
                $reg_course_ids[] = $stu_reg_course->course_id;
            }

            $courseFirst->each(function ($first) use($reg_course_ids) {
                if (in_array($first->course_id, $reg_course_ids))
                {
                    $first->is_registered = 1;
                }else
                {
                    $first->is_registered = 0;
                }
            });

            $courseSecond->each(function ($second) use($reg_course_ids) {
                if (in_array($second->course_id, $reg_course_ids))
                {
                    $second->is_registered = 1;
                }else
                {
                    $second->is_registered = 0;
                }
            });

            //dd($stu_reg_courses->toArray(), $courseFirst->toArray(), $courseSecond->toArray());
            $courseform = RegisteredCourse::where('student_id', $student->id)
            ->where('registered_courses.semester', 1)
            ->where('session', $this->getcurrentsession())
            ->get();
            $courseform2 = RegisteredCourse::where('student_id', $student->id)
            ->where('registered_courses.semester', 2)
            ->where('session', $this->getcurrentsession())
            ->get();
            // $courseform = DB::table('registered_courses')->where('student_id',$student->id )
            // ->where ('session', $this->getcurrentsession())
            // ->leftJoin('courses', 'courses.id', '=', 'registered_courses.course_id')
            // ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
            //  ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
            // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
            // ->orderBy('registered_courses.semester', 'ASC')
            // // ->orderBy('level','ASC')
            // ->join('program_courses', 'program_courses.id', '=', 'courses.id')
            // ->select('registered_courses.*', 'courses.program_id','program_courses.credit_unit', 'courses.course_title', 'courses.course_code', 'program_courses.course_category', 'programs.*', 'academic_departments.*', 'colleges.*')
            //         ->get();

            // ->where('semester', 1)
            // ->get();
          //first semester lower course
          $lowercourseFirst = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
        //   ->where('level' ,'<', $student->academic->level )
          ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
          ->where('program_courses.level','<', $student->academic->level )
          ->where('program_courses.semester', 1)
          ->where('session_id',$this->getcurrentsession() )
          ->orderBy('course_category','ASC')
          ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();
        //         //second semester lower course
          $lowercourseSecond = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
          //   ->where('level' ,'<', $student->academic->level )
            ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
            ->where('program_courses.level','<', $student->academic->level )
            ->where('program_courses.semester', 2)
            ->where('session_id',$this->getcurrentsession() )
            ->orderBy('course_category','ASC')
            ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();


            // $prevsession = $this->getprevioussession();
        return view('students.course_registration', compact('courseFirst','courseSecond', 'lowercourseFirst' ,'lowercourseSecond','session', 'courseform','courseform2','courseReg'));
                // return view('students.course_registration', compact('courseFirst','courseSecond','session', 'courseform'));

            }

            // TO REVIEW courseRegistration BLADE FOR LEVEL HIGER THAT 100
            else
            {
                $courseFirst = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
                ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
                ->where('program_courses.level',$student->academic->level )
                ->where('program_courses.semester', 1)
                ->where('session_id',$this->getcurrentsession() )
                ->orderBy('course_category','ASC')
                ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();

                //seceond semester
                $courseSecond =DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
                ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
                ->where('program_courses.level',$student->academic->level )
                ->where('program_courses.semester', 2)
                ->where('session_id',$this->getcurrentsession() )
                ->orderBy('course_category','ASC')
                ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();


                $stu_reg_courses = RegisteredCourse::where('student_id', $student->id)->where('session', $session->id)->get();
                $reg_course_ids = [];

                foreach ($stu_reg_courses as $stu_reg_course)
                {
                    $reg_course_ids[] = $stu_reg_course->course_id;
                }

                $courseFirst->each(function ($first) use($reg_course_ids) {
                    if (in_array($first->course_id, $reg_course_ids))
                    {
                        $first->is_registered = 1;
                    }else
                    {
                        $first->is_registered = 0;
                    }
                });

                $courseSecond->each(function ($second) use($reg_course_ids) {
                    if (in_array($second->course_id, $reg_course_ids))
                    {
                        $second->is_registered = 1;
                    }else
                    {
                        $second->is_registered = 0;
                    }
                });

                //dd($stu_reg_courses->toArray(), $courseFirst->toArray(), $courseSecond->toArray());
                $courseform = RegisteredCourse::where('student_id', $student->id)
                ->where('semester', 1)
                ->where('session', $this->getcurrentsession())
                ->get();
                $courseform = RegisteredCourse::where('student_id', $student->id)
                ->where('semester', 2)
                ->where('session', $this->getcurrentsession())
                ->get();

                // $courseform = DB::table('registered_courses')->where('student_id',$student->id )
                // ->where ('session', $this->getcurrentsession())
                // ->leftJoin('courses', 'courses.id', '=', 'registered_courses.course_id')
                // ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
                //  ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
                // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
                // ->orderBy('registered_courses.semester', 'ASC')
                // // ->orderBy('level','ASC')
                // ->join('program_courses', 'program_courses.id', '=', 'courses.id')
                // ->select('registered_courses.*', 'courses.program_id','program_courses.credit_unit', 'courses.course_title', 'courses.course_code', 'program_courses.course_category', 'programs.*', 'academic_departments.*', 'colleges.*')
                //         ->get();

                // ->where('semester', 1)
                // ->get();
              //first semester lower course
              $lowercourseFirst = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
            //   ->where('level' ,'<', $student->academic->level )
              ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
              ->where('program_courses.level','<', $student->academic->level )
              ->where('program_courses.semester', 1)
              ->where('session_id',$this->getcurrentsession() )
              ->orderBy('course_category','ASC')
              ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();
            //         //second semester lower course
              $lowercourseSecond = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
              //   ->where('level' ,'<', $student->academic->level )
                ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
                ->where('program_courses.level','<', $student->academic->level )
                ->where('program_courses.semester', 2)
                ->where('session_id',$this->getcurrentsession() )
                ->orderBy('course_category','ASC')
                ->select('program_courses.*', 'courses.course_code', 'courses.course_title')->get();

            return view('students.course_registration', compact('courseFirst','courseSecond', 'lowercourseFirst' ,'lowercourseSecond','session', 'courseform','courseReg'));

            //    return view('students.course_registration', compact('courseFirst','courseSecond','session','courseform'));
                }

                } else {
                // Redirect or show an error message indicating not meeting the condition
                return redirect()->to('/students/home')
                    ->with('error', "Please pay at least 50% of your total fees to enable you register your Courses. If you have already paid, kindly visit the school's bursary for verification.");
            }

    }


//Function to get total credit units of selected courses

protected function getUnits(array $courses, $aca, $session)
{
    $total_units = 0;
    foreach ($courses as $course_id)
    {
        $total_units += ProgramCourse::where('course_id', $course_id)
        ->where('program_id', $aca->program_id)
        ->where('session_id', $session)
        ->first()->credit_unit;
    }
    return $total_units;
}


protected function getCourseSemester($course_id)
{
    $course = ProgramCourse::where('course_id',$course_id)
    // ->oderBy session DESC limit 1
    ->orderBy('session_id', 'DESC')
    //  ->where('session_id ',$this->getcurrentsession())

    ->first();
    $semester = $course->semester;
    return $semester;

}

// FUNCION TO REGISTER THE COURSE

    public function course_Reg(Request $req)
{
     $student = Auth::guard('student')->user();
    //  $contact = $student->contact;

    //  $academic = $student->academic;


    $courses1 = $req->courses1 ?? [];
    $courses2 = $req->courses2 ?? [];
    $courses = array_merge($courses1, $courses2);
    $num_courses = count($courses);
    $student_aca = StudentAcademic::where('student_id', $student->id)->first();
    $total_units1 = $this->getUnits($courses1, $student_aca, $req->session);
    $total_units2 = $this->getUnits($courses2, $student_aca, $req->session);
    // dd($total_units1);
    // dd($total_units2);



    // $studentCreditLoads = StudentCreditLoad::where('student_id', $req->student_id)->get();
    // $firstSemesterLoad = '';
    // $secondSemesterLoad = '';

    // foreach($studentCreditLoads as $student_credit_load)
    // {
    //     if ($student_credit_load->semester == 1)
    //     {
    //         $firstSemesterLoad = $student_credit_load->credit_load;
    //     }else{
    //         $secondSemesterLoad = $student_credit_load->credit_load;
    //     }
    // }

    // $student_aca = StudentAcademic::where('student_id', session('userid'))->first();
    $firstSemesterLoad = $student_aca->first_semester_load;
    $secondSemesterLoad = $student_aca->second_semester_load;

    $student_registered_courses = RegisteredCourse::where('student_id', $req->student_id)
    ->where('session', $req->session)->get();
    $total_reg_units1 = 0;
    $total_reg_units2 = 0;
    // dd($total_reg_units1);

    foreach ($student_registered_courses as $student_registered_course)
    {
        if ($student_registered_course->semester == 1)
        {
            $total_reg_units1 += $student_registered_course->course_unit;
        }
        else{
            $total_reg_units2 += $student_registered_course->course_unit;
        }
    }

    $student_courses = [];



    // $lowercourses = $req->lowercourses;
    try {

        for ($x= 0; $x< $num_courses; $x++)
        {
            $student_courses[] = [
                "course_id" => $courses[$x],
                "student_id" => $req->student_id,
                "session" => $req->session,
                "program_id" =>  $student->academic->program_id,
                "level" =>  $student->academic->level,
                "semester" => $this->getCourseSemester($courses[$x])
            ];


        }


        if (($total_units1 + $total_reg_units1) > $firstSemesterLoad)
        {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>   Credit units cannot exceed '.$firstSemesterLoad.' </div>';
            return back()->with('approvalMsg', $approvalMsg);
        }

        if (($total_units2 + $total_reg_units2) > $secondSemesterLoad)
        {
            $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button>   Credit units cannot exceed  '.$secondSemesterLoad.' </div>';
            return back()->with('approvalMsg', $approvalMsg);
        }

        DB::table('registered_courses')->insert($student_courses);

        $approvalMsg = '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Courses Registered successfully </div>';
        return Redirect::back()->with('approvalMsg', $approvalMsg);
    } catch (QueryException $e) {
        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Courses was not successfully Registered' . $e->getMessage(). ' </div>';
        return Redirect::back()->with('approvalMsg', $approvalMsg);
    }

}
public function dropcourse_Reg(Request $req)
{
    $student = Auth::guard('student')->user();
    $courses = $req->courses;
        // dd($courses);
    try {

        foreach ($courses as $course) {
            DB::table('registered_courses')
            ->where('course_id',  $course)
            ->where ('session', $this->getcurrentsession() )
                    ->where('student_id', $student->id)

            ->delete();
                // 'status' => 0

        }
        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Courses Dropped successfully </div>';
        return Redirect::back()->with('approvalMsg', $approvalMsg);
    } catch (QueryException $e) {
        $approvalMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> Courses was not Dropped successfully Registered' . $e->getMessage(). ' </div>';
        return Redirect::back()->with('approvalMsg', $approvalMsg);
    }

}


public function courseform(){
    $student = Auth::guard('student')->user();
    // dd($student);

    $academic = $student->academic;

    $currentsession = $this->getcurrentsession();

    // $courseform = DB::table('registered_courses')->where('student_id',$student->id )
    // ->where ('session', $this->getcurrentsession())
    // ->leftJoin('courses', 'courses.id', '=', 'registered_courses.course_id')
    // ->join('program_courses', 'program_courses.id', '=', 'courses.id')
    // ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
    //  ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
    // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
    // ->orderBy('registered_courses.semester', 'ASC')
    // ->where('registered_courses.semester', 1)
    // // ->orderBy('level','ASC')
    // ->select('registered_courses.*', 'program_courses.*', 'courses.course_title', 'courses.course_code', 'program_courses.course_category', 'programs.*', 'academic_departments.*', 'colleges.*')
    //         ->get();

            $courseform = RegisteredCourse::where('student_id', $student->id)
            ->where('registered_courses.semester', 1)
            ->where('session', $this->getcurrentsession())
            ->get();

    //         $courseform = DB::table('program_courses')->where('program_courses.program_id', $student->academic->program_id)
    //         ->leftJoin('registered_courses', 'registered_courses.id' ,'=', 'program_courses.course_id')
    //         ->where('student_id',$student->id )
    //         ->leftJoin('courses', 'courses.id', '=', 'program_courses.course_id')
    //          ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
    //             ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
    // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
    //         ->where('program_courses.level',$student->academic->level )
    //         ->where('program_courses.semester', 1)
    //         ->where('session_id',$this->getcurrentsession() )
    //         ->where('registered_courses.semester', 1)
    //         ->orderBy('course_category','ASC')
    //         ->select('registered_courses.*', 'program_courses.program_id','program_courses.credit_unit', 'courses.course_title', 'courses.course_code', 'program_courses.course_category', 'programs.*', 'academic_departments.*', 'colleges.*')
    //         ->get();



    // ->get();
    // $courseform2 =  DB::table('registered_courses')->where('student_id',$student->id )
    // ->where ('session', $this->getcurrentsession())
    // ->leftJoin('courses', 'courses.id', '=', 'registered_courses.course_id')
    // ->leftJoin('programs', 'programs.id', '=', 'courses.program_id')
    //  ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
    // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
    // ->where('registered_courses.semester', 2)
    // ->orderBy('level','ASC')
    $courseform2 = RegisteredCourse::where('student_id', $student->id)
    ->where('registered_courses.semester', 2)
    ->where('session', $this->getcurrentsession())
    ->get();

    // ->select('registered_courses.*', 'courses.program_id','courses.credit_unit', 'courses.course_title', 'courses.course_code', 'programs.*', 'academic_departments.*', 'colleges.*')
    //         ->get();

    // ->get();
    // $users = DB::table('programs')->where('id', $student->academic->program_id)
    // ->leftJoin('student_academics', 'student_academics.student_id', '=', 'students.id')
    // ->leftJoin('programs', 'programs.id', '=', 'student_academics.program_id')
    // ->leftJoin('academic_departments', 'academic_departments.id', '=', 'programs.academic_department_id')
    // ->leftJoin('colleges', 'colleges.id', '=', 'academic_departments.college_id' )
    // ->select('students.gender', 'programs.name', 'student_academics.mat_no','academic_departments.name', 'colleges.name' )->first();
    $session = DB::table('sessions')->where('status', 1)
    ->select ('sessions.name')->first();
    $facultyAndDept = array();
    foreach ($courseform as $ca) {
        $facultyAndDept = $this->getdptcolleg($ca->program_id);
    }


    return view('students.course_form', compact('student', 'academic','courseform','courseform2','currentsession','session', 'facultyAndDept'));

}








    // LEFTOUT IGNOR



// public function viewRegcourses(){
//     $registeredcourses =DB::table('registered_courses')
//     ->where('student_id',$student->id )
//     ->where ('session', $this->getcurrentsession() )
//     ->get();
//     return view('students.course_registration', compact('registeredcourses'));
// }

private function getdptcolleg($program_id)
    {
        $student = Auth::guard('student')->user();
        $program_id = $student->academic->program_id;
        $deptCol = array();
        $getdptcollege = DB::table('programs')->where('programs.id', $program_id)
            ->join('academic_departments', 'programs.academic_department_id', '=', 'academic_departments.id')->first();

        $deptCol['dept'] = $getdptcollege->name;

        $getdptcollege = DB::table('colleges')->where('id', $getdptcollege->college_id)->first();

        $deptCol['col'] = $getdptcollege->name;;


        return $deptCol;
    }


    // public function courseRegistration3()
    // {
    //     $student = Auth::guard('student')->user();
    //     $course = new Course();
    //     $sess = new Session();
    //     $session_id = $sess->currentSession();
    //     $session = Session::findOrFail($session_id);
    //     $semester = $session->courseRegSemester();

    //     //check if student has completed evaluation
    //     if(!$student->semesterEvaluated())
    //     {
    //         return redirect()->route('student.evaluation');
    //     }// end evaluated

    //        //check if second email or phone is still null
    //     // disable this
    //     /*
    //         if(!$student->contactUpdated())
    //         {
    //            return redirect()->route('student.contact-edit');
    //         }
    //         */
    //         // continue course registration
    //         if ($course->courseRegistrationEnabled($student))
    //         {
    //             $pcourse = new ProgramCourse();
    //             $result = new StudentResult();
    //             $fresh_courses = $pcourse->studentFreshCourses($student);
    //             $carry_over = $pcourse->studentCarryOverCourses($student);
    //             //$outstanding = $pcourse->studentOutstandingCourses($student);
    //             $results = $result->studentRegisteredCourses($student->id);
    //             $allowed_credits = $student->allowedCredits($session_id,$semester);
    //             $total_credit = $student->totalRegisteredCredits($results);
    //             //return view('students.course_registration', compact('fresh_courses', 'carry_over', 'results', 'total_credit', 'session', 'semester','allowed_credits'));
    //             return view('students.CourseReg');
    //         }
    //         else
    //             {
    //             return redirect()->route('student.closed-course-registration');
    //         }


    //     }


    //     public function evaluation()
    //     {
    //         //
    //         $evaluation = new EvaluationResult();
    //         $active = $evaluation->active();
    //         $student = Auth::guard('student')->user();
    //         $result = new StudentResult();
    //         $results = $result->semesterRegisteredCourses($student->id,$active->session->id,$active->semester);
    //         return view('students.evaluation', compact('student','results'));

    //     }

    //     public function debt()
    //     {
    //         //
    //         $student = Auth::guard('student')->user();

    //         $debt = StudentDebt::where('student_id',$student->id)->get()->first();

    //         return view('students.debt',compact('student','debt'));
    //     }



        public function closedCourseRegistration()
        {
            //
            $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
            $student = Auth::guard('student')->user();
            $sess = new Session();
            $session_id = $sess->currentSession();
            $semester = $sess->courseRegSemester();
            $session = Session::findOrFail($session_id);


            //check if course was registered and show course form
            // if($student->hasSemesterRegistration($session_id,$semester))
            // {
            //     $result = new StudentResult();
            //     $academic = $student->academic;
            //     $registration = $student->getSemesterRegistration($session->id,$semester);
            //     $results = $result->semesterRegisteredCourses($student->id,$session_id,$semester);
            //     $total = $student->totalRegisteredCredits($results);

            //     return view('students.current_course_form',compact('student','session','semester','academic','registration','results','total'));

            // }


            //else just show closed registration
            return view('students.closed_registration',compact('student','courseReg'));
        }

    //     public function courseForm2($encode)
    //     {
    //         //
    //         $registration = SemesterRegistration::findOrFail(base64_decode($encode));
    //         $result = new StudentResult();
    //         $student = Student::findOrFail($registration->student_id);
    //         $session = Session::findOrFail($registration->session_id);
    //         $semester = $registration->semester;
    //         $academic = $student->academic;

    //         $results = $result->semesterRegisteredCourses($registration->student_id,$registration->session_id,$registration->semester);
    //         $total = $student->totalRegisteredCredits($results);
    //         return view('students.course_form',compact('student','session','semester','academic','results','registration','total'));
    //     }


    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function removeRegisteredCourse(Request $request)
    // {
    //     //
    //     $sess = new Session();
    //     $session = Session::findOrFail($sess->currentSession());
    //     $semester = $sess->courseRegSemester();
    //     $result = StudentResult::findOrFail($request->result_id);
    //     $student = Auth::guard('student')->user();
    //     $balance  = count($result->studentRegisteredCourses($student));
    //     if(!$result->status == 7 OR $result->total !== 0)
    //     {
    //         return redirect()->route('student.course-registration')
    //         ->with('error',"Errors removing course. Result already available for course");
    //     }
    //     DB::beginTransaction(); //Start transaction!
    //     try {
    //     $result->delete();
    //     if($balance === 1 )
    //     {
    //         if(!$student->removeSemesterRegistration($session,$semester))
    //         {
    //             return redirect()->route('result.register',[$student->id,$session->id,$semester])
    //             ->with('error',"Errors removing semester registration");
    //         }
    //     }

    //     }
    //     catch(\Exception $e)
    //     {
    //         //failed logic here
    //         DB::rollback();
    //         return redirect()->route('student.course-registration')
    //         ->with('error',"Errors removing course.");
    //     }

    //     DB::commit();
    //     return redirect()->route('student.course-registration')
    //     ->with('success','Course removed successfully');


    // }



    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function addCourse(Request $request)
    // {
    //     //
    //     $session = new Session();
    //     $result = new StudentResult();
    //     $student = Auth::guard('student')->user();
    //     if($student->hasExcessSemesterCredits($result->studentRegisteredCourses($student->id),$request->program_course_id,$session->currentSession(),$session->courseRegSemester()))
    //     {

    //     $result->program_course_id = $request->program_course_id;
    //     $result->session_id = $session->currentSession();
    //     $result->semester = $session->courseRegSemester();
    //     $result->student_id = $student->id;
    //     DB::beginTransaction(); //Start transaction!
    //     try {
    //         // add course
    //         $result->save();
    //         if(!$student->hasCurrentSemesterRegistration())
    //         {
    //             //register semester
    //             $sem_reg = new SemesterRegistration();
    //             $sem_reg->student_id = $student->id;
    //             $sem_reg->session_id = $session->currentSession();
    //             $sem_reg->semester = $session->courseRegSemester();
    //             $sem_reg->level = $student->academic->level;
    //             $sem_reg->status = 1;
    //             try {
    //                 $sem_reg->save();
    //                }
    //             catch(\Exception $e)
    //             {
    //                 //failed logic here
    //                 DB::rollback();
    //                 return redirect()->route('student.course-registration')
    //                 ->with('error',"Errors completing semester registration.");
    //             }
    //         }

    //     }
    //     catch(\Exception $e)
    //     {
    //         //failed logic here
    //         DB::rollback();
    //         return redirect()->route('student.course-registration')
    //         ->with('error',"Errors adding course course.".$e);
    //     }

    //     DB::commit();
    //     return redirect()->route('student.course-registration')
    //     ->with('success','Course added successfully');

    //     }
    //     else
    //     {
    //         return redirect()->route('student.course-registration')
    //         ->with('error',"Maximum allowed credit reached.");
    //     }


    //     } // end addCourse(Request $request)



        // public function transcript()
        // {
        //     $student = Auth::guard('student')->user();
        //     //check for debt
        //     $access = $student->resultAccess();
        //     if($access['value'] < 0)
        //     {
        //         return redirect()->route('student.home')
        //             ->with('error',$access['error']);
        //     }
        //     $academic = $student->academic;

        //     $registrations = $student->semesterRegistrations;


        //     $totalCGPA = $student->CGPA();
        //     return view('students.transcript',compact('student','academic','registrations','totalCGPA'));
        // } //end show
            public function transcript()
        {
            $student = Auth::guard('student')->user();
            // dd($student->id);

            $academic = $student->academic;

           // $registrations = $student->semesterRegistrations;

            // $totalCGPA = $student->CGPA();

            $student_id = $student->id;
            // $student = Student::with('academic')->find($student_id);
            // $academic = $student->academic;
            $session_ids = RegisteredCourse::where('student_id', $student_id)->distinct('session')->pluck('session');
            $session_ids = $session_ids->toArray();
            $registered_courses = RegisteredCourse::where('student_id', $student_id)->
            where('status' , 'published')->get();
            $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1' => function ($query) use ($student_id) {
                $query->where('student_id', $student_id);
                $query->where('semester', '1');
            }, 'registered_courses2' => function ($query) use ($student_id) {
                $query->where('student_id', $student_id);
                $query->where('semester', '2');
            }])->get();



            return view('students.transcript',compact('student','academic','sessions','registered_courses'));
        }
//02-05-2023

    public function results()
        {
            $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);
            $student = Auth::guard('student')->user();
            //check for allowed
            // allowed is not true show error
            // $access = $student->resultAccess();
            // if($access['value'] < 0)
            // {
            //     return redirect()->route('student.home')
            //         ->with('error',$access['error']);
            // }
            $academic = $student->academic;
            $registrations = $student->semesterRegistrations;
            // dd($registrations);
            // $totalCGPA = $student->CGPA();


            return view('students.results',compact('student','academic','registrations','courseReg'));

        } // end results


        public function studentResult()
        {
            $student = Auth::guard('student')->user();
            // dd($student->id);

            $academic = $student->academic;

           // $registrations = $student->semesterRegistrations;

            // $totalCGPA = $student->CGPA();

            $student_id = $student->id;
            // $student = Student::with('academic')->find($student_id);
            // $academic = $student->academic;
            $session_ids = RegisteredCourse::where('student_id', $student_id)->distinct('session')->pluck('session');
            $session_ids = $session_ids->toArray();
            $registered_courses = RegisteredCourse::where('student_id', $student_id)->
            where('status' , 'published')->get();
            $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1' => function ($query) use ($student_id) {
                $query->where('student_id', $student_id);
                $query->where('semester', '1');
            }, 'registered_courses2' => function ($query) use ($student_id) {
                $query->where('student_id', $student_id);
                $query->where('semester', '2');
            }])->get();



            return view('students.studentResult',compact('student','academic','sessions','registered_courses'));
        }


    // public function evaluateResult($result_id)
    // {
    //     //make sure evaluation for this result id doesn't exist
    //     $result = StudentResult::findOrFail(base64_decode($result_id));
    //     if($result->evaluatedResult())
    //     {
    //         return redirect()->route('student.evaluation')
    //             ->with(['error' => 'This course has been evaluated already.']);
    //     }
    //     //also check if question has responses attached in pivot
    //     $questions = EvaluationQuestion::with('responses')->where('status',1)
    //         ->whereHas('responses')
    //         ->orderBy('id','ASC')
    //         ->get();

    //     return view('students.evaluate',compact('result', 'questions'));
    // }

    // public function storeEvaluation(Request $request)
    // {
    //     //make sure evaluation for this result id doesn't exist
    //     $studentResult = StudentResult::findOrFail($request->student_result_id);
    //     if($studentResult->evaluatedResult())
    //     {
    //         return redirect()->route('student.evaluation')
    //             ->with(['error' => 'This course has been evaluated already.']);
    //     }

    //     $parameters= $request->input('parameters');
    //     $this->validate($request, [

    //         'parameters.*' => 'required',
    //         'student_result_id' => 'required|integer',

    //     ],

    //         $messages = [
    //             'parameters.*'    => 'An evaluation field is empty or was not filled correctly.',
    //             'student_result_id'    => 'Student identification not found.',
    //         ]);
    //     DB::beginTransaction(); //Start transaction!
    //     try{

    //     foreach ($parameters as $key => $parameter)
    //     {
    //        $question = EvaluationQuestion::findOrFail($key);
    //        if($question->evaluation_response_type_id == 1)
    //        {
    //            //radio button
    //            $result = new EvaluationResult();
    //            $result->student_result_id = $request->student_result_id;
    //            $result->evaluation_response_id = $parameter;
    //            $result->evaluation_question_id = $question->id;
    //            $result->save();
    //        }
    //         if($question->evaluation_response_type_id == 2)
    //         {
    //             //checkbox
    //             foreach ($parameter as $key => $p)
    //             {
    //                 $result = new EvaluationResult();
    //                 $result->student_result_id = $request->student_result_id;
    //                 $result->evaluation_response_id = $p;
    //                 $result->evaluation_question_id = $question->id;
    //                 $result->save();
    //             }
    //         }
    //         if($question->evaluation_response_type_id == 3)
    //         {
    //             //textarea
    //             $result = new EvaluationResult();
    //             $result->student_result_id = $request->student_result_id;
    //             $result->evaluation_response_id = 1;
    //             $result->evaluation_question_id = $question->id;
    //             $result->evaluation_answer = $parameter;
    //             $result->save();
    //         }
    //     }

    //     } // end try
    //     catch(\Exception $e)
    //     {
    //         //failed logic here
    //         DB::rollback();
    //         return redirect()->route('student.result-evaluation',base64_encode($request->student_result_id))
    //             ->with(['error' => 'Error storing your Course evaluation. Ensure you answered all the questions.']);
    //     }
    //     DB::commit();
    //     //run evaluation test
    //     return redirect()->route('student.course-registration');

    // }

    // public function contactEdit()
    // {
    //     $student = Auth::guard('student')->user();
    //     $contact = $student->contact;
    //     if($contact->email_2 == NULL OR $contact->phone_2 == NULL)
    //     {
    //         return view('students.contact_edit',compact('student', 'contact'));
    //     }
    //     else{
    //         return redirect()->route('student.home');
    //     }
    // }

    // public function contactUpdate(Request $request)
    // {
    //     $this->validate($request, [
    //         'email_2' => 'required|email|max:40',
    //         'phone_2' => 'required|string|max:20',
    //     ]);

    //     $student = Auth::guard('student')->user();
    //     $contact = $student->contact;
    //     $contact->email_2 = $request->email_2;
    //     $contact->phone_2 = $request->phone_2;

    //     //ensure undergraduate students ae not using their email or phone number on record
    //     if($student->academic->level < 700 AND ($contact->email_2 == $student->email OR $contact->phone_2 == $student->phone))
    //     {
    //         return redirect()->route('student.contact-edit')
    //         ->with(['error' => 'Using your email instead of your sponsor may affect your affect future University services.']);
    //     }
    //     try{
    //         $contact->save();
    //         }
    //     catch (\Exception $e)
    //     {
    //         return redirect()->route('student.contact-edit')
    //             ->with(['error' => 'Error updating contact details.']);
    //     }
    //     return redirect()->route('student.course-registration');
    // }

    // public function course_Registration2()
    // {
    //     $courses = DB::table('courses')->get();
    //     return view('students.courseReg', compact('courses'));
    // }

    public function courseFormstudent($encode)
    {
        //
        $registration = SemesterRegistration::findOrFail(base64_decode($encode));
        $result = new StudentResult();
        $student = Student::findOrFail($registration->student_id);
        $session = Session::findOrFail($registration->session_id);
        $semester = $registration->semester;
        $academic = $student->academic;
        $courseform = RegisteredCourse::where('student_id', $student->id)
        ->where('registered_courses.semester', 1)
        ->where('session', $session->id)
        ->get();
        $courseform2 = RegisteredCourse::where('student_id', $student->id)
        ->where('registered_courses.semester', 2)
        ->where('session', $session->id)
        ->get();
        $facultyAndDept = array();
    foreach ($courseform as $ca) {
        $facultyAndDept = $this->getdptcolleg($ca->program_id);
    }


        // $results = $result->semesterRegisteredCourses($registration->student_id,$registration->session_id,$registration->semester);
        // $total = $student->totalRegisteredCredits($results);

    return view('students.course_form', compact('student', 'academic','courseform','courseform2','session', 'facultyAndDept'));
    }

    public function destroy(Request $request, Remita $remita)
    {
        $remita->delete();

        if ($request->method() === 'GET') {
            // Redirect to a specific URL with an error message
            return redirect()->back()->with('error', 'The GET method is not supported for this route. Please use the POST method instead.');
        }

        return redirect()->back()->with('success','Unpaid RRR deleted successfully');
    }

//CLEARANCE
public function studentsClearance()
{
    $student = Auth::guard('student')->user();
    $academic = $student->academic;
    $currentSession = $this->getcurrentsession();
    $rv = RemitasVerification::select('updated_at')->first();
    $session = DB::table('sessions')->where('status', 1)->select('sessions.name', 'sessions.semester')->first();
    $college_id = $student->academic->program->department->college_id;

    // Check clearance conditions for semester 1
    if ($session->semester == 1) {

        // Calculate the sum of percentages for semester 1
        $semester1PercentageSum = RemitasVerification::where('student_id', $student->id)
            ->sum('percentage');

        // Check if the percentage sum is greater than or equal to 50
        if ($semester1PercentageSum >= 50) {
            // Display clearance form for semester 1
            return view('students.studentsClearance', compact('student', 'academic', 'session','rv'));
        } else {
            // Redirect or show an error message indicating not meeting the condition
            return redirect()->to('/students/home')
            ->with('error',"Please pay at least 50% of your total fees to print the First Semester clearance form. If you have already paid, kindly visit the school's bursary for verification.");
        }
    }

    // Check clearance conditions for semester 2
    if ($session->semester == 2) {

        // Calculate the sum of percentages for semester 2
        $semester2PercentageSum = RemitasVerification::where('student_id', $student->id)
            ->sum('percentage');

        // Check if the percentage sum is greater than or equal to 100
        if ($semester2PercentageSum >= 100) {
            // Display clearance form for semester 2
            return view('students.studentsClearance', compact('student', 'academic', 'session','rv' ));
        } else {
            // Redirect or show an error message indicating not meeting the condition
            return redirect()->to('/students/home')
            ->with('error',"Please pay 100% of your total fees to Print the Second Semester clearance form. If you have already paid, kindly visit the school's bursary for verification.");
        }
    }

    // If none of the conditions are met, you may want to redirect or show an error message
    return redirect()->to('/students/home')
    ->with('error','error');
}

public function getvoucherstudent()
{
    // Get the authenticated student
    $courseReg = CourseRegistrations::where('status', 1)->orderBy('id', 'ASC')->paginate(20);

    $student = Auth::guard('student')->user();


    // Retrieve the student ID
    $student_id = $student->id;
    // Check if a record with the student ID already exists in the voucher codes table
    $existingRecord = VoucherCode::where('student_id', $student_id)->exists();

    // If the record already exists, return to the view
    if ($existingRecord) {
        $viewV= VoucherCode::where('student_id', $student_id)->first();
        return view('soteria.studentV', compact('viewV', 'courseReg'));
    }
// Find the first voucher code with status 1
$getv = VoucherCode::where('status', 1)->first();

    // Update the student ID and status of the voucher code where status is 1
    if ($getv) {
        // Update the found voucher code's student_id and status to 2
        $getv->student_id = $student_id;
        $getv->status = 2;
        $getv->save();
        $viewV= VoucherCode::where('student_id', $student_id)->first();
        return view('soteria.studentV', compact('viewV', 'courseReg'))->with('success', 'Student ID and status updated successfully.');

    // Check if any rows were updated

    } else {
        // No rows were updated, return to the view with an error message
        return view('soteria.studentV', compact('viewV'))->with('error', 'No voucher code found with status 1.');

      }

}

} // end Class
