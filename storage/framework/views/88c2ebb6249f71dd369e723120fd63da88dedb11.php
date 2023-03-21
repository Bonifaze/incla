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
<?php $__env->startSection('password'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->




<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Change Password
                    </h1>
                    <div class="card">
                        <?php echo Form::open(['route' => 'student.change-password', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                        <div class="card-body">

                            <div class="box-body">
                                <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="row">

                                    <div class="col-md-4 form-group">
                                        <label for="current">Current Password:</label>
                                        <input name="current" type="password" class="form-control" value="">
                                        <span class="text-danger"> <?php echo e($errors->first('current')); ?> </span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="password">New Password:</label>
                                        <input name="password" type="password" class="form-control" value="">
                                        <span class="text-danger"> <?php echo e($errors->first('password')); ?> </span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="password-confirm">Confirm Password:</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                            value="">
                                        <span class="text-danger"> <?php echo e($errors->first('password_confirmation')); ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <?php echo e(Form::submit('Change Password', ['class' => 'btn btn-success'])); ?>

                        </div>

                        <?php echo Form::close(); ?>


                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/password.blade.php ENDPATH**/ ?>