<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemitasVerification extends Model
{
    use HasFactory;
    public $timestamps = true;

       // Define the table associated with this model (if different from the default)
       protected $table = 'remitas_verifications';

       // Define the fillable attributes (columns you can mass assign)
       protected $fillable = [
           'user_id',
           'student_id',
           'rrr',
           'amount',
           'session_id',
           'percentage',
           'staff_id',
           // Add other attributes as needed
       ];

}
