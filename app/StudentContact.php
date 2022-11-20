<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentContact extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    //
    public function levelContacts($level)
    {
        $levelContacts = DB::select(
            'select `student_contacts`.* from `student_contacts`,`students`,`student_academics` 
where `students`.`id` = `student_academics`.`student_id` 
  and `students`.`id` = `student_contacts`.`student_id` 
  and `student_academics`.`level` = :level 
  and `student_academics`.`student_id` = `student_contacts`.`student_id` ', ['level' => $level]);
        return collect($levelContacts);
    }

    public function getNameAttribute()
    {
        return "{$this->title}  {$this->other_names} {$this->surname}";
    }

    public function getPhonesAttribute()
    {
        return "{$this->phone},  {$this->phone_2}";
    }
    
} // end Class
