<?php

namespace App\Exports;

use App\Program;
use App\Session;
use App\Student;
use App\ProgramCourse;
use App\StudentResult;
use App\AcademicDepartment;
use App\Models\RegisteredCourse;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AcademicDepartmentsViewExport implements FromView
{
    public $id;
    public $level;
    public $semester;
    public function __construct($id,$level,$semester)
    {
        $this->id = $id;
        $this->level = $level;
        $this->semester =$semester;
    }

    public function view(): View
    {
        $id = $this->id;
        $level = $this->level;
        $program = Program::findOrFail($id);
        $stds = $program->registeredStudents($level);
        $session = new Session();
        $session = $session->currentSession();
        $semester = $this->semester;


        $student_ids = RegisteredCourse::distinct('student_id')->where('program_id', $id)
         ->where('level', $level)
        ->where('semester', $semester)
        ->where('session', $session)->pluck('student_id');
        $student_ids_arr = $student_ids->toArray();
        $students = Student::wherein('id', $student_ids_arr)->with(['registered_courses' => function ($q) use ($level, $semester, $session) {
            $q->where('session', $session);
             $q->where('level', $level);
            $q->where('semester', $semester);
            $q->orderBy('course_id', 'ASC');

        }, 'previous_registered_courses' => function ($qr) use($level) {
            $qr->where('level', '<', $level);
        }])->get();

        /*$program_courses = ProgramCourse::where('program_id', $id)->with(['program'])->where('session_id', $session)
          ->where('level', $level)
        ->where('semester', $semester)
        ->orderBy('course_id', 'ASC')->get();**/

        $program_courses = RegisteredCourse::

    with(['programCoursep'])
        ->where('session', $session)
        ->where('program_id', $id)
        ->where('level', $level)
        ->where('semester', $semester)
        ->with(['programCoursep' => function($query){
            $query->orderBy('level', 'ASC');
        }])
        ->whereHas('programCoursep')
        // ->orderBy('course_id', 'ASC')
        // ->get(['course_id']);
        // ->orderBy('level', 'ASC')
        // ->select('registered_courses.*','program_courses.level')
        // ->orderBy('created_at', 'ASC')
       -> distinct('course_id')->get(['course_id']);
        // dd($program_courses);
        $meta = [
            'program' => Program::find($id),
            'session' => Session::find($session),
            'level' => $level,
            'semester' => $semester
        ];
        return view('academia.departments.program_level_results_export',['program_courses' => $program_courses, 'students' => $students,'meta' => $meta]);

    }
}
