<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Program;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use App\Student;
use App\StudentResult;



class LabsController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }
    
    
    public function modals()
    {
      return view('pages.ui.modals');
    }
    
    public function nav()
    {
        return view('pages.layout.mixed-nav');
    }
    
    public function createMat()
    {
       $student = new Student();
       $result= $student->setMatNo(8, 6, 3950, 'MSc');
        
        
        return view('labs.plain',compact('result'));
    }
    
    
    public function checkSerial()
    {
        $student = new Student();
        $result = $student->checkSerial(3000);
        
        return view('labs.plain',compact('result'));
    }
    
    
    public function checkVunaEmail()
    {
        $student = Student::findOrFail(122);
        $result = $student->setVunaMail();
        
        return view('labs.plain',compact('result'));
    }
    
    public function semesterRegistered()
    {
        $student = Student::findOrFail(2181);
        $result = $student->semesterRegistered();
        dd($result);
        return view('labs.plain',compact('result'));
    }
    
    public function gpa($student_id,$session_id,$semester)
    {
       $rs = new StudentResult();
        $result = $rs->gpa($student_id,$session_id,$semester);
        dd($result);
        return view('labs.plain',compact('result'));
    }
    
    public function currentCGPA($student_id,$level, $session_id,$semester)
    {
        $rs = new StudentResult();
        $result = $rs->currentCGPA($student_id,$level,$session_id,$semester);
        dd($result);
        return view('labs.plain',compact('result'));
    }
    
    
    public function curCGPA($student_id,$session_id,$semester)
    {
        $rs = new StudentResult();
        $result = $rs->curCGPA($student_id,$session_id,$semester);
        dd($result);
        return view('labs.plain',compact('result'));
    }
    
   
    
    
} // end Class
