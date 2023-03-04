<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class StaffContact extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

} // end class
