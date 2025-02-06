<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\StudentMedical;

class StudentMedicalsController extends Controller
{


    //
    public function edit($id)
    {
        // $this->authorize('edit', Student::class);
        $medical = StudentMedical::findOrFail($id);
        return view('students.admin.medical.edit',compact('medical'));
    } // end edit

    public function update(Request $request, $id)
    {
        // $this->authorize('edit', Student::class);
        $this->validate($request, [

            'blood_group' => 'required|string|max:100',
            'genotype' => 'required|string|max:100',

        ]);
        $medical = StudentMedical::findOrFail($id);

        $medical->blood_group = $request->blood_group;
        $medical->genotype = $request->genotype;


        try {
            $medical->save();
        } // end try
        catch(\Exception $e)
        {
            //failed logic here
           return redirect()->route('student-medical.edit', $id)
            ->with('error',"Errors in updating Student medical information.");
        }
        return redirect()->route('student.show', $medical->student_id)
        ->with('success','Student medical information updated successfully');
    } //end update
} // end Class
