<html>
<head>
<style>
        body {
            overflow-x: hidden;
            padding: 0.1rem;
        }

        main {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
        <!-- Sidebar -->

        <ul class="navbar-nav bg-success bg-gradient sidebar sidebar-dark accordion p-2" id="accordionSidebar">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user-graduate"></i>
                    <span>Application </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Application Type</h6>
                        <a class="collapse-item fw-bold" href="/utme">UTME</a>
                        <a class="collapse-item fw-bold" href="/de">Direct Entry</a>
                        <a class="collapse-item fw-bold" href="/transfers">Transfer</a>
                        <a class="collapse-item fw-bold" href="/pg">Post Graduate</a>
                    </div>
                </div>
            </li>



            

            <li class="nav-item">
                <a class="nav-link collapsed" href="paymentview/session('userid')">
                    <i class="fa fa-credit-card"> </i>
                    <span>View Remita Payment</span>
                </a>
            </li>

            <li class="nav-item">

          <?php echo session('status') =='4'?'    <a class="nav-link collapsed" href="/viewprofile">
                    <i class="fas fa-user"></i>



                   <span>View Profile</span>
                </a>':''; ?>


            </li>
            <li class="nav-item">
            <div class="d-flex align-items-start flex-column align-content-end fixed-bottom p-2 text-light d-flex align-items-end col-2 ml-3">



            <span class="font-weight-light">2021 - <?php echo date("Y"); ?> &copy; Admission | Veritas University Abuja</span>
            <div class="font-italic">Version 2.0.1</div>
        </div>
             </li>


        </ul>



</footer>


</body>
</html>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/layouts/usersidebar.blade.php ENDPATH**/ ?>