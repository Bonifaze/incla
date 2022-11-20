<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Student Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student', ['except' => ['logout']]);
    }
    
    
    
    public function showLoginForm()
    {
        return view('students.auth.login');
    }
    
    public function login(Request $request)
    {
        
        
        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        // attempt to log user
        if(Auth::guard('student')->attempt(['username' => $request->email, 'password' => $request->password], $request->remember)){


            //check for restricted
            $student = Auth::guard('student')->user();
            $list = array(1);
            if(in_array($student->id,$list))
            {
                $this->logout();
            }

            // disable graduated students
            if(($student->academic->level > 900))
            {
                //$this->logout();
            }

            //check for disabled
            if($student->status != 1)
            {
                if($student->debt()->exists()){
                    $message = 'Login has been disabled until debt N'.$student->debt->debt.' has been paid.';
                }
                else {
                    $message = 'Login has been disabled until. Please contact ICT';
                }
                Auth::guard('student')->logout();
                return redirect('/students/login')->withErrors([
                        'debt' => $message,
                    ]);
            }

            // if success redirect to intended location
            return redirect()->intended('/students/home');
            
        }
        // unsuccessful redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'))
        ->withErrors([
            'password' => 'Invalid Email or Password',
        ]);
    }
    
    
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
} // end class
