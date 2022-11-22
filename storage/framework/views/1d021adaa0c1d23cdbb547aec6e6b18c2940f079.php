<?php $__env->startSection('pagetitle'); ?>
    Staff Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Dashboard
                    </h1>

                    <div class="card shadow border border-success">

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="#"
                                                        class="text-success <?php echo $__env->yieldContent('staff-courses'); ?>">My Courses</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book-open fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-3">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="<?php echo e(route('staff.results')); ?>" class="text-success <?php echo $__env->yieldContent('staff-results'); ?>">My Results</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-book fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row p-5">

                            <div class="col-xl-6 col-md-6">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                    <a href="<?php echo e(route('student.search')); ?>"
                                                        class="text-success <?php echo $__env->yieldContent('registration'); ?>">Search Student</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-search fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/staff/home.blade.php ENDPATH**/ ?>