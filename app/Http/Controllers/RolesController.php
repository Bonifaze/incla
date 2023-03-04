<?php

namespace App\Http\Controllers;

use App\Models\RoleStaff;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Validation\Rule;


class RolesController extends Controller
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
        $role = Role::orderBy('name','ASC')->paginate(10);
    	return view('/rbac/list-roles',array('roles' => $role));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('rbac','App\Staff');
        return view('rbac.create-role');
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
    			'name' => 'required|string|max:255|unique:roles',
    			'description' => 'required|string|max:255',

    	]);
    	$role = new Role();
    		$role->name = $request->name;
    		$role->description = $request->description;
            $role->role = $request->name;
    		$role->save();

    	return redirect()->to('/rbac/list-roles')
    	->with('success','New User Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('rbac','App\Staff');
    	$role = Role::find($id);
    	$permission = new Permission();
    	$permissions = $permission->rolePermissions($role->id);
    	$perms = $permission->availablePermissions($role->id);

    	return view('/rbac/show-role', array('role' => $role, 'permissions' => $permissions, 'perms' => $perms));
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
        $role = Role::find($id);
    	return view('/rbac/edit-role',array('role' => $role));
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
        $role = Role::find($id);

    	//validate unique name
    	if($request->name != $role->name)
    	{
    		$this->validate($request, [
    				'name' => 'required|string|max:255|unique:roles',
    		]);
    	} // end valid name

    	$this->validate($request, [
    			'name' => 'required|string|max:255',Rule::unique('roles')->ignore($role->name),
    			'description' => 'required|string|max:255',
    	]);
    	$role->name = $request->name;
    	$role->description = $request->description;
    	$role->save();

    	return redirect()->to('/rbac/list-roles')
    	->with('success','User Role edited successfully');
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
        $role = Role::find($request->id);
    	$role->delete();
    	return redirect()->to('/rbac/list-roles')
    	->with('success','User Role deleted successfully');
   }

    public function assignPermission(Request $request)
    {
        $this->authorize('rbac','App\Staff');
    	$role = Role::find($request->role_id);
    	$role->permissions()->attach($request->perm_id);

    	return redirect()->route('rbac.show-role', $role->id)
    	->with('success','permission added successfully');
    }

    public function removePermission(Request $request)
    {
        $this->authorize('rbac','App\Staff');
    	$role = Role::find($request->role_id);
    	$role->permissions()->detach($request->perm_id);

    	return redirect()->route('rbac.show-role', $role->id)
    	->with('success','permission removed successfully');
    }

     public function showstaff($id)
    {
        $this->authorize('rbac','App\Staff');
        $roles = Role::find($id);
    	$role = RoleStaff::with('staff')->where('role_id', $id)->get();

        $rolee =$roles->role;
        // $Staff= new Staff();
    	// $permission = new Permission();

    	// $permissions = $permission->rolePermissions($role->id);
    	// $perms = $permission->availablePermissions($role->id);

    	return view('/rbac/show-staff', array('role' => $role,'roles' => $roles,'rolee' => $rolee));
    }



} // end Class
