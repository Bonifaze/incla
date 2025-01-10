<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #218c74; color: #fff" v>
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="<?php echo e(route('student.home')); ?>">
            <img src="<?php echo e(asset('img/veritasin.jpg')); ?>" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php

        if(!session('userid'))
        {

        header('location: /admissions/login');
        exit;
        }
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            

        <div class="info text-wrap ">
            <div class="d-block"> <?php echo e(session('userssurname')); ?> <?php echo e(session('usersFirstName')); ?> <?php echo e(session('usersMiddleName')); ?></div>
        </div>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item ">
                <a href="/home" class="nav-link <?php echo $__env->yieldContent('home'); ?>">
                    <i class="fa fa-home nav-icon"></i>
                    <p>Dashbord</p>
                </a>
            </li>

            <li class="nav-item has-treeview <?php echo $__env->yieldContent('student-open'); ?>">
                <a href="#" class="nav-link <?php echo $__env->yieldContent('studentss'); ?>">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Profile
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item ml-2">
                        <?php echo session('status') =='4'?'
                        <a class="nav-link collapsed" href="/viewprofile">
                            <i class="fas fa-user"></i>
                            <span>View Profile</span>
                        </a>
                        ':''; ?>

                    </li>
                    <li class="nav-item">
                        <a href="/editpassword" class="nav-link <?php echo $__env->yieldContent('password'); ?>">
                            <i class="fa fa-unlock-alt nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview <?php echo $__env->yieldContent('course-open'); ?>">
                
                
        
        
        </li>


        

        <li class="nav-item has-treeview <?php echo $__env->yieldContent('fees-open'); ?>">
            <a href="#" class="nav-link <?php echo $__env->yieldContent('fees'); ?>">
                <i class="nav-icon fa fa-credit-card"></i>
                <p>
                    Remita
                    <i class="right fas fa-angle-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="paymentview/session('userid')" class="nav-link <?php echo $__env->yieldContent('viewremita'); ?>">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>View Remita Payment</p>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item">
            <a href="/logoutUser" class="nav-link" Contact onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off nav-icon text-danger"></i>
                <?php echo e(__('  Logout')); ?>

                <form id="logout-form" action="/logoutUser" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </a>
        </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\Users\CLINTON\Downloads\incla\resources\views/adminsials/sidebar.blade.php ENDPATH**/ ?>