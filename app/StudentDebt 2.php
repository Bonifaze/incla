<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDebt extends Model
{
    protected $table = 'student_debts';
    //
    public function student()
    {
        return $this->belongsTo('App\Student','student_id');
    }

    public function programLevelDebt($program_id,$level)
    {
       $session = new Session();
       $students = Student::with(['academic', 'semesterRegistrations'])
        ->whereHas('semesterRegistrations', function ($query) use ($session) {
            return $query->where('session_id', '=', $session->currentSession());
        })
        ->whereHas('debt', function ($query) {
            return $query->where('debt', '!=', 0);
        })
        ->whereHas('academic', function ($query) use ($program_id, $level) {
            return $query->where('program_id', $program_id)
                ->where('level', $level);
        })
        //->orderBy('id','DESC')
        ->get();
            $debt = 0;
            foreach ($students as $key => $student) {
                $db = $student->debt->debt;
                $debt += $db;
            }
            return $debt;
    }
} // end class
