<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class StudentAcademic extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    //
    public function program()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session', 'entry_session_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function college()
    {

        $college = $this->program->department->college;

        return $college;
    }


} // end class
