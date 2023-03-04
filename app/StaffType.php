<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class StaffType extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    //
    public function staff()
    {
        return $this->hasMany('App\StaffWorkprofile');
    }

} // end class
