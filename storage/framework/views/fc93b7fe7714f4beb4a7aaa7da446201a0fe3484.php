<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #302b2b; color: #e5e5e5;">
    <!-- Brand Logo -->

    <div class="bg-white text-center">
        <a class="navbar-brand" href="<?php echo e(route('student.home')); ?>">
            <img src="<?php echo e(asset('img/logs.png')); ?>" alt="" width="170" height="60" class="px-2">
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="navbar-brand" href="<?php echo e(route('student.profile')); ?>">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="image">
                    <img src="data:image/png;base64,<?php echo e(Auth::guard('student')->user()->passport); ?>"
                        class="img-circle elevation-2" alt="User Image" style="width: 50px;">
                </div>

                <div class="info text-wrap">
                    <div class="d-block"><?php echo e(Auth::guard('student')->user()->full_name); ?></div>
                </div>

            </div>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item ">
                    <a href="<?php echo e(route('student.home')); ?>" class="nav-link <?php echo $__env->yieldContent('home'); ?>">
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

                        <li class="nav-item">
                            <a href="<?php echo e(route('student.profile')); ?>" class="nav-link <?php echo $__env->yieldContent('gprofile'); ?>">
                                <i class="fa fa-user-alt nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('student.showedit')); ?>" class="nav-link <?php echo $__env->yieldContent('gprofile'); ?>">
                                <i class="fa fa-user-alt nav-icon"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('student.password')); ?>" class="nav-link <?php echo $__env->yieldContent('password'); ?>">
                                <i class="fa fa-unlock-alt nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview <?php echo $__env->yieldContent('course-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('course'); ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Courses
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('student.course-registration')); ?>" class="nav-link <?php echo $__env->yieldContent('registration'); ?>">
                                    <i class="fa fa-tasks nav-icon"></i>
                                    <p>Course Registration</p>
                                </a>
                            </li>
                            
                            


                        
                    </ul>
                </li>



                <li class="nav-item has-treeview <?php echo $__env->yieldContent('result-open'); ?>">
                    <a href="#" class="nav-link <?php echo $__env->yieldContent('result'); ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Results
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('students.results')); ?>" class="nav-link <?php echo $__env->yieldContent('results'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Academic Results</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('students.transcript')); ?>" class="nav-link <?php echo $__env->yieldContent('transcript'); ?>">
                                <i class="fa fa-eye nav-icon"></i>
                                <p>Unofficial Transcript</p>
                            </a>
                        </li>

                    </ul>
                </li>

                

                <li class="nav-item">
                    <a href="<?php echo e(route('student.logout')); ?>" class="nav-link"Contact
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off nav-icon text-danger"></i>
                        <?php echo e(__('  Logout')); ?>

                        <form id="logout-form" action="<?php echo e(route('student.logout')); ?>" method="POST"
                            style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/spartials/sidebar.blade.php ENDPATH**/ ?>