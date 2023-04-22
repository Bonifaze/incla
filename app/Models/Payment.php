<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'remitas';

    public function getStatus025()
    {
        return $this->where('status', '025')->get();
    }
}
