<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'name', 'description',
	];
	
	
	public function roles()
	{
		return $this->belongsToMany('App\Role', 'permission_role', 'permission_id', 'role_id')->withTimestamps();
	}
	

	
	/**
	 * Determine if the permission belongs to the role.
	 *
	 * @param  mixed $role
	 * @return boolean
	 */
	public function inRole($role)
	{
		if (is_string($role)) {
			return $this->roles->contains('name', $role);
		}
		return !! $role->intersect($this->roles)->count();
	}
	
	
	
	public function availablePermissions($roleId)
	{
	
				 
		$permissions= $this->whereDoesntHave('roles', function ($query) use($roleId) {
			$query->where('role_id', $roleId);
		})->where('id','!=',1)->get();
		 
		return $permissions;
		 
	}
	
	
	public function rolePermissions($roleId)
	{
	
			
		$permissions= $this->whereHas('roles', function ($query) use($roleId) {
			$query->where('role_id', $roleId);
		})->get();
			
		return $permissions;
			
	}
	
	
	
	
	
	
	
	
	
	
} // end Class Permission
