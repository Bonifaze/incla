<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatricCount extends Model
{
    use HasFactory;
    
    protected $fillable = ['program_id', 'session_id', 'count', 'program_type'];
}
