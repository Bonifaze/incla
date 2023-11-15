<aside class="main-sidebar sidebar-dark-primary elevation-4"style="background-color: #218c74; color: #fff"v>
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="{{ route('student.home') }}">
            <img src="{{ asset('img/veritasin.jpg') }}" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="{{ route('student.profile') }}">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image">
                    <img src="data:image/png;base64,{{ Auth::guard('student')->user()->passport }}"
                        class="img-circle elevation-2" alt="User Image" style="width: 50px;">
                </div>

                <div class="info text-wrap">
                    <div class="d-block">{{ Auth::guard('student')->user()->full_name }}</div>
                </div>

            </div>
            </a>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item ">
                        <a href="{{ route('student.home') }}" class="nav-link @yield('home')">
                            <i class="fa fa-home nav-icon"></i>
                            <p>Dashbord</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview @yield('student-open')">
                        <a href="#" class="nav-link @yield('studentss')">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Profile
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('student.profile') }}" class="nav-link @yield('gprofile')">
                                    <i class="fa fa-user-alt nav-icon"></i>
                                    <p>View Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('student.password') }}" class="nav-link @yield('password')">
                                    <i class="fa fa-unlock-alt nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview @yield('course-open')">
                        <a href="#" class="nav-link @yield('course')">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Courses
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                         @foreach ($courseReg as $key => $session)
                        {{--  To ALLOW STUDENT SEE COURSE REGISTARION  --}}
                            {{--  <li class="nav-item">
                                <a href="{{ route('student.course-registration') }}" class="nav-link @yield('registration')">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>Course Registration</p>
                                </a>
                            </li>  --}}
                            {{--  To close Course Registration  --}}
                              <li class="nav-item">
                                <a href="{{ $session->route }}" class="nav-link @yield('registration')">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>Course Registration</p>
                                </a>
                            </li>
       @endforeach


                            {{--  <li class="nav-item">
                            <a href="{{ route('student.evaluation') }}" class="nav-link @yield('evaluation')">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Course Evaluation</p>
                            </a>
                        </li>  --}}
                        </ul>
                    </li>


                    <li class="nav-item has-treeview @yield('result-open')">
                    <a href="#" class="nav-link @yield('result')">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Results
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.results') }}" class="nav-link @yield('results')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Academic Results</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students.transcript') }}" class="nav-link @yield('transcript')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Unofficial Transcript</p>
                            </a>
                        </li>

                    </ul>
                </li>

                    <li class="nav-item has-treeview @yield('fees-open')">
                        <a href="#" class="nav-link @yield('fees')">
                            <i class="nav-icon fa fa-credit-card"></i>
                            <p>
                                Remita
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/students/remita/paymentview/{id}" class="nav-link @yield('viewremita')">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>View Remita Payment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/students/remita/feestype" class="nav-link @yield('remita')">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Generate Payment</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('student.logout') }}" class="nav-link"Contact
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off nav-icon text-danger"></i>
                            {{   __('  Logout') }}
                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
