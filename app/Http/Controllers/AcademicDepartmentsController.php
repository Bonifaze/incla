<?php

namespace App\Http\Controllers;

use App\College;
use App\Program;
use App\Session;
use App\Student;
use App\ProgramCourse;
use App\StudentResult;
use PDF;
use App\AcademicDepartment;
use App\Models\StaffCourse;
use Illuminate\Http\Request;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use App\Exports\AcademicDepartmentsExport;
use App\Exports\AcademicDepartmentsViewExport;

class AcademicDepartmentsController extends Controller
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
    public function index()
    {
        //
        $this->authorize('list',AcademicDepartment::class);
        $departments = AcademicDepartment::with(['college','programs'])->orderBy('status','ASC')->orderBy('name','ASC')->paginate(40);
        return view('academia.departments.list',compact('departments'));
    }

    public function create()
    {
        //
        $this->authorize('create',AcademicDepartment::class);
        $colleges = College::z->orderBy('name','ASC')->pluck('name','id');
      return view('academia.departments.create', compact('colleges'));
    }

    public function edit($id)
    {
        $this->authorize('edit',AcademicDepartment::class);
        $department = AcademicDepartment::findOrFail($id);
        $colleges = College::with('departments')->orderBy('name','ASC')->pluck('name','id');
        return view('academia.departments.edit', compact('department','colleges'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',AcademicDepartment::class);
        $this->validate($request, [
           'name' => 'required|string|max:255',
            'college_id' => 'required|integer',
            ]);
        $department = new AcademicDepartment();
        $department->name = $request->name;
        $department->college_id = $request->college_id;
        $department->status = 1;

        try{
            $department->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error creating Academic Department ! <br />');
            return redirect()->route('academia.department.create');
        }

        return redirect()->route('academia.department.list')
        ->with('success','New Academic Department created successfully');
    }  // end store


    public function update(Request $request, $id)
    {
        $this->authorize('edit',AcademicDepartment::class);
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'college_id' => 'required|integer',
           'status' => 'required|integer',
        ]);
        $department = AcademicDepartment::findOrFail($id);
        $department->name = $request->name;
        $department->college_id = $request->college_id;
        $department->status = $request->status;

        try{
            $department->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error editing Academic Department ! <br />');
            return redirect()->route('academia.department.edit', $id);
        }

        return redirect()->route('academia.department.list')
        ->with('success','Academic Department edited successfully');
    }  // end update


    public function delete(Request $request)
    {
        $this->authorize('delete',AcademicDepartment::class);
        $department = AcademicDepartment::findOrFail($request->id);

        if($department->programs()->exists())
        {
            $request->session()->flash('error', 'Error deleting Department. Programs exist under this Department !');
            return redirect()->route('academia.department.list');
        }

        try{
            $department->delete();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error deleting Department !');
            return redirect()->route('academia.department.list');
        }
        return redirect()->route('academia.department.list')
        ->with('success','Department deleted successfully');

    } // end delete


    public function programs()
    {
        $this->authorize('programs',AcademicDepartment::class);
        $staff = Auth::guard('staff')->user();
        if($staff->isAcademic())
        {
        $department = $staff->workProfile->admin->academic;
            $programs = $department->programs;
            return view('academia.departments.programs', compact('department', 'staff', 'programs'));
        }
        else{
            return redirect()->route('staff.home')
                ->with('error','Academic Department not found');
        }
    }

    public function manageProgram($encode)
    {
        $this->authorize('manageProgram',AcademicDepartment::class);
        $id = base64_decode($encode);
        $program = Program::findOrFail($id);
        return view('academia.departments.manage_program',compact('program'));
    }

   public function programLevelResults($id,$level)
    {
        $this->authorize('programLevelStudents',AcademicDepartment::class);
        $program = Program::findOrFail($id);
        $stds = $program->registeredStudents($level);
        $session = new Session();
        $session_id = $session->currentSession();
        $semester = $session->currentSemester();

        // get all students unique registered program courses
        $program_courses = collect([]);
        $students = collect([]);
        foreach ($stds as $key => $std)
        {
            $student = Student::findOrFail($std->student_id);
            $students->prepend($student);
            $results = StudentResult::where('student_id',$std->student_id)
                ->where('session_id', $session_id)
                ->where('semester', $semester)
                ->get();
            foreach ($results as $key => $result)
            {
                $program_courses->prepend($result->programCourse);
            }
        }
        $program_courses = $program_courses->unique();
        $program_courses = $program_courses->sortBy('level');
        //for each student, check if registered, show result

        //for that student, show TC, GP, GPA
        //move to next student

        return view('academia.departments.program_level_results2',compact('program','students','level','program_courses','session'));
    }

    public function programLevelStudents($id,$level)
    {
        $this->authorize('programLevelStudents',AcademicDepartment::class);
        $program = Program::findOrFail(base64_decode($id));
        $students = $program->registeredStudents($level);
        // dd(   $students);
        $session = new Session();
        $session_id = $session->currentSession();
        $semester = $session->currentSemester();

        return view('academia.departments.program_level_students',compact('program','students','level','semester','session_id'));
    }



    public function programLevelCourses($id,$level)
    {

        $this->authorize('programLevelCourses',AcademicDepartment::class);
        $session = new Session();
        $program = Program::findOrFail(base64_decode($id));
        // $pcourses = ProgramCourse::with(['course', 'program', 'lecturer', 'session']);
        $program_courses = ProgramCourse::with(['course','program','course.program','lecturer','staff'])->where('program_id',$program->id)
            ->where('level',$level)
            ->where('session_id',$session->currentSession())
           // ->where('semester',$session->currentSemester())
            ->whereHas('staff')
            ->orderBy('semester','ASC')
            ->get();
            $staff_courses = StaffCourse::where('program_id', $program->id)->where('session_id', $session->currentSession())->first();


        return view('academia.departments.program_level_courses',compact('program','program_courses','level','staff_courses'));
    }



    public function programLevelResultsDownload($id,$level)
    {
        $this->authorize('programLevelStudents',AcademicDepartment::class);
        $program = Program::findOrFail($id);
        $stds = $program->registeredStudents($level);
        $session = new Session();
        $session_id = $session->currentSession();
        $semester = $session->currentSemester();

        // get all students unique registered program courses
        $program_courses = collect([]);
        $students = collect([]);
        foreach ($stds as $key => $std)
        {
            $student = Student::findOrFail($std->student_id);
            $students->prepend($student);
            $results = RegisteredCourse::where('student_id',$std->student_id)
                ->where('session_id', $session_id)
                ->where('semester', $semester)
                ->get();
            foreach ($results as $key => $result)
            {
                $program_courses->prepend($result->programCourse);
            }
        }
        $program_courses = $program_courses->unique();
        $program_courses = $program_courses->sortBy('level');
        //for each student, check if registered, show result

        //for that student, show TC, GP, GPA
        //move to next student

        return view('academia.departments.program_level_results2',compact('program','students','level','program_courses','session'));
    }



    public function export()
    {
        return Excel::download(new AcademicDepartmentsExport(), 'academia.xlsx');
    }

    protected function getCurrentSession()
    {
        $session = DB::table('sessions')->where('status', 1)
            ->select('sessions.id')->first();
        $ses = $session->id;
        $currentsession = $ses;
        return $currentsession;
    }

    public function exportView($id,$level,$semester)
    {
        $program =Program::findorFail($id);
        $fileName = strtolower($program->code)."-".$level."level-result.xlsx";
        return Excel::download(new AcademicDepartmentsViewExport($id,$level,$semester), $fileName);

    }

    public function exportViewoldresult(Request $request)
    {
        $session = $request->input('session_id');
        $id = $request->input('program_id');
        $semester = $request->input('semester');
        $level = $request->input('level');
        $program =Program::findorFail($id);
        $session_name=Session::findorFail($request->input('session_id'));
        $fileName = strtolower(str_replace("/", "-",$session_name->name))."-".($program->name)."-(".($program->code).")-".$level."level-result.xlsx";
        return Excel::download(new AcademicDepartmentsExport($id,$level,$semester,$session), $fileName);

    }

    // public function exportViewRemoved($id,$level, $semester)
    // {
    //     //$program = Program::findOrFail($id);
    //     //$fileName = strtolower($program->code)."-".$level."level-result.xlsx";
    //     //return Excel::download(new AcademicDepartmentsViewExport($id,$level), $fileName);
    //     $session = $this->getCurrentSession();
    //     $student_ids = RegisteredCourse::distinct('student_id')->where('program_id', $id)
    //     // ->where('level', $level)
    //     ->where('semester', $semester)->where('session', $session)->pluck('student_id');
    //     $student_idsreg = RegisteredCourse::distinct('student_id')->where('program_id', $id)
    //     // ->where('level', $level)
    //     ->where('semester', $semester)->where('session', $session)->pluck('course_id');
    //     $student_ids_arr = $student_ids->toArray();
    //     $students = Student::wherein('id', $student_ids_arr)->with(['registered_courses' => function ($q) use ($level, $semester, $session) {
    //         $q->where('session', $session);
    //         // $q->where('level', $level);
    //         $q->where('semester', $semester);
    //         $q->orderBy('course_id', 'ASC');

    //     }])->get();
    //     // $studentReg = $student_idsreg;
    //     // dd($studentReg);
    //     $program_courses = ProgramCourse::where('program_id', $id)->with(['program'])->where('session_id', $session)
    //     //  ->where('level', $level)
    //     ->where('semester', $semester)->orderBy('course_id', 'ASC')->get();
    //     $meta = [
    //         'program' => Program::find($id),
    //         'session' => Session::find($session),
    //         'level' => $level,
    //         'semester' => $semester
    //     ];

    // //    dd( $meta['program']->degree );
    //     return view('academia.departments.program_level_results_export', ['program_courses' => $program_courses, 'students' => $students,'meta' => $meta]);
    // }

    public function generatePDF($id,$level, $semester){
        $data =[];
        $session = $this->getCurrentSession();
        $student_ids = RegisteredCourse::distinct('student_id')->where('program_id', $id)->where('level', $level)->where('semester', $semester)->where('session', $session)->pluck('student_id');
        $student_ids_arr = $student_ids->toArray();
        $students = Student::wherein('id', $student_ids_arr)->with(['registered_courses' => function ($q) use ($level, $semester, $session) {
            $q->where('session', $session);
            $q->where('level', $level);
            $q->where('semester', $semester);
            $q->orderBy('course_id', 'ASC');

        }])->get();
        $program_courses = ProgramCourse::where('program_id', $id)->with(['program'])->where('session_id', $session)->where('level', $level)->where('semester', $semester)->orderBy('course_id', 'ASC')->get();
        $meta = [
            'program' => Program::find($id),
            'session' => Session::find($session),
            'level' => $level,
            'semester' => $semester
        ];


    $pdf = PDF::loadView('academia.departments.program_level_results_export', ['program_courses' => $program_courses, 'students' => $students,'meta' => $meta])->setPaper('a4', 'landscape','40');
    return $pdf->download('pdf_file.pdf');
    }


} // end class
