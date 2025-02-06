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

        // dd($request);
       // Validate form data (change 'email' to 'username' and remove 'email' rule)
$this->validate($request, [
    'email' => 'required|string', // Accepts matric numbers or emails
    'password' => 'required|min:6'
]);


$username = trim($request->email); // Remove any hidden spaces

//dd($username); // Check the output before appending

// Append '@incla.edu.ng' if it's not already included
if (!str_contains($username, '@incla.edu.ng')) {
    $username .= '@incla.edu.ng';
}

//dd($username); // Check again after appending

        // attempt to log user
        if(Auth::guard('student')->attempt(['username' => $username, 'password' => $request->password], $request->remember)){


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
               // $this->logout();
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
                // dd($student);
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
        return redirect('/students/login');
    }
} // end class
