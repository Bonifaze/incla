<nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2" style="padding-bottom: 1.4rem;">

    <style>

    </style>


    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #c95b28;" data-widget="pushmenu" href="#">
                <i class="fas fa-bars fa-2x"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

             @can('ICTOfficers', 'App\StudentResult')
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" style="color: #c95b28;" href="#" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">ICT</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="{{ route('result.search_student') }}" class="dropdown-item">Manage Student</a></li>
                    {{--  <li><a href="{{ route('result.card_info') }}" class="dropdown-item">ID Card Info</a></li>  --}}
                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Results</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">

                            <!-- Level two dropdown-->
                            <li><a href="{{ route('program_course.ict_level', 100) }}" class="dropdown-item">
                                    Result</a>
                            </li>

                              {{--  <li><a href="{{ route('program_course.ict_manage_oldresut')}}" class="dropdown-item">Download Result</a>
                            </li>  --}}
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



                {{--  <li><a href="/spotlight/confirm"
                                class="dropdown-item "> Spotlight
                            </a></li>  --}}
                </ul>
            </li>

        @else
            <div></div>
        @endcan
        <li class="nav-item">
            <div class="dropdown">
                <button class="users arrow-down-icon border border-gray-100 rounded-circle p-2 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="data:image/png;base64,{{ Auth::guard('staff')->user()->passport }}" alt="User Image" class="h-20 w-20 rounded-circle" style="width: 20px;">
                        <span class="activation-badge position-absolute w-2 h-2 bg-success rounded-circle" style="bottom: 0; right: 0; border: 2px solid white;">
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        <div class="card-body">
                            <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100 text-center">
                                <h6 class="mb-0">
                                    <div class="info text-wrap">
                                        <a href="{{ route('staff.profile') }}" class="d-block">{{ Auth::guard('staff')->user()->full_name }}</a>
                                    </div>
                                </h6>
                            </div>
                            <ul class="list-unstyled max-h-270 overflow-y-auto">
                                <li class="mb-3">
                                    <a  href="{{ route('staff.password') }}" class="nav-link @yield('staff-password')" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                        <i class="fas fa-cog me-2 text-primary"></i>
                                        Password Reset
                                    </a>
                                </li>
                                <li class="border-top pt-3">
                                    <a href="{{ route('staff.logout') }}" class="nav-link" Contact onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off nav-icon text-danger"></i>
                                        {{ __('Logout') }}
                                        <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>

</nav>

