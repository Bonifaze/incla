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

class AcademicDepartmentsExport implements FromView
{
    public $id;
    public $level;
    public $semester;
    public $session;

    public function __construct($id,$level,$semester,$session)
    {
        $this->id = $id;
        $this->level = $level;
        $this->semester =$semester;
        $this->session =$session;
    }

    public function view(): View
    {
        $id = $this->id;
        $level = $this->level;
        $program = Program::findOrFail($id);
        $stds = $program->registeredStudents($level);
        $session = $this->session ;
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

        }, 'previous_registered_courses' => function ($qr) use($level, $semester) {
            if ($semester == 2)
            {
                $qr->where('level', $level)
                ->where('semester', '1')
                ->orWhere('level', '<', $level);
            }
            else
            {
                $qr->where('level', '<', $level);
            }
        }])->get();
        //  dd($students);

        $student_course_ids = RegisteredCourse::distinct('course_id')->where('program_id', $id)
         ->where('level', $level)
        ->where('semester', $semester)
        ->where('session', $session)->pluck('course_id')->toArray();

        $program_courses = ProgramCourse::whereIn('course_id', $student_course_ids)
        ->where('program_id', $id)->with(['program']
        )->where('session_id', $session)
        ->where('semester', $semester)
        // ->distinct($student_course_ids)
        ->orderBy('level', 'ASC')->get();

        /*$program_courses = RegisteredCourse::

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
       -> distinct('course_id')->get(['course_id']);*/
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
