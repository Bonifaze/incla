<?php

namespace App\Models;

use App\Student;
use App\ProgramCourse;
use App\Staff;
use App\Program;
use App\StudentAcademic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class RegisteredCourse extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
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
        'status',
        'staff_id',


    ];

    protected $appends = ['course_unit', 'course_semester', 'course_title', 'course_code', 'matric_number', 'full_name','result', 'grade_point'];

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
    public function modifiedBy()
    {
        return $this->belongsTo('App\Staff', 'modifiy_by');
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
    public function sessions()
    {
        return $this->belongsTo('App\Session', 'session');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function getStudentNameAttribute()
    {
        $student = Student::where('id', $this->student_id)->first();
        return "{$student->first_name} {$student->middle_name} {$student->surname}";
    }
//end of testing stuff
public function getPogramNameAttribute()
{
    $program = Program::where('id', $this->program_id)->first();
    return $this->program->name;
}
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
        return ProgramCourse::where('course_id', $this->course_id)
        // ->orderBy('id', 'DESC')
        ->where('program_id', $this->program_id)->where('session_id',$this->session)
        ->first()?->credit_unit;
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

    public function getStatusAttribute()
    {
        return RegisteredCourse::where('course_id', $this->course_id)->first()->status ?? '';
    }


    public function programCourse()
    {
        return $this->belongsTo('App\ProgramCourse', 'course_id');
    }


    public function programCoursep()
    {
        return $this->belongsTo('App\ProgramCourse','course_id', 'course_id')->orderBy('level','ASC');
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



    public function results()
    {
        $student_id = $this->student_id;
        $session_id = $this->session_id;
        $semester = $this->semester;


        $results = RegisteredCourse::where('student_id',$student_id)
        ->where('session',$session_id)
        ->where('semester',$semester)
        //->where('status',7)
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
        ->where('status',7)
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

    public function getResultAttribute()
    {
        // Logic to calculate and return the result attribute based on your model's fields
        return $this->ca2_score + $this->ca3_score + $this->ca1_score + $this->exam_score;
    }



    public function program()
    {
        return $this->belongsTo('App\Program', 'program_id');
    }

    public function courses()
    {
        return $this->belongsTo('App\course', 'course_id');
    }

    public function staffCourse()
    {
        return $this->belongsTo('App\Models\StaffCourse', 'staff_id');
    }

}
