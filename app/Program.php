<?php

namespace App;

use App\Models\StaffCourse;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Program extends Model implements Auditable
{
    //
    use \OwenIt\Auditing\Auditable;

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

    public function VcApproval()
    {
        $session = new Session();
        return $this->hasMany('App\Models\StaffCourse', 'program_id')
        ->where('semester_id', $session->currentSemester())
        ->where('sbc_approval', 'approved');
    }

    public function SbcApproval()
    {
        $session = new Session();
        return $this->hasMany('App\Models\StaffCourse', 'program_id')
        ->where('semester_id', $session->currentSemester())
        ->where('dean_approval', 'approved');
    }

    public function DeanApproval()
    {
        $session = new Session();
        return $this->hasMany('App\Models\StaffCourse', 'program_id')
        ->where('semester_id', $session->currentSemester())
        ->where('hod_approval', 'approved');

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
        $query = ProgramCourse::where('session_id',$session)
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
        $query = ProgramCourse::where('session_id',$session)
            ->where('semester',$semester)
            ->where('program_id',$this->id)
            ->where('approval','<',2);
            //->where('level','<',700)
            // ->whereHas('results');
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


    public function isApproved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('sbc_approval', 'approved')->exists()
        );
    }

    public function isVCApproved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('Vc_senate_approval', 'approved')->exists()
        );
    }

    public function isDEANApproved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }

    public function isDEAN100Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 100)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN200Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 200)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN300Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 300)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN400Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 400)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN500Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 500)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN600Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 600)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN700Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 700)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }
    public function isDEAN800Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 800)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    } public function isDEAN900Approved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('level', 900)->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('dean_approval', 'approved')->exists()
        );
    }

    public function isHODApproved(): Attribute
    {
        $session = new Session();
        return Attribute::make(
            get: fn ($value, $attributes) => StaffCourse::where('program_id', $attributes['id'])->where('session_id', $session->currentSession())->where('semester_id', $session->currentSemester())->where('hod_approval', 'approved')->exists()
        );
    }

} // end class
