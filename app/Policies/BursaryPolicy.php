<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BursaryPolicy
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
    public function upload(Staff $staff)
    {
        return $staff->hasPermission(33);
    }

    public function search(Staff $staff)
    {
        return $staff->hasPermission(68);
    }
    public function remitaSearch(Staff $staff)
    {
        return $staff->hasPermission(73);
    }

     public function remitaFeetype(Staff $staff)
    {
        return $staff->hasPermission(124);
    }
} //end Policy
