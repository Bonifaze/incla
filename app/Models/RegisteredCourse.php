<?php

namespace App\Models;

use App\Student;
use App\ProgramCourse;
use App\StudentAcademic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisteredCourse extends Model
{


    use HasFactory;

    protected $fillable = [
        'program_id',
        'student_id',
        'session',
        'level',
        'semester',
        'course_id',
        'ca1_score',
        'ca2_score',
        'ca3_score',
        'exam_score',
        'total',
        'grade_id',
        'grade_status',
        'status'
    ];

    protected $appends = ['course_unit', 'course_semester', 'course_title', 'course_code', 'matric_number', 'full_name','result'];

    // public function getCourseUnitAttribute()
    // {
    //     return Course::where('id', $this->course_id)->first()->credit_unit ?? 0;
    // }
//testing stufss
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function getMatricNumberAttribute()
    {
        return StudentAcademic::where('student_id', $this->student_id)->first()?->mat_no;
    }

    public function getFullNameAttribute()
    {
        return Student::find($this->student_id)?->full_name;
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }

    public function getStudentNameAttribute()
    {
        $student = Student::where('id', $this->student_id)->first();
        return "{$student->first_name} {$student->middle_name} {$student->surname}";
    }
//end of testing stuff

    public function getStudentMatricAttribute()
    {
        return StudentAcademic::where('student_id', $this->student_id)->first()->mat_no ?? '';
    }

    // public function getCourseTitleAttribute()
    // {
    //     return Course::where('id', $this->course_id)->first()->course_title;
    // }

    // public function getCourseCodeAttribute()
    // {
    //     return Course::where('id', $this->course_id)->first()->course_code;
    // }

    public function getGradeAttribute()
    {
        return GradeSetting::where('id', $this->grade_id)->first()->grade ?? 'NA';
    }

    public function getGradePointAttribute()
    {
        return GradeSetting::where('id', $this->grade_id)->first()->point ?? 0;
    }

    public function getCourseUnitAttribute()
    {
        return ProgramCourse::where('program_id', $this->program_id)
        ->where('course_id', $this->course_id)
        ->where('session_id',$this->session)
        ->first()->credit_unit ?? 0;
    }

    public function getCourseSemesterAttribute()
    {
        return Course::where('id', $this->course_id)->first()->semester ?? 0;
    }

    public function getCourseTitleAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_title ?? '';
    }

    public function getCourseCodeAttribute()
    {
        return Course::where('id', $this->course_id)->first()->course_code ?? '';
    }
    public function getCourseCategoryAttribute()
    {
        return ProgramCourse::where('id', $this->course_id)->first()->course_category ?? '';
    }
    public function programCourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }

    public function RegisteredCourse($student_id, $session, $semester)
       {

          $results = $this::with(['ProgramCourse','programCourse.course'])
           ->where('session', $session)
           ->where('semester', $semester)
           ->where('student_id', $student_id)
              ->whereHas('ProgramCourse')
           ->get();
           return $results;

       }

}
