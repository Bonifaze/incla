<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Validation\Rule;
use App\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\StudentDebt;
use App\StaffWorkProfile;
use App\Staff;

class PermissionsController extends Controller
{
    
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth:staff');
	}
	

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('rbac','App\Staff');
        $perm = Permission::orderBy('id','DESC')->paginate(100);
    	return view('/rbac/list-perms',array('perms' => $perm));
    	
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('rbac','App\Staff');
    	return view('rbac.create-perm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('rbac','App\Staff');
    	$this->validate($request, [
    	    'name' => 'required|string|max:255|unique:permissions',
    		'description' => 'required|string|max:255',
    	]);
    	$perm = new Permission();
    		$perm->name = $request->name;
    		$perm->description = $request->description;
    		$perm->save();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','New User Permission created successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('rbac','App\Staff');
        $perm = Permission::find($id);
    	return view('/rbac/edit-perm',array('perm' => $perm));
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
        $this->authorize('rbac','App\Staff');
        $perm = Permission::find($id);

        //validate unique name
    	if($request->name != $perm->name)
    	{
    		$this->validate($request, [
    				'name' => 'required|string|max:255|unique:permissions',
    		]);
    	} // end valid name
    	   
    	
    	
    	$this->validate($request, [
    			'name' => 'required|string|max:255',Rule::unique('permissions')->ignore($perm->name),
    			'description' => 'required|string|max:255',
    	]);
    	$perm->name = $request->name;
    	$perm->description = $request->description;
    	$perm->save();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','User Permission edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete(Request $request)
    {
    	$this->authorize('rbac','App\Staff');
        $perm = Permission::find($request->id);
    	$perm->delete();
    	return redirect()->to('/rbac/list-perms')
    	->with('success','User Permission deleted successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetStudentPassword(Request $request)
    {
        //dd("Disabled.");
        //
        $status = "";

        //get all students
        $students = Student::all();


        //start database transaction
        DB::beginTransaction(); //Start transaction!

        // for each student
        foreach ($students as $key => $student)
        {
            // for students 1 - 200
            if ($student->id > 4968 AND $student->id <= 4986)
            {
                //set password to welcome
                $student->password = Hash::make("welcome");

               // save student
                try{
                    $student->save();
                    $status.= $student->id." reset <br />";

                } // end try
                catch(\Exception $e)
                {
                    //failed logic here
                    DB::rollback();
                    //return Response($e);
                    dd($e);
                    return redirect()->to('/rbac/refresh-student-password')
                        ->with('errors',$e);
                }

            } // end if

        } // end foreach

        //commit transaction
        DB::commit();
        //dd($status);

        return redirect()->to('/rbac/refresh-student-password')
            ->with('reset','Data reset completed <br />'.$status);
    }

    public function refreshStudentPassword()
    {
        $this->authorize('rbac','App\Staff');
        return view('/rbac/resetstudentpassword');
    }






}// end class
