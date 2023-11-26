<?php

namespace App\Imports;

use App\Models\Course;
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
        $course_reg = RegisteredCourse::find($row[0]);
        $course = Course::find($course_reg->course_id);
        $grade = GradeSetting::where('min_score', '<=', $total)->where('max_score', '>=', $total)->where('program_id', $course->program_id)->first();
        if (!is_null($grade))
        {
            if ($course_reg->program_id == $grade->program_id)
            {
                $grade_id = $grade->id;
            }
            else 
            {
                $grade = GradeSetting::where('min_score', '<=', $total)->where('max_score', '>=', $total)->first();
                $grade_id = $grade->id;
            }
        }
        else{
            $grade = GradeSetting::where('min_score', '<=', $total)->where('max_score', '>=', $total)->first();
            $grade_id = $grade->id;
        }
        StaffCourse::where('course_id', $course_reg->course_id)->where('program_id', $course_reg->program_id)
        ->where('session_id', $course_reg->session)->update([
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
