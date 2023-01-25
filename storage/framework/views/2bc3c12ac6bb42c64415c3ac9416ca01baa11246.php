<?php $__env->startSection('pagetitle'); ?>
    <?php echo e($program->name); ?> <?php echo e($level); ?> Level Students
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        <?php echo e($program->name); ?> <?php echo e($level); ?> Level Students
                    </h1>

                    <div class="card">
                        <div class="table-responsive card-body">
                            <table class="table table-striped">
                                <thead>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Mat No</th>
                                    <th>View</th>
                                    <th>Transcript</th>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td> <?php echo e($loop->iteration); ?></td>
                                            <td> <?php echo e($student->full_name); ?></td>
                                            <td> <?php echo e($student->phone); ?></td>
                                            <td> <?php echo e($student->mat_no); ?></td>
                                            <td><a class="btn btn-primary" target="_blank"
                                                    href="<?php echo e(route('student.view', $student->student_id)); ?>"> Show</a></td>
                                            <td><a class="btn btn-info" target="_blank"
                                                    href="<?php echo e(route('student.transcript', base64_encode($student->student_id))); ?>">
                                                    Transcript</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/colleges/program_level_students.blade.php ENDPATH**/ ?>