<?php

namespace App;

use App\Models\RegisteredCourse;
use Illuminate\Database\Eloquent\Model;

class SemesterRegistration extends Model
{
    //
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }


    public function results()
    {
        $student_id = $this->student_id;
        $session_id = $this->session_id;
        $semester = $this->semester;


        $results = RegisteredCourse::where('student_id',$student_id)
        ->where('session',$session_id)
        ->where('semester',$semester)
       // ->where('status',7)
        ->whereHas('programCourse')
        ->get();

        $rs = new RegisteredCourse();

       $gpa = $rs->gpa($student_id, $session_id, $semester);
        $cgpa = $rs->currentCGPA($student_id,$session_id,$semester);

        $data = collect([]);
        $data->results = $results;
        $data->gpa = $gpa;
        $data->cgpa= $cgpa;

        return $data;

    }

    public function result()
    {
        $student_id = $this->student_id;
        $session_id = $this->session_id;
        $semester = $this->semester;


        $results = RegisteredCourse::with(['programCourse', 'programCourse.course'])->where('student_id',$student_id)
        ->where('session',$session_id)
        ->where('semester',$semester)
       // ->where('status',7)
        ->whereHas('programCourse')
        ->get();

        return $results;

    }

    public function gpa()
    {
        $student_id = $this->student_id;
        $session_id = $this->session_id;
        $semester = $this->semester;
        $rs = new RegisteredCourse();

        $gpa = $rs->gpa($student_id, $session_id, $semester);

        return $gpa;
    }

    public function cgpa()
    {
        $student_id = $this->student_id;
        $session_id = $this->session_id;
        $semester = $this->semester;
        $rs = new RegisteredCourse();

        $cgpa = $rs->currentCGPA($student_id,$session_id,$semester);

        return $cgpa;
    }

} //end class
