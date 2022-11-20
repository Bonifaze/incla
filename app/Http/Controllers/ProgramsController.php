<?php

namespace App\Http\Controllers;

use App\ProgramCourse;
use Illuminate\Http\Request;
use App\Program;
use App\Course;
use App\Session;
use App\Student;
use App\StudentAcademic;
use App\StudentResult;
use App\AcademicDepartment;

class ProgramsController extends Controller
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
        //$this->authorize('list', Program::class);
        $programs = Program::with(['department', 'studentAcademic','undergraduates','postgraduates'])->orderBy('academic_department_id','ASC')->orderBy('name','ASC')->paginate(40);
        
        return view('academia.programs.list',compact('programs'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courselist($id)
    {
        $program = Program::findOrFail($id);
        $courses = Course::where('program_id', $id)->orderBy('status','DESC')->orderBy('id','ASC')->orderBy('title','ASC')->paginate(100);
        return view('/programs/courselist',compact('courses', 'program'));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses($id)
    {
        $program = Program::findOrFail($id);
        $session = new Session();
        $pcourses = $program->programCourses()->where('session_id', $session->currentSession())->where('semester', $session->currentSemester())->with(['lecturer', 'course'])->orderBy('level','ASC')->paginate(100);
        
        return view('/programs/courses',compact('pcourses', 'program'));
    }
    
   
    public function create()
    {
        $this->authorize('create', Program::class);
        $departments = AcademicDepartment::orderBy('name','ASC')->pluck('name','id');
        return view('academia.programs.create', compact('departments'));
    }
    
    
    public function edit($id)
    {
        $this->authorize('edit', Program::class);
        $program = Program::findOrFail($id);
        $departments = AcademicDepartment::orderBy('name','ASC')->pluck('name','id');
        return view('academia.programs.edit', compact('program','departments'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Program::class);
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:10',
            'degree' => 'required|string|max:10',
            'masters' => 'required|string|max:10',
            'academic_department_id' => 'required|integer',
            'duration' => 'required|integer',
        ]);
        $program = new Program();
        $program->name = $request->name;
        $program->code = $request->code;
        $program->degree = $request->degree;
        $program->masters = $request->masters;
        $program->duration = $request->duration;
        $program->academic_department_id = $request->academic_department_id;
        $program->status = 1;
        
        try{
            $program->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error creating Program ! <br />');
            return redirect()->route('academia.program.create');
        }
        
        return redirect()->route('academia.program.list')
        ->with('success','New Program created successfully');
    }  // end store
    
    
    
    public function update(Request $request, $id)
    {
        $this->authorize('edit', Program::class);
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'code' => 'required|string|max:10',
            'degree' => 'required|string|max:10',
            'masters' => 'required|string|max:10',
            'academic_department_id' => 'required|integer',
            'duration' => 'required|integer',
        ]);
        $program = Program::findOrFail($id);
        $program->name = $request->name;
        $program->code = $request->code;
        $program->degree = $request->degree;
        $program->masters = $request->masters;
        $program->duration = $request->duration;
        $program->academic_department_id = $request->academic_department_id;
        $program->status = $request->status;
        
        try{
            $program->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Program ! <br />');
            return redirect()->route('academia.program.edit');
        }
        return redirect()->route('academia.program.list')
        ->with('success','Program updated successfully');
        
    } // end update
    
    
    public function delete(Request $request)
    {
        $this->authorize('delete', Program::class);
        $program = Program::findOrFail($request->id);
        
        //check if for database constraint.
        if($program->studentAcademic()->exists())
        {
            $request->session()->flash('error', 'Error deleting Program. Students exist under this Program !');
            return redirect()->route('academia.program.list');
        }
        
        try{
            $program->delete();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error deleting Program !');
            return redirect()->route('academia.program.list');
        }
        return redirect()->route('academia.program.list')
        ->with('success','Program deleted successfully');
        
    } // end delete


} // end class
