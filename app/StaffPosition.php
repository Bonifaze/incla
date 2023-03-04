<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class StaffPosition extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = "staff_positions";

    //
    public function staff()
    {
        return $this->hasMany('App\StaffWorkprofile');
    }

} // end class
