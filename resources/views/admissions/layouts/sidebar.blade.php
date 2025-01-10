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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-credit-card"></i>
                    <span>Bursary</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">View Payments:</h6>
                         <a class="collapse-item fw-bold" href="/bursary/remita/fee-typesrrr">RRR Payments</a>
                       {{--  <a class="collapse-item fw-bold" href="/adminAllPayments">All Payments</a>  --}}
                        <a class="collapse-item fw-bold" href="/utmePayment">UTME</a>
                        <a class="collapse-item fw-bold" href="/dePayment">Direct Entry</a>
                        <a class="collapse-item fw-bold" href="/transferPayment">Transfer</a>
                        <a class="collapse-item fw-bold" href="/pgPayment">Post Graduate</a>
                    </div>
                    <div class="bg-white py-2 collapse-inner rounded">
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
                    <span>Manage Admins</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admins:</h6>
                        <a class="collapse-item fw-bold" href="/adminRegister">Add Admin</a>
                        <a class="collapse-item fw-bold" href="/viewAdmins">View Admins</a>
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

<li class="nav-item">
            <div class="d-flex align-items-start flex-column align-content-end fixed-bottom p-2 text-light d-flex align-items-end col-2 ml-3">



            <span class="font-weight-light">2021 - <?php echo date("Y"); ?> &copy; Admission |Institute of Consecrated Life in Africa (InCLA)</span>
            <div class="font-italic">Version 2.2.1</div>
        </div>
             </li>

        </ul>
        <!-- End of Sidebar -->