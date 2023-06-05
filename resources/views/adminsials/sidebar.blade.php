<aside class="main-sidebar sidebar-dark-primary elevation-4"style="background-color: #218c74; color: #fff"v>
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="{{ route('student.home') }}">
            <img src="{{ asset('img/veritasin.jpg') }}" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
@php

if(!session('userid'))
{

header('location: /');
exit;
}
@endphp
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{--
                <div class="image">
                    <img src="data:image/{{ $applicantsDetails->passport_type }};base64,{{ base64_encode($applicantsDetails->passport) ?? null}}"
                        class="img-circle elevation-2" alt="User Image" style="width: 50px;">
                </div>  --}}

                <div class="info text-wrap ">
                    <div class="d-block"> {{  session('userssurname')}} {{ session('usersFirstName')}} {{ session('usersMiddleName')}}</div>
                </div>

            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item ">
                        <a href="/home" class="nav-link @yield('home')">
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
                               {!! session('status') =='4'?'
                <a class="nav-link collapsed" href="/viewprofile">
                    <i class="fas fa-user"></i>
                    <span>View Profile</span>
                </a>
            ':'' !!}
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link @yield('password')">
                                    <i class="fa fa-unlock-alt nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview @yield('course-open')">
                        {{--  <a href="#" class="nav-link @yield('course')">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                Application
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>  --}}
                           {{--  @foreach ($admissiontype as $key => $session)
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ $session->route }}" class="nav-link @yield('registration')">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>{{ $session->name }}</p>
                                </a>
                            </li>
</ul>
@endforeach  --}}
                              {{--  <li class="nav-item">
                                <a href="/de" class="nav-link @yield('registration')">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>Direct Entry</p>
                                </a>
                            </li>

                            <li class="nav-item">
                            <a href="/transfers" class="nav-link @yield('evaluation')">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Transfer</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="/pg" class="nav-link @yield('evaluation')">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Postgraduate</p>
                            </a>
                        </li>  --}}
                        {{--  </ul>  --}}
                    </li>


                    {{--  <li class="nav-item has-treeview @yield('result-open')">
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
                </li>  --}}

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
                                <a href="paymentview/session('userid')" class="nav-link @yield('viewremita')">
                                    <i class="fa fa-eye nav-icon"></i>
                                    <p>View Remita Payment</p>
                                </a>
                            </li>
                            {{--  <li class="nav-item">
                                <a href="/students/remita/feestype" class="nav-link @yield('remita')">
                                    <i class="fa fa-plus-circle nav-icon"></i>
                                    <p>Generate Payment</p>
                                </a>
                            </li>  --}}
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/logoutUser" class="nav-link"Contact
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off nav-icon text-danger"></i>
                            {{   __('  Logout') }}
                            <form id="logout-form" action="/logoutUser" method="POST"
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
