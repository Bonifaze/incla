<?php $__env->startSection('pagetitle'); ?>
    Create New Department
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Create Department
                    </h1>

                    <div class="card">

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo Form::open(['route' => 'academia.department.store', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                        <div class="card-body">

                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="name">Department Name :</label>
                                        <?php echo Form::text('name', null, [
                                            'placeholder' => '',
                                            'class' => 'form-control',
                                            'id' => 'name',
                                            'required' => 'required',
                                        ]); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="college_id">Faculty :</label>
                                        <?php echo e(Form::select('college_id', $colleges, null, ['class' => 'form-control', 'id' => 'college_id', 'name' => 'college_id'])); ?>

                                        <span class="text-danger"> <?php echo e($errors->first('college_id')); ?></span>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group pull-left">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <?php echo e(Form::submit('Create Department', ['class' => 'btn btn-primary'])); ?>

                        </div>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/academia/departments/create.blade.php ENDPATH**/ ?>