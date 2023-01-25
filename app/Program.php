<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //

    public function department()
    {
        return $this->belongsTo('App\AcademicDepartment', 'academic_department_id');
    }

    public function studentAcademic()
    {
        return $this->hasMany('App\StudentAcademic', 'program_id');
    }

    public function programCourses()
    {
        return $this->hasMany('App\ProgramCourse');
    }

    public function undergraduates()
    {
        return $this->hasMany('App\StudentAcademic', 'program_id')
        ->where('level','<',700)->where('status',1);
   }

   public function postgraduates()
   {
       return $this->hasMany('App\StudentAcademic', 'program_id')
       ->where('level','>',600)->where('status',1);
   }

    public function students($level)
    {
       $students = Student::with('academic')->withCount('academic')
           ->whereHas('academic', function($query) use ($level) {
                return $query->where('level', $level)->where('program_id',$this->id);
            })->get();

        return $students;
    }


    public function staffCount($academic_dept_id)
    {
        $academic = AcademicDepartment::findOrFail($academic_dept_id);
        $admin = $academic->admin;
        $staff = StaffWorkProfile::where('admin_department_id', $admin->id)
            ->count();
        return $staff;
    }



    public function registeredStudentsCount($level)
    {
        $session = new Session();

        if ($level == 1000)
        {
            $students = Student::distinct('students.id')
                ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
                ->join('registered_courses', 'student_academics.student_id', '=', 'registered_courses.student_id')
                ->where('registered_courses.session',$session->currentSession())
              //  ->where('registered_courses.semester', $session->currentSemester())
                ->where('student_academics.program_id',$this->id)
                ->where('student_academics.level','<',$level)
                ->count();
            return $students;
        }
        else
        {
            $students = Student::distinct('students.id')
                ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
                ->join('registered_courses', 'student_academics.student_id', '=', 'registered_courses.student_id')
                ->where('registered_courses.session',$session->currentSession())
              //  ->where('registered_courses.semester', $session->currentSemester())
                ->where('student_academics.program_id',$this->id)
                ->where('student_academics.level',$level)
                ->count();
            return $students;
        }


    }

    public function registeredStudents($level)
    {
        $session = new Session();
        $students = Student::distinct('students.id')->with(['contact','academic'])
            ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
            ->join('registered_courses', 'student_academics.student_id', '=', 'registered_courses.student_id')
            ->where('registered_courses.session',$session->currentSession())
            ->where('registered_courses.semester', $session->currentSemester())
            ->where('student_academics.program_id',$this->id)
            ->where('student_academics.level',$level)
            ->orderBy('students.id','DESC')
            ->get();

        return $students;
    }

    public function levelCoursesCount($level)
    {
        $session = new Session();
        $courses = ProgramCourse::where('program_id',$this->id)
            ->where('session_id', $session->currentSession())
          // ->where('semester',$session->currentSemester())
            ->where('level',$level)
            ->count();

        return $courses;
    }


    public function adminDepartment()
    {
        return $this->department->admin;

    }

    public function vcReadyProgramCourses($session,$semester, $level = 1000)
    {
        $query = ProgramCourse::where('session',$session)
            ->where('semester',$semester)
            ->where('program_id',$this->id)
            ->where('approval','>=',2)
            ->where('approval','<',7)
            //->where('level','<',700)
            ->whereHas('results');
        if($level == 1000){
            $program_courses = $query->get();
        }
        else{
            $program_courses = $query->where('level','=',$level)->get();
        }

        return $program_courses->count();
    }

    public function vcNotReadyProgramCourses($session,$semester, $level = 1000)
    {
        $query = ProgramCourse::where('session',$session)
            ->where('semester',$semester)
            ->where('program_id',$this->id)
            ->where('approval','<',2)
            //->where('level','<',700)
            ->whereHas('results');
             if($level == 1000){
                 $program_courses = $query->get();
             }
             else{
                 $program_courses = $query->where('level','=',$level)->get();
             }
        return $program_courses->count();
    }

    public function vcApprovedProgramCourses($session,$semester, $level = 1000)
    {
        $query = ProgramCourse::where('session',$session)
            ->where('semester',$semester)
            ->where('program_id',$this->id)
            ->where('approval',7)
            //->where('level','<',700)
            ->whereHas('results');
        if($level == 1000){
            $program_courses = $query->get();
        }
        else{
            $program_courses = $query->where('level','=',$level)->get();
        }
        return $program_courses->count();
    }

    public function allregisteredStudentsCount($session,$semester, $level = 1000)
    {
        $query = Student::distinct('students.id')->with(['contact','academic'])
            ->join('student_academics', 'students.id', '=', 'student_academics.student_id')
            ->join('registered_courses', 'student_academics.student_id', '=', 'registered_courses.student_id')
            ->where('registered_courses.session',$session)
            ->where('registered_courses.semester', $semester)
            ->where('student_academics.program_id',$this->id)
            ->orderBy('students.id','DESC');
             if($level == 1000){
                 $students = $query->get();
             }
             else{
                 $students = $query->where('student_academics.level','=',$level)->get();
             }

        return $students->count();
    }


} // end class
