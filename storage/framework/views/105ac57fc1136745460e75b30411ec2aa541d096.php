<?php $__env->startSection('pagetitle'); ?>
    Search Course
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
                        Search Courses
                    </h1>

                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive">

                            <?php echo Form::open(['route' => 'course.find', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div <?php if($errors->has('data')): ?> class ='has-error form-group' <?php endif; ?>>
                                                <label for="data">Course Code / Course Title:</label>
                                                <?php echo Form::search('data', null, [
                                                    'placeholder' => ' CSC 101 or Introduction to Computer',
                                                    'class' => 'form-control',
                                                    'id' => 'data',
                                                    'required' => 'required',
                                                ]); ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <?php echo e(Form::submit('Search', ['class' => 'btn btn-primary'])); ?>

                            </div>

                        </div>
                        <?php echo Form::close(); ?>

                    </div>


                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        List Program Courses
                    </h1>
                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive">

                            <!-- form start -->

                            <?php echo Form::open(['route' => 'course.program_list', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="program">Program :</label>
                                            <?php echo e(Form::select('program', $programs, null, ['class' => 'form-control', 'id' => 'program', 'name' => 'program'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('program')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                <?php echo e(Form::submit('List', ['class' => 'btn btn-primary'])); ?>


                            </div>

                        </div>
                        <!-- /.box-body -->


                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/courses/search.blade.php ENDPATH**/ ?>