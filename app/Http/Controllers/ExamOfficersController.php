<?php

namespace App\Http\Controllers;

use Validator;
use App\Program;
use App\Session;
use App\ProgramCourse;
use App\StudentResult;
use App\StudentAcademic;
use App\AcademicDepartment;
use Illuminate\Http\Request;
use App\Models\RegisteredCourse;
use Illuminate\Support\Facades\Auth;

class ExamOfficersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff');

    }


    public function programs()
    {
        $this->authorize('examOfficer', StudentResult::class);
        $staff = Auth::guard('staff')->user();
        $session = new Session();
            $modify=RegisteredCourse::with(['staff','sessions'])->where('staff_id', '<>', '', 'and')
            ->whereColumn('old_total', '!=', 'total')
            ->orderBy('updated_at','DESC')
           // ->limit(20)
            // ->paginate(10);
           ->get();
        if($staff->isAcademic())
        {
            $department = $staff->workProfile->admin->academic;
            $programs = $department->programs;
            $sessions = Session::where('status', 0)->orderBy('id', 'DESC')->pluck('name', 'id');
            return view('academia.exam-officers.programs', compact('department', 'staff','sessions', 'programs','modify','session'));
        }
        else{
            return redirect()->route('staff.home')
                ->with('error','Academic Department not found');
        }
    }

    public function manageProgram($encode)
    {
        //$this->authorize('examOfficer', StudentResult::class);
        $id = base64_decode($encode);
        $program = Program::findOrFail($id);
        return view('academia.exam-officers.manage_program',compact('program'));
    }


    public function programLevelCourses($id,$level)
    {
        $this->authorize('programLevelCourses',AcademicDepartment::class);
        $session = new Session();
        $program = Program::findOrFail(base64_decode($id));
        $program_courses = ProgramCourse::with(['course','program','course.program','staffCourses', 'registeredCourse', 'staff'])->where('program_id',$program->id)
            ->where('level',$level)
            ->where('session_id',$session->currentSession())
           // ->where('semester',$session->currentSemester())
            ->get();
        return view('academia.exam-officers.program_level_courses',compact('program','program_courses','level'));
    }

    public function broughtForwardCGPA(Request $request)
    {
        $this->authorize('examOfficer', StudentResult::class);
        $validator = Validator::make($request->all(), [
            'TC' => 'required|integer',
            'TGP' => 'required|integer',
            'academic_id' => 'required|integer',
        ]);
        if ($validator->fails())
        {
            return redirect()->route('result.program_search_student')
                ->with(['error' => 'Please provide a valid Total Credit or Grade Points value']);
        }
        $academic = StudentAcademic::findOrFail($request->academic_id);
        $academic->TC = $request->TC;
        $academic->TGP = $request->TGP;
        try{
           $academic->save();
        }
        catch(\Exception $e)
        {
            return redirect()->route('result.program_search_student')
                ->with(['error' => 'Error updating brought forward credits and grade points.']);
        }

        return redirect()->route('result.program_search_student')
            ->with('success','Credit and Grade Points updated successfully for '.$academic->mat_no);

    }


} // end Class
