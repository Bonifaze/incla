<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
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
        return $staff->hasPermission(45);
    }
    public function list(Staff $staff)
    {
        return $staff->hasPermission(46);
    }
    public function edit(Staff $staff)
    {
        return $staff->hasPermission(47);
    }
    public function delete(Staff $staff)
    {
        return $staff->hasPermission(48);
    }


} // end Policy
