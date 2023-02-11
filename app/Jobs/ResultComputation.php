<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\RegisteredCourse;
use App\Models\Result;
use App\Student;
use App\StudentAcademic;
use Illuminate\Bus\Batchable;
use Illuminate\Support\Facades\Log;

class ResultComputation implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable; //SerializesModels;
    public $program_id, $session, $level, $semester, $student;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($program_id, $session, $level, $semester, $student)
    {
        $this->session = $session;
        $this->level = $level;
        $this->semester = $semester;
        $this->student = $student;
        $this->program_id = $program_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $session = $this->session;
        $level = $this->level;
        $semester = $this->semester;
        $student = $this->student;
        $program_id = $this->program_id;
        //$student_aca = StudentAcademic::where('student_id', $student->student_id)->first();

        $result = [
            'result_id' => $student->student_id. $session.$level.$semester,
            'student_id' => $student->student_id,
            'program_id' => $program_id,
            'session_id' => $session,
            'level' => $level,
            'semester' => $semester,
            'tcu' => $this->getCurrentTCU($student->student_id, $session, $semester),
            'tgp' => $this->getCurrentTGP($student->student_id, $session, $semester),
            'gpa' => $this->computeGPA($student->student_id, $session, $semester),
            'cgpa' => $this->computeCGPA($student->student_id, $session, $semester),
            'status' => 'published'
        ];

        Log::info('TCU: '.$result['tcu']);
        Log::info('TGP: '.$result['tgp']);
        Log::info('GPA: '.$result['gpa']);
        Log::info('cgpa: '.$result['cgpa']);
        Result::updateOrCreate(['result_id' => $result['result_id']], $result);
    }

    public function getCurrentTCU($student_id, $session, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('session', $session)
            ->where('semester', $semester)
            ->get();

        $total_unit = 0;
        foreach ($registered_courses as $registered_course) {
            $total_unit += $registered_course->course_unit;
        }

        return $total_unit;
    }

    public function getCurrentTGP($student_id, $session, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('session', $session)
            ->where('semester', $semester)
            ->get();

        $total_gp = 0;
        foreach ($registered_courses as $registered_course) {
            $total_gp += ($registered_course->grade_point * $registered_course->course_unit);
        }

        return $total_gp;
    }

    public function getTCU($student_id, $session, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
        ->where('session', $session)
        ->where('semester', $semester)
        ->orWhere(function ($q) use ($session,$semester) {
            $q->where('session', '<', $session)
            ->where('semester', '>=', $semester);
        })
        ->get();

        $total_unit = 0;
        foreach ($registered_courses as $registered_course) {
            $total_unit += $registered_course->course_unit;
        }

        return $total_unit;
    }

    public function getTGP($student_id,$session, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
        ->where('session', $session)
        ->where('semester', $semester)
        ->orWhere(function ($q) use ($session,$semester) {
            $q->where('session', '<', $session)
            ->where('semester', '>=', $semester);
        })
        ->get();

        $total_gp = 0;
        foreach ($registered_courses as $registered_course) {
            $total_gp += ($registered_course->grade_point * $registered_course->course_unit);
        }

        return $total_gp;
    }

    public function computeGPA($student_id, $session, $semester)
    {
        $tcu = $this->getCurrentTCU($student_id, $session, $semester);
        $tgp = $this->getCurrentTGP($student_id, $session, $semester);

        if ($tcu == 0) {
            return 0;
        }

        return round($tgp / $tcu, 2);
    }

    public function computeCGPA($student_id, $session, $semester)
    {
        $tcu = $this->getTCU($student_id, $session, $semester);
        $tgp = $this->getTGP($student_id, $session, $semester);

        if ($tcu == 0) {
            return 0;
        }

        return round($tgp / $tcu, 2);
    }

}
