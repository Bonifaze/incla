<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
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
    public function list(Staff $staff)
    {
        return $staff->hasPermission(34);
    }
    public function create(Staff $staff)
    {
        return $staff->hasPermission(35);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(36);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(37);
    }
    public function search(Staff $staff)
    {
        return $staff->hasPermission(38);
    }
    public function programList(Staff $staff)
    {
        return $staff->hasPermission(39);
    }
} //end Policy
