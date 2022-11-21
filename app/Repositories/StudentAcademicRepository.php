<?php 

namespace App\Repositories;

use App\StudentAcademic as AppStudentAcademic;

class StudentAcademicRepository
{
    protected $studentAcademic;

    public function __construct(AppStudentAcademic $studentAcademic)
    {
        $this->studentAcademic = $studentAcademic;
    }
}