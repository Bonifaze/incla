<?php $__env->startSection('pagetitle'); ?>
    Manage Student
<?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-opn'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('resuls'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-rema'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ictUpload', 'App\StudentResult')): ?>


                        <div class="card card-primary">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                               Download Old Result <span class="text-primary">
                                </span>
                            </h1>

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive">

                            <!-- form start -->

 <?php echo Form::open(['route' => 'academia.department.export_view_oldresult', 'method' => 'GET', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-6  form-group">
                                            <label for="session_id">Session :</label>
                                            <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                        </div>

                                          <div class="col-md-6 form-group">
                                            <label for="session_id">Session :</label>
                                            <?php echo e(Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                        </div>

                                        <div class="col-md-6  form-group">
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

                                        <div class="col-md-6 form-group">
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


                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                <?php echo e(Form::submit('Download', ['class' => 'btn btn-primary float-right'])); ?>


                            </div>

                        </div>
                        <!-- /.box-body -->


                        <?php echo Form::close(); ?>


                    </div>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>

    </div>
    <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/ict/manage_oldresult.blade.php ENDPATH**/ ?>