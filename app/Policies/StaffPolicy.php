<?php

namespace App\Policies;

use App\Staff;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class StaffPolicy
{
    use HandlesAuthorization;

    
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */

    public function rbac(Staff $staff)
    {
      return $staff->hasPermission(62);
    }

    public function create(Staff $staff)
    {
        return $staff->hasPermission(56);
    }
    public function view(Staff $staff)
    {
        return $staff->hasPermission(59);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(55);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(57);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(58);
    }
    public function disable(Staff $staff)
    {
        return $staff->hasPermission(61);
    }
    public function search(Staff $staff)
    {
        return $staff->hasPermission(63);
    }
    public function reset(Staff $staff)
    {
        return $staff->hasPermission(60);
    }
    public function cbt(Staff $staff)
    {
        return $staff->hasPermission(64);
    }
    public function soteria(Staff $staff)
    {
        return $staff->hasPermission(66);
    }
    public function soteriaAdmin(Staff $staff)
    {
        return $staff->hasPermission(67);
    }





}// end user policy class
