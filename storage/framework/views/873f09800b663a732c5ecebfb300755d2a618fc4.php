<!-- Sidebar -->
        <ul class="navbar-nav bg-success bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/adminHome">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-graduate"></i>
                    <span>Applicants</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">View Applicants:</h6>
                        <a class="collapse-item fw-bold" href="/adminallUsers">All Registered Users</a>
                        <a class="collapse-item fw-bold" href="/adminallApplicants">All Applicants</a>
                        <a class="collapse-item fw-bold" href="/adminutme">UTME</a>
                        <a class="collapse-item fw-bold" href="/adminde">Direct Entry</a>
                        <a class="collapse-item fw-bold" href="/admintransfer">Transfer</a>
                        <a class="collapse-item fw-bold" href="/adminpg">Post Graduate</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwostudent" aria-expanded="true" aria-controls="collapseTwostudents">
                    <i class="fas fa-user-graduate"></i>
                    <span>Students</span>
                </a>
                <div id="collapseTwostudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">View Student:</h6>
                        <a class="collapse-item fw-bold" href="/students/search">Search Student</a>
                        <a class="collapse-item fw-bold" href="/students/list-level/100">List 100Level </a>
                        <a class="collapse-item fw-bold" href="/students/list-level/200">List 200Level</a>
                        <a class="collapse-item fw-bold" href="/students/list-level/300">List 300Level</a>
                        <a class="collapse-item fw-bold" href="/students/list-level/400">list 400levevl</a>
                        <a class="collapse-item fw-bold" href="/students/list-level/500">list 500levevl</a>
                        <a class="collapse-item fw-bold" href="/students/list-level/600">list 600levevl</a>
                         <a class="collapse-item fw-bold" href="/students/list-level/700">PGD</a>
                          <a class="collapse-item fw-bold" href="/students/list-level/800">MSc</a>
                           <a class="collapse-item fw-bold" href="/students/list-level/900">PhD</a>
                           <a class="collapse-item fw-bold" href="/students/list-level/1000">Graduated</a>
                            <a class="collapse-item fw-bold" href="/create Student">Create Student</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-credit-card"></i>
                    <span>Payments</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">View Payments:</h6>
                       <a class="collapse-item fw-bold" href="/bursary/remita/fee-typesrrr">All Payments</a>
                        
                        <a class="collapse-item fw-bold" href="/pgPayment">Post Graduate</a>
                        <a class="collapse-item fw-bold" href="/addRemitaServiceType">Add Service Type</a>

                        <a class="collapse-item fw-bold" href="/viewRemitaServiceType">View Service Type</a>

                        <a class="collapse-item fw-bold" href="/bursary/remita/fee-types">Show Fee Type</a>
                        <a class="collapse-item fw-bold" href="/adminAllPayments">All RRR Payments</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-user"></i>
                    <span>Manage Staff</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Staff</h6>
                        <a class="collapse-item fw-bold" href="/staff/create">Craete Staff</a>
                        <a class="collapse-item fw-bold" href="/staff/list">List Staff</a>
                        <a class="collapse-item fw-bold" href="/staff/search">Serach Staff</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-cog"></i>
                    <span>Manage Roles</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Roles:</h6>
                        <a class="collapse-item fw-bold" href="/adminRole">Add Role</a>
                        <a class="collapse-item fw-bold" href="/adminTaskToRole">Add tasks to roles</a>
                        <a class="collapse-item fw-bold text-danger" href="/adminRemoveTaskFromRole">Remove Task </a>
                        <a class="collapse-item fw-bold" href="/roleToAdmin">Assign Role to Admin</a>
                        <a class="collapse-item fw-bold text-danger" href="/removeRoleFromAdmin">Remove Role</a>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>