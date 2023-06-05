<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class admissionSession extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    
    public function currentSession()
    {
        $session = $this::where('status',1)->first();
        return $session->id;
     }

    public function currentSessionName()
    {
        $session = $this::where('status',1)->first();
        return $session->name;
    }
}
