<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #302b2b; color: #fff;" >
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="<?php echo e(route('student.home')); ?>">
            <img src="<?php echo e(asset('img/logs.png')); ?>" alt="InCLA logo" class="px-2" title="InCLA logo">
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
                    <p>Dashbord Home</p>
                </a>
            </li>

            <li class="nav-item has-treeview <?php echo $__env->yieldContent('student-open'); ?>">
                <a href="#" class="nav-link <?php echo $__env->yieldContent('studentss'); ?>">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Manage Profile
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item ml-2">
                        <?php if(session('status') == '4'): ?>
                        <a class="nav-link collapsed" href="/viewprofile">
                            <i class="fas fa-user"></i>
                            <span>View Profile</span>
                        </a>
                    <?php endif; ?>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link <?php echo $__env->yieldContent('profile'); ?>">
                            <i class="fa fa-unlock-alt nav-icon"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/editpassword" class="nav-link <?php echo $__env->yieldContent('password'); ?>">
                            <i class="fa fa-unlock-alt nav-icon"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item has-treeview <?php echo $__env->yieldContent('fees-open'); ?>">
                <a href="#" class="nav-link <?php echo $__env->yieldContent('fees'); ?>">
                    <i class="nav-icon fa fa-credit-card"></i>
                    <p>
                        Manage Payment
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="paymentview/session('userid')" class="nav-link <?php echo $__env->yieldContent('viewremita'); ?>">
                            <i class="fa fa-eye nav-icon"></i>
                            <p>View Payment</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="/logoutUser" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off nav-icon text-danger" title="Logout"></i>
                    <?php echo e(__('Logout')); ?>

                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->


    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\Users\hp\Desktop\incla\resources\views/adminsials/sidebar.blade.php ENDPATH**/ ?>