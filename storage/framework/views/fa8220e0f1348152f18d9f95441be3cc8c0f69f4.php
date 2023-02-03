<?php $__env->startSection('pagetitle'); ?>
    Staff Home
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Staff Courses
                    </h1>

                    <div class="card shadow border border-success">


                      <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    
                                    <div class="table-responsive mt-5">
                                        <table class="table table-bordered table-striped table-hover tbl">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                     <th>Course Code</th>
                                                    <th>Course Title</th>

                                                    <th>Total Students</th>
                                                    <th>Upload Status</th>
                                                    <th>HODs Approval</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($staff_course->course_code  ?? ' '); ?></td>
                                                        <td><?php echo e($staff_course->course_title); ?></td>

                                                        <th><?php echo e($staff_course->total_students); ?></th>
                                                        <td><?php echo e($staff_course->upload_status); ?></td>
                                                        <td><?php echo e($staff_course->hod_approval); ?></td>
                                                        <td><?php if($staff_course->hod_approval != 'approved'): ?> <a href="<?php echo e(route('admin.scores_upload', $staff_course->id)); ?>"
                                                                class="btn btn-primary">Upload Scores</a> <?php else: ?> No Action <?php endif; ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/course_upload.blade.php ENDPATH**/ ?>