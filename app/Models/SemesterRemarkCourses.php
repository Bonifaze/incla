<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterRemarkCourses extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', // Add 'student_id' to the fillable property
        'course_id',
        // Add more fields that can be mass assigned here
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function programCourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }

}
