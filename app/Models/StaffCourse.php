<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffCourse extends Model
{
    use HasFactory;


    public function getCourseTitleAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_title;
    }

    public function getCourseCodeAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_code;
    }

    protected $appends = [
        'course_title',
        'course_code'
    ];
}
