<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicDepartment extends Model
{
    //
    public function college()
    {
        return $this->belongsTo('App\College', 'college_id');
    }
    
    public function admin()
    {
        return $this->hasOne('App\AdminDepartment');
    }
    
    public function programs()
    {
        return $this->hasMany('App\Program');
    }
    
    public function courses()
    {
        return $this->hasManyThrough('App\Course', 'App\Program');
    }


    public function staffCount()
    {
        $admin = $this->admin;
        $staff = StaffWorkProfile::where('admin_department_id', $admin->id)
            ->count();
            return $staff;
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucwords(strtolower($value));
    }









} // end class
