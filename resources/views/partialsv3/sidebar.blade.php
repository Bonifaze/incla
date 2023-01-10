<aside class="main-sidebar sidebar-dark-primary elevation-4 nav-flat" style="background-color: #218c74; color: #fff">
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/veritasin.jpg') }}" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <div class="sidebar">
     {{--  <a class="navbar-brand" href="{{ route('staff.profile') }}">  --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/png;base64,{{ Auth::guard('staff')->user()->passport }}"
                    class="img-circle elevation-2" alt="User Image" style="width: 50px;">
            </div>

            <div class="info text-wrap">
                <a href="{{ route('staff.profile') }}" class="d-block">{{ Auth::guard('staff')->user()->full_name }}</a>
            </div>
        </div>
        {{--  </a>  --}}

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('staff.home') }}" class="nav-link @yield('staff-home')">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview @yield('staff-open')">
                    <a href="#" class="nav-link @yield('staffs')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
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
                                <p>List Roles</p>
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

                <li class="nav-item has-treeview @yield('results-open')">
                    <a href="#" class="nav-link @yield('results')">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Academia
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item ml-4">
                            <a href="/admin/upload" class="nav-link @yield('staff-courses')">
                                <i class="fas fa-book-open nav-icon"></i>
                                <p>My Courses</p>
                            </a>
                        </li>
                        {{--  <li class="nav-item ml-4">
                            <a href="{{ route('staff.results') }}" class="nav-link @yield('staff-results')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>My Results</p>
                            </a>
                        </li>  --}}

                        <li class="nav-item has-treeview @yield('exam-officers-open') ml-4">
                            {{--  <a href="#" class="nav-link @yield('results')">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Establishment
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">

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
                                <li class="nav-item"><a href="{{ route('academia.college.create') }}"
                                        class="nav-link @yield('exam-remark')"> <i class="fa fa-plus nav-icon"></i>
                                        <p>Create
                                            Faculty</p>
                                    </a></li>
                                <li class="nav-item"><a href="{{ route('academia.department.create') }}"
                                        class="nav-link @yield('exam-remark')"> <i class="fa fa-plus nav-icon"></i>
                                        <p>Create
                                            Department</p>
                                    </a></li>
                                <li class="nav-item"><a href="{{ route('academia.program.create') }}"
                                        class="nav-link @yield('exam-remark')"> <i class="fa fa-plus nav-icon"></i>
                                        <p>Create
                                            Program</p>
                                    </a>
                                </li>

                            </ul>  --}}
                        </li>

                        <li class="nav-item has-treeview @yield('exam-officers-open') ml-4">
                            <a href="#" class="nav-link @yield('results')">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Courses
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('course.create') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Create Course</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('program_course.create') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Allocate Course</p>
                                    </a>
                                </li>
                                 {{--  <li class="nav-item">
                                    <a href="{{ route('program_course.assign') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Assign Course to Staff </p>
                                    </a>
                                </li>  --}}
                                 <li class="nav-item">
                                    <a href="{{ route('program_course.list') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>Allocted Courses  </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('course.search') }}" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-search nav-icon"></i>
                                        <p>Search Course</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('program_course.search') }}"
                                        class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-search nav-icon"></i>
                                        <p>List Program Course</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>


                {{--  <li class="nav-item has-treeview @yield('results-open')">
                    <a href="#" class="nav-link @yield('results')">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Academia
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('academia.college.programs') }}" class="nav-link @yield('faculties')">
                                <i class="fas fa-search-dollar nav-icon"></i>
                                <p>Faculties</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academia.department.programs') }}" class="nav-link @yield('departments')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>

              <li class="nav-item has-treeview @yield('exam-officers-open')">
                <a href="#" class="nav-link @yield('results')">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Exam Officers
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('result.program_search_student')}}" class="nav-link @yield('exam-remark')">
                      <i class="fas fa-search-dollar nav-icon"></i>
                      <p>Result and Remark Upload</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('exam_officer.program')}}" class="nav-link @yield('exam-download')">
                      <i class="fas fa-list-alt nav-icon"></i>
                      <p>Result Download</p>
                    </a>
                  </li>


                </ul>
              </li>


                    </ul>
                </li>   --}}

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
                                <li class="nav-item">
                                    <a href="/adminutme" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>UTME</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/adminde" class="nav-link @yield('exam-remark')">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>DIRECT ENTRY</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admintransfer" class="nav-link @yield('exam-download')">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>TRANSFER</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/adminpg" class="nav-link @yield('exam-download')">
                                        <i class="fa fa-eye nav-icon"></i>
                                        <p>Postgraduate</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>

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
                            <a href="#" class="nav-link @yield('departments')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>


                         <li class="nav-item has-treeview @yield('exam-officers-open')">
                            <a href="#" class="nav-link @yield('results')">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    list level
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 100) }}"
                                        class="nav-link @yield('exam-remark')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>100 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 200) }}"
                                        class="nav-link @yield('exam-remark')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>200 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 300) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>300 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 400) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>400 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 500) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>500 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 600) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>600 L</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 700) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>PGD</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 800) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p> Masters </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_level', 900) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>PhD</p>
                                    </a>
                                </li>
                            </ul>

                        </li> <li class="nav-item has-treeview @yield('exam-officers-open')">
                            <a href="#" class="nav-link @yield('results')">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    list Session
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('student.list_session', 16) }}"
                                        class="nav-link @yield('exam-remark')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2022/2023 </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_session', 15) }}"
                                        class="nav-link @yield('exam-remark')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2021/2022</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_session', 14) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2022/2021</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_session', 13) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2019/2020</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('student.list_session', 12) }}"
                                        class="nav-link @yield('exam-download')">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>2018/2019</p>
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
                        {{--  <li class="nav-item">
                            <a href="" class="nav-link @yield('departments')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Get Contact List</p>
                            </a>
                        </li>  --}}
                    </ul>
                </li>


                {{--  <li class="nav-item has-treeview @yield('results-open')">
                    <a href="#" class="nav-link @yield('results')">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>
                            Administration
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('faculties')">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Undergraduate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('departments')">
                                <i class="fa fa-search nav-icon"></i>
                                <p>Postgraduate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link @yield('departments')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>New Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link @yield('departments')">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>Graduated Students</p>
                            </a>
                        </li>
                    </ul>
                </li>  --}}

                <li class="nav-item has-treeview @yield('bursary-open')">
                    <a href="#" class="nav-link @yield('bursary')">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Bursary
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        {{--  <li class="nav-item">
                <a href="{{ route('bursary.upload') }}" class="nav-link @yield('bursary-upload')">
                  <i class="fas fa-upload nav-icon"></i>
                  <p>Upload Excel</p>
                </a>
              </li>  --}}

                        <li class="nav-item">
                            {{--  <a href="{{ route('bursary.search') }}" class="nav-link @yield('bursary-search')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Search Student</p>
                            </a>  --}}
                        </li>
                        {{--  <li class="nav-item">
                            <a href="{{ route('remita.search-rrrA') }}" class="nav-link @yield('bursary-search')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Applicant RRR Search</p>
                            </a>
                        </li>  --}}
                        {{--  <li class="nav-item">
                            <a href="/bursary/remita/fee-typesrrr" class="nav-link @yield('bursary-search')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Applicant RRR Payments</p>
                            </a>
                        </li>  --}}
                        <li class="nav-item">
                            <a href="{{ route('remita.search-rrr') }}" class="nav-link @yield('remita-search')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Remita Search</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview @yield('exam-officers-open')">
                            <a href="#" class="nav-link @yield('bursary-applcant')">
                                <i class="nav-icon fa fa-users fas fa-money-bill-wave"></i>
                                <p>
                                    Applicant Fee
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-4">
                                <li class="nav-item">
                                    <a href="/utmePayment" class="nav-link @yield('bursary-search')">
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

                        {{--  <li class="nav-item">
                            <a href="{{ route('remita.index') }}" class="nav-link @yield('remita-list')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>List Remita</p>
                            </a>
                        </li>  --}}
                        <li class="nav-item">
                            <a href="/addRemitaServiceType" class="nav-link @yield('remita-list')">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Service Type</p>
                            </a>
                        </li>
                        {{--  <li class="nav-item">
                            <a href="{{ route('remita.fee-types') }}" class="nav-link @yield('remita-fees')">
                                <i class="fas fa-search nav-icon"></i>
                                <p>Fee Types</p>
                            </a>
                        </li>  --}}
                        <li class="nav-item">
                            <a href="/viewRemitaServiceType" class="nav-link @yield('remita-list')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Service Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/bursary/remita/fee-types" class="nav-link @yield('remita-list')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Show Remita Fee Type</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/adminAllPayments" class="nav-link @yield('remita-list')">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>All RRR Payment</p>
                            </a>
                        </li>

                    </ul>
                </li>





                {{--  <li class="nav-item has-treeview @yield('soteria-open')">
            <a href="#" class="nav-link @yield('soteria')">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Network Firewall
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('soteria.home') }}" class="nav-link @yield('soteria-add')">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Add Device</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('soteria.official.create') }}" class="nav-link @yield('soteria-create')">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Add Official System</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('soteria.list') }}" class="nav-link @yield('soteria-list')">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>List Devices</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('soteria.search') }}" class="nav-link @yield('soteria-search')">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Search Devices</p>
                </a>
              </li>


            </ul>
          </li>  --}}

                <li class="nav-item">
                    <a href="{{ route('staff.logout') }}" class="nav-link"Contact
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
