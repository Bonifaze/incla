<?php $__env->startSection('pagetitle'); ?>
    Manage Student
<?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('resulsts-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('resulsts'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-remasrk'); ?>
    active
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->





                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewcourseform', 'App\StudentResult')): ?>
                        <div class="card ">
                            <h1
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Courses Registered by <?php echo e($student->full_name); ?> <span class="text-primary">
                                </span>
                            </h1>

                            <div class="table-responsive">

                                <!-- form start -->

                                <?php echo Form::open(['route' => 'result.courseRegStudentForm', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                                <div class="card-body">
                                    <div class="box-body">

                                        <div class="row">

                                            <div class="col-md-6 form-group">
                                                <label for="session_id">Select Session you would like to see :</label>
                                                <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                                <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                            </div>




                                        </div>

                                        <?php echo e(Form::hidden('student_id', $student->id)); ?>


                                    </div>
                                </div>


                                <!-- /.card-body -->

                                <div class="card-footer">

                                    <?php echo e(Form::submit('View Course Form', ['class' => 'btn btn-primary'])); ?>

                                </div>

                            </div>
                            <!-- /.box-body -->


                            <?php echo Form::close(); ?>


                        </div>
                    <?php else: ?>
                    <?php endif; ?>





















            </div>
            <!--/.col (left) -->

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/results/coursesReg-student.blade.php ENDPATH**/ ?>