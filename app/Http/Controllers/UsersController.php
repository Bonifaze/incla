<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	
   
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {
        //
    	$this->authorize('view','App\User');
    	 
    	
    	$user = User::orderBy('status','ASC')->orderBy('other_names','ASC')->paginate(10);
    	 
    	return view('/user/list',array('users' => $user));
    }

    
    public function password()
    {
    	//
    	
    	return view('user.password');
    }
    
    public function change(Request $request)
    {
    	//

    	$this->validate($request, [
    			 
    			'current' => 'required',
    			'password' => 'required|string|min:6|max:255|confirmed',
    	]);
    	 
    	 
    	 
    	if (!(Hash::check($request->get('current'), Auth::user()->password))) {
    		// The passwords matches
    		return redirect()->back()->with("error","Your current password does not match the password you provided. Please try again.");
    		
    	}
    	
    	
    	
    	//Change Password
    	$user = Auth::user();
    	$user->password = Hash::make($request->get('password'));
    	
    	
    	if ((Hash::check($request->get('current'), $user->password))) {
    		
    		//Current password and new password are same
    		return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    	}
    	 
    	 
    	
    	$user->save();
    	
    	return redirect()->back()->with("success","Password changed successfully !");
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //
    	$this->authorize('create','App\User');
    	
    	
    	return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    	$this->validate($request, [
    			 
    			'surname' => 'required|string|max:255',
    			 
    			'other_names' => 'required|string|max:255',
    			
    			'phone' => 'required|string|max:15',
    	
    			'passport' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    			 
    			'email' => 'required|string|email|max:255|unique:users',
    	]);
    	 
    	$user = new User();
    	 
    	
    	$img = Image::make($request->file('passport'))->resize(400, null, function ($constraint) {
    		$constraint->aspectRatio();
    	});
    		 
    		 
    		$pic = base64_encode($img->encode()->encoded);
    		 
    		$user->surname = $request->surname;
    		$user->other_names = $request->other_names;
    		$user->password = Hash::make('password@1');
    		$user->phone = $request->phone;
    		$user->passport = $pic;
    		$user->email = $request->email;
    		$user->save();
    		
    		return redirect()->to('/user/list')
    		->with('success','New User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    	$this->authorize('view','App\User');
    	$user = User::find($id);
    	
    	$role = new Role();
    	$roles = $role->userRoles($user->id);
    	
    	$rls = $role->availableRoles($user->id);
    	
    	$perms = $user->permissions();
    	
    	return view('/user/show', array('user' => $user, 'roles' => $roles, 'rls' => $rls, 'perms' =>  $perms));
    	
    	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function edit($id)
    {
        //
    	$this->authorize('update','App\User');
    	$user = User::find($id);
    	 
    	return view('/user/edit',array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    	$this->authorize('update','App\User');
    	$user = User::find($id);
    	
    	
    	
    	//validate unique email
    	if($request->email != $user->email)
    	{
    		 
    		$this->validate($request, [
    	
    				'email' => 'required|email|unique:users',
    	
    		]);
    	} // end valid email
    	
    
    	
    	//
    	$this->validate($request, [
    			 
    			'surname' => 'required|string|max:255',
    			 
    			'other_names' => 'required|string|max:255',
    			
    			'phone' => 'required|string|max:15',
    	
    			'passport' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    			 
    			'email' => 'required|string|email|max:255',Rule::unique('users')->ignore($user->id),
    	]);
    	 
    	
    	//process passport upload
    	if($request->hasFile('passport'))
    	{
    		$img = Image::make($request->file('passport'))->resize(400, null, function ($constraint) {
    			$constraint->aspectRatio();
    		});
    			 
    			 
    			$pic = base64_encode($img->encode()->encoded);
    			$user->passport = $pic;
    	} // end passport
    	
    	
    		$user->surname = $request->surname;
    		$user->other_names = $request->other_names;
    		$user->password = Hash::make('welcome@1');
    		$user->phone = $request->phone;
    		$user->email = $request->email;
    		$user->save();
    		 
    		
    		return redirect()->to('/user/list')
    		->with('success', $user->surname.' account edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function disable(Request $req)
    {
    
    	$this->authorize('disable','App\User');
    	
    	$user = User::find($req->id);
    
    	$name = $user->surname;
    	$user->status = $req->status;
    	$user->save();
    		 
    	return redirect()->to('/user/list')
    	->with('success', $name.' '.$req->action.' successfully');
    }
    
    
    
    public function assignRole(Request $request)
    {
    	//
    	 
    	$user = User::find($request->user_id);
    
    
    	$user->roles()->attach($request->role_id);
    
    	return redirect()->route('user.show', $user->id)
    	->with('success','User role added successfully');
    	 
    }
    
    public function removeRole(Request $request)
    {
    	//
    
    	$user = User::find($request->user_id);
    
    
    	$user->roles()->detach($request->role_id);
    
    	return redirect()->route('user.show', $user->id)
    	->with('success','User removed successfully');
    
    } // end removeRole
    
     
    
}// end UsersController class
