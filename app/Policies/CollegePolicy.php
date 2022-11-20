<?php

namespace App\Policies;

use App\College;
use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollegePolicy
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
        return $staff->hasPermission(27);
    }
    public function create(Staff $staff)
    {
        return $staff->hasPermission(26);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(28);
    }
    public function programs(Staff $staff)
    {
        return $staff->hasPermission(29);
    }
    public function manageProgram(Staff $staff)
    {
        return $staff->hasPermission(30);
    }
    public function programLevelStudents(Staff $staff)
    {
        return $staff->hasPermission(31);
    }
    public function programLevelCourses(Staff $staff)
    {
        return $staff->hasPermission(32);
    }
} // end Policy
