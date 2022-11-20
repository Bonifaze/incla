<?php

namespace App\Policies;

use App\Staff;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicDepartmentPolicy
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
        return $staff->hasPermission(5);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(2);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(3);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(4);
    }
    public function programs(Staff $staff)
    {
        return $staff->hasPermission(6);
    }
    public function manageProgram(Staff $staff)
    {
        return $staff->hasPermission(7);
    }
    public function programLevelStudents(Staff $staff)
    {
        return $staff->hasPermission(8);
    }
    public function programLevelCourses(Staff $staff)
    {
        return $staff->hasPermission(9);
    }

} // end Policy
