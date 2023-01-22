<?php 

namespace App\Exports;

use App\Models\RegisteredCourse;
use Maatwebsite\Excel\Concerns\FromArray;

class RegisteredCourseExport implements FromArray
{
    protected $registeredCourse, $session, $course_id, $program_id;
    
    public function __construct(RegisteredCourse $registeredCourse, $session, $course_id, $program_id)
    {
        $this->registeredCourse = $registeredCourse;
        $this->session = $session; 
        $this->course_id = $course_id;
        $this->program_id = $program_id;
    }

    public function array(): array
    {
        $array = [['id', 'Matric Number', 'Full Name', 'Course Code', 'CA1 Score', 'CA2 Score', 'CA3 Score', 'Exam Score']];
        $registeredCourses = $this->registeredCourse->where('session', $this->session)
        ->where('course_id', $this->course_id)
        ->where('program_id', $this->program_id)
        ->get();
        foreach ($registeredCourses as $course)
        {
            $array[] = [$course->id, $course->matric_number, $course->full_name, $course->course_code, $course->ca1_score, $course->ca2_score, $course->ca3_score, $course->exam_score];
        }
        return $array;
    }

}