<?php $__env->startSection('content'); ?>
<div class="h-screen bg-slate-900 p-10">
    <!-- left column -->
    <div class="col form-group">
        <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-white border">
            Result History for <?php echo e($student->full_name); ?> <span class="text-primary">
                <?php echo e($academic->mat_no); ?>

            </span>
        </h1>

        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-responsive">

            <!-- form start -->

            <div class="card-body">
                <div class="text-white">
                    Displays all academic results for this student.
                    Only Senate approve result will be shown without GPA and CGPA just Courses and Grade.
                    <br>

                </div>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-info" href="<?php echo e(route('result.student.history', base64_encode($student->id))); ?>"
                    target="_blank">
                    <i class="fa fa-eye"></i> Result History</a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transcript', 'App\Student')): ?>
                    <a class="btn btn-primary float-right"
                        href="<?php echo e(route('student.transcript', base64_encode($student->id))); ?>" target="_blank"> <i
                            class="fa fa-eye"></i> Transcript</a>
                <?php endif; ?>

            </div>

        </div>
        <!-- /.box-body -->
    </div>

    <di class="">
        <h1
            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-white border">
            Result Modification for <?php echo e($student->full_name); ?> <span class="text-primary"> <?php echo e($academic->mat_no); ?>

            </span>
        </h1>

        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-responsive">

            <!-- form start -->

            <?php echo Form::open(['route' => 'result.modifySpotlight', 'method' => 'GET', 'class' => 'nobottommargin']); ?>

            <div class="card-body">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="session_id" class="text-white">Session :</label>
                            <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                            <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                        </div>

                        <div class="col-md-4 form-group">
                            <label for="semester" class="text-white">Semester :</label>
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
                            <label for="level" class="text-white">Level :</label>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/spotlight/manage-studentSpotlight.blade.php ENDPATH**/ ?>