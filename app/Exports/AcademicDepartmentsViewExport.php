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

        // // get all students unique registered program courses
        // $program_courses = collect([]);
        // $students = collect([]);
        // foreach ($stds as $key => $std)
        // {
        //     $student = Student::findOrFail($std->student_id);
        //     $students->prepend($student);
        //     $results = StudentResult::with('programCourse')->where('student_id',$std->student_id)
        //         ->where('session_id', $session_id)
        //         ->where('semester', $semester)
        //         ->whereHas('programCourse', function ($query) {
        //             return $query->where('approval', '>', 0);
        //         })

        //         ->get();
        //     foreach ($results as $key => $result)
        //     {
        //         $program_courses->prepend($result->programCourse);
        //     }
        // }

        // $students = $students->unique();
        // $program_courses = $program_courses->unique();
        // $program_courses = $program_courses->sortBy('level');



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

        $program_courses = RegisteredCourse::distinct('course_id')->where('session', $session)
        ->where('program_id', $id)
        ->where('level', $level)
        ->where('semester', $semester)
        ->orderBy('course_id', 'ASC')->get(['course_id']);
        $meta = [
            'program' => Program::find($id),
            'session' => Session::find($session),
            'level' => $level,
            'semester' => $semester
        ];
        return view('academia.departments.program_level_results_export',['program_courses' => $program_courses, 'students' => $students,'meta' => $meta]);

    }
}
