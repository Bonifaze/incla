<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Result extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $fillable = [
        'result_id',
        'student_id',
        'program_id',
        'session_id',
        'level',
        'semester',
        'tcu',
        'tgp',
        'gpa',
        'cgpa',
        'status'
    ];

    public function programCourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }

    public function RegisteredCourse()
    {
        return $this->belongsTo('App\Models\RegisteredCourse', 'course_id');
    }
}
