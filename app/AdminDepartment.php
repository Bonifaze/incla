<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class AdminDepartment extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    public function parent()
    {
        return $this->belongsTo('App\AdminDepartment', 'parent_id');
    }

    public function staff()
    {
        return $this->hasMany('App\StaffWorkprofile');
    }

    public function academics()
    {
        if($this->academic_department_id != 0){
            $academic = AcademicDepartment::find($this->academic_department_id);
        }
        else {
            $academic = AcademicDepartment::find(1000);
        }
        return $academic;
    }

    public function academic()
    {
        return $this->belongsTo('App\AcademicDepartment', 'academic_department_id');
    }



}
