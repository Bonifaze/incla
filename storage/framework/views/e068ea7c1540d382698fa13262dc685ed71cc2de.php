<aside class="main-sidebar sidebar-dark-primary elevation-4 nav-flat" style="background-color: #218c74; color: #fff">
    <!-- Brand Logo -->
    <style>
        .lightbulb-container {
            display: inline-block;
            position: relative;
            width: 50px;
            height: 80px;
        }

        .lightbulb-container:before {
            content: '';
            position: absolute;
            top: 20px;
            left: 50%;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #fff;
            transform: translateX(-50%);
            z-index: -1;
        }

        .lightbulb-container i {
            position: relative;
            z-index: 1;
        }

        @keyframes rainbow {
            0% {
                background-color: #ffffff;
                /* Red */


            }
        }

        .animate-rainbow {
            animation: rainbow 2s infinite;
        }
    </style>



    <div class="bg-white text-center">
        <a class="navbar-brand" href="https://www.veritas.edu.ng">
            <img src="<?php echo e(asset('img/veritasin.jpg')); ?>" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <div class="sidebar">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="data:image/png;base64,<?php echo e(Auth::guard('staff')->user()->passport); ?>"
                    class="img-circle elevation-2" alt="User Image" style="width: 50px;">
            </div>

            <div class="info text-wrap">
                <a href="#" class="d-block"><?php echo e(Auth::guard('staff')->user()->full_name); ?></a>
            </div>
        </div>
        

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('staff-home'); ?>">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?php echo $__env->yieldContent('staff-opens'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('staffs'); ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('staff-profile'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('list-staff'); ?>">
                                <i class="fas fa-list-alt nav-icon"></i>
                                <p>My Roles</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link <?php echo $__env->yieldContent('staff-password'); ?>">
                                <i class="fas fa-lock nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item">
                    <a href="<?php echo e(route('staff.logout')); ?>" class="nav-link" Contact
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off nav-icon text-danger"></i>
                        <?php echo e(__('Logout')); ?>

                        <form id="logout-form" action="<?php echo e(route('staff.logout')); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/partialsv3/sidebarPassword.blade.php ENDPATH**/ ?>