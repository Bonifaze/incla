<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #302b2b; color: #e5e5e5;">
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/logs.png') }}" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/png;base64,{{ Auth::guard('staff')->user()->passport }}"
                    class="img-circle elevation-2" alt="User Image" style="width: 50px;">
            </div>

            <div class="info text-wrap">
                <a href="{{ route('staff.profile') }}" class="d-block">{{ Auth::guard('staff')->user()->full_name }}</a>
            </div>
        </div>


        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('staff.home') }}" class="nav-link @yield('staff-home')">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Staff Dashboard</p>
                    </a>
                </li>


                <li class="nav-item has-treeview @yield('staff-opens')">
                    <a href="#" class="nav-link @yield('staffs')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Staff Profile
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="{{ route('staff.profile') }}" class="nav-link @yield('staff-profile')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('staff.roles') }}" class="nav-link @yield('list-staff')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>My Roles</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('staff.password') }}" class="nav-link @yield('staff-password')">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item ml-4">
                    <a href="/admin/upload" class="nav-link @yield('staff-courses')">
                        <i class="fas fa-book-open nav-icon"></i>
                        <p>My Courses</p>
                    </a>
                </li>

                <li class="nav-item has-treeview @yield('results-open')">
                    <a href="#" class="nav-link @yield('results')">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Academia
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">






                    </ul>

                    <ul class="nav nav-treeview">
                        @can('programs', 'App\College')
                            <li class="nav-item ">
                                <a href="{{ route('academia.college.programs') }}" class="nav-link @yield('faculties')">
                                    <i class="fas fa-search-dollar nav-icon"></i>
                                    <p>Faculties</p>
                                </a>
                            </li>
                        @else
                            <li></li>
                        @endcan

                        @can('examOfficer', 'App\StudentResult')
                            <li class="nav-item has-treeview @yield('exam-officers-open')">
                                <a href="#" class="nav-link @yield('results')">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Exam Officers
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item ml-4">
                                        <a href="{{ route('result.program_search_student') }}"
                                            class="nav-link @yield('exam-remark')">
                                            <i class="fas fa-search-dollar nav-icon"></i>
                                            <p>Result & Remark </p>
                                        </a>
                                    </li>



                                </ul>
                            @else
                                <div></div>
                            @endcan
                    </ul>

                </li>

                @can('searchapplicant', 'App\Session')
                    <li class="nav-item has-treeview @yield('results-open')">
                        <a href="#" class="nav-link @yield('results')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Admissions
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-4">
                            <li class="nav-item">
                                <a href="{{ route('admissions.student.search') }}" class="nav-link @yield('faculties')">
                                    <i class="fa fa-search nav-icon"></i>
                                    <p>Search</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminallUsers" class="nav-link @yield('faculties')">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>All Registered User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/adminallApplicants" class="nav-link @yield('departments')">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>All Applicant</p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview @yield('exam-officers-open') ">
                                <a href="#" class="nav-link @yield('results')">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Applicant Type
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('undergraduateapplicant', 'App\Session')
                                        <li class="nav-item">
                                            <a href="/formview/Licentiate" class="nav-link @yield('exam-remark')">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>Licentiate</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/formview/Diploma" class="nav-link @yield('exam-remark')">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>Diploma</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/formview/Certificate" class="nav-link @yield('exam-download')">
                                                <i class="fa fa-eye nav-icon"></i>
                                                <p>Certificates</p>
                                            </a>
                                        </li>
                                    @else
                                        <li></li>
                                    @endcan

                                </ul>
                            </li>
                        </ul>
                    </li>
                @else
                    <div></div>
                @endcan



                @can('gstallocate', 'App\ProgramCourse')
                    <li class="nav-item ml-4 has-treeview @yield('exam-officers-open') ml-1">
                        <a href="#" class="nav-link @yield('results')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Courses
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('ICTOfficers', 'App\StudentResult')
                                <li class="nav-item">
                                    <a href="{{ route('course.create') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Create Course</p>
                                    </a>
                                </li>
                            @else
                                <li></li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('program_course.create') }}" class="nav-link @yield('exam-remark')">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Assign Program Course </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('program_course.assign') }}" class="nav-link @yield('exam-remark')">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Assign Course to Staff </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('program_course.list') }}" class="nav-link @yield('exam-remark')">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>Allocted Courses </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('course.search') }}" class="nav-link @yield('exam-remark')">
                                    <i class="fa fa-search nav-icon"></i>
                                    <p>Search Course</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('program_course.search') }}" class="nav-link @yield('exam-remark')">
                                    <i class="fa fa-search nav-icon"></i>
                                    <p>List Program Course</p>
                                </a>
                            </li>



                        </ul>

                    </li>
                @else
                    <li></li>
                @endcan


                <li class="nav-item has-treeview @yield('exam-officers-open')">
                    {{-- <a href="#" class="nav-link @yield('results')">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Establishment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a> --}}

                    <ul class="nav nav-treeview ml-4">

                        <li class="nav-item">
                            <a href="{{ route('academia.college.list') }}" class="nav-link @yield('exam-remark')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>List
                                    Faculty</p>
                            </a>
                        </li>
                        <li class="nav-item"><a href="{{ route('academia.department.list') }}"
                                class="nav-link @yield('exam-remark')"> <i class="fas fa-list-alt nav-icon"></i>
                                <p>List
                                    Departments</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('academia.program.list') }}"
                                class="nav-link @yield('exam-remark')"> <i class="fas fa-list-alt nav-icon"></i>
                                <p>List
                                    Programs</p>
                            </a></li>

                        </a>
                </li>

            </ul>



            <li class="nav-item has-treeview @yield('results-open')">
                <a href="#" class="nav-link @yield('results')">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Student
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ml-4">
                    <li class="nav-item">
                        <a href="{{ route('student.search') }}" class="nav-link @yield('faculties')">
                            <i class="fa fa-search nav-icon"></i>
                            <p>Search</p>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('student.create') }}" class="nav-link @yield('departments')">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview @yield('exam-officers-open')">
                        <a href="#" class="nav-link @yield('results')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                list
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('student.list_level', 100) }}" class="nav-link @yield('exam-remark')">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p> All students</p>
                                </a>
                            </li>






                        </ul>

                    </li>
                    <li class="nav-item has-treeview @yield('exam-officers-open')">
                        <a href="#" class="nav-link @yield('results')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                list Session
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('student.list_session', 17) }}"
                                    class="nav-link @yield('exam-remark')">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>2023/2024 </p>
                                </a>
                            </li>





                            <li class="nav-item">
                                <a href="{{ route('student.list_session', 11) }}"
                                    class="nav-link @yield('exam-download')">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>2017/2018</p>
                                </a>
                            </li>


                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('student.getGradStudent', 1000) }}" class="nav-link @yield('departments')"
                            target="_blank">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>Gradutaed</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.report') }}" class="nav-link @yield('departments')" target="_blank">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>Report</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview @yield('results-open')">
                <a href="#" class="nav-link @yield('results')">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Staff
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ml-4">
                    <li class="nav-item">
                        <a href="{{ route('staff.create') }}" class="nav-link @yield('faculties')">
                            <i class="fa fa-plus nav-icon"></i>
                            <p>Create Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.search') }}" class="nav-link @yield('departments')">
                            <i class="fa fa-search nav-icon"></i>
                            <p>Search Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('staff.list') }}" class="nav-link @yield('departments')">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>List Staff</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.department.list') }}" class="nav-link @yield('departments')">
                            <i class="fas fa-list-alt nav-icon"></i>
                            <p>List Staff Dept/Unit</p>
                        </a>
                    </li>
                </ul>
            </li>

            @can('search', 'App\Bursary')
                <li class="nav-item has-treeview @yield('bursary-open')">

                    <ul class="nav nav-treeview ml-4">


                        <li class="nav-item">

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('remita.search-rrr') }}" class="nav-link @yield('remita-search')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Remita Search</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview @yield('exam-officers-open')">

                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="/utmePayment" class="nav-link @yield('bursary-search')"
                                        target="_blank>
                            <i class="fa fa-eye nav-icon"></i>
                                        <p>Undergraute</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/pgPayment" class="nav-link @yield('bursary-search')">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Postgraduate</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route('remita.index') }}" class="nav-link @yield('remita-list')">
            <i class="fas fa-search nav-icon"></i>
            <p>List Remita</p>
            </a>
            </li> --}}
                        <li class="nav-item">
                            <a href="/addRemitaServiceType" class="nav-link @yield('remita-list1')">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Service Type</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('remita.fee-types') }}" class="nav-link @yield('remita-fees')">
            <i class="fas fa-search nav-icon"></i>
            <p>Fee Types</p>
            </a>
            </li> --}}
                        <li class="nav-item">
                            <a href="/viewRemitaServiceType" class="nav-link @yield('remita-list2')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Service Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/bursary/remita/fee-types" class="nav-link @yield('remita-list3')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Show Remita Fee Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/staff/paymentlists" class="nav-link @yield('remita-list3')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>RRR for Clearance</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview @yield('bursary-open')">
                            <a href="#" class="nav-link @yield('bursary')">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Session
                                    <i class="right fas fa-angle-right"></i>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item"><a href="{{ route('session.createBursary') }}"
                                        class="nav-link @yield('remita-list3')"> <i class="fa fa-plus nav-icon"></i>Create
                                        Sessions</a></li>
                                <li class="nav-item"><a href="{{ route('session.listBursary') }}"
                                        class="nav-link @yield('remita-list3')"> <i class="fa fa-eye nav-icon"></i>List
                                        Sessions</a></li>
                            </ul>


                    </ul>
                </li>
            @else
                <div></div>
            @endcan




            <li class="nav">
                <a href="{{ route('staff.logout') }}" class="nav-link" Contact
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off nav-icon text-danger"></i>
                    {{ __('Logout') }}
                    <form id="logout-form" action="{{ route('staff.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
            </ul>
        </nav>
    </div>
</aside>
