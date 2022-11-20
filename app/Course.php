<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function program()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }

    public function programCourses()
    {
        return $this->hasMany('App\ProgramCourse');
    }

    public function outstandings()
    {
        return $this->hasMany('App\SemesterResultOutstanding');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }

    public function departments()
    {
        return $this->hasOneThrough('App\AcademicDeparment', 'App\Program');
    }

    public function pcTests()
    {
        return $this->hasManyThrough('App\ProgramCourseTest', 'App\ProgramCourse');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getCourseDescribeAttribute()
    {
        return "{$this->course_code} ({$this->course_title})";
    }


    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getCourseStatusAttribute()
    {
        if($this->status === 1)
        {
            return "Active";
        }
        elseif ($this->status === 0)
        {
        return "Disabled";
        }
    } // end


    public function courseRegistrationEnabled($student)
    {
        $settings = new Setting();
        $end_date = $settings->endDate();
        //$end_date = \Carbon\Carbon::create('2021-12-21')->format('Y-m-d');
        $now = \Carbon\Carbon::now()->format('Y-m-d');

        //students that are not allowed to register
        $blacklist = [1,2];

        //students allowed to register irrespective of date or financial status
        $whitelist = [1];
       //any student owing up to this amount will not be allowed to register
        $min_balance = config('app.DEBT_LIMIT');

        //students from the under-listed programs are allowed if they meet other terms
        $programs = [0];

        //students from the under-listed levels are allowed if they meet other terms
        $levels = $settings->levels();

        //students from the under-listed admission type are allowed if they meet other terms
       // $entryMode = ["DE","TRANSFER"];
        $entryMode = [];

       //if student has exception
       if(in_array($student->id,$whitelist))
       {
           return true;
       }

        //if student is not blacklisted
        if(in_array($student->id,$blacklist))
        {
            return false;
        }
        //if student finance is ok
        if($student->debt AND $student->debt->debt > $min_balance)
        {
            return false;
        }

      //if program has exception
       if(in_array($student->academic->program->id,$programs))
       {
           return true;
       }

        //if level has exception
        if(in_array($student->academic->level,$levels))
        {
            return true;
        }

        /*
        //if student is in 200 and Transfer
        if(in_array($student->academic->mode_of_entry,$entryMode))
        {
            if($student->academic->level == 200)
            {
                return true;
            }
        }

        //new Direct Entry student

        if($student->academic->level == 200 AND $student->academic->mode_of_entry == 'DE')
        {
            return true;
        }


        //new Transfer student
        if($student->academic->level == 200 AND $student->academic->mode_of_entry == 'TRANSFER')
        {
            return true;
        }
       */

      //if date is open
       if($end_date < $now)
       {
           return false;
       }


       return true;

    }



    public function outstandingExists($student_id,$registration_id)
    {
     $courses = SemesterResultOutstanding::where('student_id',$student_id)
         ->where('semester_registration_id',$registration_id)
         ->where('course_id',$this->id)
         ->get();
     if(count($courses) > 0)
     {
         return true;
     }
     else{
         return false;
     }
    }

} // end class
