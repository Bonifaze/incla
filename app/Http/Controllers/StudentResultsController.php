<?php

namespace App\Http\Controllers;

use App\Course;
use App\Program;
use App\Session;
use App\Student;
use App\ProgramCourse;
use App\StudentResult;
use App\StudentAcademic;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use App\Models\RegisteredCourse;
use App\SemesterResultOutstanding;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;

class StudentResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');

    }



    public function searchStudent()
    {
        $this->authorize('manage', StudentResult::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        return view('results.search-student',compact('programs'));
    }

    public function findStudent(Request $request)
    {
        $this->authorize('manage', StudentResult::class);
        $students = StudentAcademic::
        where(function($q) use ($request) {
            $q->where('mat_no', $request->mat_no)
            ->where('program_id', $request->program);
        })
        ->orWhere(function($query) use ($request) {
            $query->orWhere('student_id',$request->mat_no)
            ->where('program_id', $request->program);
        })
        ->get();
        if($students->count())
        {
            $student = $students->first()->student;
            $academic = $student->academic;
            if(!$academic){
                $programs = Program::orderBy('name','ASC')->pluck('name','id');
                return redirect()->route('result.search_student')
                    ->with(['programs' => $programs, 'error' => 'Student Academic information was not found']);
            }
            $sessions = Session::orderBy('id','DESC')->pluck('name','id');
            return view('results.manage-student',compact('student','sessions','academic'));
        }
        else {
            $programs = Program::orderBy('name','ASC')->pluck('name','id');
            return redirect()->route('result.search_student')
            ->with(['programs' => $programs, 'error' => 'No Student was found']);
        }
    } // end find


    public function manageStudent($id)
    {
        $this->authorize('manage', StudentResult::class);
        $student = Student::findOrFail($id);
        $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        return view('results.manage-student',compact('student','sessions'));
    }

    public function upload(Request $request)
    {
        $this->authorize('upload', StudentResult::class);
        //ensure program course selected has a corresponding course
        //also check in front end
        $results = StudentResult::with(['programCourse.course'])->where('student_id',$request->student_id)
        ->where('session_id',$request->session_id)
        ->where('semester',$request->semester)
        ->get();
        $student = Student::findOrFail($request->student_id);
        $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        $session = Session::findOrFail($request->session_id);
        $semester = $request->semester;
        if($results->count())
        {
            return view('results.upload',compact('results','student','session','semester'));
        }
        else {
            return redirect()->route('result.manage_student',$student->id)
            ->with(['error' => 'No Course Registration found.']);
        }

    } // end programResultUpload


    public function store(Request $request)
    {
        $this->authorize('upload', StudentResult::class);
        $request->validate([
            'parameters.*.result' => 'required|integer|max:100',
            'parameters.*.id' => 'required|integer',
            'data.student' => 'required|integer',
            'data.session' => 'required|integer',
            'data.semester' => 'required|integer',
        ]);
        $parameters= $request->input('parameters');
        $data = $request->input('data');
       // get staff
        $staff_id = Auth::guard('staff')->user()->id;

        DB::beginTransaction(); //Start transaction!
        try{
            //saving logic here
            foreach ($parameters as $parameter)
            {
               $result = StudentResult::find($parameter['id']);
                if($result->total != $parameter['result'])
                {
                    $result->total = $parameter['result'];
                    $result->modified_by = $staff_id;
                    //for 2019/2020 and below
                    if($result->session_id < 14) {
                        $result->status = 7;
                    }
                    //all those with ICT Approval permission should upload approved results.
                    if (Auth::guard('staff')->user()->can('ictUpload',StudentResult::class)) {
                        $result->status = 7;
                    }

                    $result->save();
                }
            } // end foreach
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            //return Response($e);
            return redirect()->route('result.manage_student',$data['student'])
            ->with(['error' => 'Error uploading students result.']);
           //->with('errors',$e->getMessage());
        }
        DB::commit();
        return redirect()->to('/results/semester/'.$data['student'].'/'.$data['session'].'/'.$data['semester']);
    }


    public function ICTstore(Request $request)
    {
        $this->authorize('upload', StudentResult::class);
        $request->validate([
            'parameters.*.result' => 'required|integer|max:100',
            'parameters.*.id' => 'required|integer',
            'data.student' => 'required|integer',
            'data.session' => 'required|integer',
            'data.semester' => 'required|integer',
        ]);
        $parameters= $request->input('parameters');
        $data = $request->input('data');
        // get staff
        $staff_id = Auth::guard('staff')->user()->id;

        DB::beginTransaction(); //Start transaction!
        try{
            //saving logic here
            foreach ($parameters as $parameter)
            {
                $result = StudentResult::find($parameter['id']);
                if($result->total != $parameter['result'])
                {
                    $result->total = $parameter['result'];
                    $result->modified_by = $staff_id;
                    $result->status = 7;
                    $result->save();
                }
            } // end foreach
        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            //return Response($e);
            return redirect()->route('result.manage_student',$data['student'])
                ->with(['error' => 'Error uploading students result.']);
            //->with('errors',$e->getMessage());
        }
        DB::commit();
        return redirect()->to('/results/semester/'.$data['student'].'/'.$data['session'].'/'.$data['semester']);
    }

    public function programSearchStudent()
    {
        $this->authorize('examOfficer', StudentResult::class);
        $staff = Auth::guard('staff')->user();
        if($staff->isAcademic())
        {
        $programs = $staff->workProfile->admin->academic->programs->pluck('name','id');
        return view('results.program-search-student',compact('programs'));
        }
        else{
            return redirect()->route('staff.home')
                ->with('error','Academic Department not found');
        }
    }

    public function programFindStudent(Request $request)
    {
        $this->authorize('examOfficer', StudentResult::class);
        $students = StudentAcademic::
        where(function($q) use ($request) {
            $q->where('mat_no', $request->mat_no)
            ->where('program_id', $request->program);
        })
        ->orWhere(function($query) use ($request) {
            $query->orWhere('student_id',$request->mat_no)
            ->where('program_id', $request->program);
        })
        ->get();
        if($students->count())
        {
            $student = $students->first()->student;
            $academic = $student->academic;

            //check if academic information exists for student.
            if(!$academic) {
            $programs = Program::orderBy('name','ASC')->pluck('name','id');
            return redirect()->route('result.program_search_student')
                ->with(['programs' => $programs, 'error' => 'No academic record available for this student']);
        }

        $sessions = Session::where('id','>',0)->where('id','<',14)->where('status','<',2)->orderBy('id','DESC')->pluck('name','id');
            return view('results.manage-student',compact('student','sessions','academic'));
        }
        else {
            $programs = Program::orderBy('name','ASC')->pluck('name','id');
            return redirect()->route('result.program_search_student')
            ->with(['programs' => $programs, 'error' => 'No Student was found']);
        }
    } // end programFindStudent

   public function semesterResult($student_id,$session_id,$semester)
   {
       $this->authorize('upload', StudentResult::class);
       // check if all fieds are set
       if($student_id == NULL OR $session_id == NULL OR $semester == NULL)
       {
          $programs = Program::orderBy('name','ASC')->pluck('name','id');
           return redirect()->route('result.search_student')
           ->with(['programs' => $programs, 'error' => 'Error with Semester Result. Incomplete data for request.']);
       }
        $student = Student::findOrFail($student_id);
        $session = Session::findOrFail($session_id);
        //check if semester registration exists
        if(!$student->hasSemesterResults($session_id,$semester))
        {
            return redirect()->route('result.manage_student',$student_id)
            ->with(['error' => 'No Semester Registration.']);
        }

        $results = StudentResult::with(['programCourse','programCourse.course'])->where('student_id',$student_id)
        ->where('session_id',$session_id)
        ->where('semester',$semester)
        ->get();
        $rs = new StudentResult();
        $gpa = $rs->gpa($student_id, $session_id, $semester);
        $cgpa = $rs->currentCGPA($student_id,$session_id,$semester);
        return view('results.semester-result',compact('results','student','session','semester','gpa','cgpa'));
    } // semesterResult

    public function registration(Request $request)
    {
        $this->authorize('register', StudentResult::class);
       return redirect()->route('result.register',[$request->student_id,$request->session_id,$request->semester,$request->level]);
    } // end registration


    public function register($student_id,$session_id,$semester,$level)
    {
        $this->authorize('register', StudentResult::class);
        $student = Student::findOrFail($student_id);

        $session = Session::findOrFail($session_id);
        $course = new Course();
            $pcourse = new ProgramCourse();
            $result = new RegisteredCourse();
            $results=RegisteredCourse::where('student_id',  $student->id)
            ->where('registered_courses.semester', $semester)
            ->where('session',  $session->id)
            ->get();
            $fresh_courses = $pcourse->oldStudentFreshCourses($student, $session,$semester,$level);
            $carry_over = $pcourse->oldStudentCarryOverCourses($student, $session,$semester,$level);
            // $results = $result->RegisteredCourse($student->id,$session,$semester);
            $total_credit = $student->totalRegisteredCredits($results);
            $allowed_credits = $student->allowedCredits($session_id,$semester);
            $registration = $student->hasSemesterRegistration($session->id,$semester);
            $courseform = RegisteredCourse::where('student_id',  $student->id)
            ->where('registered_courses.semester', $semester)
            ->where('session',  $session->id)
            ->get();
            return view('results.course_registration',compact('courseform','student','fresh_courses', 'carry_over', 'results', 'total_credit','session','semester','level', 'allowed_credits'));
    } // end register


    public function removeRegisteredCourse(Request $request)
    {
        // $ress=$request->test;
        // dd($ress);
        $res =DB::table('users')->where('id', $request->id);
        dd($request->id);

        $res->delete();
        return redirect()->route('program_course.list')
        ->with('success','Program Course deleted successfully');

        $this->authorize('register', StudentResult::class);
        // dd($request->);
        $result = DB::table('registered_courses')->where('id', $request->id);
        dd($result);
        $result = $request->course_id;
        $session = Session::findorFail($request->session_id);
        $student = Student::findOrFail($request->student_id);
        $semester = $request->semester;
        $level = $request->level;
        $results  = RegisteredCourse::where('student_id',  $student->id)
        ->where('registered_courses.semester', $semester)
        ->where('session',  $session->id)
        ->where('course_id', $result)
        ->get();
        // dd($results);

        $balance = count($results);
        //if($result->status == 7 OR $result->total !== 0)
        // if($result->total !== 0)
        // {
        //     return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        //     ->with('error',"Errors removing course. Result already available for course");
        // }
        DB::beginTransaction(); //Start transaction!
        try {
            $results->delete();



                    return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
                    ->with('error',"Errors removing semester registration");


        }
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
            ->with('error',"Errors removing course.".$e->getMessage());
        }
        DB::commit();
        return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        ->with('success','Course removed successfully');
    } // removeRegisteredCourse

    public function delete(Request $request)
    {
        $this->authorize('delete',ProgramCourse::class);
        $pcourse = RegisteredCourse::find($request->id);
        dd($pcourse);
        $pcourse->delete();
        return redirect()->route('program_course.list')
        ->with('success','Program Course deleted successfully');

    } // end delete


    public function admindropcourse_Reg(Request $request)
{

    $student = Auth::guard('student')->user();
    $courses = $request->courses;

    // $session = Session::findorFail($request->session_id);

    $student = Student::findOrFail($request->student_id);
    $semester = $request->semester;
    // return view ('');
    $level = $request->level;

    try {

        foreach ($courses as $course) {
            DB::table('registered_courses')
            ->where('course_id',  $course)
            ->where ('session', 16 )
                    ->where('student_id', 2033)

            ->delete();
                // 'status' => 0

        }
          $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
//   return view('admissions.error', compact('loginMsg'));
        return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        ->with('success','Course removed successfully');
    } catch (QueryException $e) {
        return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
            ->with('error',"Errors removing course.".$e->getMessage());
    }

}
    /**
     * Add the specified resource to storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCourse(Request $request)
    {
        $this->authorize('register', StudentResult::class);
        $session = Session::findorFail($request->session_id);
        $result = new StudentResult();
        $student = Student::findOrFail($request->student_id);
        $semester = $request->semester;
        $level = $request->level;
        $program_id =$request->program_id;
        $fcourse =$request->course_id;
        // dd( $program_id =$request->program_id);
        // if($student->hasExcessSemesterCredits($result->semesterRegisteredCourses($student->id,$session->id,$semester),$request->course_id,$request->session_id,$request->semester))
        // {
            $result->program_course_id = $request->course_id;
            $result->session_id = $session->id;
            $result->semester = $semester;
            $result->student_id = $student->id;
            DB::beginTransaction(); //Start transaction!
            try {
                // add course
                $result->save();
                if(!$student->hasSemesterRegistration($session->id,$semester))
                {
                    //register semester
                    $sem_reg = new RegisteredCourse();
                    $sem_reg->student_id = $student->id;
                    $sem_reg->session = $session->id;
                    $sem_reg->semester = $semester;
                    $sem_reg->level = $level;
                    $sem_reg->program_id = $program_id;
                    $sem_reg->course_id = $fcourse;

                    // $sem_reg->status = 1;
                    try {
                        $sem_reg->save();
                    }
                    catch(\Exception $e)
                    {
                        //failed logic here
                        DB::rollback();
                        return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
                       ->with('error',"Errors completing semester registration.".$e->getMessage());
                    }
                }
            }
            catch(\Exception $e)
            {
                //failed logic here
                DB::rollback();
                return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
                ->with('error',"Errors adding course course.".$e);
            }
            DB::commit();
            return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
            ->with('success','Course added successfully');
        // }
        // else
        // {
        //     return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        //     ->with('error',"Maximum allowed credit reached.");
        // }
    } // end addCourse(Request $request)


    public function semesterRemark($student_id_encoded)
    {
        //
        $student = Student::findOrFail(base64_decode($student_id_encoded));
        $sess = new Session();
        $session_id = $sess->currentSession();
        $semester = $sess->currentSemester();
        $session = Session::findOrFail($session_id);
        $registration = $student->getSemesterRegistration($session_id,$semester);
        $academic = $student->academic;

        //Showing courses ever offered by the program
        $coursesb = Course::with(['program','programCourses'])
            ->whereHas('programCourses', function ($query) use ($academic)
            {
                return $query->where('program_id', $academic->program_id)
                    ->where('level','<=', $academic->level)
                    ->orderBy('level','ASC');
            })
            ->whereDoesntHave('outstandings', function ($query) use ($registration,$student)
            {
                return $query->where('student_id',$student->id);
                    //->where('semester_registration_id',$registration->id);
            })
            ->orderBy('code','ASC')
            ->get()->pluck('courseDescribe','id');

        $courses = $coursesb->unique();

        $outstandings = Course::whereHas('outstandings', function ($query) use ($registration,$student)
        {
            return $query->where('student_id',$student->id);
               // ->where('semester_registration_id',$registration->id);
            })
            ->get();

        if($student->hasSemesterRegistration($session_id,$semester)) {
            return view('results.semester_remark',compact('student','courses','session','outstandings','registration'));
        }// end evaluated
        else
        {
            return redirect()->route('result.program_search_student');
        }

    }// end semesterRemark()



    public function addSemesterRemark(Request $request)
    {
        //get request variables
        $this->validate($request, [
            'course_id' => 'required|int',
            'type' => 'required|int|max:255',
            'student_id' => 'required|int',
        ]);
        $session = new Session();
        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);
        //get semester registration id
        $registration = $student->getSemesterRegistration($session->currentSession(),$session->currentSemester());
        //check if course is already added
        if($course->outstandingExists($student->id,$registration->id))
        {
          return redirect()->route('result.semester.remark',base64_encode($student->id))
              ->with('error',"Course already exists for this semester.");
        }
        else{
            $outstanding = new SemesterResultOutstanding();
            $outstanding->student_id = $student->id;
            $outstanding->course_id = $course->id;
            $outstanding->semester_registration_id = $registration->id;
            $outstanding->type = $request->type;
            try{
              $outstanding->save();
                return redirect()->route('result.semester.remark',base64_encode($student->id))
                    ->with('success',"Course added.");
            }
            catch (\Exception $e)
            {
                return redirect()->route('result.semester.remark',base64_encode($student->id))
                    ->with('error',"Error adding course to outstanding.");
            }
        }

    } // end addSemesterRemark


    public function removeSemesterRemark(Request $request)
    {
        $outstanding = SemesterResultOutstanding::where('course_id',$request->id)
            ->where('student_id',$request->student_id)
            //->where('semester_registration_id',$request->semester_registration_id)
            ->get()->first();
       try {
            $outstanding->delete();
            }
        catch (\Exception $e)
        {
             return redirect()->route('result.semester.remark',base64_encode($request->student_id))
                ->with('error',"Error removing outstanding course");
        }
        return redirect()->route('result.semester.remark',base64_encode($request->student_id))
            ->with('success',"Course removed.");
    } // removeRegisteredCourse



    public function history($encode)
    {
        $student = Student::with(['academic','contact'])->findOrFail(base64_decode($encode));
        $academic = $student->academic;
        $registrations = $student->semesterRegistrations;
        $totalCGPA = $student->CGPA();
        return view('students.admin.result_history',compact('student','academic','registrations','totalCGPA'));
    } //end show




} // end class
