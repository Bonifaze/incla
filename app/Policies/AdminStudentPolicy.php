<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminStudentPolicy
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
        return $staff->hasPermission(10);
    }
    public function show(Staff $staff)
    {
        return $staff->hasPermission(12);
    }
    public function view(Staff $staff)
    {
        return $staff->hasPermission(11);
    }
    public function transcript(Staff $staff)
    {
        return $staff->hasPermission(17);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(13);
    }
    public function search(Staff $staff)
    {
        return $staff->hasPermission(14);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(15);
    }
    public function reset(Staff $staff)
    {
        return $staff->hasPermission(16);
    }
    public function disable(Staff $staff)
    {
        return $staff->hasPermission(74);
    }
} // end Policy
