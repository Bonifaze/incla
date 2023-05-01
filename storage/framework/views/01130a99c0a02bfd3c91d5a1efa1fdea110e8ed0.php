<?php $__env->startSection('pagetitle'); ?>
    Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

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
                                                       
                                                    
                                                        
                                                        <a href="<?php echo e(route('student.closed-course-registration')); ?>"
                                                        class="text-success <?php echo $__env->yieldContent('registration'); ?>">Course Registration</a>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-tasks fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <a class="" href="/students/remita/feestype">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-3">
                                                    <div class="h4 text-success" style="text-decoration: underline;">
                                                        <a href="/students/remita/feestype" class="text-success">Generate
                                                            Remita</a>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-credit-card fa-3x text-success"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>


                        

                        

                    </div>
                     <div class="card shadow border border-success">

                        <div class="row p-5">
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success" style="text-decoration: underline;">
                                                        <a href="<?php echo e(route('students.transcript')); ?>"
                                                        class="text-success <?php echo $__env->yieldContent('registration'); ?>">View Result</a>

                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-eye nav-icon fa-3x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <a class="" href="/students/remita/feestype">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-3">
                                                    <div class="h4 text-success" style="text-decoration: underline;">
                                                        <a href="/students/remita/paymentview/{id}" class="text-success">View
                                                            Remita</a>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-eye nav-icon fa-3x text-success"></i>
                                                </div>
                                            </div>
                                        </a>
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

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/home.blade.php ENDPATH**/ ?>