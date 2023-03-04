<?php

namespace App;

use App\Models\Course;
use App\Models\StaffCourse;
use App\Models\RegisteredCourse;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class ProgramCourse extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    //
    public function program()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }

    public function college()
    {
        return $this->belongsTo('App\College', 'college_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    public function programcourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session', 'session_id');
    }

    public function lecturer()
    {
        return $this->belongsTo('App\Staff', 'lecturer_id');
    }

    public function staff()
    {
        $session = new Session();
        return $this->belongsTo('App\Models\StaffCourse', 'program_id','course_id');

    }

    public function results()
    {
        return $this->hasMany('App\Course')
            ->orderBy('student_id','ASC');
    }

    public function registeredCourse()
    {
        return $this->hasMany('App\Models\RegisteredCourse', 'student_id','seesion_id')
         ->orderBy('student_id','ASC');

    }

    public function staffCourses()
    {
        return $this->belongsTo('App\Models\StaffCourse', 'course_id');

        //  ->where('vc_senate_approval', 'approved');
    }




    public function studentFreshCourses($student)
    {

        $session = new Session();
        $semester = $session->courseRegSemester();
        $program_courses = $this::with(['course'])
        ->where('session_id', $session->currentSession())
        ->where('semester', $semester)
        ->where('program_id',$student->academic->program_id)
        ->where('level',$student->academic->level)
        ->whereDoesntHave('programCourse', function ($query) use($session,$student,$semester) {
            $query->where('session_id', $session->currentSession())
            ->where('semester', $semester)
            ->where('student_id', $student->id);
        })
        ->get();
        return $program_courses;

    }


    public function studentCarryOverCourses($student)
    {

        $session = new Session();
        $semester = $session->courseRegSemester();
        $program_courses = $this::with('course')
        ->where('session_id', $session->currentSession())
        ->where('semester', $semester)
        ->where('program_id',$student->academic->program_id)
        ->where('level','<',$student->academic->level)
        ->orderBy('level','DESC')
        ->whereDoesntHave('results', function ($query) use($session,$student,$semester) {
            $query->where('session_id', $session->currentSession())
            ->where('semester', $semester)
            ->where('student_id', $student->id);
        })
        ->get();

        // join table to ensure the program course id doesn't exist

        return $program_courses;

    }

    // run analytics to figure out courses that was registered, not registered and passed, and not currently registered.
    public function studentOutstandingCourses($student)
    {
        $result = new StudentResult();
        $session = new Session();

        //get student program courses passed
        $passed = $result->getPassedCourses($student);

        //get student program courses failed
        $failed = $result->getFailedCourses($student);

        //get available courses for this semester based on student program
        $fresh_courses = $this->getFreshCourses($student);

        //get courses registered by the student this semester
        $registered = $result->studentRegisteredCourses($student);



        //create empty collection
        $out = collect();


        // for each failed course, look for result program course with the same course id that was passed
       foreach ($failed as $key => $f)
        {
            $status = $f->checkResit($passed);

           //if none passed was found
           if($status !== true)
           {
               //check if the course is available
               $pcourse = $f->freshCourse($fresh_courses);
               if($pcourse !== false AND $pcourse != null)
               {
                  // call check registered
                   if(!$pcourse->checkRegistered($registered))
                   {
                  // if not registered: push
                   $out->push($pcourse);
                   }
               }

           }
        }

        return $out;
    }



    public function checkRegistered($registered)
    {
        //check if course id is the same
        foreach ($registered as $key => $r)
        {
            if($this->course->id === $r->programCourse->course->id)
            {
                return true;
            }
        }

    } // checkRegistered($student)




    public function getFreshCourses($student)
    {
        //get all courses available for the student to take
        $session = new Session();
        $program_courses = \Cache::remember('get_fresh_courses', env("CACHE_TIME", "360"), function () use ($student,$session) {
            return ProgramCourse::with(['course','results','session'])->where('session_id', $session->currentSession())
        ->where('semester', $session->courseRegSemester())
        ->where('program_id',$student->academic->program_id)
        ->get();

        });

        return $program_courses;

    } //getFreshCourses($student)



    public function oldStudentFreshCourses($student, $session,$semester,$level)
    {

        $program_courses = $this::with(['course'])
        ->where('session_id', $session->id)
        ->where('semester', $semester)
        ->where('program_id',$student->academic->program_id)
        ->where('level',$level)

        ->get();
        return $program_courses;

    }


    public function oldStudentCarryOverCourses($student, $session,$semester,$level)
    {

        $program_courses = $this::with('course')
        ->where('session_id', $session->id)
        ->where('semester', $semester)
        ->where('program_id',$student->academic->program_id)
        ->where('level','<',$level)
        ->orderBy('level','DESC')

        ->get();

        // join table to ensure the program course id doesn't exist

        return $program_courses;

    }

    public function getStatusAttribute()
    {

        $approval = $this->approval;

       if($approval == 0)
            {
                $status = "Class Ongoing";
            }
            else if($approval == 1)
            {
                $status = "Result Submited by Lecturer";
            }
            else if($approval == 2)
            {
                $status = "Approved by Department";
            }
            else if($approval == 3)
            {
                $status = "Approved by Faculty";
            }
            else if($approval == 7)
            {
                $status = "Result Available to Students";
            }
            else
            {
                $status = "Result Status Unknown";
            }

            return $status;

    } // end grade attribute

