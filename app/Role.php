<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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



	public function staff()
	{
		return $this->belongsToMany('App\Staff', 'role_staff', 'role_id', 'staff_id')->withTimestamps();
	}


	public function permissions()
	{
		return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id')->withTimestamps();
	}



	public function availableRoles($staffId)
	{


		$roles= $this->whereDoesntHave('staff', function ($query) use($staffId) {
			$query->where('staff_id', $staffId);
		})->get();

		return $roles;

	}


	public function staffRoles($staffId)
	{


		$roles = $this->whereHas('staff', function ($query) use($staffId) {
			$query->where('staff_id', $staffId);
		})->get();

		return $roles;

	}

    public function staffrole()
	{
		return $this->hasMany('App\models\RoleStaff')->get();
	}






	public function givePermissionTo(Permission $permission)
	{
		return $this->permissions()->save($permission);
	}
	/**
	 * Determine if the user may perform the given permission.
	 *
	 * @param  Permission $permission
	 * @return boolean
	 */
	public function hasPermission(Permission $permission, User $user)
	{
		return $user->hasRole($permission->roles);
	}
	/**
	 * Determine if the role has the given permission.
	 *
	 * @param  mixed $permission
	 * @return boolean
	 */
	public function inRole($permission)
	{
		if (is_string($permission)) {
			return $this->permissions->contains('name', $permission);
		}
		return !! $permission->intersect($this->permissions)->count();
	}



} // end Class Role
