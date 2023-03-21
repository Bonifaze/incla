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
                      ALL APPLICANTS
                    </h1>



   <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">

                    <!-- Card Header - Dropdown -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Course Applied</th>
                                            <th>Applicant Type</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $allAppli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allApp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td><?php echo e($allApp['first_name']); ?></td>
                                            <td><?php echo e($allApp['surname']); ?></td>
                                            <td><?php echo e($allApp['phone']); ?></td>
                                            <td><?php echo e($allApp['gender']); ?></td>
                                            <td><?php echo e($allApp['course_applied']); ?></td>
                                            <td><?php echo e($allApp['applicant_type']); ?></td>
                                            <td><a href="/adminView/<?php echo e($allApp['applicant_type']); ?>/<?php echo e(urlencode(base64_encode($allApp['id']))); ?>" class="btn btn-primary border mt-2"> View </a></td>

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
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/allApplicants.blade.php ENDPATH**/ ?>