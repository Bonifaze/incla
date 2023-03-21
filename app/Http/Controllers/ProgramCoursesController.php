<?php

namespace App\Http\Controllers;

use PDF;
use App\Staff;
use Exception;
use App\Course;
use App\College;
use App\Program;
use App\Session;
use App\ProgramCourse;
use App\RegisteredCourse;
use App\AdminDepartment;
use App\StudentAcademic;
use App\StaffWorkProfile;
use App\Models\StaffCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

// use Exception;
use App\Exports\ProgramCoursesExport;
use App\Imports\ProgramCoursesImport;
use Illuminate\Support\Facades\Redirect;

class ProgramCoursesController extends Controller
{
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
    public function index()
    {
        $this->authorize('list',ProgramCourse::class);
        $session = new Session();
        //  $lecturers = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        // ->orderBy('staff_work_profiles.staff_type_id','ASC')
        // ->orderBy('staff_work_profiles.admin_department_id','ASC')->get()->pluck('full_name','id');
        // dd($lecturers);
        $pcourses = ProgramCourse::with(['course','staff', 'program', 'session'])
        ->where('semester', $session->currentSemester())
        ->where('session_id', $session->currentSession())
        ->orderBy('id','DESC')
        // ->orderBy('program_id','ASC')
        // ->orderBy('level','ASC')
        ->paginate(100);

        return view('/program-courses/list',compact('pcourses'));
    }
//esting

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',ProgramCourse::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        $course= DB::table('courses')->get();
        $courses = Course::orderBy('course_code', 'ASC')->get()->pluck('courseDescribe','id');
        $lecturers = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        ->orderBy('staff_work_profiles.staff_type_id','ASC')
        ->orderBy('staff_work_profiles.admin_department_id','ASC')->get()->pluck('full_name','id');
        return view('/program-courses/create',compact('courses','programs','sessions', 'lecturers', 'course'));
    }


    public function indexassign()
    {
        $this->authorize('list',ProgramCourse::class);
        // $session = new Session();
        $pcourses = ProgramCourse::with(['course', 'program', 'lecturer', 'session'])
        // ->where('semester', $session->currentSemester())
        // ->where('session_id', $session->currentSession())
        ->orderBy('id','DESC')
        ->orderBy('program_id','ASC')->orderBy('level','ASC')->paginate(100);


        return view('/program-courses/list_assign_courses',compact('pcourses'));
    }



    public function store(Request $request)
    {
        $this->authorize('create',ProgramCourse::class);
        $this->validate($request, [
            'course_id' => 'required|integer',
            'level' => 'required|integer',
            'session_id' => 'required|integer',
            'semester' => 'required|integer',
            'credit_unit' => 'required|integer',
            'program_id' => 'required|integer',
            // 'has_perequisite' =>'required|integer',
            // 'perequisite_id'=>'required|integer',
            'course_category' => 'required|integer',
        ]);

        $program_course = new ProgramCourse();
        $program_course->course_id = $request->course_id;
        $program_course->level = $request->level;
        $program_course->program_id = $request->program_id;
        $program_course->credit_unit = $request->credit_unit;
        $program_course->session_id = $request->session_id;
        $program_course->semester = $request->semester;
        $program_course->has_perequisite =$request->has_perequisite;
        $program_course->perequisite_id=$request->perequisite_id;
        $program_course->course_category = $request->course_category;
        $program_course->approval = 0;

// dd( $program_course);

        try {
        $program_course->save();


        }

        catch(Exception $e)
        {

            return redirect()->route('program_course.list')
            ->with('success','New Program Course not created successfully' .$e->getMessage());
//  DB::rollback();

}
        return redirect()->route('program_course.list')
        ->with('success','New Program Course created successfully');
    }  // end store


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('edit',ProgramCourse::class);
        $pcourse = ProgramCourse::findOrFail($id);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        // $courses = Course::with('program')->where('program_id',$pcourse->course->program_id)
        // ->where('status',1)->orderBy('credit_unit','DESC')->orderBy('course_code','ASC')
        // ->get()->pluck('courseDescribe','id');
        $courses = Course::orderBy('course_code', 'ASC')->get()->pluck('courseDescribe','id');
        $lecturers = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        ->where('staff.status',1)
        ->orderBy('staff.first_name','ASC')
        ->orderBy('staff_work_profiles.admin_department_id','ASC')->get()->pluck('full_name','id');
        $staff_courses = StaffCourse::where('program_id', $pcourse->program_id)->where('course_id', $pcourse->course_id)->where('session_id', $pcourse->session_id)->get();
        return view('/program-courses/edit',compact('pcourse','courses', 'programs','sessions', 'lecturers', 'staff_courses'));
    }


    public function dropStaffCourse($staff_course_id)
    {
        StaffCourse::destroy($staff_course_id);
        return back()->with('msg', 'Course Dropped');
    }


    public function update(Request $request, $id)
    {
        $this->authorize('edit',ProgramCourse::class);
        $this->validate($request, [
            'course_id' => 'required|integer',
            'level' => 'required|integer',
            'session_id' => 'required|integer',
            'semester' => 'required|integer',
            'credit_unit' => 'required|integer',
            'program_id' => 'required|integer',
            // 'course_category' => 'required|integer',
        ]);
        $program_course = ProgramCourse::findOrFail($id);
        $program_course->course_id = $request->course_id;
        $program_course->level = $request->level;
        $program_course->program_id = $request->program_id;
        $program_course->credit_unit= $request->credit_unit;
        $program_course->session_id = $request->session_id;
        $program_course->semester = $request->semester;
        $program_course->course_category = $request->course_category;
        $program_course->has_perequisite =$request->has_perequisite;
        $program_course->perequisite_id=$request->perequisite_id;

        // $program_course_assign= StaffCourse::findOrFail($id);
        // // $program_course_assign->course_id = $request->course_id;
        // $program_course_assign->level = $request->level;
        // $program_course_assign->semester_id = $request->semester;
        // $program_course_assign->session_id = $request->session_id;
        // $program_course_assign->staff_id = $request->lecturer_id;


        $program_course->save();
        return redirect()->route('program_course.list')
        ->with('success','Program Course edited successfully');
    }  // end update

