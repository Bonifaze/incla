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
                        UTME APPLICANTS LIST
                    </h1>





    <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card m-3 shadow">
                        <div class="card-header py-3">
                            
                            <hr class="sidebar-divider">
                            <a href="/allApprovedApplicants/UTME" class="btn btn-success shadow-sm m-1 text-white"> Approved</a>
                            <a href="/qualified/UTME" class="btn btn-primary shadow-sm m-1 text-white"> Recommended </a>
                            
                            <?php if(session('approvalMsg')): ?>
                            <?php echo session('approvalMsg'); ?>

                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <hr class="sidebar-divider">
                                <form action="/adminUtmeFilter" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <label for="start"><b class="text-success">Apllied From:</b></label>
                                    <input type="date" id="start" name="start_date" value="" class="mr-5 rounded">
                                    <input type="hidden" name="applicant_type" value="UTME">
                                    <label for="start"><b class="text-success">To:</b></label>
                                    <input type="date" id="start" name="end_date" value="" class="mr-5 rounded">
                                    <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                </form>
                                <hr class="sidebar-divider">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Surname</th>
                                            <th>Phone Number</th>
                                            <th>Gender</th>
                                            <th>Course Applied</th>
                                            <th>Application Date</th>
                                            <th>Action</th>
                                            <th>Full Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $__currentLoopData = $utmeApplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utmeApplicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e($utmeApplicant -> first_name); ?></td>
                                            <td><?php echo e($utmeApplicant -> surname); ?></td>
                                            <td><?php echo e($utmeApplicant -> phone); ?></td>
                                            <td><?php echo e($utmeApplicant -> gender); ?></td>
                                            <td><?php echo e($utmeApplicant -> course_applied); ?></td>
                                            <td><?php echo e($utmeApplicant -> created_at); ?></td>
                                            <td><a href="/recommend/<?php echo e($utmeApplicant -> applicant_type); ?>/<?php echo e(urlencode(base64_encode($utmeApplicant -> id))); ?>" class="btn btn-primary border mt-2"> Recommend </a></td>
                                            <td><a href="/adminView/<?php echo e($utmeApplicant -> applicant_type); ?>/<?php echo e(urlencode(base64_encode($utmeApplicant -> id))); ?>" class="btn btn-primary border mt-2">View </a></td>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions/utmeApplicants.blade.php ENDPATH**/ ?>