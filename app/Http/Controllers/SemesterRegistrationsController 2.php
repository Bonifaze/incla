<?php

namespace App\Http\Controllers;

use App\Models\RegisteredCourse;
use Illuminate\Http\Request;
use App\SemesterRegistration;
use App\StudentResult;
use App\Student;
use App\Session;

class SemesterRegistrationsController extends Controller
{
    //
    public function registration($encode,$session)
    {
        //
        $student_id = base64_decode($encode);
        $student = Student::findOrFail($student_id);
        $session = Session::findOrFail($session);
        $academic = $student->academic;
        
        $results = RegisteredCourse::where('student_id', $student_id)->where('session', $session->id)->where('semester', 1)->get();
        $results2 = RegisteredCourse::where('student_id', $student_id)->where('session', $session->id)->where('semester', 2)->get();
        return view('results.course_form',compact('student','session','academic','results' ,'results2'));
    }


    public function modifyExcess($registration_id)
    {
        // $this->authorize('upload', StudentResult::class);
        $registration = SemesterRegistration::findOrFail(base64_decode($registration_id));
        $student = $registration->student;


        return view('results.modify_excess',compact('student','registration'));
    } // modifyExcess($registration_id)

    public function updateExcess(Request $request, $registration_id)
    {
        // $this->authorize('upload', StudentResult::class);
        $this->validate($request, [
            'excess_credit' => 'required|integer|max:6',
        ],

            $messages = [
                'excess_credit.max'    => 'The maximum allowed credit per semester is 30. Excess credit limit allowed is 6',
                ]);
        $registration = SemesterRegistration::findOrFail(base64_decode($registration_id));
        $student = $registration->student;
        //check if already registered credit is above the final excess
        $result = new StudentResult();
        $results = $result->semesterRegisteredCourses($registration->student_id,$registration->session_id,$registration->semester);
        $totalCredits = $student->totalRegisteredCredits($results);
        if(($totalCredits - $request->excess_credit) > 24)
        {
            return redirect()-> route('semester.registration.modify-excess',base64_encode($registration->id))
                ->with('error',"Excess Credit less than registered credits.");
        }
        $registration->excess_credit = $request->excess_credit;

         try {
            //saving logic here
            $registration->save();
        } // end try

        catch(\Exception $e)
        {
            return redirect()-> route('semester.registration.modify-excess',base64_encode($registration->id))
                ->with('error',"Errors in updating Excess Credit.");
        }

        return redirect()->route('result.register',[$registration->student_id,$registration->session_id,$registration->semester,$registration->level]);
    } // updateExcess($registration_id)




} // end class
