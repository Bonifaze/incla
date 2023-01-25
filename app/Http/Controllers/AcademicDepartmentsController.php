<?php

namespace App\Http\Controllers;

use App\Exports\AcademicDepartmentsExport;
use App\Exports\AcademicDepartmentsViewExport;
use App\Program;
use App\ProgramCourse;
use App\Session;
use App\Student;
use App\StudentResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\AcademicDepartment;
use App\College;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        $colleges = College::with('departments')->orderBy('name','ASC')->pluck('name','id');
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
        $program_courses = ProgramCourse::with(['course','program','course.program','lecturer'])->where('program_id',$program->id)
            ->where('level',$level)
            ->where('session_id',$session->currentSession())
            ->where('semester',$session->currentSemester())
            ->whereHas('lecturer')
            ->get();
        return view('academia.departments.program_level_courses',compact('program','program_courses','level'));
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



    public function export()
    {
        return Excel::download(new AcademicDepartmentsExport(), 'academia.xlsx');
    }

    public function exportView($id,$level)
    {
        $program = Program::findOrFail($id);
        $fileName = strtolower($program->code)."-".$level."level-result.xlsx";
        return Excel::download(new AcademicDepartmentsViewExport($id,$level), $fileName);
    }


} // end class
