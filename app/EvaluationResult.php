<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class EvaluationResult extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    //
    public function session()
    {
        return $this->hasMany('App\Session', 'session_id');
    }

    //
    public function result()
    {
        return $this->belongsTo('App\StudentResult', 'student_result_id');
    }

    public function active()
    {
        $active = collect();
        $active->session = Session::findOrFail(14);
        $active->semester = 2;
        return $active;
    }

    public function completed($results)
    {
        foreach ($results as $key => $result)
        {
          if(!$result->evaluations()->exists())
          {
              return false;
          }
        }
        return true;
    }

}// end class
