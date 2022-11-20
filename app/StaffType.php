<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    //
    public function staff()
    {
        return $this->hasMany('App\StaffWorkprofile');
    }
    
} // end class
