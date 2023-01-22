<?php 

namespace App\Imports;

use App\Models\GradeSetting;
use App\Models\RegisteredCourse;
use App\Models\StaffCourse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class RegisteredCourseImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        $total = $row[4] + $row[5] + $row[6] + $row[7];
        $grade = GradeSetting::where('min_score', '<=', $total)->where('max_score', '>=', $total)->first();
        $grade_id = $grade->id;
        $course = RegisteredCourse::find($row[0]);
        StaffCourse::where('course_id', $course->course_id)->where('program_id', $course->program_id)
        ->where('session_id', $course->session)->update([
            'upload_status' => 'uploaded',
            'hod_approval' => 'pending'
        ]);
        return RegisteredCourse::updateOrCreate(['id' => $row[0]],[
            'ca1_score' => $row[4],
            'ca2_score' => $row[5],
            'ca3_score' => $row[6],
            'exam_score' => $row[7],
            'total' => $total,
            'grade_id' => $grade_id,
            'grade_status' => $grade->status
        ]);
    }
    
    public function startRow(): int
    {
        return 2;
    }
}