//trigng assignment
    public function delete(Request $request)
    {
        $this->authorize('delete',ProgramCourse::class);
        $pcourse = ProgramCourse::find($request->id);

        $pcourse->delete();
        return redirect()->route('program_course.list')
        ->with('success','Program Course deleted successfully');

    } // end delete

    public function assign()
    {
        $this->authorize('gstallocate',ProgramCourse::class);
        // $programs = Program::orderBy('name','ASC')->pluck('name','id');
        // $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        // $courses = Course::orderBy('course_code', 'ASC')->get()->pluck('courseDescribe','id');

        $programs = Program::orderBy('name', 'ASC')->where('status', 1)->get();

        $lecturers = Staff::where('staff.status',1)
        ->orderBy('first_name','ASC')
        ->get()->pluck('full_name','id');

        return view('/program-courses/assign_courses',compact('programs', 'lecturers'));

        // $courses = Course::orderBy('course_code', 'ASC')->get()->pluck('courseDescribe','id');

        // return view('/program-courses/create',compact('courses','programs','sessions', 'lecturers'));
    }

    public function store2(Request $request)
    {
        $session = new Session();
        $this->authorize('gstallocate',ProgramCourse::class);
        $this->validate($request, [
            'program_id' => 'required|integer',

            'staff_id' => 'required|integer',
            'course_id' => 'required|integer'
        ]);
        $program_course= ProgramCourse::where('course_id', $request->course_id )->first();
        StaffCourse::updateOrcreate(['staff_id'=>$request->staff_id, 'program_id'=>$request->program_id, 'session_id'=>$session->currentSession(), 'semester_id'=>$session->currentSemester(), 'course_id'=>$request->course_id, 'level'=>$program_course->level],['staff_id'=>$request->staff_id, 'program_id'=>$request->program_id,  'session_id'=>$session->currentSession(), 'semester_id'=>$session->currentSemester(), 'course_id'=>$request->course_id, 'level'=>$program_course->level]);
        // $program_course_assign= new StaffCourse();
        // $program_course_assign->course_id = $request->course_id;

        // $program_course_assign->staff_id = $request->staff_id;
        // $program_course_assign->semester_id = $session->currentSemester();
        // $program_course_assign->session_id = $session->currentSession();
        // $program_course_assign->level = $program_course->level;


        // $program_course_assign->save();

        return back()
        ->with('success','Course Assigned Successfully ');
    }  // end store

