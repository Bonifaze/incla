<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{

        use \OwenIt\Auditing\Auditable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'other_names', 'type', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


/**
 * Get the user's full name.
 *
 * @return string
 */
public function getFullNameAttribute()
{
    return "{$this->other_names} {$this->surname}";
}


public function roles()
{
	return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withTimestamps();
}

public function permissions()
{

		$perms = array();

		foreach ($this->roles as $role)
		{
			foreach ($role->permissions as $perm)
			{

					$perms[] = $perm;

			}
		}

		$permissions = \Illuminate\Database\Eloquent\Collection::make($perms);

		$unique = $permissions->unique();

		return $unique->values()->all();



}

public function hasPermission($permit)
{

	$perms = array();

	foreach ($this->roles as $role)
	{
		foreach ($role->permissions as $perm)
		{

			$perms[] = $perm;

		}
	}


	$permissions = \Illuminate\Database\Eloquent\Collection::make($perms);



	return $permissions->contains($permit);



}


public function assignRole(Role $role)
{
	return $this->roles()->save($role);
}

public function hasRole($role)
{
	if (is_string($role)) {
		return $this->roles->contains('name', $role);
	}
	return !! $role->intersect($this->roles)->count();
}


} // end Class User
