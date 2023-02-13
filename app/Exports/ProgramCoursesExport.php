<?php

namespace App\Exports;

use App\ProgramCourse;
use App\RegisteredCourse;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProgramCoursesExport implements FromView
{

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $id = $this->id;
        $pcid = base64_encode($id);
        $program_course = ProgramCourse::with(['results.student.academic'])->findOrFail($id);
        $results = RegisteredCourse::with('student.academic')->where('program_course_id',$id)
            ->orderBy('student_id','ASC')->get();
     // get all students unique registered program courses

        return view('results.program_course_results_export',compact('results','pcid'));

    }
}
