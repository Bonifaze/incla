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

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" class="nav-link dropdown-toggle">Security</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

                <!-- Level two dropdown-->
                 <li><a href="{{ route('rbac.create-role') }}" class="dropdown-item">Create Role</a></li>

                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Staff/Students</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                        <!-- Level two dropdown-->
                        {{--  <li><a href="{{ route('rbac.create-role') }}" class="dropdown-item">Create Role </a></li>  --}}
                        <li><a href="{{ route('rbac.create-perm') }}" class="dropdown-item">Create Permissions</a></li>
                        <li><a href="{{ route('rbac.list-roles') }}" class="dropdown-item">List Roles</a></li>
                        <li><a href="{{ route('rbac.list-perms') }}" class="dropdown-item">List Permissions</a></li>
                    </ul>
                </li>
                <!-- End Level two -->
                <!-- Level two dropdown-->
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="dropdown-item dropdown-toggle">Applicants</a>
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
                <!-- End Level two -->
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1"style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">HR</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                {{--  <li><a href="{{ route('admin.department.create') }}" class="dropdown-item">New Admin Dept </a></li>
                <li><a href="{{ route('admin.department.list') }}" class="dropdown-item">List Admin Depts</a></li>  --}}
                {{--  <li><a href="#" class="dropdown-item">Assign Head*</a></li>
                <li><a href="#" class="dropdown-item">New Staff Position*</a></li>
                <li><a href="#" class="dropdown-item">List Staff Positions*</a></li>
                <li><a href="#" class="dropdown-item">New Grade Scales*</a></li>
                <li><a href="#" class="dropdown-item">List Grade Scales*</a></li>  --}}
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" style="color: #218c74;" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Results</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
               <li><a href="{{ route('admin.course_upload') }}" class="dropdown-item">Staff Score Upload </a></li>
                <li><a href="{{ route('admin.approve_scores') }}" class="dropdown-item">Approved Result
                        </a></li>

                         <li><a href="{{ route('admin.show_compute') }}" class="dropdown-item">Compute Result
                        </a></li>
                {{--  <li><a href="{{ route('result.search_student') }}" class="dropdown-item">ICT Upload Results </a></li>
                <li><a href="{{ route('program_course.results_status') }}" class="dropdown-item">Program Result
                        Status</a></li>
                <li><a href="{{ route('result.program_search_student') }}" class="dropdown-item">Manage All
                        Results</a></li>
                <li><a href="{{ route('utility.result.status', 0) }}" class="dropdown-item" target="_blank">Ongoing
                        Courses</a></li>
                <li><a href="{{ route('utility.result.status', 1) }}" class="dropdown-item" target="_blank">Awaiting
                        Department</a></li>
                <li><a href="{{ route('utility.result.status', 2) }}" class="dropdown-item" target="_blank">Awaiting
                        Faculty</a></li>
                <li><a href="{{ route('utility.result.status', 3) }}" class="dropdown-item" target="_blank">Awaiting
                        VC</a></li>
                <li><a href="{{ route('program_course.vc_level', 100) }}" class="dropdown-item">100L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 200) }}" class="dropdown-item">200L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 300) }}" class="dropdown-item">300L VC Approval</a>
                </li>
                <li><a href="{{ route('program_course.vc_level', 400) }}" class="dropdown-item">400L VC Approval</a>
                </li>
  --}}


            </ul>
        </li>
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

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->

</nav>
