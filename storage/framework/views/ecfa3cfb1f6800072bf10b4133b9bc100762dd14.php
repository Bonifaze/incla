<?php $__env->startSection('pagetitle'); ?>
    Edit Student Academic
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        <?php echo e($academic->student->full_name); ?> (<?php echo e($academic->mat_no); ?>)<br>
                         edit  Student Academics
                    </h1>
                    <div class="card ">

                        <!-- /.card-header -->
                        <!-- form start -->

                        <?php echo Form::model($academic, [
                            'method' => 'PATCH',
                            'route' => ['student-academic.update', $academic->id],
                            'class' => 'nobottommargin',
                            'files' => true,
                        ]); ?>


                        <div class="card-body">

                            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="box-body">



                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="mode_of_entry">Mode of Entry :</label>
                                        <?php echo e(Form::select(
                                            'mode_of_entry',
                                            [
                                                'Certificate' => 'Certificate',
                                                'Diploma' => 'Diploma',
                                                'TRANSFER' => 'Transfer',
                                                'Licentiate' => 'Licentiate',

                                            ],
                                            $academic->mode_of_entry,
                                            ['class' => 'form-control select2'],
                                        )); ?>


                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="mode_of_study">Mode of Study :</label>
                                        <?php echo e(Form::select(
                                            'mode_of_study',
                                            [
                                                'Full Time' => 'Full Time',
                                                'Part Time' => 'Part Time',

                                            ],
                                            $academic->mode_of_study,
                                            ['class' => 'form-control select2'],
                                        )); ?>


                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="entry_session_id">Entry Session :</label>
                                        <?php echo e(Form::select('entry_session_id', $sessions, null, ['class' => 'form-control', 'id' => 'entry_session_id', 'name' => 'entry_session_id'])); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('entry_session_id')); ?></span>

                                    </div>






<?php echo Form::hidden('level', 100, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]); ?>







                                    <div class="col-md-6 col-xl-12 form-group">
                                        <label for="program_id">Program :</label>
                                        <?php echo e(Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id'])); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>

                                    </div>



                                </div>


                            </div>

                        </div>

                    </div>





                    <!-- /.card-body -->

                    <div class="card-footer">



                        <?php echo e(Form::submit('Edit Student Academic', ['class' => 'btn btn-primary'])); ?>





                    </div>

                </div>
                <!-- /.box-body -->


                <?php echo Form::close(); ?>



                <!-- /.box -->

            </div>
            <!--/.col (left) -->

    </div>


    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/students/admin/academic/edit.blade.php ENDPATH**/ ?>