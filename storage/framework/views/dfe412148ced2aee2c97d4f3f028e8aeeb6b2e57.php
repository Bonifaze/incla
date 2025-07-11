<?php $__env->startSection('pagetitle'); ?>
    Create New Course
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('courses-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('courses'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('create-course'); ?>
    active
<?php $__env->stopSection(); ?>


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
                        Create Course
                    </h1>
                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo Form::open(['route' => 'course.store', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                    <div class="card-body">

                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-3 form-group">
                                    <label for="program_id">Program :</label>
                                    <?php echo e(Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="code">Course Code :</label>
                                    <?php echo Form::text('course_code', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'course_code',
                                        'name' => 'course_code',
                                        'required' => 'required',
                                    ]); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('course_code')); ?></span>
                                    
                                </div>


                                <div class="col-md-5 form-group">
                                    <label for="course_title">Course Title :</label>
                                    <?php echo Form::text('course_title', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'course_title',
                                        'required' => 'required',
                                    ]); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('course_title')); ?></span>
                                </div>

                                <div class="col-md-2 form-group">
                                    <label for="credit_load">Credit Load :</label>
                                    <?php echo Form::text('credit_unit', null, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'credit_unit',
                                        'required' => 'required',
                                    ]); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('credit_unit')); ?></span>
                                </div>
                            </div>


                            <div class="row">

                                

                                

                                

                            </div>

                            <div class="row">
                                


                                

                                


                                

                            </div>


                            <div class="row">


                                <div class="col-md-6 form-group pull-left">



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">


                        <?php echo e(Form::submit('Create Course', ['class' => 'btn btn-primary'])); ?>


                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/courses/create.blade.php ENDPATH**/ ?>