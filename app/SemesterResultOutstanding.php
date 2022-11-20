<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemesterResultOutstanding extends Model
{
    //
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function semesterRegistration()
    {
        return $this->belongsTo('App\SemesterRegistration', 'semester_registration_id');
    }


} // end class
