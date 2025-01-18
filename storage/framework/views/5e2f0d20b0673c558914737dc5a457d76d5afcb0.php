<?php $__env->startSection('pagetitle'); ?>
Staff Courses
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
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Staff Courses
                </h1>

                <div class="card shadow border border-success">


                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="body">
                                        
                                        <div class="table-responsive mt-5">
                                            <table class="table  table-striped table-hover tbl" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Course Code</th>
                                                        <th>Course Title</th>
                                                        <th>Semester</th>
                                                        <th>Students</th>
                                                        <th>Student Program</th>
                                                        <th>Upload Status</th>
                                                        <th>Upload Date</th>
                                                        <th>HoD Approval</th>
                                                        <th>Action</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($staff_course->course_code); ?></td>
                                                        <td><?php echo e($staff_course->course_title); ?></td>
                                                        <td>
                                                            <?php if($staff_course->semester==1): ?>
                                                            First
                                                            <?php else: ?>
                                                            Second
                                                            <?php endif; ?>
                                                        </td>
                                                        <th><?php echo e($staff_course->total_students); ?></th>
                                                        <th><?php echo e($staff_course->program->name ?? null); ?></th>
                                                        <td><?php echo e($staff_course->upload_status); ?></td>
                                                        <td><?php if($staff_course->upload_status =='uploaded'): ?>
                                                            <?php echo e($staff_course->updated_at); ?>

                                                            <?php else: ?>
                                                            Unavialble
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($staff_course->hod_approval); ?></td>
                                                        
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                            <a href="<?php echo e(route('admin.course_uploadprevious')); ?>" type="submit" class="btn btn-success" data-bs-target="#myModal"> <i class="fas fa-solid fa-eye"></i>
                                                View My Courses History</a>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/results/course_upload.blade.php ENDPATH**/ ?>