//
    public function search()
    {
        $this->authorize('search',ProgramCourse::class);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::orderBy('id','DESC')->pluck('name','id');
        $lecturers = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        ->orderBy('staff_work_profiles.staff_type_id','ASC')
        ->orderBy('staff.surname','ASC')->get()->pluck('full_name','id');
        return view('/program-courses/search',compact('programs','sessions', 'lecturers'));
    }

    public function find(Request $request)
    {
        $this->authorize('search',ProgramCourse::class);
        $pcourses = ProgramCourse::with(['course', 'program', 'lecturer', 'session'])
        ->where('semester',  $request->semester)
        ->where('session_id', $request->session_id)
        ->where('level', $request->level)
        ->where('program_id', $request->program)
        ->orderBy('id','DESC')
        ->orderBy('program_id','ASC')->orderBy('level','ASC')->paginate(100);

      return view('program-courses.list',compact('pcourses'));
    } // end find


    public function RegisteredCourses($program_course_id)
    {
        $pcid = base64_decode($program_course_id);
        $program_course = ProgramCourse::with(['results.student.academic'])->findOrFail($pcid);

        //Ensure the logged in staff is the course lecturer id. Delegated Id to be decided later
        $staff = Auth::guard('staff')->user();
        if($program_course->lecturer_id != $staff->id)
        {
            return redirect()->route('staff.courses')
                ->with('error',"You do not have permission to update the selected Program Course. Contact the Course owner.");
        }

        //Check if the department has approved the course
        if($program_course->approval >1)
        {
            return redirect()->route('staff.courses')
                ->with('error',"You do not have permission to update the selected Program Course. Please check approval levels.");
        }
        $results = $program_course->results;

        return view('staff.academic.result_upload', compact('results','program_course'));
   }

   public function storeStudentsResults(Request $request, $program_course_id)
   {
       $program_course = ProgramCourse::findOrFail(base64_decode($program_course_id));
       $staff = Auth::guard('staff')->user();
       if($program_course->lecturer_id != $staff->id)
       {
           return redirect()->route('staff.courses')
               ->with('error',"You do not have permission to update the selected Program Course. Contact the Course owner.");
       }

       //Check if the department has approved the course
       if($program_course->approval >1)
       {
           return redirect()->route('staff.courses')
               ->with('error',"You do not have permission to update the selected Program Course. Please check approval levels.");
       }
       $request->validate([
           'parameters.*.ca1' => 'required|integer|min:0|max:10',
           'parameters.*.ca2' => 'required|integer|min:0|max:10',
           'parameters.*.ca3' => 'required|integer|min:0|max:10',
           'parameters.*.exam' => 'required|integer|min:0|max:70',
           'parameters.*.id' => 'required|integer',
         ],
          [
           'parameters.*.ca1.max' => 'CA field cannot be more than 10.',
          'parameters.*.ca2.max' => 'CA field cannot be more than 10.',
          'parameters.*.ca3.max' => 'CA field cannot be more than 10.',
          'parameters.*.exam.max' => 'Exam field cannot be more than 70.',
              'parameters.*.ca1.min' => 'CA field cannot be less than 0.',
              'parameters.*.ca2.min' => 'CA field cannot be less than 0.',
              'parameters.*.ca3.min' => 'CA field cannot be less than 0.',
              'parameters.*.exam.min' => 'Exam field cannot be less than 0.',
       ]);
       $track = 0;
       $parameters= $request->input('parameters');
       DB::beginTransaction(); //Start transaction!

       try{
           foreach ($parameters as $parameter)
           {
               $result = RegisteredCourse::find($parameter['id']);
                   $total = $parameter['ca1'] + $parameter['ca2']+ $parameter['ca3'] + $parameter['exam'];
                   if($total <= 100 AND $total >=0)
                   {
                       if($total != $result->total)
                       {
                           $result->CA1 = $parameter['ca1'];
                           $result->CA2 = $parameter['ca2'];
                           $result->CA3 = $parameter['ca3'];
                           $result->exam = $parameter['exam'];
                           $result->total = $total;
                           $result->modified_by = $staff->id;
                           $track += 1;
                           $result->save();
                       }
                   }

           } // end foreach

       }
       catch(\Exception $e)
       {
           //failed logic here
           DB::rollback();
           //dd($e);
           return redirect()->route('program_course.student_results',$program_course_id)
               ->with(['error' => 'Error uploading students result.']);
           //->with('errors',$e->getMessage());

       }

       DB::commit();
      return redirect()->route('staff.courses')
           ->with('success',$track." ".$program_course->course->code." Results updated.");


   } // end storeStudentsResults

    public function updateProgramCourseApproval(Request $request)
    {
        $url = \URL::previous('staff.home');
        $program_course = ProgramCourse::findOrFail($request->program_course_id);
        if($program_course->approval != $request->current)
        {
            return redirect()->to($url)
                ->with('error','Error updating approval of '.$program_course->course->code);
        }
        try{
        $program_course->approval = $request->approval;
        $program_course->save();
        }
        catch(\Exception $e)
        {
            return redirect()->to($url)
                ->with('error','Error updating approval of '.$program_course->course->code);
        }

        return redirect()->to($url)
            ->with('success',$program_course->course->code.' approval updated successfully');
      }

    public function students($program_course_id)
    {

        $pcid = base64_decode($program_course_id);
        $program_course = ProgramCourse::with(['registeredCourse.student','registeredCourse.student.contact','registeredCourse.student.academic'])->findOrFail($pcid);
        $results = $program_course->registeredCourse;
     //  dd($results);
        return view('staff.academic.program_course_students', compact('results','program_course'));
    }

    public function studentsDownload($program_course_id)
    {
        $pcid = base64_decode($program_course_id);
        $program_course = ProgramCourse::with(['registeredCourse.student','registeredCourse.student.contact','registeredCourse.student.academic'])->findOrFail($pcid);
        //$results = $program_course->results;

        $raw = "select registered_courses.id, concat(students.surname, ' ',students.middle_name,' ', students.first_name) as full_name,student_academics.mat_no FROM registered_courses,student_academics, students where registered_courses.course_id in (:pcid) AND registered_courses.student_id = students.id AND registered_courses.student_id = student_academics.student_id";
        $results = DB::select($raw, ['pcid' => $pcid]);

        $title = $program_course->course->code." Students";
        $data = ['title' => $title,
            'results' => $results,
            'program_course' => $program_course,
        ];

        return PDF::loadView('staff.academic.program_course_students_download', $data)->download($title.'.pdf');

    }

    public function result($program_course_id)
    {
        $pcid = base64_decode($program_course_id);
        $program_course = ProgramCourse::with(['results.student.academic'])->findOrFail($pcid);
        $results = $program_course->results;
        return view('staff.academic.program_course_result', compact('results','program_course'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLecturer($id)
    {
        $this->authorize('gstallocate',ProgramCourse::class);
        $pcourse = ProgramCourse::findOrFail(base64_decode($id));
        $program = Program::findOrFail($pcourse->course->program_id);
        $programLecturers = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
            ->where('staff_work_profiles.admin_department_id',$program->department->admin->id)
            ->where('staff.status',1)
            ->orderBy('staff.first_name','ASC')->get()->pluck('full_name','id');
        $lecturersAll = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
            ->where('staff_work_profiles.admin_department_id','!=',$program->department->admin->id)
            ->where('staff.status',1)
            ->orderBy('staff.first_name','ASC')
            ->orderBy('staff_work_profiles.admin_department_id','ASC')->get()->pluck('full_name','id');
        $lecturers = Staff::where('staff.status',1)
            ->orderBy('first_name','ASC')
            ->get()->pluck('full_name','id');
        $staff_courses = StaffCourse::where('program_id', $pcourse->program_id)->where('course_id', $pcourse->course_id)->where('session_id', $pcourse->session_id)->get();


       // $lecturers = $programLecturers->concat($lecturersAll);
        return view('/program-courses/change_lecturer',compact('pcourse','lecturers', 'staff_courses'));
    }

    public function updateLecturer(Request $request)
    {
        $session = new Session();
        $this->authorize('gstallocate',ProgramCourse::class);
        $this->validate($request, [
            'staff_id' => 'required|integer',
        ]);
       //dd($request);
        //$program_course = ProgramCourse::findOrFail(base64_decode($id));
        // $program_course->lecturer_id = $request->lecturer_id;
        $program_course= ProgramCourse::where('course_id', $request->course_id )->first();
        // StaffCourse::updateOrcreate(['staff_id'=>$request->staff_id, 'program_id'=>$request->program_id, 'session_id'=>$session->currentSession(), 'semester_id'=>$session->currentSemester(), 'course_id'=>$request->course_id, 'level'=>$program_course->level],['staff_id'=>$request->staff_id, 'program_id'=>$request->program_id,  'session_id'=>$session->currentSession(), 'semester_id'=>$session->currentSemester(), 'course_id'=>$request->course_id, 'level'=>$program_course->level]);
        StaffCourse::where('course_id' ,$request->course_id)
        ->where('program_id', $request->program_id)
        ->where('level', $request->level )
        ->where('session_id', $session->currentSession())
        ->update([
            'staff_id' => $request->staff_id,
            'course_id' => $request->course_id,
            'session_id' => $session->currentSession(),
            'program_id' => $request->program_id,



        ]);

        try {
            $program_course->save();
        }
        catch(\Exception $e)
        {

        return redirect()->route('program_course.change-lecturer',$id)
        ->with(['error' => 'Error updating program course lecturer.']);
        }
       // return Redirect::to(url('/academia/departments/program-level-courses/{id}/{level}')->previous())
       // return redirect()->route('/academia/departments/program-level-courses/{id}/{level}')
        return redirect()->back()
        // return redirect()->route('staff.home')
            ->with('success','Program Course Lecturer updated successfully');
    }

    public function getCoursesAndStaff(Request $request)
    {
        $session = new Session();
        $program_id = $request->program_id;
        $program = Program::find($program_id);
        // dd($program);
        $admin_department = AdminDepartment::where('academic_department_id' , $program->academic_department_id)->first();
        $courses = ProgramCourse::where('program_id', $program_id)->where('session_id', $session->currentSession())->get();
        $staffs = StaffWorkProfile::where('admin_department_id', $admin_department->id)->with('Staff')->get();

        return response(['courses' => $courses, 'staffs' => $staffs], 200);
    }

    // LEFTOUT


    // public function resultsExcelDownload($program_course_id)
    // {
    //     $pcid = base64_decode($program_course_id);
    //     $program_course = ProgramCourse::with(['results.student.academic'])->findOrFail($pcid);

    //     //Ensure the logged in staff is the course lecturer id. Delegated Id to be decided later
    //     $staff = Auth::guard('staff')->user();
    //     if($program_course->lecturer_id != $staff->id)
    //     {
    //         return redirect()->route('program_course.result',$program_course_id)
    //             ->with('error',"You do not have permission to update the selected Program Course results. Contact the Course owner.");
    //     }

    //     //Check if the department has approved the course
    //     if($program_course->approval >1)
    //     {
    //         return redirect()->route('program_course.result',$program_course_id)
    //             ->with('error',"You do not have permission to update the selected Program Course. Please check approval levels.");
    //     }
    //     $code = str_replace(" ","_",$program_course->course->code);
    //     $prog = strtolower($program_course->program->code);
    //     $fileName = $prog."-".strtolower($code)."-".$program_course->id.".xlsx";
    //     return Excel::download(new ProgramCoursesExport($pcid), $fileName);


    // }



    // public function resultsExcelUpload(Request $request)
    // {
    //     $this->validate($request, [
    //         'excel' => 'required|max:500',
    //         'program_course_id' => 'required|string',
    //     ]);
    //     //get file extension
    //     $extension = pathinfo($request->excel->getClientOriginalName(), PATHINFO_EXTENSION);

    //     //check file format
    //     if ($extension != "xlsx" AND $request->excel->getMimeType() != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
    //     {
    //         return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //             ->with('error',"The file format has changed from the original template.");
    //     }
    //     $pcid = base64_decode($request->program_course_id);
    //     $program_course = ProgramCourse::with(['results.student.academic'])->findOrFail($pcid);

    //     //Ensure the logged in staff is the course lecturer id. Delegated Id to be decided later
    //     $staff = Auth::guard('staff')->user();
    //     if(!$program_course->activeCourseOwner($staff->id))
    //     {
    //         return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //             ->with('error',"You do not have permission to update the selected Program Course. Contact the Course owner or Check approval levels.");
    //     }

    //     // Using maatwebsite plugin, convert excel sheet to array
    //     $rows = Excel::toArray(new ProgramCoursesImport(), request()->file('excel'));
    //     //row[0]; sheet 1
    //     //row[0][0]; sheet 1, row 1
    //     //row[0][3][4]; sheet 1, row 4, column 5

    //     //confirm right file
    //     $rpcid = $rows[0][0][0];
    //     if($rpcid != $request->program_course_id)
    //     {
    //        return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //             ->with('error',"Please confirm you have the right file for this course.");
    //     }
    //     //confirm the file name is the same
    //     $code = str_replace(" ","_",$program_course->course->code);
    //     $prog = strtolower($program_course->program->code);
    //     $fileName = $prog."-".strtolower($code)."-".$program_course->id.".xlsx";
    //     if($request->excel->getClientOriginalName() != $fileName)
    //     {
    //         return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //             ->with('error',"Please confirm you have the right result file for this course.");
    //     }
    //    $num = count($rows[0]);
    //     $track = 0;
    //     DB::beginTransaction(); //Start transaction!

    //     for ($r = 2; $r < $num; $r++)
    //     {
    //         $sn = $rows[0][$r][0];
    //         $result_id = $rows[0][$r][1];
    //         $mat_no = $rows[0][$r][2];
    //         $ca1 = $rows[0][$r][3];
    //         $ca2 = $rows[0][$r][4];
    //         $ca3 = $rows[0][$r][5];
    //         $exam = $rows[0][$r][6];

    //         //ensure the data has the right accepted value
    //         if($mat_no == null OR $ca1 < 0 OR $ca1 > 10 OR $ca2 < 0 OR $ca2 > 10 OR $ca3 < 0 OR $ca3 > 10 OR $exam < 0 OR $exam > 70)
    //         {
    //             return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //                 ->with('error',"The Excel sheet incorrect result values. Error with result for ".$mat_no);
    //         }

    //         if($ca1 == 0 AND $ca2 == 0 AND $ca3 == 0 AND $exam > 0)
    //         {
    //             return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //                 ->with('error',$mat_no." has no continuous assessment provided");
    //         }

    //        $academic = StudentAcademic::where('mat_no',$mat_no)->get()->first();
    //        $results = RegisteredCourse::where('program_course_id',$pcid)
    //            ->where('student_id',$academic->student_id)
    //            ->where('id',$result_id)
    //             ->get();
    //         if(count($results) != 1)
    //         {
    //             return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //                 ->with('error',"Result record not found. Error with result for ".$mat_no);
    //         }

    //         $result = $results->first();
    //         $total = $ca1 + $ca2 + $ca3 + $exam;
    //         if($total > 100 OR $total < 0)
    //         {
    //             return redirect()->route('program_course.results.upload_excel',$request->program_course_id)
    //                 ->with('error',"Wrong result values. Error with result for ".$mat_no);
    //         }
    //         if($total != $result->total)
    //         {
    //             $result->CA1 = $ca1;
    //             $result->CA2 = $ca2;
    //             $result->CA3 = $ca3;
    //             $result->exam = $exam;
    //             $result->total = $total;
    //             $result->modified_by = $staff->id;

    //             try {
    //                 $result->save();
    //                 $track += 1;
    //             } catch (\Exception $e) {
    //                 //failed logic here
    //                 DB::rollback();
    //                 return redirect()->route('program_course.results.upload_excel', $request->program_course_id)
    //                     ->with(['error' => 'Error uploading students result. Check result for ' . $mat_no]);
    //             }
    //         }

    //     }

    //     DB::commit();
    //     return redirect()->route('program_course.result',$request->program_course_id)
    //         ->with('success',$program_course->program->name." ".$program_course->course->code." ".$track." Results updated. Please verify.");

    // } // end resultsExcelUpload function

// public function resultsUploadExcel($program_course_id)
// {
//     $program_course = ProgramCourse::findOrFail(base64_decode($program_course_id));
//     //Ensure the logged in staff is the course lecturer id. Delegated Id to be decided later
//     $staff = Auth::guard('staff')->user();
//     if(!$program_course->activeCourseOwner($staff->id))
//     {
//         return redirect()->route('program_course.results.upload_excel',$program_course_id)
//             ->with('error',"You do not have permission to update the selected Program Course. Contact the Course owner or Check approval levels.");
//     }

//     return view('staff.academic.result_upload_excel', compact('program_course'));

// }

    public function VC()
    {
        $this->authorize('approveResult',ProgramCourse::class);
        // $programs = Program::whereHas('programCourses')->with(['department','programCourses'])
        //     ->orderBy('name','ASC')
        //     ->paginate(100);
        $program = Program::orderBy('name','ASC')->get();
        $session = new Session();

        return view('vc.results', compact('programs','session'));
    }
    public function VCLevel($level)
    {
        $this->authorize('approveResult',ProgramCourse::class);
        // $programs = Program::whereHas('StaffCourse')->with(['department','programCourses','StaffCourse'])

        // ->where('sbc_approval', 'approved')
        //     ->orderBy('name','ASC')
        //     ->paginate(100);

         $programs = Program::whereHas('VcApproval')->with(['department','programCourses','VcApproval'])

        // ->where('sbc_approval', 'approved')
            ->orderBy('name','ASC')
            ->paginate(100);
        $session = new Session();
        return view('vc.level_results', compact('programs','session', 'level'));
    }

    public function SBCLevel($level)
    {
        $this->authorize('approveResultSBC',ProgramCourse::class);
        $programs = Program::whereHas('SbcApproval')->with(['department','programCourses','SbcApproval'])
            ->orderBy('name','ASC')
            ->paginate(100);
            //dd($programs);
        // $programs = Program::orderBy('name','ASC')->get();
        $session = new Session();
        return view('sbc.level_results', compact('programs','session', 'level'));
    }

    public function ICTLevel($level)
    {
        $this->authorize('ICTViewResult',ProgramCourse::class);
        $programs = Program::with(['department','programCourses'])
            ->orderBy('name','ASC')
            ->paginate(100);
            //dd($programs);
        // $programs = Program::orderBy('name','ASC')->get();
        $session = new Session();
        return view('ict.level_results', compact('programs','session', 'level'));
    }

    // public function resultsStatus()
    // {
    //     $this->authorize('list',ProgramCourse::class);
    //     $programs = Program::whereHas('programCourses')->with(['department','programCourses'])
    //         ->orderBy('name','ASC')
    //         ->paginate(100);
    //     $session = new Session();
    //     return view('program-courses.results_status', compact('programs','session'));
    // }
    // public function vcApproval(Request $request)
    // {
    //     if(isset($request->level)){
    //         $level = $request->level;
    //     }
    //     else{
    //         $level = 1000;
    //     }
    //     $this->authorize('approveResult',ProgramCourse::class);
    //     $program_courses = ProgramCourse::with('results')->where('program_id',$request->program_id)
    //         ->where('session_id',$request->session_id)
    //             ->where('semester',$request->semester)
    //             ->where('approval','>=',1)
    //             ->where('level','=',$level)
    //             ->whereHas('results')
    //             ->get();
    //     $pcCount = 0;
    //     $resultCount = 0;
    //     DB::beginTransaction(); //Start transaction!
    //   try {
    //          foreach ($program_courses as $program_course)
    //         {
    //             $program_course->approval = 7;
    //             $program_course->save();
    //             $pcCount++;
    //             $results = $program_course->results;
    //             foreach($results as $result)
    //             {
    //                 $result->status = 7;
    //                 $result->save();
    //                 $resultCount++;
    //             }

    //         }
    //     }
    //     catch(\Exception $e)
    //     {
    //         //failed logic here
    //         DB::rollback();
    //         return redirect()->route('program_course.vc')
    //             ->with('error',"Error approving result. Please contact ICT");
    //     }
    //     DB::commit();
    //     return redirect()->route('program_course.vc_level',$level)
    //         ->with('success',$resultCount." results approved in ".$pcCount." courses");

    // }


} // end class
