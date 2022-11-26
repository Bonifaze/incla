<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Staff Login Controller
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
        $this->middleware('guest:staff', ['except' => ['logout']]);
    }



    public function showLoginForm()
    {
        return view('staff.auth.login');
    }

    public function login(Request $request)
    {


        // Validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt to log user
        if(Auth::guard('staff')->attempt(['username' => $request->email, 'password' => $request->password, 'status' => '1'], $request->remember)){

            //check for default password
            if($request->password == "welcome@1")
            {
                return redirect()->route('staff.password');
            }

            //check for restricted
            $staff = Auth::guard('staff')->user();
            $list = array(2000);
            if(in_array($staff->id,$list))
            {
                $this->logout();
            }

            // if success redirect to intended location
            return redirect()->intended('/staff/home');

        }
        // unsuccessful redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'))
        ->withErrors([
            'password' => '  Invalid Email or Password or Account Disabled',
        ]);
    }


    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect('/');
    }


} // end class
