<?php

namespace App\Http\Controllers;

use App\AcademicDepartment;
use App\Student;
use Illuminate\Http\Request;
use App\StudentAcademic;
use App\Program;
use App\Session;
use Illuminate\Support\Facades\DB;

class StudentAcademicsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff');

    }
   //
    public function edit($id)
    {
       $this->authorize('edit', Student::class);
        $academic = StudentAcademic::findOrFail($id);
        $programs = Program::orderBy('name','ASC')->pluck('name','id');
        $sessions = Session::pluck('name','id');
        return view('students.admin.academic.edit',compact('academic', 'programs', 'sessions'));
    } // end edit
    
    public function update(Request $request, $id)
    {
        $this->authorize('edit', Student::class);
        $this->validate($request, [
            // academic information
            'mode_of_entry' => 'required|string|max:50',
            'mode_of_study' => 'required|string|max:50',
            'jamb_no' => 'sometimes|nullable|string|max:20',
            'jamb_score' => 'sometimes|nullable|string|max:200',
            'entry_session_id' => 'required|integer',
            'program_id' => 'required|integer',
            'level' => 'required|integer',
            ]);
        $academic = StudentAcademic::findOrFail($id);
        $academic->mode_of_entry = $request->mode_of_entry;
        $academic->mode_of_study = $request->mode_of_study;
        $academic->jamb_no = $request->jamb_no;
        $academic->jamb_score = $request->jamb_score;
        $academic->entry_session_id = $request->entry_session_id;
        $academic->program_id = $request->program_id;
        $academic->level = $request->level;
        $student = $academic->student;
        DB::beginTransaction(); //Start transaction!
        try {
            $academic->mat_no = $student->setMatNo($academic->program_id, $academic->entry_session_id, $academic->student_id, $academic->mode_of_entry);
            $academic->save();
            $student->username = $student->setVunaMail();
            $student->save();
        } // end try
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            return redirect()->route('student-academic.edit', $id)
            ->with('error',"Errors in updating Student academic information.");
        }
        DB::commit();
         return redirect()->route('student.show', $academic->student_id)
        ->with('success','Student academic information updated successfully');
    } //end update
} // end Class
