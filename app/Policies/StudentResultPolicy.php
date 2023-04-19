<?php

namespace App\Policies;

use App\Staff;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentResultPolicy
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

    public function manage(Staff $staff)
    {
        return $staff->hasPermission(22);
    }
    public function upload(Staff $staff)
    {
        return $staff->hasPermission(23);
    }
    public function examOfficer(Staff $staff)
    {
        return $staff->hasPermission(24);
    }
    public function register(Staff $staff)
    {
        return $staff->hasPermission(25);
    }
    public function ictUpload(Staff $staff)
    {
        return $staff->hasPermission(72);
    }
    public function ICTOfficers(Staff $staff)
    {
        return $staff->hasPermission(133);
    }



} // end Policy
