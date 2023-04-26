<?php

namespace App\Models;

use App\Program;
use App\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class StaffCourse extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $fillable = ['staff_id', 'program_id', 'course_id', 'session_id', 'semester_id', 'level', 'hod_approval', 'dean_approval', 'sbc_approval', 'vc_senate_approval'];

    public function getCourseTitleAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_title ?? null;
    }

    public function getCourseCodeAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_code ?? null;
    }

    public function getStaffNameAttribute()
    {
        return Staff::find($this->staff_id)?->full_name;
    }

    public function getStaffPhoneAttribute()
    {
        return Staff::find($this->staff_id)?->phone;
    }


    public function getTotalStudentsAttribute()
    {
        return RegisteredCourse::where('session', $this->session_id)->where('course_id', $this->course_id)->where('program_id', $this->program_id)->count();
    }

    public function Program()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }

    protected $appends = [
        'course_title',
        'course_code',
        'staff_name',
        'total_students'
    ];
}
