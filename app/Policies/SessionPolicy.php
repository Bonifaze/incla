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
   
    
    public function listallApplicant(Staff $staff)
    {
        return $staff->hasPermission(135);
    }
    public function listalluser(Staff $staff)
    {
        return $staff->hasPermission(136);
    }
    public function allapprovedapplicant(Staff $staff)
    {
        return $staff->hasPermission(137);
    }
    public function undergraduateapplicant(Staff $staff)
    {
        return $staff->hasPermission(138);
    }
    public function postgraduateapplicant(Staff $staff)
    {
        return $staff->hasPermission(139);
    }
    public function approveapplicant(Staff $staff)
    {
        return $staff->hasPermission(140);
    }
    public function forceapproveapplicant(Staff $staff)
    {
        return $staff->hasPermission(141);
    }
    public function recommendapplicant(Staff $staff)
    {
        return $staff->hasPermission(142);
    }
    public function rejectapplicant(Staff $staff)
    {
        return $staff->hasPermission(143);
    }
    public function viewapplicant(Staff $staff)
    {
        return $staff->hasPermission(144);
    }
    public function changeapplicantcourse(Staff $staff)
    {
        return $staff->hasPermission(145);
    }
    public function viewqualifiedapplicant(Staff $staff)
    {
        return $staff->hasPermission(146);
    }
    public function editapplicant(Staff $staff)
    {
        return $staff->hasPermission(147);
    }
    public function resetapplicantpassword(Staff $staff)
    {
        return $staff->hasPermission(148);
    }

    public function viewremitaservicetype(Staff $staff)
    {
        return $staff->hasPermission(149);
    }
    public function activesuspendremitaservicetype(Staff $staff)
    {
        return $staff->hasPermission(150);
    }
    public function addremitaservicetype(Staff $staff)
    {
        return $staff->hasPermission(151);
    }
    public function searchapplicant(Staff $staff)
    {
        return $staff->hasPermission(152);
    }

} // end Policy
