<?php $__env->startSection('pagetitle'); ?>
    Academic Results
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('result-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('result'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('results'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



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
                        Academic Results
                    </h1>

                    

                    <div class="table-responsive shadow">

                        <table class="table table-striped">
                            <thead>

                                <th>#</th>
                                <th>Session</th>
                                <th>Semester</th>
                                <th>Level</th>
                                <th>GPA</th>
                                <th>Details</th>
                                <th>Course Form</th>

                            </thead>


                            <tbody>

                                <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($reg->session); ?></td>
                                        <td><?php echo e($reg->semester); ?></td>
                                        <td><?php echo e($reg->level); ?></td>
                                        <td><?php echo e($reg->gpa()->value); ?></td>
                                        <td>
                                            <?php if($reg->result()->isNotEmpty()): ?>
                                                <a class="btn btn-primary"
                                                    href="<?php echo e(route('student.semester-result', base64_encode($reg->id))); ?>"
                                                    target="_blank"> <i class="fa fa-eye"></i> Show Result </a>
                                            <?php else: ?>
                                                Results not yet available
                                            <?php endif; ?>

                                        </td>
                                        <td> <a class="btn btn-info"
                                                href="<?php echo e(route('student.course-form', base64_encode($reg->id))); ?>"
                                                target="_blank"> <i class="fa fa-print"></i> Print Form </a></td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </tbody>



                        </table>


                    </div>






















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

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/results.blade.php ENDPATH**/ ?>