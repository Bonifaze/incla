<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #302b2b; color: #e5e5e5;" v>
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="{{ route('student.home') }}">
            <img src="{{ asset('img/letter_logo.png') }}" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        @php

        if(!session('userid'))
        {

        header('location: /admissions/login');
        exit;
        }
        @endphp
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">


        <div class="info text-wrap ">
            <div class="d-block"> {{ session('userssurname')}} {{ session('usersFirstName')}} {{ session('usersMiddleName')}}</div>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item ">
                <a href="/home" class="nav-link @yield('home')">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashbord Home</p>
                </a>
            </li>

            <li class="nav-item has-treeview @yield('student-open')">
                <a href="#" class="nav-link @yield('studentss')">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Manage Profile
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item ml-2">
                        {!! session('status') =='1'?'
                        <a class="nav-link collapsed" href="/viewprofile">
                            <i class="fas fa-user"></i>
                            <span>View Profile</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @yield('profile')">
                            <i class="fa fa-unlock-alt nav-icon"></i>
                            <p>Edit Profile</p>
                        </a>
                        ':'' !!}
                    </li>
                    <li class="nav-item">
                        <a href="/editpassword" class="nav-link @yield('password')">
                            <i class="fa fa-unlock-alt nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                </ul>
            </li>
        </li>


        <!-- <li class="nav-item has-treeview @yield('fees-open')">
            <a href="#" class="nav-link @yield('fees')">
                <i class="nav-icon fa fa-credit-card"></i>
                <p>
                    Manage Payment
                    <i class="right fas fa-angle-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="paymentview/session('userid')" class="nav-link @yield('viewremita')">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>View Payment</p>
                    </a>
                </li>

            </ul>
        </li> -->

            <li class="nav-item">
                <a href="/logoutUser" class="nav-link" Contact onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off nav-icon text-danger" title="Logout"></i>
                    {{ __('  Logout') }}
                    <form id="logout-form" action="/logoutUser" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>


    </nav>
    <!-- /.sidebar-menu -->


    </div>
    <!-- /.sidebar -->
</aside>
