<?php

namespace App\Http\Controllers;

use App\Program;
use App\Session;
use App\Student;
use App\StudentAcademic;
use App\AcademicDepartment;
use App\Models\MatricCount;
use Illuminate\Http\Request;
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

        $student_aca = StudentAcademic::where('id', $id)->first();
        $academic = StudentAcademic::findOrFail($id);
        $academic->mode_of_entry = $request->mode_of_entry;
        $academic->mode_of_study = $request->mode_of_study;
        $academic->jamb_no = $request->jamb_no;
        $academic->jamb_score = $request->jamb_score;
        $academic->entry_session_id = $request->entry_session_id;
        $academic->program_id = $request->program_id;
        $academic->level = $request->level;
        $student = $academic->student;
        // dd( $academic->entry_session_id = $request->entry_session_id);
        if( $academic->entry_session_id <= 15){
        DB::beginTransaction(); //Start transaction!
        try {
            $matricNo = $academic->mat_no;
            if ($request->program_id != $student_aca->program_id)
            {
                $matricNo = $this->setMatNo($request->program_id, $academic->entry_session_id, $academic->student_id, $academic->mode_of_entry);
            }
            $academic->mat_no = $matricNo;
            $academic->save();
            $student->username = $student->setVunaMail();
            $student->save();


        } // end try
        catch(\Exception $e)
        {
            //failed logic here
            DB::rollback();
            throw $e;
            return redirect()->route('student-academic.edit', $id)
            ->with('error',"Errors in updating Student academic information.");
        }
        DB::commit();
         return redirect()->route('student.show', $academic->student_id)
        ->with('success','Student academic information updated successfully');
    } //end update
 else{
    DB::beginTransaction(); //Start transaction!
    try {
        $matric_count = MatricCount::where('program_id', $request->program_id)->where('session_id', $request->entry_session_id)->first();
        $matricNo = $academic->mat_no;
        if ($student_aca->program_id != $request->program_id)
        {
             $matricNo = $this->genMatricNumber($request->only('program_id', 'entry_session_id', 'mode_of_entry'));
        }
        $academic->mat_no = $matricNo;
        $academic->save();
        // if (!is_null($matric_count))
        // {
        //     $count = $matric_count->count;
        //     $matric_count->update(['count' => $count + 1]);
        // }else
        // {
          //  $count = 0;
           // MatricCount::create(['program_id' => $request->program_id, 'session_id' => $request->entry_session_id, 'count' => $count + 1]);
        // }
        $student->username = $student->setVunaMail();
        DB::table('student_academics')->where('id', $id)->update([
            'entry_session_id' => $request->entry_session_id
        ]);
        $student->save();
    } // end try
    catch(\Exception $e)
    {
        //failed logic here
        DB::rollback();
        return redirect()->route('student-academic.edit', $id)
        ->with('error',"Errors in updating Student academic information.".$e->getMessage());
    }
    DB::commit();
     return redirect()->route('student.show', $academic->student_id)
    ->with('success','Student academic information updated successfully');
} //end update
}

protected function setMatNo($program_id, $session_id, $studentId, $modeOfEntry)
    {
        $program = Program::findOrFail($program_id);
        $sess = Session::findOrFail($session_id);
        $code = $program->code;
        $deg = $program->masters;
        $deg = str_replace(".","",$deg);
        $deg = str_replace(")","",$deg);
        $deg = str_replace("(","",$deg);
        $deg = str_replace(" ","",$deg);
        $session = $sess->getCode();

        switch ($modeOfEntry) {
            case "UTME":
                $reg = "VUG/".$code."/".$session."/".$studentId;
                break;
            case "DE":
                $reg = "VUG/".$code."/".$session."/".$studentId;
                break;
            case "PGD":
                $reg = "VPG/PGD/".$code."/".$session."/".$studentId;
                break;
            case "MSc":
                $reg = "VPG/".$deg."/".$code."/".$session."/".$studentId;
                break;
            case "PhD":
                $reg = "VPG/PHD/".$code."/".$session."/".$studentId;
                break;
            default:
                $reg = "VUG/".$code."/".$session."/".$studentId;
        }

        return $reg;


    }


protected function genMatricNumber(array $fields)
{
    $program_id = $fields['program_id'];
    $entry_session_id = $fields['entry_session_id'];
    // $program_type = $fields['program_type'];
    $modeOfEntry = $fields['mode_of_entry'];

    $sess = Session::find($entry_session_id);
    $session = $sess->getCode();

    $matric_count = MatricCount::where('program_id', $program_id)->where('session_id', $entry_session_id)->first();
    if (!is_null($matric_count))
    {
        $program_students_count = $matric_count->count;
    }else
    {
        $program_students_count = 0;
    }

    $new_number = $program_students_count + 1;

    $program = DB::table('programs')->find($program_id);
    $program_code = $program->code;
    $deg = $program->masters;

    $formatted_num = sprintf('%04d', $new_number);


    $deg = str_replace(".","",$deg);
    $deg = str_replace(")","",$deg);
    $deg = str_replace("(","",$deg);
    $deg = str_replace(" ","",$deg);
    switch ($modeOfEntry) {
        case "UTME":
            $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
            break;
        case "DE":
            $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
            break;
        case "TRANSFER":
            $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
            break;
        case "PGD":
            $matric_number = "VPG/PGD/".$session.'/'.$program_code.''.$formatted_num;
            break;
        case "MSc":
            $matric_number = "VPG/".$deg."/".$session.'/'.$program_code.''.$formatted_num;
            break;
        case "PhD":
            $matric_number = "VPG/PHD/".$session.'/'.$program_code.''.$formatted_num;
            break;
        default:
         $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
    }

    // $matric_number = 'VUG/'.$program_code.'/'. $session . '/'. $formatted_num;

    // $matric_number= 'VUG/'.$session.'/'.$program_code.''.$formatted_num;
    // dd($matric_number);
    return $matric_number;
}

}

// end Class
