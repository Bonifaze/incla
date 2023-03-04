<?php

namespace App\Exports;

use App\AcademicDepartment;
use App\Program;
use App\Session;
use App\Student;
use App\StudentResult;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AcademicDepartmentsViewExport implements FromView
{
    public $id;
    public $level;
    public function __construct($id,$level)
    {
        $this->id = $id;
        $this->level = $level;
    }

    public function view(): View
    {
        $id = $this->id;
        $level = $this->level;
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
            $results = StudentResult::with('programCourse')->where('student_id',$std->student_id)
                ->where('session_id', $session_id)
                ->where('semester', $semester)
                ->whereHas('programCourse', function ($query) {
                    return $query->where('approval', '>', 0);
                })

                ->get();
            foreach ($results as $key => $result)
            {
                $program_courses->prepend($result->programCourse);
            }
        }

        $students = $students->unique();
        $program_courses = $program_courses->unique();
        $program_courses = $program_courses->sortBy('level');
        return view('academia.departments.program_level_results_export',compact('program','students','level','program_courses','session'));

    }
}
