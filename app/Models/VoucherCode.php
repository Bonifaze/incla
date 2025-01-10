<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    use HasFactory;
     protected $fillable = [
        'staff_id',
        'student_id',
        'pin',
        'status',

    ];
}
