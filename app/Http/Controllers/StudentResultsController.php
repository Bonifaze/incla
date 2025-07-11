<?php

namespace App\Http\Controllers;

use App\Course;
use App\Program;
use App\Session;
use App\Student;
use App\ProgramCourse;
use App\StudentResult;
use App\StudentAcademic;
use App\Models\GradeSetting;
use App\Models\RemitasVerification;
use Illuminate\Http\Request;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SemesterRemarkCourses;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use App\Exports\AcademicDepartmentsExport;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;


class StudentResultsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');

    }

    public function searchStudent()
    {
        $this->authorize('manage', StudentResult::class);
        $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('results.search-student', compact('programs'));
    }

    public function findStudent(Request $request)
    {
        $this->authorize('manage', StudentResult::class);
        $students = StudentAcademic::
            where(function ($q) use ($request) {
            $q->where('mat_no', $request->mat_no)
            // ->where('program_id', $request->program)
            ;
        })
            ->orWhere(function ($query) use ($request) {
                $query->orWhere('student_id', $request->mat_no)
                    ->where('program_id', $request->program);
            })
            ->get();
        if ($students->count()) {
            $student = $students->first()->student;
            $academic = $student->academic;
            if (!$academic) {
                $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
                return redirect()->route('result.search_student')
                    ->with(['programs' => $programs, 'error' => 'Student Academic information was not found']);
            }
            $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
            return view('results.manage-student', compact('student', 'sessions', 'academic'));
        } else {
            $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
            return redirect()->route('result.search_student')
                ->with(['programs' => $programs, 'error' => 'No Student was found']);
        }
    } // end find

    public function modifyResult(Request $request): Factory|View
{
    //dd($request);
    $student = Student::findOrFail($request->student_id);
    $this->authorize('ictUpload', StudentResult::class);
    $session = Session::findOrFail($request->session_id);
    // $semester = $request->semester;
    $semester =1;
      //  dd($semester);

    $request->validate([
        'session_id' => 'required',
        //'semester' => 'required',
    ]);

    $registered_courses = RegisteredCourse::where('student_id', $request->student_id)
        ->where('session', $request->session_id)
        // ->where('semester', $request->semester)
        ->where('semester', $semester)
        ->get();

    return view('results.modify', compact('registered_courses', 'session', 'semester', 'student'));
}


    public function updateResult(Request $request)
    {

        $staff = Auth::guard('staff')->user();
        $reg_ids = $request->reg_ids;

        $ca1_scores = $request->ca1_scores;
        $ca2_scores = $request->ca2_scores;
        $ca3_scores = $request->ca3_scores;
        $exam_scores = $request->exam_scores;
        $total = $request->total;
        $old_total = $request->old_total;
        // dd($request->oldtotal);

        $registered_courses = RegisteredCourse::whereIn('id', $reg_ids)->get();

        for ($i = 0; $i < count($reg_ids); $i++) {
            // $total_score = $ca1_scores[$i] + $ca2_scores[$i] + $ca3_scores[$i] + $exam_scores[$i];
            $total_score = $total[$i];
            $old_total_score = $old_total[$i];
            $course_reg = $registered_courses->where('id', $reg_ids[$i])->first();
            $course = Course::find($course_reg->course_id);
            $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->where('program_id', $course->program_id)->first();
            if (!is_null($grade_setting))
            {
                if ($course_reg->program_id == $grade_setting->program_id)
                {
                    $grade_id = $grade_setting->id;
                }
                else
                {
                    $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->whereNull('program_id')->first();
                    $grade_id = $grade_setting->id;
                }
            }
            else{
                $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->whereNull('program_id')->first();
                $grade_id = $grade_setting->id;
            }
            // if ($ca1_scores[$i] > 100 || $ca2_scores[$i] > 100 || $ca3_scores[$i] > 100)
            // {
            //     return redirect()->back()->withErrors(['error' => 'CA score cannot be more than 30']);
            // }
            // if ($exam_scores[$i] > 100)
            // {
            //     return redirect()->back()->withErrors(['error' => 'Exam score cannot be more than 70']);
            // }
            if ($grade_setting->status != 'fail') {
                RegisteredCourse::where('student_id', $course_reg->student_id)->where('course_id', $course_reg->course_id)->where('session', '>', $course_reg->session)->delete();
                SemesterRemarkCourses::where('student_id', $course_reg->student_id)
                    ->where('course_id', $course_reg->course_id)
                    ->delete();

            } else {

                if (!SemesterRemarkCourses::where('student_id', $course_reg->student_id)
                    ->where('course_id', $course_reg->course_id)
                    ->exists()) {
                    SemesterRemarkCourses::create([
                        'student_id' => $course_reg->student_id,
                        'course_id' => $course_reg->course_id,
                        // Add more fields and their values as needed
                    ]);
                }
            }


            //     SemesterRemarkCourses::create([
            //         'student_id' => $course_reg->student_id,
            //         'course_id' => $course_reg->course_id,
            //         // Add more fields and their values as needed
            //     ]);
            // }
            $registeredCourse = RegisteredCourse::findOrFail($reg_ids[$i]);
            // $registeredCourse-> ca1_score = $ca1_scores[$i];
            // $registeredCourse->ca2_score = $ca2_scores[$i];
            // $registeredCourse->ca3_score = $ca3_scores[$i];
            // $registeredCourse->exam_score = $exam_scores[$i];
            $registeredCourse->total = $total_score;
           $registeredCourse->old_total = $old_total_score;
            $registeredCourse->grade_id = $grade_id;
            $registeredCourse->grade_status = $grade_setting->status;
            $registeredCourse->status = 'published';
             $registeredCourse->staff_id = $staff->id;

            $registeredCourse->save();
            // dd($registeredCourse->save());
        }

        return redirect()->back()->with('success', 'Scores uploaded successfully');
    }

    public function updateResultICT(Request $request)
    {
       // dd($request);

        $staff = Auth::guard('staff')->user();
        $reg_ids = $request->reg_ids;

        $ca1_scores = $request->ca1_scores;
        $ca2_scores = $request->ca2_scores;
        $ca3_scores = $request->ca3_scores;
        $exam_scores = $request->exam_scores;
       // $total = $request->total;
        $old_total = $request->old_total;
        // dd($request->oldtotal);

        $registered_courses = RegisteredCourse::whereIn('id', $reg_ids)->get();

        for ($i = 0; $i < count($reg_ids); $i++) {
            $total_score = $ca1_scores[$i] + $ca2_scores[$i] + $ca3_scores[$i] + $exam_scores[$i];
            //$total_score = $total[$i];
            $old_total_score = $old_total[$i];
            $course_reg = $registered_courses->where('id', $reg_ids[$i])->first();
            $course = Course::find($course_reg->course_id);
            $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->where('program_id', $course->program_id)->first();
            if (!is_null($grade_setting))
            {
                if ($course_reg->program_id == $grade_setting->program_id)
                {
                    $grade_id = $grade_setting->id;
                }
                else
                {
                    $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->whereNull('program_id')->first();
                    $grade_id = $grade_setting->id;
                }
            }
            else{
                $grade_setting = GradeSetting::where('min_score', '<=', $total_score)->where('max_score', '>=', $total_score)->whereNull('program_id')->first();
                $grade_id = $grade_setting->id;
            }
            // if ($ca1_scores[$i] > 100 || $ca2_scores[$i] > 100 || $ca3_scores[$i] > 100)
            // {
            //     return redirect()->back()->withErrors(['error' => 'CA score cannot be more than 30']);
            // }
            // if ($exam_scores[$i] > 100)
            // {
            //     return redirect()->back()->withErrors(['error' => 'Exam score cannot be more than 70']);
            // }
            if ($grade_setting->status != 'fail') {
                RegisteredCourse::where('student_id', $course_reg->student_id)->where('course_id', $course_reg->course_id)->where('session', '>', $course_reg->session)->delete();
                SemesterRemarkCourses::where('student_id', $course_reg->student_id)
                    ->where('course_id', $course_reg->course_id)
                    ->delete();

            } else {

                if (!SemesterRemarkCourses::where('student_id', $course_reg->student_id)
                    ->where('course_id', $course_reg->course_id)
                    ->exists()) {
                    SemesterRemarkCourses::create([
                        'student_id' => $course_reg->student_id,
                        'course_id' => $course_reg->course_id,
                        // Add more fields and their values as needed
                    ]);
                }
            }


            //     SemesterRemarkCourses::create([
            //         'student_id' => $course_reg->student_id,
            //         'course_id' => $course_reg->course_id,
            //         // Add more fields and their values as needed
            //     ]);
            // }
            $registeredCourse = RegisteredCourse::findOrFail($reg_ids[$i]);
            $registeredCourse-> ca1_score = $ca1_scores[$i];
            $registeredCourse->ca2_score = $ca2_scores[$i];
            $registeredCourse->ca3_score = $ca3_scores[$i];
            $registeredCourse->exam_score = $exam_scores[$i];
            $registeredCourse->total = $total_score;
           $registeredCourse->old_total = $old_total_score;
            $registeredCourse->grade_id = $grade_id;
            $registeredCourse->grade_status = $grade_setting->status;
            $registeredCourse->status = 'published';
            $registeredCourse->staff_id = $staff->id;

            $registeredCourse->save();
            // dd($registeredCourse->save());
        }

        return redirect()->back()->with('success', 'Scores uploaded successfully');
    }

    public function manageStudent($id)
    {
        $this->authorize('manage', StudentResult::class);
        $student = Student::findOrFail($id);
        $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
        return view('results.manage-student', compact('student', 'sessions'));
    }

    public function upload(Request $request)
    {
        $this->authorize('upload', StudentResult::class);
        //ensure program course selected has a corresponding course
        //also check in front end
        $results = StudentResult::with(['programCourse.course'])->where('student_id', $request->student_id)
            ->where('session_id', $request->session_id)
            ->where('semester', $request->semester)
            ->get();
        $student = Student::findOrFail($request->student_id);
        $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
        $session = Session::findOrFail($request->session_id);
        $semester = $request->semester;
        if ($results->count()) {
            return view('results.upload', compact('results', 'student', 'session', 'semester'));
        } else {
            return redirect()->route('result.manage_student', $student->id)
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
        $parameters = $request->input('parameters');
        $data = $request->input('data');
        // get staff
        $staff_id = Auth::guard('staff')->user()->id;

        DB::beginTransaction(); //Start transaction!
        try {
            //saving logic here
            foreach ($parameters as $parameter) {
                $result = StudentResult::find($parameter['id']);
                if ($result->total != $parameter['result']) {
                    $result->total = $parameter['result'];
                    $result->modified_by = $staff_id;
                    //for 2019/2020 and below
                    if ($result->session_id < 14) {
                        $result->status = 7;
                    }
                    //all those with ICT Approval permission should upload approved results.
                    if (Auth::guard('staff')->user()->can('ictUpload', StudentResult::class)) {
                        $result->status = 7;
                    }

                    $result->save();
                }
            } // end foreach
        } catch (\Exception$e) {
            //failed logic here
            DB::rollback();
            //return Response($e);
            return redirect()->route('result.manage_student', $data['student'])
                ->with(['error' => 'Error uploading students result.']);
            //->with('errors',$e->getMessage());
        }
        DB::commit();
        return redirect()->to('/results/semester/' . $data['student'] . '/' . $data['session'] . '/' . $data['semester']);
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
        $parameters = $request->input('parameters');
        $data = $request->input('data');
        // get staff
        $staff_id = Auth::guard('staff')->user()->id;

        DB::beginTransaction(); //Start transaction!
        try {
            //saving logic here
            foreach ($parameters as $parameter) {
                $result = StudentResult::find($parameter['id']);
                if ($result->total != $parameter['result']) {
                    $result->total = $parameter['result'];
                    $result->modified_by = $staff_id;
                    $result->status = 7;
                    $result->save();
                }
            } // end foreach
        } catch (\Exception$e) {
            //failed logic here
            DB::rollback();
            //return Response($e);
            return redirect()->route('result.manage_student', $data['student'])
                ->with(['error' => 'Error uploading students result.']);
            //->with('errors',$e->getMessage());
        }
        DB::commit();
        return redirect()->to('/results/semester/' . $data['student'] . '/' . $data['session'] . '/' . $data['semester']);
    }

    public function programSearchStudent()
    {
        $this->authorize('examOfficer', StudentResult::class);
        // $staff = Auth::guard('staff')->user();
        // if ($staff->isAcademic()) {
            $programs = Program::pluck('name', 'id');
            $sessions = Session::where('status', 0)->orderBy('id', 'DESC')->pluck('name', 'id');
            return view('results.program-search-student', compact('programs','sessions'));
        // } else {
            // return redirect()->route('staff.home')
                // ->with('error', 'Academic Department not found');
        // }
    }



    public function programFindStudent(Request $request)
    {
        $this->authorize('examOfficer', StudentResult::class);
        $students = StudentAcademic::
            where(function ($q) use ($request) {
            $q->where('mat_no', $request->mat_no)
                ->where('program_id', $request->program);
        })
            ->orWhere(function ($query) use ($request) {
                $query->orWhere('student_id', $request->mat_no)
                    ->where('program_id', $request->program);
            })
            ->get();
        if ($students->count()) {
            $student = $students->first()->student;
            $academic = $student->academic;

            //check if academic information exists for student.
            if (!$academic) {
                $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
                return redirect()->route('result.program_search_student')
                    ->with(['programs' => $programs, 'error' => 'No academic record available for this student']);
            }

            // $sessions = Session::where('id','>',0)->where('id','<',14)->where('status','<',2)->orderBy('id','DESC')->pluck('name','id');
            $sessions = Session::where('status', 1)->orderBy('id', 'DESC')->pluck('name', 'id');
           //  $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
            // $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
            return view('results.manage-student', compact('student', 'sessions', 'academic'));
        } else {
            $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
            return redirect()->route('result.program_search_student')
                ->with(['programs' => $programs, 'error' => 'No Student was found']);
        }
    } // end programFindStudent

    public function semesterResult($student_id, $session_id, $semester)
    {
        $this->authorize('upload', StudentResult::class);
        // check if all fieds are set
        if ($student_id == null or $session_id == null or $semester == null) {
            $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
            return redirect()->route('result.search_student')
                ->with(['programs' => $programs, 'error' => 'Error with Semester Result. Incomplete data for request.']);
        }
        $student = Student::findOrFail($student_id);
        $session = Session::findOrFail($session_id);
        //check if semester registration exists
        if (!$student->hasSemesterResults($session_id, $semester)) {
            return redirect()->route('result.manage_student', $student_id)
                ->with(['error' => 'No Semester Registration.']);
        }

        $results = StudentResult::with(['programCourse', 'programCourse.course'])->where('student_id', $student_id)
            ->where('session_id', $session_id)
            ->where('semester', $semester)
            ->get();
        $rs = new StudentResult();
        $gpa = $rs->gpa($student_id, $session_id, $semester);
        $cgpa = $rs->currentCGPA($student_id, $session_id, $semester);
        return view('results.semester-result', compact('results', 'student', 'session', 'semester', 'gpa', 'cgpa'));
    } // semesterResult

    public function registration(Request $request)
    {
        $this->authorize('register', StudentResult::class);
        return redirect()->route('result.register', [$request->student_id, $request->session_id, $request->semester,100]);
    } // end registration

    public function register($student_id, $session_id, $semester, $level)
    {
        // dd($semester);
        $this->authorize('register', StudentResult::class);
        $student = Student::findOrFail($student_id);

        $session = Session::findOrFail($session_id);
        $course = new Course();
        $pcourse = new ProgramCourse();
        $result = new RegisteredCourse();
        $results = RegisteredCourse::where('student_id', $student->id)
            ->where('semester', $semester)
        // ->where('registered_courses.semester', $semester)
            ->orderBy('registered_courses.semester', 'ASC')
            ->where('session', $session->id)
            ->get();
        $fresh_courses = $pcourse->oldStudentFreshCourses($student, $session, $semester, $level);
        $carry_over = $pcourse->oldStudentCarryOverCourses($student, $session, $semester, $level);
        // $results = $result->RegisteredCourse($student->id,$session,$semester);
        //   $total_credit = $student->totalRegisteredCredits($results);
        //$allowed_credits = $student->allowedCredits($session_id,$semester);
        $registration = $student->hasSemesterRegistration($session->id, $semester);

        return view('results.course_registration', compact('student', 'fresh_courses', 'carry_over', 'results', 'session', 'semester', 'level'));
    } // end register

    public function removeRegisteredCourse(Request $request)
    {

        // $result = DB::table('registered_courses')->where('id', $request->id);
        // // dd($result);
        // $result = $request->course_id;
        $session = Session::findorFail($request->session_id);
        $student = Student::findOrFail($request->student_id);
        $semester = $request->semester;
        $level = $request->level;
        // $results  = RegisteredCourse::where('student_id',  $student->id)
        // ->where('registered_courses.semester', $semester)
        // ->where('session',  $session->id)
        // ->where('course_id', $result)
        // ->get();
        RegisteredCourse::where('id', $request->id)->delete();
        return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
            ->with('success', 'Course removed successfully');
        // DB::beginTransaction(); //Start transaction!
        // try {
        //     // $results->delete();
        //      return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        //      ->with('error',"Errors removing semester registration");

        // }
        // catch(\Exception $e)
        // {
        //     //failed logic here
        //     DB::rollback();
        //     return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        //     ->with('error',"Errors removing course.".$e->getMessage());
        // }
        // DB::commit();
        // return redirect()->route('result.register',[$student->id,$session->id,$semester,$level])
        // ->with('success','Course removed successfully');
    } // removeRegisteredCourse

    public function delete(Request $request)
    {
        $this->authorize('delete', ProgramCourse::class);
        $pcourse = RegisteredCourse::find($request->id);
        dd($pcourse);
        $pcourse->delete();
        return redirect()->route('program_course.list') //testing route
            ->with('success', 'Course deleted successfully');

    } // end delete

    public function admindropcourse_Reg(Request $request)
    {

        $student = Auth::guard('student')->user();
        $courses = $request->courses;

        $session = Session::findorFail($request->session_id);

        $student = Student::findOrFail($request->student_id);
        $semester = $request->semester;
        // return view ('');
        $level = $request->level;

        try {

            foreach ($courses as $course) {
                DB::table('registered_courses')
                    ->where('course_id', $course)
                    ->where('session', $session)
                    ->where('student_id', $student)

                    ->delete();
                // 'status' => 0

            }
            $loginMsg = '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"> &times; </button> You dont\'t have access to this task, please see the ICT</div>';
//   return view('admissions.error', compact('loginMsg'));
            return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
                ->with('success', 'Course removed successfully');
        } catch (QueryException $e) {
            return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
                ->with('error', "Errors removing course." . $e->getMessage());
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
        //dd($request);
        $this->authorize('register', StudentResult::class);
        $session = Session::findorFail($request->session_id);
        // $result = new StudentResult();
       // dd($session);
        $student = Student::findOrFail($request->student_id);
        $semester = $request->semester;
        $level = $request->level;
        $program_id = $request->program_id;
        $fcourse = $request->course_id;
        // dd( $program_id =$request->program_id);
        // if($student->hasExcessSemesterCredits($result->semesterRegisteredCourses($student->id,$session->id,$semester),$request->course_id,$request->session_id,$request->semester))
        // {
        // $result->program_course_id = $request->course_id;
        //$result->session_id = $session->id;
        // $result->semester = $semester;
        // $result->student_id = $student->id;
        DB::beginTransaction(); //Start transaction!
        try {
            // add course
            //$result->save();
            //if(!$student->hasSemesterRegistration($session->id,$semester))
            //   {
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
            } catch (\Exception$e) {
                //failed logic here
                DB::rollback();
                return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
                    ->with('error', "Errors completing semester registration." . $e->getMessage());
            }
            //     }
        } catch (\Exception$e) {
            //failed logic here
            DB::rollback();
            return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
                ->with('error', "Errors adding course course." . $e);
        }
        DB::commit();
        return redirect()->route('result.register', [$student->id, $session->id, $semester, $level])
            ->with('success', 'Course added successfully');

    } // end addCourse(Request $request)

    public function history($encode)
    {
        // $student = Student::with(['academic','contact'])->findOrFail(base64_decode($encode));
        // $academic = $student->academic;
        // // dd($student);
        // $session_ids = RegisteredCourse::where('student_id', $student)->distinct('session')->pluck('session');
        // $session_ids = $session_ids->toArray();
        // $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1' => function ($query) use ($student) {
        //     $query->where('student_id', $student);
        //     $query->where('semester', '1');
        // }, 'registered_courses2' => function ($query) use ($student) {
        //     $query->where('student_id', $student);
        //     $query->where('semester', '2');
        // }])->get();
        $student_id = base64_decode($encode);
        $student = Student::with('academic')->find($student_id);
        $academic = $student->academic;
        $session_ids = RegisteredCourse::where('student_id', $student_id)->distinct('session')->pluck('session');
        $session_ids = $session_ids->toArray();
        $sessions = Session::wherein('id', $session_ids)->with(['registered_courses1' => function ($query) use ($student_id) {
            $query->where('student_id', $student_id);
            $query->where('semester', '1');
        }, 'registered_courses2' => function ($query) use ($student_id) {
            $query->where('student_id', $student_id);
            $query->where('semester', '2');
        }])->get();
        // $registrations = $student->semesterRegistrations;
        // $totalCGPA = $student->CGPA();
        return view('students.admin.result_history', compact('student', 'academic', 'sessions'));
    } //end show

    public function semesterRemark($student_id_encoded)
    {
        //
        $student = Student::findOrFail(base64_decode($student_id_encoded));
        $sess = new Session();
        $session_id = $sess->currentSession();
        $semester = $sess->currentSemester();
        $session = Session::findOrFail($session_id);
        $registration = $student->getSemesterRegistration($session_id, $semester);
        $academic = $student->academic;

        //Showing courses ever offered by the program
        $coursesb = Course::with(['program', 'programCourses'])
            ->whereHas('programCourses', function ($query) use ($academic) {
                return $query->where('program_id', $academic->program_id)
                    ->where('level', '<=', $academic->level)
                    ->orderBy('level', 'ASC');
            })
            ->whereDoesntHave('outstandings', function ($query) use ($registration, $student) {
                return $query->where('student_id', $student->id);
                //->where('semester_registration_id',$registration->id);
            })
            ->orderBy('course_code', 'ASC')
            ->get()->pluck('courseDescribe', 'id');

        $courses = $coursesb->unique();

        $outstandings = SemesterRemarkCourses::where('student_id', $student->id)->where('status', '1')
        // Course::whereHas('outstandings', function ($query) use ($registration,$student)
        // {
        //     return $query->where('student_id',$student->id);
        //        // ->where('semester_registration_id',$registration->id);
        //     })
            ->get();
        // dd($outstandings);

        return view('results.semester_remark', compact('student', 'courses', 'session', 'outstandings', 'registration'));
        // end evaluated

    } // end semesterRemark()

    public function addSemesterRemark(Request $request)
    {
        //get request variables
        $this->validate($request, [
            'course_id' => 'required|int',
            'type' => 'required|max:255',
            'student_id' => 'required|int',
        ]);
        $session = new Session();
        $student = Student::findOrFail($request->student_id);
        $course = Course::findOrFail($request->course_id);

        //get semester registration id
        $registration = $student->getSemesterRegistration($session->currentSession(), $session->currentSemester());
        //check if course is already added
        if (SemesterRemarkCourses::where('student_id',$request->student_id)
                          ->where('course_id',$request->course_id)
                          ->exists())  {
            return redirect()->route('result.semester.remark', base64_encode($student->id))
                ->with('error', "Course already exists for this Student.");
        } else {
            $outstanding = new SemesterRemarkCourses();
            $outstanding->student_id = $student->id;
            $outstanding->course_id = $course->id;
            $outstanding->type = $request->type;
            try {
                $outstanding->save();
                return redirect()->route('result.semester.remark', base64_encode($student->id))
                    ->with('success', "Course added.");
            } catch (\Exception$e) {
                return redirect()->route('result.semester.remark', base64_encode($student->id))
                    ->with('error', "Error adding course to outstanding.");
            }
        }

    } // end addSemesterRemark

    public function removeSemesterRemark(Request $request)
    {

        $outstanding = SemesterRemarkCourses::where('id', $request->id)
            ->where('student_id', $request->student_id)
        //->where('semester_registration_id',$request->semester_registration_id)
            ->get()->first();
        try {
            $outstanding->delete();
        } catch (\Exception$e) {
            return redirect()->route('result.semester.remark', base64_encode($request->student_id))
                ->with('error', "Error removing outstanding course");
        }
        return redirect()->route('result.semester.remark', base64_encode($request->student_id))
            ->with('success', "Course removed.");
    } // removeRegisteredCourse

    public function coursesRegStudent($id)
    {
        $this->authorize('viewcourseform', StudentResult::class);
        $student = Student::findOrFail($id);
        $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
        return view('results.coursesReg-student', compact('student', 'sessions'));
    }
    public function courseRegStudentForm(Request $request)
    {
        //
        // $student_id = base64_decode($encode);
        $student = Student::findOrFail($request->student_id);
        $session = Session::findOrFail($request->session_id);
        // dd($student->id);
        $academic = $student->academic;

        $results = RegisteredCourse::where('student_id', $student->id)->where('session', $session->id)->where('semester', 1)->get();
        $results2 = RegisteredCourse::where('student_id', $student->id)->where('session', $session->id)->where('semester', 2)->get();
        return view('results.course_form',compact('student','session','academic','results' ,'results2'));
    }
    //02-05-2023
 public function pClearanceForm(Request $request){
        $student = Student::findOrFail($request->student_id);
        $academic = $student->academic;
        $session = DB::table('sessions')->where('id', $request->session_id)->select('sessions.name', 'sessions.semester')->first();
        $rv = RemitasVerification::select('updated_at')->first();
        $semester = $request->semester;
        $college_id = $student->academic->program->department->college_id;
        return view('results.studentsPClearance', compact('student', 'academic', 'session','rv','semester' ));
    }


    // SPOTLIGHT CONTROLLER FIX

    public function programSearchStudentSpotlight()
    {
        $this->authorize('examOfficer', StudentResult::class);
        $staff = Auth::guard('staff')->user();

        if ($staff->isAcademic()) {
            $programs = $staff->workProfile->admin->academic->programs->pluck('name', 'id');
            $sessions = Session::where('status', 0)->orderBy('id', 'DESC')->pluck('name', 'id');
            return view('results.Spotlight.program-search-studentSpotlight', compact('programs','sessions'));
        } else {
            return redirect()->route('staff.home')
                ->with('error', 'Academic Department not found');
        }
    }

    public function programFindStudentSpotlight(Request $request)
    {
        $this->authorize('examOfficer', StudentResult::class);
        $students = StudentAcademic::
            where(function ($q) use ($request) {
            $q->where('mat_no', $request->mat_no)
                ->where('program_id', $request->program);
        })
            ->orWhere(function ($query) use ($request) {
                $query->orWhere('student_id', $request->mat_no)
                    ->where('program_id', $request->program);
            })
            ->get();
        if ($students->count()) {
            $student = $students->first()->student;
            $academic = $student->academic;

            //check if academic information exists for student.
            if (!$academic) {
                $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
                return redirect()->route('results.Spotlight.program-search-studentSpotlight')
                    ->with(['programs' => $programs, 'error' => 'No academic record available for this student']);
            }

            // $sessions = Session::where('id','>',0)->where('id','<',14)->where('status','<',2)->orderBy('id','DESC')->pluck('name','id');
           // $sessions = Session::where('status', 0)->orderBy('id', 'DESC')->pluck('name', 'id');
             $sessions = Session::orderBy('id', 'DESC')->pluck('name', 'id');
            return view('results.Spotlight.manage-studentSpotlight', compact('student', 'sessions', 'academic'));
        } else {
            $programs = Program::orderBy('name', 'ASC')->pluck('name', 'id');
            return redirect()->route('result.programSearchStudentSpotlight')
                ->with(['programs' => $programs, 'error' => 'No Student was found']);
        }
    } // end programFindStudent


    public function modifyResultSpotlight(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
         $this->authorize('ictUpload', StudentResult::class);
        $session = Session::findOrFail($request->session_id);
        $semester = $request->semester;
        $request->validate([
            'session_id' => 'required',
            'semester' => 'required',
            'level' => 'required',
        ]);

        $registered_courses = RegisteredCourse::where('student_id', $request->student_id)
            ->where('session', $request->session_id)
            ->where('semester', $request->semester)
            // ->where('status', 'published')
            ->get();
        return view('results.Spotlight.modifySpotlight', compact('registered_courses', 'session', 'semester', 'student'));
    }


} // end class
