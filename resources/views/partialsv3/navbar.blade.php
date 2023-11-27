{{--  <style>
    .nav-link,
    .nav-item,
    .dropdown-item,
    a,
    li,
    ul {
        color: #218c74;
    }
</style>  --}}

<nav class="main-header navbar navbar-expand bg-white navbar-dark mb-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #218c74;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

        {{--  <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Students</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('student.create') }}" class="dropdown-item">Create Student </a></li>
                <li><a href="{{ route('student.search') }}" class="dropdown-item">Search Student</a></li>
                <li><a href="{{ route('student.list_level', 100) }}" class="dropdown-item">List 100 L</a></li>
                <li><a href="{{ route('student.list_level', 200) }}" class="dropdown-item">List 200 L</a></li>
                <li><a href="{{ route('student.list_level', 300) }}" class="dropdown-item">List 300 L</a></li>
                <li><a href="{{ route('student.list_level', 400) }}" class="dropdown-item">List 400 L</a></li>

            </ul>
        </li>  --}}

        {{--  <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Staff</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('staff.create') }}" class="dropdown-item">Create Staff </a></li>
                <li><a href="{{ route('staff.search') }}" class="dropdown-item">Search Staff</a></li>
                <li><a href="{{ route('staff.list') }}" class="dropdown-item">List Staff </a></li>
                <li><a href="#" class="dropdown-item">Get Contact List</a></li>
            </ul>
        </li>  --}}
        {{--
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">School</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">Create Session </a></li>
                <li><a href="{{ route('session.list') }}" class="dropdown-item">List Sessions</a></li>
                <li><a href="#" class="dropdown-item">Set Session</a></li>
                <li><a href="#" class="dropdown-item">Set Semester</a></li>
                <li><a href="#" class="dropdown-item">Move Session</a></li>
            </ul>
        </li>  --}}

        {{--  <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Academia</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Establishment</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        <li><a href="{{ route('academia.college.list') }}" class="dropdown-item">List Faculty</a></li>
                        <li><a href="{{ route('academia.department.list') }}" class="dropdown-item">List
                                Departments</a></li>
                        <li><a href="{{ route('academia.program.list') }}" class="dropdown-item">List Programs</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a href="{{ route('academia.college.create') }}" class="dropdown-item">New Faculty</a></li>
                        <li><a href="{{ route('academia.department.create') }}" class="dropdown-item">New
                                Department</a></li>
                        <li><a href="{{ route('academia.program.create') }}" class="dropdown-item">New Program</a></li>
                    </ul>
                </li>
                <!-- End Level two -->
                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Courses</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        <li><a href="{{ route('course.create') }}" class="dropdown-item">New Course</a></li>
                        <li><a href="{{ route('program_course.create') }}" class="dropdown-item">New Program
                                Course</a></li>
                        <li><a href="{{ route('course.search') }}" class="dropdown-item">Search Course</a></li>
                        <li><a href="{{ route('program_course.search') }}" class="dropdown-item">List Program
                                Courses</a></li>
                        <li><a href="#" class="dropdown-item">Preload Program Course</a></li>

                    </ul>
                </li>
                <!-- End Level two -->
            </ul>
        </li>  --}}

        {{--
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Security</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('rbac.create-role') }}" class="dropdown-item">Create Role </a></li>
                <li><a href="{{ route('rbac.create-perm') }}" class="dropdown-item">Create Permissions</a></li>
                <li><a href="{{ route('rbac.list-roles') }}" class="dropdown-item">List Roles</a></li>
                <li><a href="{{ route('rbac.list-perms') }}" class="dropdown-item">List Permissions</a></li>
            </ul>
        </li>  --}}

        {{--  <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Staff</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('staff.create') }}" class="dropdown-item">Create Staff </a></li>
                <li><a href="{{ route('staff.search') }}" class="dropdown-item">Search Staff</a></li>
                <li><a href="{{ route('staff.list') }}" class="dropdown-item">List Staff </a></li>
                <li><a href="#" class="dropdown-item">Get Contact List</a></li>
            </ul>
        </li>  --}}
        {{--
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">School</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">Create Session </a></li>
                <li><a href="{{ route('session.list') }}" class="dropdown-item">List Sessions</a></li>
                <li><a href="#" class="dropdown-item">Set Session</a></li>
                <li><a href="#" class="dropdown-item">Set Semester</a></li>
                <li><a href="#" class="dropdown-item">Move Session</a></li>
            </ul>
        </li>  --}}
        @can('ICTOfficers', 'App\StudentResult')
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="nav-link dropdown-toggle">Security</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                    <!-- Level two dropdown-->

                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">Access Control</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="{{ route('rbac.create-role') }}" class="dropdown-item">Create Role </a></li>
                            <li><a href="{{ route('rbac.create-perm') }}" class="dropdown-item">Create Permissions</a></li>
                            <li><a href="{{ route('rbac.list-roles') }}" class="dropdown-item">List Roles</a></li>
                            <li><a href="{{ route('rbac.list-perms') }}" class="dropdown-item">List Permissions</a></li>
                        </ul>
                    </li>
                    <!-- End Level two -->
                    <!-- Level two dropdown-->
                    <li class="dropdown-submenu dropdown-hover">
                        {{--  <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">Applicants</a>  --}}
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            {{--  <li><a href="/adminRole" class="dropdown-item">Create Role</a></li>  --}}
                            <li><a href="/adminTaskToRole" class="dropdown-item">Add Task to Role</a></li>
                            <li><a href="/roleToAdmin" class="dropdown-item">Assign Role to Admin</a></li>
                            <li><a href="/adminRemoveTaskFromRole" class="dropdown-item">Remove Task</a></li>
                            <li><a href="/removeRoleFromAdmin" class="dropdown-item">Remove Role</a></li>


                        </ul>
                    </li>

                    {{--  <li><a href="{{ route('staff.roles') }}" class="dropdown-item">View Roles </a></li>  --}}
                    <li><a href="{{ route('rbac.audit') }}" class="dropdown-item">Audit </a></li>
                    <li><a href="{{ route('staff.securitylist') }}" class="dropdown-item">List Staff Roles </a></li>
                      <li><a href="{{ route('session.create') }}" class="dropdown-item">Create Academic Sessions</a></li>
                    <li><a href="{{ route('session.list') }}" class="dropdown-item">List Academic Sessions</a></li>
                     <li><a href="{{ route('session.createAdmission') }}" class="dropdown-item">Create Admission Sessions</a></li>
                    <li><a href="{{ route('session.listAdmission') }}" class="dropdown-item">List Admission Sessions</a></li>
                     {{--  <li><a href="{{ route('create.Admission') }}" class="dropdown-item">Create Admission</a></li>  --}}
                    <!-- End Level two -->
                </ul>
            </li>
        @else
            <div></div>
        @endcan
         @can('ICTOfficers', 'App\StudentResult')
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1"style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">HR</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('admin.department.create') }}" class="dropdown-item">Create Dept/Unit </a></li>
                <li><a href="{{ route('admin.department.list') }}" class="dropdown-item">List Dept/Unit Staff</a></li>
             <li><a href="#" class="dropdown-item">Assign HoD</a></li>
                <li><a href="#" class="dropdown-item">New Staff Position</a></li>
                <li><a href="#" class="dropdown-item">List Staff Positions</a></li>
                 <li><a href="#" class="dropdown-item">New Grade Scales</a></li>
                <li><a href="#" class="dropdown-item">List Grade Scales</a></li>
            </ul>
        </li>
 @else
            <div></div>
        @endcan

                 @can('approveResultSBC', 'App\ProgramCourse')
        <li class="nav-item dropdown">

            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">Results</a>

