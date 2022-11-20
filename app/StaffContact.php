<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffContact extends Model
{
    //
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
    
} // end class
