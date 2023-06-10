<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
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
        return $staff->hasPermission(50);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(49);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(51);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(52);
    }
    public function setCurrent(Staff $staff)
    {
        return $staff->hasPermission(53);
    }
    public function moveSession(Staff $staff)
    {
        return $staff->hasPermission(54);
    }
    public function searchapplicant(Staff $staff)
    {
        return $staff->hasPermission(152);
    }
} // end Policy
