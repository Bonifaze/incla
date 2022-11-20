<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffPosition extends Model
{
    
    protected $table = "staff_positions";
    
    //
    public function staff()
    {
        return $this->hasMany('App\StaffWorkprofile');
    }
    
} // end class
