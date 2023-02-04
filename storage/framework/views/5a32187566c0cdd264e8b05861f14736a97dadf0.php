<?php $__env->startSection('pagetitle'); ?>
    Manage Student
<?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-remark'); ?>
    active
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">


                    

                        <!-- /.start second column -->
                        <div>


                                 <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Result History for <?php echo e($student->full_name); ?> <span class="text-primary"> <?php echo e($academic->mat_no); ?>

                            </span>
                        </h1>

                                <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="table-responsive">

                                    <!-- form start -->

                                    <div class="card-body">
                                        <div class="">

                                            Displays all academic results for this student.
                                            Only Senate approve result will be shown

                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <a class="btn btn-info"
                                            href="<?php echo e(route('result.student.history', base64_encode($student->id))); ?>"
                                            target="_blank"> <i class="fa fa-eye"></i> Result History</a>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                            </div>

                        </div>



    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ictUpload', 'App\StudentResult')): ?>
            <div>

                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Result Upload for <?php echo e($student->full_name); ?> <span class="text-primary"> <?php echo e($academic->mat_no); ?>

                            </span>
                        </h1>
                    </div>
                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">

                        <!-- form start -->

                        <?php echo Form::open(['route' => 'result.modify', 'method' => 'GET', 'class' => 'nobottommargin']); ?>

                        <div class="card-body">
                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="session_id">Session :</label>
                                        <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="semester">Semester :</label>
                                        <?php echo e(Form::select(
                                            'semester',
                                            [
                                                '1' => 'First Semester',
                                                '2' => 'Second Semester',
                                            ],
                                            1,
                                            ['class' => 'form-control select2'],
                                        )); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="level">Level :</label>
                                        <?php echo e(Form::select(
                                            'level',
                                            [
                                                '100' => '100 Level',
                                                '200' => '200 Level',
                                                '300' => '300 Level',
                                                '400' => '400 Level',
                                                '500' => '500 Level',
                                                '600' => '600 Level',
                                                '700' => 'PGD',
                                                '800' => 'MSc',
                                                '900' => 'PhD',
                                            ],
                                            100,
                                            ['class' => 'form-control select2'],
                                        )); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
                                    </div>

                                </div>

                                <?php echo e(Form::hidden('student_id', $student->id)); ?>


                            </div>
                        </div>


                        <!-- /.card-body -->

                        <div class="card-footer">

                            <?php echo e(Form::submit('Select', ['class' => 'btn btn-primary'])); ?>


                        </div>

                    </div>
                    <!-- /.box-body -->


                    <?php echo Form::close(); ?>


                </div>
                  <?php else: ?>
                                 <div></div>
                                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register', 'App\StudentResult')): ?>
                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Course Registration for <?php echo e($student->full_name); ?> <span class="text-primary">
                                <?php echo e($academic->mat_no); ?> </span>
                        </h1>

                        <div class="table-responsive">

                            <!-- form start -->

                            <?php echo Form::open(['route' => 'result.registration', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label for="session_id">Session :</label>
                                            <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="semester">Semester :</label>
                                            <?php echo e(Form::select(
                                                'semester',
                                                [
                                                    '1' => 'First Semester',
                                                    '2' => 'Second Semester',
                                                ],
                                                1,
                                                ['class' => 'form-control select2'],
                                            )); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label for="level">Level :</label>
                                            <?php echo e(Form::select(
                                                'level',
                                                [
                                                    '100' => '100 Level',
                                                    '200' => '200 Level',
                                                    '300' => '300 Level',
                                                    '400' => '400 Level',
                                                    '500' => '500 Level',
                                                    '600' => '600 Level',
                                                    '700' => 'PGD',
                                                    '800' => 'MSc',
                                                    '900' => 'PhD',
                                                ],
                                                100,
                                                ['class' => 'form-control select2'],
                                            )); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
                                        </div>

                                    </div>

                                    <?php echo e(Form::hidden('student_id', $student->id)); ?>


                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                <?php echo e(Form::submit('Select', ['class' => 'btn btn-primary'])); ?>

                            </div>

                        </div>
                        <!-- /.box-body -->


                        <?php echo Form::close(); ?>


                    </div>
                <?php else: ?>
                <?php endif; ?>




















            </div>
            <!-- /.box -->

    </div>
    <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/manage-student.blade.php ENDPATH**/ ?>