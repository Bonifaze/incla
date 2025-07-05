<?php $__env->startSection('pagetitle'); ?>
    Staff Home
<?php $__env->stopSection(); ?>

<style>
  /* Styling for the small avatar container */
  .avatar-sm {
    width: 40px;  /* Set the container size to 40px */
    height: 40px; /* Same height as width to keep it circular */
    display: inline-flex; /* Ensure it stays inline */
    justify-content: center;
    align-items: center;
  }

  /* Styling for the image inside the avatar */
  .avatar-img {
    width: 100%;  /* Ensure the image fills the container */
    height: 100%; /* Maintain aspect ratio within the container */
    object-fit: cover; /* Ensure the image is properly cropped to fit */
    border-radius: 50%; /* Ensure the image stays round */
  }
</style>


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


<h1 class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                    Welcome to InCLA <?php echo e($userType); ?> APPLICANTS LIST
                </h1>



<div class="card-body ps-0" style="overflow-x: auto; white-space: nowrap; padding-bottom: 1rem;">
                    <div class="d-flex">
                        <!-- Avatar items with responsive grid classes -->
                       <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="col-lg-1 col-md-2 col-sm-3 col-4 text-center mb-3">
                            <a href="/adminView/<?php echo e($applicant -> applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicant -> id))); ?>" class="avatar avatar-sm rounded-circle border border-primary">
                                <img alt=" <?php echo e($applicant -> first_name); ?> <?php echo e($applicant -> first_name); ?> " title="<?php echo e(ucwords(strtolower($applicant->surname))); ?> <?php echo e(ucwords(strtolower($applicant->first_name))); ?> <?php echo e(ucwords(strtolower($applicant->middle_name))); ?>" class="avatar-img" src="data:image/png;base64,<?php echo e($applicant->passport); ?>">
                            </a>
                            <p class="mb-0 text-sm" ><?php echo e(ucwords(strtolower($applicant->surname))); ?> <?php echo e(ucwords(strtolower($applicant->first_name))); ?></p>
                            
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- More avatars can be added here -->
                    </div>
                </div>


    <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Card Header - Dropdown -->
                    <div class="card m-3 shadow">
                        <div class="card-header py-3">
                            
                            <hr class="sidebar-divider">
                            <a href="/allApprovedApplicants/<?php echo e($userType); ?>" class="btn btn-success shadow-sm m-1 text-white"> Approved</a>
                            <a href="/qualified/<?php echo e($userType); ?>" class="btn btn-primary shadow-sm m-1 text-white"> Recommended </a>


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
                                        <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td><?php echo e($applicant -> first_name); ?></td>
                                            <td><?php echo e($applicant -> surname); ?></td>
                                            <td><?php echo e($applicant -> phone); ?></td>
                                            <td><?php echo e($applicant -> gender); ?></td>
                                            <td><?php echo e($applicant -> course_program); ?></td>
                                            <td><?php echo e($applicant -> created_at); ?></td>
                                            <td><a href="/recommend/<?php echo e($applicant -> applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicant -> id))); ?>" class="btn btn-primary border mt-2"> Recommend </a></td>
                                            <td><a href="/adminView/<?php echo e($applicant -> applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicant -> id))); ?>" class="btn btn-primary border mt-2">View </a></td>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions/formview.blade.php ENDPATH**/ ?>