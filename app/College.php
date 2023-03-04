<?php

namespace App;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;

class College extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    public function departments()
    {
        return $this->hasMany('App\AcademicDepartment');
    }

    public function programs()
    {
        return $this->hasManyThrough('App\Program','App\AcademicDepartment');
    }

    public function getStateAttribute()
    {
        if($this->status == 1)
        {
            return "Active";
        }
        else {
            return "Disabled";
        }

    }


}
