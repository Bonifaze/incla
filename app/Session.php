<?php

namespace App;

use App\Models\RegisteredCourse;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    public function programCourses()
    {
        return $this->hasMany('App\ProgramCourse');
    }

    public function results()
    {
        return $this->hasMany('App\StudentResult');
    }


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

    public function currentSemester()
    {
        $setting = new Setting();
        return $setting->staffSemester();
    }

    public function courseRegSemester()
    {
        //for students only
        return 2;
    }


    public function getCode() {

        $data  = explode("/",$this->name);
        $info = $data[0];
        return $info[2].$info[3];

    }  // end getCode()


    public function semesterName($semester)
    {
      if($semester == 1)
      {
          return "First Semester";
      }
      if($semester == 2)
      {
          return "Second Semester";
      }
      if($semester == 3)
      {
          return "Summer Semester";
      }
      else
      {
          return $semester;
      }
    }// end semesterName

    public function getStateAttribute()
    {
        if($this->status == 0)
        {
            return "Not Active";
        }
        else if($this->status == 1)
        {
            return "Active";
        }
        else
        {
            return "Unknown";
        }

    }

    public function registered_courses1()
    {
        return $this->hasMany(RegisteredCourse::class, 'session',)
        ->where('status', 'published');
    }

    public function registered_courses2()
    {
        return $this->hasMany(RegisteredCourse::class, 'session', )
        ->where('status', 'published');
    }
}  // end class