<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">SBC</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
<li><a href="{{ route('program_course.sbc_level', 100) }}" class="dropdown-item">100L SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 200) }}" class="dropdown-item">200L SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 300) }}" class="dropdown-item">300L SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 400) }}" class="dropdown-item">400L SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 500) }}" class="dropdown-item">500L SBC Approval</a>
                </li>
                {{--  <li><a href="{{ route('program_course.sbc_level', 600) }}" class="dropdown-item">600L SBC Approval</a>
                </li>  --}}
                <li><a href="{{ route('program_course.sbc_level', 700) }}" class="dropdown-item">PGD SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 800) }}" class="dropdown-item">MSc SBC Approval</a>
                </li>
                <li><a href="{{ route('program_course.sbc_level', 900) }}" class="dropdown-item">PhD SBC Approval</a>
                </li>

                        </ul>
                    </li>

                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" class="dropdown-item dropdown-toggle">Vice Chancellor</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                <li><a href="{{ route('program_course.vc_level', 100) }}" class="dropdown-item">100L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 200) }}" class="dropdown-item">200L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 300) }}" class="dropdown-item">300L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 400) }}" class="dropdown-item">400L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 500) }}" class="dropdown-item">500L VC Approval</a>
                </li>
                {{--  <li><a href="{{ route('program_course.vc_level', 600) }}" class="dropdown-item">600L VC Approval</a>
                </li>  --}}
                <li><a href="{{ route('program_course.vc_level', 700) }}" class="dropdown-item">PGD VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 800) }}" class="dropdown-item">MSc VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 900) }}" class="dropdown-item">PhD VC Approval</a>
                </li>
                        </ul>
                    </li>
                    </ul>
                     @else
            <div></div>
        @endcan


                <li class="dropdown-submenu dropdown-hover">
                    {{--  <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">ICT View Result</a>  --}}
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        <li><a href="{{ route('admin.approve_scores') }}" class="dropdown-item">Courses Result
                            </a></li>
                        <li><a href="{{ route('program_course.ict_level', 100) }}" class="dropdown-item">100L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 200) }}" class="dropdown-item">200L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 300) }}" class="dropdown-item">300L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 400) }}" class="dropdown-item">400L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 500) }}" class="dropdown-item">500L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 600) }}" class="dropdown-item">600L
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 700) }}" class="dropdown-item">PGD
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 800) }}" class="dropdown-item">MSc
                                Result</a>
                        </li>
                        <li><a href="{{ route('program_course.ict_level', 900) }}" class="dropdown-item">PhD
                                Result</a>
                        </li>

                        <li><a href="{{ route('admin.notuploaded_scores') }}"
                                class="dropdown-item text-warning">Courses Result<br>not Upload
                            </a></li>


                    </ul>
                </li>



            </ul>
        </li>
        @can('ICTOfficers', 'App\StudentResult')
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ICT</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="{{ route('result.search_student') }}" class="dropdown-item">Manage Student</a></li>
                    <li><a href="{{ route('result.card_info') }}" class="dropdown-item">ID Card Info</a></li>
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Results</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="{{ route('program_course.ict_level', 100) }}" class="dropdown-item">100L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 200) }}" class="dropdown-item">200L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 300) }}" class="dropdown-item">300L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 400) }}" class="dropdown-item">400L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 500) }}" class="dropdown-item">500L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 600) }}" class="dropdown-item">600L
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 700) }}" class="dropdown-item">PGD
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 800) }}" class="dropdown-item">MSc
                                    Result</a>
                            </li>
                            <li><a href="{{ route('program_course.ict_level', 900) }}" class="dropdown-item">PhD
                                    Result</a>
                            </li>
                              <li><a href="{{ route('program_course.ict_manage_oldresut')}}" class="dropdown-item">Download Result</a>
                            </li>
                        </ul>
                    </li>
                            <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Courses Results</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="{{ route('admin.approve_scores') }}" class="dropdown-item">Courses uploaded
                        </a></li>
                         <li><a href="{{ route('admin.notuploaded_scores') }}" class="dropdown-item text-warning">Courses
                        not Upload
                        </a></li>

                        </ul>
                        <li><a href="{{ route('staff.assign.courses') }}"
                                class="dropdown-item "> Assigned Courses
                            </a></li>
                    </li>



                        <li><a href="{{ route('course.create') }}" class="dropdown-item">Create Course</a></li>
                    <hr>
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Create</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="{{ route('academia.college.create') }}" class="dropdown-item">Create Faculty
                                </a></li>
                            <li><a href="{{ route('academia.department.create') }}" class="dropdown-item">Create
                                    Department
                                </a></li>
                            <li><a href="{{ route('academia.program.create') }}" class="dropdown-item">Create Program
                                </a></li>
                                                <li><a href="{{ route('admin.department.create') }}" class="dropdown-item">New Admin Dept </a></li>

                        </ul>
                    </li>
                     <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">List</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                             <li><a href="{{ route('academia.college.list') }}" class="dropdown-item">List Faculty
                        </a></li>

                    <li><a href="{{ route('academia.department.list') }}" class="dropdown-item">List Department
                        </a></li>

                    <li><a href="{{ route('academia.program.list') }}" class="dropdown-item">List Program
                        </a></li>
                         <li><a href="{{ route('admin.department.list') }}" class="dropdown-item">List Admin Depts</a></li>
                        </ul>
                    </li>



                <li><a href="/spotlight/confirm"
                                class="dropdown-item "> Spotlight
                            </a></li>
                </ul>
            </li>
            
        @else
            <div></div>
        @endcan
        {{--
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">Administration</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('staff.list') }}" class="dropdown-item">Staff List </a></li>
                <li><a href="#" class="dropdown-item">Undergraduate Students</a></li>
                <li><a href="#" class="dropdown-item">Post Graduate Students</a></li>
                <li><a href="#" class="dropdown-item">New Students</a></li>
            </ul>
        </li>  --}}


        {{--  <li class="nav-item">
            <a href="{{ route('staff.logout') }}" class="nav-link"Contact
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </a>
        </li>  --}}



    </ul>
    {{--  <marquee behavior="alternate" direction="" class="text-bold float-right" width="100%" style="color:red"> <strong> We’ll having downtime from 4pm-6pm Today 22 March, 2023. </strong>  Sorry for any inconvenience this might cause.</marquee>  --}}

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->

</nav>