public function getActionAttribute()
{
    $approval = $this->approval;

    if($approval == 0)
    {
        $action = "Class Ongoing";
    }
    else if($approval == 1)
    {
        $action = "Awaiting Departmental Approval";
    }
    else if($approval == 2)
    {
        $action = "Awaiting Faculty Approval";
    }
    else if($approval == 3)
    {
        $action = "Awaiting Senate Approval";
    }

    else if($approval == 7)
    {
        $action = "Result Available to Students";
    }
    else
    {
        $action = "Result Status Unknown";
    }

    return $action;

} // end getActionAttribute

    public function activeCourseOwner($staff_id)
    {
       if($this->lecturer_id != $staff_id OR $this->approval > 1)
       {
           return false;
       }
       else if($this->lecturer_id == $staff_id AND $this->approval <= 1)
       {
           return true;
       }
    } // end courseOwner

    public function statusColor()
    {
        $approval = $this->approval;

        if($approval == 0)
        {
            $color = "style='background-color:red'";
        }
        else if($approval == 1)
        {
            $color = "style='background-color:orange'";
        }
        else if($approval == 2)
        {
            $color = "style='background-color:teal'";
        }
        else if($approval == 3)
        {
            $color = "style='background-color:green'";
        }
        else if($approval == 7)
        {
            $$color = "style='background-color:green'";
        }
        else
        {
            $color = "style='background-color:black'";
        }

        return $color;
    }

    public function getCourseTitleAttribute()
    {
        return Course::find($this->course_id)?->course_title;
    }

    public function getCourseCodeAttribute()
    {
        return Course::find($this->course_id)?->course_code;
    }


    public function getStaffNameAttribute()
    {
        return StaffCourse::where('program_id', $this->program_id)->where('course_id', $this->course_id)->first()?->staff_name;
    }

    public function isApproved(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('course_id', $attributes['course_id'])->where('program_id', $attributes['program_id'])->where('session_id', $attributes['session_id'])->where('hod_approval', 'approved')->exists()
        );
    }

    public function staffCourseId(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('course_id', $attributes['course_id'])->where('program_id', $attributes['program_id'])->where('session_id', $attributes['session_id'])->first()?->id ?? 0
        );
    }

    public function staffCourseStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('course_id', $attributes['course_id'])->where('program_id', $attributes['program_id'])->where('session_id', $attributes['session_id'])->first()?->upload_status ?? 'Not Uploaded'
        );
    }
    public function staffCourseName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('course_id', $attributes['course_id'])->where('program_id', $attributes['program_id'])->where('session_id', $attributes['session_id'])->first()?->staff_id ?? 0
        );
    }


    protected $appends = ['course_title', 'course_code', 'staff_name'];


} // end class
