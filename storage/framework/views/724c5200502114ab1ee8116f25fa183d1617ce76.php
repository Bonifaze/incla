<?php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
?>


<?php $__env->startSection('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Begin Page Content -->
        <div class="container-fluid p-5">

            <!-- Page Heading -->
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h5 mb-2 p-2 fw-bold text-capitalize text-success">Administrator Dashboard</h1>
            </div> -->

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="body">
                                <h4 class="card-title">
                                    Staff Course
                                </h4>
                                <div class="table-responsive mt-5">
                                    <table class="table table-bordered table-striped table-hover tbl">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course Title</th>
                                                <th>Course Code</th>
                                                <th>Upload Status</th>
                                                <th>Approval Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <td><?php echo e($staff_course->course_title); ?></td>
                                                    <td><?php echo e($staff_course->course_code); ?></td>
                                                    <td><?php echo e($staff_course->upload_status); ?></td>
                                                    <td><?php echo e($staff_course->approval_status); ?></td>
                                                    <td><a href="<?php echo e(route('admin.scores_upload', $staff_course->course_id)); ?>" class="btn btn-primary">Upload Scores</a></td>
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


            <!-- Footer -->
            <!--  -->
            <!-- End of Footer -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/results/course_upload.blade.php ENDPATH**/ ?>