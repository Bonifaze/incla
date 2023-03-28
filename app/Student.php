<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Result;
use App\Models\RegisteredCourse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Casts\Attribute;
use OwenIt\Auditing\Contracts\Auditable;


class Student extends Authenticatable implements Auditable
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;


    protected $guard = 'student';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'other_names', 'type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function academic()
    {
        return $this->hasOne('App\StudentAcademic');
    }

    public function contact()
    {
        return $this->hasOne('App\StudentContact');
    }

    public function medical()
    {
        return $this->hasOne('App\StudentMedical');
    }

    public function semesterRegistrations()
    {
        return $this->hasMany('App\SemesterRegistration')
        ->orderBy('level','ASC')
        ->orderBy('semester','ASC')
        ->orderBy('session_id','ASC');
    }

    public function debt()
    {
        return $this->hasOne('App\StudentDebt');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function registered_courses()
    {
        return $this->hasMany(RegisteredCourse::class);
    }

    public function previous_registered_courses()
    {
        return $this->hasMany(RegisteredCourse::class, 'student_id', 'id');
    }

    public function remitas()
    {
        return $this->hasMany('App\Remita')
            ->orderBy('status_code','DESC')
            ->orderBy('created_at','ASC');
    }

    public function semesters()
    {
        return $this->hasMany('App\SemesterRegistration');
    }



    public function setFirstNameAttribute($value) {
        $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function setMiddleNameAttribute($value) {
        $this->attributes['middle_name'] = ucwords(strtolower($value));
    }

    public function setSurnameAttribute($value) {
        $this->attributes['surname'] = ucwords(strtolower($value));
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name}  {$this->middle_name} {$this->surname}";
    }

    // public function getDobAttribute()
    // {
    //     $date = $this->getOriginal('dob');
    //     //$dob = \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-M-Y');
    //     //return $dob;
    //     return $date;
    // }


    /**
     * Create Matriculation Number based on Program, Year and Id
     *
     * @return boolean True for success and False for failure
     */ // end setMatNo($prog, $session, $studentId)



    public function checkSerial($serial_no)
    {
        if (Student::where('id', '=', $serial_no)->exists())
        {
            return true;
        }
        else
        {
            return false;
        }
    } // end checkSerial

        public function setVunaMail()
      {

          $college = $this->academic->program->department->college;
          $col = $college->code;
          $mat_no = $this->academic->mat_no;
          $email = $mat_no.'@'.$col.'.veritas.edu.ng';
          $email = strtolower($email);
          return $email;


      }





      public function hasSemesterResults($session_id,$semester)
      {
         $results = RegisteredCourse::where('student_id',$this->id)
          ->where('session_id', $session_id)
          ->where('semester', $semester)
          ->get();

          if(count($results) > 0)
          {
              return true;
          }
          else
          {
              return false;
          }
      }// end hasSemesterResults($session_id,$semester)

    public function semesterResults($session_id,$semester)
    {
        $results = RegisteredCourse::where('student_id',$this->id)
            ->where('session_id', $session_id)
            ->where('semester', $semester)
            ->get();
       return $results;
    }// end semesterResults($session_id,$semester)


    public function hasSemesterRegistration($session_id,$semester)
      {
          $sem_reg = SemesterRegistration::where('student_id',$this->id)
          ->where('session_id', $session_id)
          ->where('semester', $semester)
          ->get();

          if(count($sem_reg) > 0)
          {
              return true;
          }
          else
          {
              return false;
          }
      }// end hasSemesterResults($session_id,$semester)


      public function hasCurrentSemesterRegistration()
      {
          $session = new Session();
          $sem_reg = SemesterRegistration::where('student_id',$this->id)
          ->where('session_id', $session->currentSession())
          ->where('semester', $session->courseRegSemester())
          ->get();

          if(count($sem_reg) > 0)
          {
              return true;
          }
          else
          {
              return false;
          }
      }// end hasSemesterResults($session_id,$semester)

    public function hasNoEvaluationRegistration($session_id, $semester)
    {
        $sem_reg = SemesterRegistration::where('student_id',$this->id)
            ->where('session_id', $session_id)
            ->where('semester', $semester)
            ->get();

        if(count($sem_reg) > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }// end hasNoEvaluationRegistration($session_id,$semester)


      public function getSemesterRegistration($session_id,$semester)
      {
          $sem_reg = RegisteredCourse::where('student_id',$this->id)
          ->where('session', $session_id)
          ->where('semester', $semester)
          ->get();

          return $sem_reg->first();

      }// end getSemesterResults($session_id,$semester)



      public function removeSemesterRegistration($session_id,$semester)
      {
          $sem_reg = SemesterRegistration::where('student_id',$this->id)
          ->where('session_id', $session_id)
          ->where('semester', $semester)
          ->get();

          if(count($sem_reg) > 0)
          {
              try {
                  $sem_reg->first()->delete();
                  return true;
                  }
              catch(\Exception $e)
              {
                  //failed logic here
                  return false;
              }
          }
          else
          {
              return false;
          }
      }// end removeSemesterRegistration()



    //   public function registerSemester()
    //   {
    //       $session = new Session();
    //       $sem_reg = new SemesterRegistration();
    //       $sem_reg->student_id = $this->id;
    //       $sem_reg->session_id = $session->currentSession();
    //       $sem_reg->semester = $session->courseRegSemester();
    //       $sem_reg->level = $this->academic->level;
    //       $sem_reg->status = 1;

    //        try {
    //               $sem_reg->save();
    //               return true;
    //           }
    //           catch(\Exception $e)
    //           {
    //               //failed logic here
    //               return redirect()->route('student.course-registration')
    //               ->with('error',"Errors completing semester registration.");
    //           }
//
    //   }// end registerSemester()


    //   public function totalRegisteredCredits($registered_courses)
    //   {
    //     $total = 0;
    //     foreach ($registered_courses as $key => $rc)
    //     {
    //         if($rc->programCourse) {
    //             $total += $rc->programCourse->credit_unit;
    //         }
    //     }
    //     return $total;
    //   } // end totalRegisteredCredits($registered_courses)

      // make sure toal credit is not exceeded
    //   public function hasSemesterCredits($registered_courses,$program_course_id)
    //   {
    //       $program_course = ProgramCourse::findOrFail($program_course_id);
    //       $total = $program_course->credit_unit;
    //       $total += $this->totalRegisteredCredits($registered_courses);
    //       $allowed = $this->allowedCredits();
    //       if($total <= $allowed)
    //       {
    //           return true;
    //       }
    //        else
    //        {
    //          return false;
    //        }
    //   }// end hasSemesterCredits()

    //Deprecated.
    //Replaced by hasExcessSemesterCredits
    // public function hasExcessSemesterCredits($registered_courses,$program_course_id,$session_id,$semester)
    // {
    //     $program_course = ProgramCourse::findOrFail($program_course_id);
    //     $total = $program_course->credit_unit;
    //     $total += $this->totalRegisteredCredits($registered_courses);
    //     $allowed = $this->allowedCredits($session_id,$semester);
    //    if($total <= $allowed)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }// end hasSemesterCredits()

    //   public function allowedCredits($session_id=0,$semester)
    //   {
    //       $total = 24;
    //       //add excess if the student has registered.
    //       if($this->hasSemesterRegistration($session_id,$semester))
    //       {
    //           $registration = SemesterRegistration::where('student_id',$this->id)
    //               ->where('session_id',$session_id)
    //               ->where('semester',$semester)
    //               ->get()->last();
    //           $total += $registration->excess_credit;
    //       }
    //       else if ($session_id == 0)
    //       {
    //           $total = 24;
    //       }
    //     return $total;
    //   } // end allowedCredits()

    // public function unApprovedGPA()
    // {
    //     $session = new Session();
    //     $result = new RegisteredCourse();
    //     $session_id = $session->currentSession();
    //     $semester = $session->currentSemester();
    //     $gpa = $result->unApprovedGPA($this->id,$session_id,$semester);
    //    return $gpa;
    // }


      public function CGPA()
      {
          $regs = SemesterRegistration::where('student_id',$this->id)->get();

          $credit_unit = 0;
          $units = 0;


          foreach($regs as $key => $reg)
          {
              $result = $reg->results();
              $credit_unit += $result->gpa->credit_unit;
              $units += $result->gpa->units;
          }

          if($credit_unit !== 0)
          {
              $value = $units / $credit_unit;
          }
          else
          {
              $value = 0.00;
          }

          $value = number_format(round($value,2),2,'.', '');

          $cgpa = collect([]);
          $cgpa->value = $value;
          $cgpa->credit_unit = $credit_unit;
          $cgpa->units= $units;

          return $cgpa;


      } // end CGPA

    public function excelCGPA()
    {

        //get result level, semester
        $session = new Session();
        $session_id = $session->currentSession();
        $semester = $session->currentSemester();

        //initialize fixed variables
        $credit_unit = 0;
        $units = 0;
        $bfcredit_unit = 0;
        $bfUnits = 0;
        $currentcredit_unit = 0;
        $curentUnits = 0;

        //Calculate brought forward
        //get all approved results
        $results = $this->results()->whereHas('programCourse')->with('programCourse')->get();
        foreach ($results as $key => $result)
         {
            $hrs = $result->programCourse->credit_unit;
            $val = $result->getUnitValue($result->total,$result->session_id);
            $bfcredit_unit += $hrs;
            $bfUnits += ($hrs * $val);
         }


        //calculate unapproved results
        $rs = new RegisteredCourse();
        $gpa = $rs->unApprovedGPA($this->id,$session_id,$semester);
        //combine all
        $credit_unit = $gpa->credit_unit + $bfcredit_unit;
        $units = $gpa->units + $bfUnits;
        if($credit_unit !== 0)
        {
            $value = $units / $credit_unit;
        }
        else
        {
            $value = 0.00;
        }

        $value = number_format(round($value,2),2,'.', '');

        $cgpa = collect([]);
        $cgpa->value = $value;
        $cgpa->credit_unit = $credit_unit;
        $cgpa->units= $units;
        $cgpa->currentgpa = $gpa->value;
        $cgpa->currentcredit_unit = $gpa->credit_unit;
        $cgpa->currentunits= $gpa->units;
        $cgpa->bfunits = $bfUnits; //$this->academic->TGP;
        $cgpa->bfcredit_unit = $bfcredit_unit; //$this->academic->TC;

        return $cgpa;


    } // end excelCGPA


    // public function baselineCGPA()
    // {
    //     $result = new RegisteredCourse();
    //     $session_id = 14;
    //     $semester = 1;
    //     $gpa = $result->unApprovedGPA($this->id,$session_id,$semester);

    //     //get baseline cgpa
    //     $credit_unit = $this->academic->TC + $gpa->credit_unit;
    //     $units = $this->academic->TGP + $gpa->units;

    //     if($credit_unit !== 0)
    //     {
    //         $value = $units / $credit_unit;
    //     }
    //     else
    //     {
    //         $value = 0.00;
    //     }

    //     $value = number_format(round($value,2),2,'.', '');
    //     $cgpa = collect([]);
    //     $cgpa->value = $value;
    //     $cgpa->credit_unit = $credit_unit;
    //     $cgpa->currentcredit_unit = $gpa->credit_unit;
    //     $cgpa->units= $units;
    //     $cgpa->currentunits= $gpa->units;
    //     $cgpa->bfunits = $this->academic->TGP;
    //     $cgpa->bfcredit_unit = $this->academic->TC;

    //     return $cgpa;

    // } // end baselineCGPA


    public function programCourseResult($program_course_id)
    {
        $result = RegisteredCourse::where('student_id',$this->id)
            ->where('course_id', $program_course_id)
            ->get();
        if(count($result) > 0)
        {

            return $result->first()->total."<br />".$result->first()->grade." <br />".$result->first()->points;
        }
        else
        {
            return "";
        }
    }// end semesterResults($session_id,$semester)

    // public function semesterEvaluated()
    // {
    //     //sheriff blacklist
    //     $sheriff = array(1);
    //     if(in_array($this->id,$sheriff))
    //     {
    //         return false;
    //     }

    //     $evaluation = new EvaluationResult();
    //         $active = $evaluation->active();
    //         $result = new RegisteredCourse();

    //         //if student did not register any course for that semester, return true since nothing to evaluate
    //        if($this->hasNoEvaluationRegistration($active->session, $active->semester))
    //        {
    //            return true;
    //        }

    //         //if in first semester, 100 level and PG students have nothing to evaluate
    //         if($active->semester == 1 AND ($this->academic->level == 100 OR $this->academic->level > 600))
    //         {
    //             return true;
    //         }
    //         $results = $result->semesterRegisteredCourses($this->id, $active->session->id, $active->semester);
    //         //if all the results have been evaluated
    //      if($evaluation->completed($results))
    //         {
    //             return true;
    //         }
    //      else
    //         {
    //             return false;
    //         }


    // }


    public function semesterResultRemark()
    {
        $session = new Session();
        $registration = $this->getSemesterRegistration($session->currentSession(),$session->currentSemester());
        $outstandings = RegisteredCourse::with('course')->where('student_id',$this->id)
            //->where('semester_registration_id',$registration->id)
          ->distinct('course_id')  ->get();
        $remark = "";
        $co = "";
        $out = "";
        foreach ($outstandings as  $outstanding)
        {
            if($outstanding->grade_status == "fail")
            {
                $co .= $outstanding->course->course_code ?? null . ", ";
            }
            else if($outstanding->grade_status == "fail")
            {
                $out .= $outstanding->course->course_code ?? null . ", ";
            }
        }
        if($co != "")
        {
            $remark .= "Co:".$co." ";
        }
        if($out != "")
        {
            $remark .= "Out: ".$out." ";
        }
       return $remark;
    }

    public function registeredCourses()
    {
        $result = new RegisteredCourse();
        $results = $result::with(['programCourse','programCourse.course'])
            ->where('student_id', $this->id)
            ->orderBy('id','DESC')
            ->get();
        $courses2= collect();
        foreach ($results as $key => $rs)
        {
            $courses2->add($rs->programCourse->course);
        }
        $courses1 = $courses2->unique();
        $courses = $courses1->values();
        return $courses;
    }

    public function contactUpdated()
    {

        $sheriff = array(1);
        if(in_array($this->id,$sheriff))
        {
            return true;
        }
        $contact = $this->contact;
        if($contact->email_2 == NULL OR $contact->phone_2 == NULL)
        {
            return false;
        }
        elseif($contact->email_2 != NULL AND $contact->phone_2 != NULL)
        {
            return true;
        }
    }


    // public function hasResultSemesterRegistration()
    // {
    //     $result = new RegisteredCourse();
    //     $sem_reg = SemesterRegistration::where('student_id',$this->id)
    //         ->where('session_id', $result->activeSession())
    //         ->where('semester', $result->activeSemester())
    //         ->get();

    //     if(count($sem_reg) > 0)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }// end hasResultSemesterRegistration()

    // public function hasApprovedSemesterResults($session_id,$semester)
    // {
    //     $results = RegisteredCourse::where('student_id',$this->id)
    //         ->where('session_id', $session_id)
    //         ->where('semester', $semester)
    //         ->where('status', 7)
    //         ->get();

    //     if(count($results) > 0)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }// end hasSemesterResults($session_id,$semester)

    // public function approvedSemesterResults($session_id,$semester)
    // {
    //     $results = RegisteredCourse::where('student_id',$this->id)
    //         ->where('session_id', $session_id)
    //         ->where('semester', $semester)
    //         ->where('status', 7)
    //         ->get();
    //     return $results;
    // }// end semesterResults($session_id,$semester)


//     public function resultAccess()
//     {
//        $status['error'] = "";
//        $status['value'] = 0;
//         //$ready = array(3949,3950,3951,3952,3963,3966,3982,3993,4014,4042,4059,4060,4086,4107,4116,4124,4140,4144,4159,4177,4199,4211,4230,4244,4247,4260,4261,4297,4298,4333,4359,4362,4384,4407,4414,4444,4453,4462,4471,4553,4561,4563,4689,4693,4725,4730,4735,4752,4769,4793,4800,4813,4849,4912,4987,4086,3236,3268,3272,3286,3308,3316,3376,3407,3442,3459,3461,3476,3634,3068,3079,3080,3083,3084,3087,3091,3093,3094,3095,3096,3098,3099,3100,3109,3111,3112,3116,3126,3132,3145,3163,3195,3204,3209,3216,4449,4676,4859,4818,4838,4919,4909,4251,3974,4082,4015,4440,4970,4894,4892,4889,4875,4873,4860,4853,4796,4841,4829,4632,4805,4685,4604,4677,4655,4441,4789,4790,4687,4669,4416,4665,4376,4580,4455,4459,4380,4479,4532,4040,4569,4461,4540,4258,4371,4348,4355,4340,4320,4181,4313,4227,4262,4263,4198,4268,4282,4214,4208,4225,4207,4056,4200,4193,4192,4190,4191,4179,3902,4099,4142,3975,3985,3998,4120,3881,4075,3920,4027,4049,3962,3970,4020,3875,3808,3310,3960,4334,4281,4579,3971,3973,3988,3922,4115,4118,4195,4317,4420,4443,4539,4732,4755,4599,4594,4596,4872,3918,4095,4295,4305,4306.4302,4460,1964,2264,1986,2039,1981,2048,2264,4734,4879,4037,3997,3894,3612,2516,3625,3989,4438,4163,2329,2233,2294,4915,4988,4990,4991,3651,4974,4973,4972,4969,4929,4964,4966,4968,4918,4821,4914,4822,4845,4854,4870,4876,4885,4887,4893,4803,4819,4812,4808,4807,4741,4801,4747,4758,4764,4768,4770,4778,4782,4797,4698,4728,4699,4703,4704,4707,4708,4716,4724,4727,4666,4694,4667,4668,4678,4679,4682,4683,4686,4688,4635,4663,4650,4636,4644,4645,4617,4607,4602,4570,4550,4602,4595,4584,4581,4578,4574,4503,4558,4551,4541,4543,4490,4488,4481,4477,4472,4468,4465,4379,4456,4446,4436,4433,4430,4423,4415,4405,4398,4381,4575,4378,4375,4374,4372,4364,4354,4351,4345,4344,4339,4276,4311,4309,4277,4284,4294,4296,4304,4273,4272,4270,4256,4248,4243,4232,4204,4215,4155,4202,4196,4194,4188,4186,4175,4174,4172,4167,4074,4154,4153,4106,4108,4110,4114,4105,4128,4149,3999,4070,4035,4032,4023,4022,4017,4002,4001,3932,3986,3984,3981,3980,3969,3947,3955,3941,3940,3935,3882,3910,3878,3873,3872,3868,3866,3823,2661,2523,2676,2680,2681,2719,2744,2765,2766,2771,2782,2793,2810,2648,2816,3069,2826,2866,2967,2991,2999,3008,3105,3118,3355,3710,3462,2601,2523,2537,2551,2557,2576,2583,2596,4858,4900,4413,4738,4809,4761,4729,4603,4577,4697,4740,4656,4623,4590,4546,4576,4572,4523,4389,4346,4343,4363,4365,4357,4349,4265,4266,4240,4236,4213,4135,4134,4117,4119,4102,4104,4097,4077,3939,3934,3912,3930,3909,3987,3911,3898,2575,3192,3214,3237,3269,3278,3281,3283,3311,3317,3319,3324,3368,3373,3403,3447,3457,3470,3497,3503,3506,3509,3571,3575,3587,3591,3606,3608,3609,3610,3624,3631,3674,3721,3821,4792,4984,2734,2777,2564,2570,2615,2554,2565,2871,2834,2988,2569,2567,2595,2832,2749,2562,2687,2572,2579,2970,3005,2399,3821,3680,3681,2627,3662,3371,3227,3507,4513,4072,4112,2599,3919,2543,2599,3919,3076,3077,3078,3113,3117,3073,3076,3077,3078,3113,3117,3123,3161,3234,3296,3349,3367,3402, 3408, 3443, 3469, 3521, 3533, 3567, 3593, 3613, 3632, 3637, 3643, 3646, 3654, 3675, 3693, 3700, 3705, 3747, 3750, 3811, 3073, 3076, 3077, 3078,3117, 3123, 3161, 3234, 3296, 3349, 3357, 3367, 3408, 3443, 3521, 3533, 3567, 3593, 3613, 3632, 3637, 3643, 3646, 3654, 3675, 3693, 3700, 3705, 3747, 3750, 3811, 3073, 3076, 3077, 3078, 3113, 3117, 3123, 3161, 3234, 3296, 3349, 3357, 3367, 3408, 3443, 3521, 3533, 3567, 3593, 3613, 3632, 3637, 3643, 3646, 3654, 2518, 2541, 2585, 2593, 2636, 2639, 2664, 2697, 2698, 2701, 2712, 2735, 2761, 2762, 2781, 2795, 2798, 2804, 2807, 2831, 2842, 2843, 2843, 2860, 2861, 2862, 2874, 2883, 2944, 2976, 2985, 1935, 1937, 1941, 1949, 1950, 1967, 1968, 1970, 1984, 1985, 1999, 2013, 2062, 2071, 2096, 2098, 2107, 2108, 2247, 2255, 2258, 2259, 2268, 2365,2297, 2366, 2372, 2404, 2017, 2721, 2779, 2848, 2932, 4794, 4637, 4396, 4390, 4739, 4514, 4516, 4111, 3926, 4052, 4011, 3884, 3923, 3538, 4390, 3594, 3704, 3551, 3092, 3106, 3320, 3256, 3488, 3489, 3406, 3502, 3537, 3134, 3678, 3114, 3011, 2995, 2114, 2555, 2723, 2219, 1687, 2489, 2972, 2253, 2195, 2487, 2488, 2005, 3877, 2607, 2727, 3086, 3158, 2847, 4216, 2607, 2727, 3086, 3158, 2847,1771,1881,1884,1887,1908,1890,1916,1926,1925,1927,1943,1944,1961,2008,2022,2029,2035,2036,2064,2134,2271,2283,2287,2332,2375,2925,1513,1610,1632,1882,1886,1888,1893,1895,1931,1932,1963,1978,1979,1980,1995,2070,2072,2073,2075,2076,2077,2083,2085,2086,2092,2094,2097,2099,2100,2103,2177,2196,2200,2213,2222,2225,2256,2267,2330,2381,2396,2850,3102, 3144, 3159, 3160, 3162, 3164, 3173, 3181, 3186, 3191, 3198, 3207, 3223, 3233, 3238, 3241, 3243, 3247, 3259, 3262, 3264, 3273, 3277, 3280, 3285, 3288, 3289, 3291, 3300, 3303, 3304, 3313, 3328, 3341, 3480, 3494, 3514, 3520, 3540, 3566, 3583, 3585, 3588, 3600, 3603, 3604, 3647, 3656, 3665, 3669, 3676, 3692,3702,3703,3777,3790,3815,3860,3964,3965,4069,4183,4201,4275,4399,4497,4531,4737,4828,4874,4814,4706,4492,4057,4004,3879,3862,3879,3862,4814,4706,4492,4057,3416,3755,3756,3757,3758,3759,3760,3761,3762,3763,3802,3803,3804,3805,3806,3809,3416,3755,3756,3757,3758,3759,3760,3761,3762,3763,3802,3803,3804,3805,3806,3809,3416,3755,3756,3757,3758,3759,3760,3761,3762,3763,3802,3803,3804,3805,3806,3809,4162,3416,3755,3756,3757,3758,3759,3760,3761,3762,3763,3802,3803,3804,3805,3806,3809,4162,2833,2887,2966,2905,2890,2891,2892,2893,2894,2895,2896,2897,2898,2899,2900,2901,2902,2903,2904,2913,2906,2907,2908,2909,2910,2911,2912,3856,2914,2915,2916,2917,2919,2920,2921,2922,2938,2939,3728,3844,3845,3846,3847,3848,3849,3850,3851,3852,3853,3854,2918,3841,2833,2887,2966,2890,2891,2892,2893,2894,2895,2896,2897,2898,2899,2900,2901,2902,2903,2904,2905,2906,2907,2908,2909,2910,2911,2912,2914,2915,2916,2917,2919,2920,2921,2922,2938,2939,2913,2918,2918,2914,2915,2916,2917,2919,2920,2921,2922,2938,2939,2911,2912,2892,2893,2894,2895,2896,2897,2898,2899,2900,2901,2902,2903,2904,2913,2906,2907,2908,29092833,2887,2966,2905,2890,2918,2938,2939,3728,3787,2914,2915,2916,2917,2919,2920,2921,2910,2911,2906,2907,2908,2892,2893,2894,2895,2896,2897,2898,2899,2900,2901,2902,2903,2904,2833,2887,2966,2905,2890,2833,2887,2966,2905,2890,2892,2893,2894,2895,2897,2898,2899,2900,2901,2902,2903,2904,2913,2906,2907,2908,2909,2910,2911,2912,3856,2914,2915,2916,2917,2919,2920,2921,2922,2938,2939,3728,3844,3845,3846,3847,3848,3849,3850,3851,3852,3853,3854,2918,3841,2833,2887,2966,2905,2890,2891,2892,2893,2894,2895,2896,2897,2898,2899,2900,2901,2902,2903,2904,2913,2906,2907,2908,2909,2910,2911,2912,3856,2914,2915,2916,2917,2919,2920,2922,2938,2939,3841,3844,3845,3846,3847,3848,3849,3850,3851,3852,3853,3854,2918,2156,3808,3310,3960,4334,4909,4919,4838,4859,4818,4676,4449,4251,3974,4082,4015,4440,4894,4892,4889,4875,4873,4860,4853,4796,4841,4829,4632,4805,4685,4604,4441,4655,4677,4790,4687,4669,4416,4665,4580,4040,4569,4461,4540,4532,4479,4380,4459,4455,4376,4371,4348,4355,4340,4320,4313,4282,4268,4198,4263,4262,4258,4181,4227,4208,4207,4225,4214,4200,4193,4192,4190,4191,4179,3902,4099,4142,3975,3985,4056,4120,3881,4075,3920,4049,4027,3962,4020,3875,3998,1897,1901,1924,1928,1947,1972,1974,1976,1988,1989,2010,2032,2055,2060,2089,2101,2102,2115,2150,2236,2237,2289,2299,2334,2337,2345,2352,2852,1099,2924,2841,2277,20453370,3792,3664,3535,3464,3458,3504,3168,3187,3353,3577,3340,3559,3499,3194,3147,3295,3139,3635,3696,3477,4555,3565,3473,3796,3639,3820,3258,3471,3183,4176,3107,4000,3070,3178,3110,3090,3889,3889,3904,3916,3917,3925,3943,3944,3945,4005,4012,4053,4055,4062,4064,4065,4079,4081,4085,4088,4132,4136,4137,4145,4146,4148,4170,4209,4210,4220,4234,4235,4239,4241,4242,4245,4249,4287,4289,4318,4397,4402,4404,4406,4410,4419,4425,4426,4451,4495,4971,4616,4910,4400,4847,4840,4820,4403,4593,4780,4745,4776,4508,4537,4418,4448,4279,4205,4026,4050,4047,3885,4025,3928,3929,3994,3427,3154,3305,3388,3515,3299,3228,3298,3369,3445,3321,3638,3225,4291,3369,2671,2997,2475,2524,2531,2539,2600,2613,2620,2623,2624,2669,2671,2688,2703,2743,2747,2751,2884,2855,2418,2997,3013,1885,1903,2189,2209,2221,4076,4467,2532);
//         //disable in ict approval
//         $ready = array();
//         if(!in_array($this->id,$ready))
//         {
//             if($this->debt AND $this->debt->debt > config('app.DEBT_LIMIT'))
//             {
//                 $status['error'] = "This page has been disabled because of your financial status.
//                     If your debt information is not correct, kindly call Bursary immediately.
// Call Bursary on ".config('app.BURSARY_PHONE');
//                 $status['value'] = -1;

//             }
//             else{
//                 $status['error'] = "";
//                 $status['value'] = 1;
//             }
//         }
//         else{
//             $status['error'] = " Semester result is currently not available. Kindly contact your department. ";
//             $status['value'] = -2;
//         }

//        return $status;
//     }// end resultAccessf

public function matricNumber(): Attribute
{
    return Attribute::make(
        get: fn ($value, $attributes) => StudentAcademic::where('student_id', $attributes['id'])->first()?->mat_no
    );
}
} // end Class Student
