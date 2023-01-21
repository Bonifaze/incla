<?php

namespace App\Models;

use App\Staff;
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

    public function getStaffNameAttribute()
    {
        return Staff::find($this->staff_id)?->full_name;
    }
    protected $appends = [
        'course_title',
        'course_code',
        'staff_name'
    ];
}
