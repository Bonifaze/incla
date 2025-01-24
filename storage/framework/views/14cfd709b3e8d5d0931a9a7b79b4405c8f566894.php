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
        <li class="nav-item">
            <div class="dropdown">
                <button class="users arrow-down-icon border border-gray-100 rounded-circle p-2 position-relative" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="data:image/png;base64,<?php echo e(Auth::guard('staff')->user()->passport); ?>" alt="User Image" class="h-20 w-20 rounded-circle" style="width: 20px;">
                        <span class="activation-badge position-absolute w-2 h-2 bg-success rounded-circle" style="bottom: 0; right: 0; border: 2px solid white;">
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end border-0 shadow p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        <div class="card-body">
                            <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100 text-center">
                                <h4 class="mb-0">
                                    <div class="info text-wrap">
                                        <a href="<?php echo e(route('staff.profile')); ?>" class="d-block"><?php echo e(Auth::guard('staff')->user()->full_name); ?></a>
                                    </div>
                                </h4>
                            </div>
                            <ul class="list-unstyled max-h-270 overflow-y-auto">
                                <li class="mb-3">
                                    <a href="setting.html" class="d-flex align-items-center py-2 px-3 text-dark text-decoration-none hover-bg-light rounded">
                                        <i class="fas fa-cog me-2 text-primary"></i>
                                        Account Settings
                                    </a>
                                </li>
                                <li class="border-top pt-3">
                                    <a href="<?php echo e(route('staff.logout')); ?>" class="nav-link" Contact onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-power-off nav-icon text-danger"></i>
                                        <?php echo e(__('Logout')); ?>

                                        <form id="logout-form" action="<?php echo e(route('staff.logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
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

<?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/partialsv3/navbar.blade.php ENDPATH**/ ?>