<?php 

namespace App\Computations;

use App\Models\RegisteredCourse;
use App\Models\Result;
use App\Student;
use App\StudentAcademic;

class ResultComputation
{
    public function getCurrentTCU($student_id, $level, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('level', $level)
            ->where('semester', $semester)
            ->where('status', 'published')
            ->get();

        $total_unit = 0;
        foreach ($registered_courses as $registered_course) {
            $total_unit += $registered_course->course_unit;
        }

        return $total_unit;
    }

    public function getCurrentTGP($student_id, $level, $semester)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('level', $level)
            ->where('semester', $semester)
            ->where('status', 'published')
            ->get();

        $total_gp = 0;
        foreach ($registered_courses as $registered_course) {
            $total_gp += ($registered_course->grade_point * $registered_course->course_unit);
        }

        return $total_gp;
    }

    public function getTCU($student_id)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('status', 'published')
            ->get();

        $total_unit = 0;
        foreach ($registered_courses as $registered_course) {
            $total_unit += $registered_course->course_unit;
        }

        return $total_unit;
    }

    public function getTGP($student_id)
    {
        $registered_courses = RegisteredCourse::where('student_id', $student_id)
            ->where('status', 'published')
            ->get();

        $total_gp = 0;
        foreach ($registered_courses as $registered_course) {
            $total_gp += ($registered_course->grade_point * $registered_course->course_unit);
        }

        return $total_gp;
    }

    public function computeGPA($student_id, $level, $semester)
    {
        $tcu = $this->getCurrentTCU($student_id, $level, $semester);
        $tgp = $this->getCurrentTGP($student_id, $level, $semester);

        if ($tcu == 0) {
            return 0;
        }

        return round($tgp / $tcu, 2);
    }

    public function computeCGPA($student_id)
    {
        $tcu = $this->getTCU($student_id);
        $tgp = $this->getTGP($student_id);

        if ($tcu == 0) {
            return 0;
        }

        return round($tgp / $tcu, 2);
    }

    public function getStudents($program_id, $level)
    {
        $students = StudentAcademic::where('program_id', $program_id)
            ->where('level', $level)
            ->get();

        return $students;
    }

    public function computeResult($request)
    {
        $students = $this->getStudents($request->program_id, $request->level);
        $level = $request->level;
        $semester = $request->semester;
        $session = $request->session;
        $results = [];
        foreach($students as $student)
        {
            $result = [
                'result_id' => $student->student_id. $session.$level.$semester,
                'student_id' => $student->student_id,
                'program_id' => $student->program_id,
                'session_id' => $session,
                'level' => $level,
                'semester' => $semester,
                'tcu' => $this->getCurrentTCU($student->student_id, $level, $semester),
                'tgp' => $this->getCurrentTGP($student->student_id, $level, $semester),
                'gpa' => $this->computeGPA($student->student_id, $level, $semester),
                'cgpa' => $this->computeCGPA($student->student_id),
                'status' => 'published'
            ];
            $results[] = $result;
        }

        Result::upsert($results, 'result_id');
        return true;
    }
}