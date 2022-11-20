<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminDepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(Staff $staff)
    {
        return $staff->hasPermission(18);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(19);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(20);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(21);
    }
} // end Policy
