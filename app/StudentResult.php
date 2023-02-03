<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentResult extends Model
{
    //

    //
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    //
    public function session()
    {
        return $this->hasMany('App\Session', 'session_id');
    }

    //
    public function programCourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }

    public function RegisteredCourse()
    {
        return $this->belongsTo('App\Models\RegisteredCourse', 'course_id');
    }

    public function evaluations()
    {
        return $this->hasMany('App\EvaluationResult');
    }
    //

    public function activeSemester()
    {
       return 1;
    }

    public function activeSession()
    {
        return 14;
    }

    public function modifiedBy()
    {
        return $this->belongsTo('App\Staff', 'modified_by');
    }
    public function getGradeAttribute()
    {

        $session = $this->session_id;
        $score = $this->total;
        // for session before 2013 / 2014
        if($session < 6)
        {

            if($score >= 70)
            {
                $gp = "A";
            }
            else if($score >= 60)
            {
                $gp = "B";
            }
            else if($score >= 50)
            {
                $gp = "C";
            }
            else if($score >= 45)
            {
                $gp = "D";
            }
            else if($score >= 40)
            {
                $gp = "E";
            }
            else if($score >= 0)
            {
                $gp = "F";
            }
            else
            {
                $gp = "-";
            }

            return $gp;

        } // end if($session < 6)


        //for session from  2013 / 2014
        else
        {
            if($score >= 70)
            {
                $gp = "A";
            }
            else if($score >= 60)
            {
                $gp = "B";
            }
            else if($score >= 50)
            {
                $gp = "C";
            }
            else if($score >= 45)
            {
                $gp = "D";
            }
            else if($score >= 0)
            {
                $gp = "F";
            }
            else
            {
                $gp = "-";
            }
            return $gp;

        } // end else
    } // end grade attribute

    public function getPassStatusAttribute()
    {

        $session = $this->session_id;
        $score = $this->total;

        // for session before 2013 / 2014
        if($session < 6)
        {

            if($score >= 40)
            {
                $status = "Pass";
            }

            else
            {
                $status = "Fail";
            }

            return $status;

        } // end if($session < 6)


        //for session from 2013 / 2014
        else
        {

            if($score >= 45)
            {
                $status = "Pass";
            }

            else
            {
                $status = "Fail";
            } // end else

            return $status;

        } // end else

    } // end getPassStatusAttribute()



    public function getPointsAttribute()
    {
        $session = $this->session_id;
        $score = $this->total;
        $credit = $this->programCourse->hours;
        $value = $this->getUnitValue($score,$session);
        $points = $value * $credit;
        return $points;
    } // end getPointsAttribute()



    public function getPassedCourses($student)
    {
        $passed = \Cache::remember('get_passed_courses', env("CACHE_TIME", "360"), function () use ($student) {
            return StudentResult::with(['programCourse','student'])->where('student_id',$student->id)
        ->where('total','>=',45)
        ->get();
        });
       return $passed;
    }


    public function getFailedCourses($student)
    {
        $failed = \Cache::remember('get_failed_courses', env("CACHE_TIME", "360"), function () use ($student) {
            return StudentResult::with(['programCourse','student'])->where('student_id',$student->id)
        ->where('total','<',45)
        ->get();
        });

        return $failed;
    }


    public function checkResit($passed)
    {
        //check if course id is the same
        foreach ($passed as $key => $p)
         {
            if($this->programCourse->course->id === $p->programCourse->course->id)
            {
            return true;
            }
         }

      }

      public function checkRegistered($student)
      {
          //get all courses taken by student with a pass
          $registered = $this->studentRegisteredCourses($student);

          //check if course id is the same
          foreach ($registered as $key => $r)
          {
              if($this->programCourse->course->id === $r->programCourse->course->id)
              {
                  return true;
              }
          }

      }


      public function freshCourse($fresh_courses)
    {
         //check if course id is the same
        foreach ($fresh_courses as $key => $pc)
        {
            if($this->programCourse->course->id === $pc->course->id)
            {
                return $pc;
            }
        }

       }

       public function studentRegisteredCourses($student_id)
       {
          $session = new Session();
           $results = $this::with(['programCourse','programCourse.course'])
           ->where('session_id', $session->currentSession())
           ->where('semester', $session->courseRegSemester())
           ->where('student_id', $student_id)
               ->whereHas('programCourse')
           ->orderBy('id','DESC')
           ->get();
           return $results;

       }


       public function semesterRegisteredCourses($student_id, $session_id, $semester)
       {

          $results = $this::with(['programCourse','programCourse.course'])
           ->where('session_id', $session_id)
           ->where('semester', $semester)
           ->where('student_id', $student_id)
              ->whereHas('programCourse')
           ->get();
           return $results;

       }




       public function gpa($student_id,$session_id,$semester)
       {
           $results = $this->with('RegisteredCourse')->where('student_id',$student_id)->where('session',$session_id)
           ->where('semester',$semester)
        //    ->where('status','publishd')
               ->whereHas('RegisteredCourse')->get();
           $hours = 0;
           $units = 0;

           foreach ($results as $result)
           {
              // if($results->programCourse) {
                   $hours += $result->programCourse->hours;
                   $unit_value = $this->getUnitValue($result->total, $session_id);
                   $units += ($unit_value * $result->programCourse->hours);
               //}
           } // end foreach

           if($hours != 0)
           {
               $value = $units / $hours;
           }
           else
           {
               $value = 0.00;
           }

           $value = round($value,2);
           $value = number_format(round($value,2),2,'.', '');

           $gpa = collect([]);
           $gpa->value = $value;
           $gpa->hours = $hours;
           $gpa->units= $units;

           return $gpa;
       } // gpa



    public function unApprovedGPA($student_id,$session_id,$semester)
    {
        $results = $this->with('programCourse')
            ->where('student_id',$student_id)
            ->where('session_id',$session_id)
            ->where('semester',$semester)
            ->whereHas('programCourse')
            ->get();
        $hours = 0;
        $units = 0;
        foreach ($results as $result)
        {
            // if($results->programCourse) {
            $hours += $result->programCourse->hours;
            $unit_value = $this->getUnitValue($result->total, $session_id);
            $units += ($unit_value * $result->programCourse->hours);
            //}
        } // end foreach

        if($hours != 0)
        {
            $value = $units / $hours;
        }
        else
        {
            $value = 0.00;
        }

        $value = round($value,2);
        $value = number_format(round($value,2),2,'.', '');

        $gpa = collect([]);
        $gpa->value = $value;
        $gpa->hours = $hours;
        $gpa->units= $units;

        return $gpa;
    } // unApprovedGPA


    public function cgpa($student_id,$session_id)
       {
           $results = $this->with('programCourse')->where('student_id',$student_id)
           ->where('session_id',$session_id)
           ->where('status',7)
           ->get();

           $hours = 0;
           $units = 0;

           foreach ($results as $result)
           {

               $hours += $result->programCourse->hours;
               $unit_value = $this->getUnitValue($result->total, $session_id);
               $units += ($unit_value * $result->programCourse->hours);

           } // end foreach

           if($hours != 0)
           {
               $value = $units / $hours;
           }
           else
           {
               $value = 0.00;
           }

           $value = number_format(round($value,4),4,'.', '');

           $cgpa = collect([]);
           $cgpa->value = $value;
           $cgpa->hours = $hours;
           $cgpa->units= $units;

           return $cgpa;



       } // cgpa




       function getUnitValue($score, $session_id)
       {

           // for session before 2013 / 2014
           if($session_id < 6)
           {

               if($score >= 70)
               {
                   $gp = 5;
               }
               else if($score >= 60)
               {
                   $gp = 4;
               }
               else if($score >= 50)
               {
                   $gp = 3;
               }
               else if($score >= 45)
               {
                   $gp = 2;
               }
               else if($score >= 40)
               {
                   $gp = 1;
               }
               else
               {
                   $gp = 0;
               }

               return $gp;

           } // end if($session < 6)


           //for session from 2013 / 2014
           else
           {


               if($score >= 70)
               {
                   $gp = 5;
               }
               else if($score >= 60)
               {
                   $gp = 4;
               }
               else if($score >= 50)
               {
                   $gp = 3;
               }
               else if($score >= 45)
               {
                   $gp = 2;
               }
               else
               {
                   $gp = 0;
               }

               return $gp;


           } // else

       } // end getUnitValue($score)




       public function currentCGPA($student_id,$session_id,$semester)
       {

           $level = SemesterRegistration::where('student_id',$student_id)
           ->where('session_id',$session_id)->where('semester',$semester)
           ->get()->first()->level;

           //get registrations done below the level

           $formerReg = SemesterRegistration::where('student_id',$student_id)
           ->where('level','<',$level)->get();



           $hours = 0;
           $units = 0;


           foreach($formerReg as $key => $reg)
           {
               $gpa = $reg->gpa();
               $hours += $gpa->hours;
               $units += $gpa->units;
           }


           if($semester == 1)
           {
               $gpa = $this->gpa($student_id, $session_id, 1);
               $hours += $gpa->hours;
               $units += $gpa->units;
          }
           else
           {
               $gpa1 = $this->gpa($student_id, $session_id, 1);
               $gpa2 = $this->gpa($student_id, $session_id, 2);
               $hours += $gpa1->hours + $gpa2->hours;
               $units += $gpa1->units + $gpa2->units;
          }


           if($hours !== 0)
           {
               $value = $units / $hours;
           }
           else
           {
               $value = 0.00;
           }

           $value = number_format(round($value,2),2,'.', '');

           $cgpa = collect([]);
           $cgpa->value = $value;
           $cgpa->hours = $hours;
           $cgpa->units= $units;

           return $cgpa;

       } // currentCGPA


    public function evaluated()
    {
        $evaluation = EvaluationResult::where('student_result_id',$this->id)
            ->get();
        if(count($evaluation) > 0)
        {
            return "Evaluated";
        }
        else
            {
            return "<a class='btn btn-info' href='".route('student.result-evaluation',base64_encode($this->id))."'> Evaluate </a>";
        }

    }

    public function evaluatedResult()
    {
        $evaluation = EvaluationResult::where('student_result_id',$this->id)
            ->get();
        if(count($evaluation) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }





} // end class
