<?php 

namespace App\Computations;

use App\Jobs\ResultComputation as JobsResultComputation;
use App\Models\BatchTracker;
use App\Models\RegisteredCourse;
use App\Models\Result;
use App\Student;
use App\StudentAcademic;
use Illuminate\Support\Facades\Bus;

class ResultComputation
{
    
    public function computeResult($request)
    {
        $students = $this->getStudents($request->program_id, $request->session, $request->level);
        $level = $request->level;
        $semester = $request->semester;
        $session = $request->session;
        $batch = Bus::batch([])
        ->allowFailures()
        ->finally(function () {

        })
        ->onQueue('result')
        ->dispatch();
        foreach($students as $student)
        {
            $batch->add(new JobsResultComputation($request->program_id, $session, $level, $semester, $student));
        }
        BatchTracker::unguard();
        BatchTracker::create([
            'batch_id' => $batch->id,
            'program_id' => $request->program_id,
            'session' => $session,
            'level' => $level,
            'semester' => $semester
        ]);
        BatchTracker::reguard();
        return $batch->id;
    }

    public function getStudents($program_id, $session, $level)
    {
        $students = RegisteredCourse::where('program_id', $program_id)
            ->where('level', $level)
            ->where('session', $session)
            ->distinct('student_id')->get(['student_id']);

        return $students;
    }
}