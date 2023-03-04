<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class SemesterResultOutstanding extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
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
