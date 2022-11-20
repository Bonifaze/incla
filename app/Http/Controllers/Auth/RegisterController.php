<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    protected function welcome(array $data)
    {
        return view('students.index');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function register(Request $request)
    {
        //
        $this->validate($request, [
            
            'surname' => 'required|string|max:255',
            
            'first_name' => 'required|string|max:255',
            
            'phone' => 'required|string|max:15',
            
            'gender' => 'required|string|max:15',
            
            'state_residence' => 'required|string|max:50',
            
            'email' => 'required|string|email|max:255|unique:students',
            
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);
        
        $student = new Student();
        
        
        $student->surname = $request->surname;
        $student->first_name = $request->first_name;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->email = $request->email;
        $student->state_residence = $request->state_residence;
        $student->password = Hash::make($request->password);
        
        try{
            //saving logic here
            
            if($student->save())
            {
                // login user
                if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])){
                    
                 //run notification
                    
                    return redirect()->route('student.home')
                    ->with('success','Registration was successfully');
                    
                } // end login
                else {
                    dd($student);
                    return redirect()->to('/students/register')
                    ->with('warnings',"Errors during registration.");
                }
                
            } // end if
        } // end try
        
        catch(\Exception $e)
        {
            //failed logic here
            return redirect()->to('/students/register')
            ->with('warnings',"Errors during registration.");
        }
        
    } //end register
    
    
    
    
}
