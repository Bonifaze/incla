<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramCoursePolicy
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
        return $staff->hasPermission(41);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(40);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(42);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(43);
    }
    public function search(Staff $staff)
    {
        return $staff->hasPermission(44);
    }
   public function changeLecturer(Staff $staff)
    {
        return $staff->hasPermission(65);
    }
    public function approveResult(Staff $staff)
    {
        return $staff->hasPermission(69);
    }
    public function gstallocate(Staff $staff)
    {
        return $staff->hasPermission(129);
    }
    public function approveResultSBC(Staff $staff)
    {
        return $staff->hasPermission(130);
    }

} // end Policy
