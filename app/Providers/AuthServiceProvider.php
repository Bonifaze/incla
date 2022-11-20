<?php

namespace App\Providers;

use App\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    	'App\User' => 'App\Policies\UserPolicy',
        'App\Staff' => 'App\Policies\StaffPolicy',
        'App\AcademicDepartment' => 'App\Policies\AcademicDepartmentPolicy',
        'App\AdminDepartment' => 'App\Policies\AdminDepartmentPolicy',
        'App\Student' => 'App\Policies\AdminStudentPolicy',
        'App\StudentDebt' => 'App\Policies\BursaryPolicy',
        'App\College' => 'App\Policies\CollegePolicy',
        'App\Course' => 'App\Policies\CoursePolicy',
        'App\ProgramCourse' => 'App\Policies\ProgramCoursePolicy',
        'App\Program' => 'App\Policies\ProgramPolicy',
        'App\Session' => 'App\Policies\SessionPolicy',
        'App\StudentResult' => 'App\Policies\StudentResultPolicy',
        'App\Remita' => 'App\Policies\BursaryPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
