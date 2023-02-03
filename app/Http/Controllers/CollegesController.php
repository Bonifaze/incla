<?php

namespace App\Http\Controllers;

use App\Program;
use App\ProgramCourse;
use App\Session;
use Illuminate\Http\Request;
use App\College;
use App\Staff;
use Illuminate\Support\Facades\Auth;

class CollegesController extends Controller
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
        $this->authorize('list',College::class);
        $colleges = College::orderBy('status','ASC')->orderBy('name','ASC')->paginate(10);
         return view('academia.colleges.list',compact('colleges'));
    }


    public function create()
    {
        $this->authorize('create',College::class);
        $staff = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        ->where('staff_work_profiles.staff_type_id','1')
        ->orderBy('staff.first_name','ASC')
        ->get()->pluck('full_name','id');
        return view('academia.colleges.create', compact('staff'));
    }

    public function edit($id)
    {
        $this->authorize('edit',College::class);
        $college = College::findOrFail($id);
        $staff = Staff::join('staff_work_profiles', 'staff.id', '=', 'staff_work_profiles.staff_id')
        ->where('staff_work_profiles.staff_type_id','1')
        ->orderBy('staff.first_name','ASC')
        ->get()->pluck('full_name','id');
        return view('academia.colleges.edit', compact('staff','college'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',College::class);
        $this->validate($request, [
          'code' => 'required|string|max:255',
            ]);
        $college = new College();
        $college->code = $request->code;
        $college->name = $request->name;
        $college->dean_id = $request->dean_id;
        $college->status = 1;

        try{
            $college->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error creating Faculty ! <br />');
            return redirect()->route('academia.college.create');
           }

        return redirect()->route('academia.college.list')
        ->with('success','New Faculty created successfully');
    }  // end store


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->authorize('edit',College::class);
        $this->validate($request, [
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'dean_id' => 'required|integer',
            'status' => 'required|integer',

        ]);

        $college = College::findOrFail($id);
        $college->code = $request->code;
        $college->name = $request->name;
        $college->dean_id = $request->dean_id;
        $college->status = $request->status;
        try{
            $college->save();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error updating Faculty !');

            return redirect()->route('academia.college.edit', $id);

        }

        return redirect()->route('academia.college.list')
        ->with('success','Faculty edited successfully');
    }  // end update


    public function delete(Request $request)
    {
        //
        $this->authorize('delete',College::class);
        $college = College::findOrFail($request->id);
        //check if for database constraint.
        if($college->departments()->exists())
        {
            $request->session()->flash('error', 'Error deleting Faculty. Departments exist under this college !');
            return redirect()->route('academia.college.list');
        }

        try{
            $college->delete();
        } // end try
        catch(\Exception $e)
        {
            $request->session()->flash('error', 'Error deleting Faculty !');
            return redirect()->route('academia.college.list');
        }

        return redirect()->route('academia.college.list')
        ->with('success','Faculty deleted successfully');

    } // end delete

    public function programs()
    {
        $this->authorize('programs',College::class);
        $staff = Auth::guard('staff')->user();
        if($staff->isAcademic())
        {
            $college = $staff->workProfile->admin->academic->college;
            $programs = $college->programs;
            return view('academia.colleges.programs', compact('college', 'staff', 'programs'));
        }
        else{
            return redirect()->route('staff.home')
                ->with('error','Academic Department not found');
        }
    }

    public function manageProgram($encode)
    {
        $this->authorize('manageProgram',College::class);
        $id = base64_decode($encode);
        $program = Program::findOrFail($id);
        return view('academia.colleges.manage_program',compact('program'));
    }

    public function programLevelStudents($id,$level)
    {
        $this->authorize('programLevelStudents',College::class);
        $program = Program::findOrFail($id);
        $students = $program->registeredStudents($level);

        return view('academia.colleges.program_level_students',compact('program','students','level'));
    }

    public function programLevelCourses($id,$level)
    {
        $this->authorize('programLevelCourses',College::class);
        $session = new Session();
        $program = Program::findOrFail($id);
        $program_courses = ProgramCourse::with(['course','program','course.program','lecturer'])->where('program_id',$program->id)
            ->where('level',$level)
            ->where('session_id',$session->currentSession())
          //  ->where('semester',$session->currentSemester())
            ->get();
        return view('academia.colleges.program_level_courses',compact('program','program_courses','level'));
    }




} // end class
