<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class StudentMedical extends Model implements Auditable
{
        //
        use \OwenIt\Auditing\Auditable;

        public function student_academic()
        {
            return $this->belongsTo(StudentAcademic::class, 'student_id', 'student_id');
        }

}

