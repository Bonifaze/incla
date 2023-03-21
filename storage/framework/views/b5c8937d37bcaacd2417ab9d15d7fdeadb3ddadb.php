<?php $__env->startSection('pagetitle'); ?>
    Edit Program
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Edit Session
                    </h1>
                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo Form::model($sessions, ['method' => 'PATCH', 'route' => ['session.update', $sessions->id]]); ?>


                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="name">Session Name :</label>
                                        <?php echo Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
                                    </div>



                                </div>

                    <h3
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-warning border">
                        Set Semester
                    </h3>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="degree">Semester:</label>
                                        <?php echo e(Form::select(
                                            'semester',
                                            [
                                                '1' => 'First Semester',
                                                '2' => 'Second Semester',

                                            ],
                                            $sessions->semester,
                                            ['class' => 'form-control select2'],
                                        )); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('degree')); ?></span>
                                    </div>



                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <?php echo e(Form::submit('Update', ['class' => 'btn btn-primary'])); ?>

                        </div>

                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/sessions/edit.blade.php ENDPATH**/ ?>