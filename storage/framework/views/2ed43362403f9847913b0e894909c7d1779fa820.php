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
<!-- Add this to your CSS -->
<style>
    .zoom-img {
        transition: transform 0.3s ease;
    }

    .zoom-img:hover {
        transform: scale(1.1);
        /* Adjust the scale value to zoom in or out */
    }
</style>
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
                        class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                        APPLICANT PROFILE
                    </h1>

                    <div class="app-wrapper">

                        <div class="app-content pt-3 p-md-3 p-lg-4">
                            <div class="container-xl">
                                <?php echo csrf_field(); ?>
                                <?php if(session('approvalMsg')): ?>
                                    <?php echo session('approvalMsg'); ?>

                                <?php endif; ?>
                                <div class="container py-5">
                                    <div class="col-6 col-lg-6">
                                        <form method="get"
                                            action="/recommend/<?php echo e($applicantsDetails->applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicantsDetails->user_id))); ?>">
                                            <?php echo csrf_field(); ?>
                                           

                                                <button type="submit"
                                                    class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                                    <?php echo e(__('Recommend')); ?>

                                                </button>
                                           
                                        </form>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                        <form method="get"
                                                        action="/rejection/<?php echo e($applicantsDetails->applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicantsDetails->user_id))); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        
                                                            <button type="submit"
                                                                class=" btn text-white fw-bold bg-danger bg-gradient mb-3 px-5 float-end">
                                                                <?php echo e(__('Reject ')); ?>

                                                            </button>
                                                        </div>
                                                    </form>
                                                </div> 
                                    </div>
                                    <div class="row">
                                        <!-- Left Column (Profile Section) -->
                                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                                            <div class="card rounded-4 shadow-lg border-0">
                                                <div class="card-header text-center bg-primary text-white py-4 rounded-4">
                                                    <h5 class="mb-0">Personal Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Profile Photo -->
                                                    <div class="mb-4 text-center">
                                                        <img src="data:image/jpg;base64,<?php echo e($applicantsDetails->passport); ?>"
                                                            alt="Applicant Passport"
                                                            class="rounded-circle shadow-lg border-4 border-primary"
                                                            style="width: 100px; height: 100px; max-width: 100%; object-fit: cover;">
                                                    </div>

                                                    <!-- Name Details -->
                                                    <div class="bio-details">
                                                        <p
                                                            class="fs-5 text-dark fw-bold d-flex justify-content-between mb-3">
                                                            Surname: <span
                                                                class="text-muted"><?php echo e($applicantsDetails->surname); ?></span>
                                                        </p>
                                                        <p
                                                            class="fs-5 text-dark fw-bold d-flex justify-content-between mb-3">
                                                            First Name: <span
                                                                class="text-muted"><?php echo e($applicantsDetails->first_name); ?></span>
                                                        </p>
                                                        <p
                                                            class="fs-5 text-dark fw-bold d-flex justify-content-between mb-3">
                                                            Other Name: <span
                                                                class="text-muted"><?php echo e($applicantsDetails->middle_name); ?></span>
                                                        </p>
                                                    </div>

                                                    <div class="bio-data-fields">


                                                        <!-- Gender and Date of Birth on the same line, left and right aligned -->
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Gender:</div>
                                                            <div class="text-dark"><?php echo e($applicantsDetails->gender); ?></div>

                                                            <div class="fw-bold text-muted ms-5">Date of Birth:</div>
                                                            <!-- Added space between the fields -->
                                                            <div class="text-dark"><?php echo e($applicantsDetails->dob); ?></div>
                                                        </div>
                                                        <!-- State of Origin and LGA on the same line, left and right aligned -->


                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">State of Origin:</div>
                                                            <div class="text-dark ms-auto">
                                                                <?php echo e($applicantsDetails->state_origin); ?></div>

                                                            <div class="fw-bold text-muted">LGA:</div>
                                                            <div class="text-dark ms-auto"><?php echo e($applicantsDetails->lga); ?>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Email:</div>
                                                            <div class="text-dark"><?php echo e($applicantsDetails->email); ?></div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Address:</div>
                                                            <div class="text-dark"><?php echo e($applicantsDetails->address); ?></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column (Additional Information Section) -->
                                        <div class="col-12 col-lg-6">
                                            <div class="card rounded-4 shadow-lg border-0">
                                                <div class="card-header bg-success text-white text-center py-4 rounded-4">
                                                    <h5 class="mb-0">Other Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="bio-data-fields">
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Sponsors Name:</div>
                                                            <div class="text-dark">
                                                                <?php echo e($applicantsDetails->sponsor_surname); ?></div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Sponsors Email:</div>
                                                            <div class="text-dark"><?php echo e($applicantsDetails->sponsors_email); ?>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Sponsors Phone Number:</div>
                                                            <div class="text-dark"><?php echo e($applicantsDetails->sponsors_phone); ?>

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Sponsors Address:</div>
                                                            <div class="text-dark">
                                                                <?php echo e($applicantsDetails->sponsors_address); ?></div>
                                                        </div>
                                                        <br>
                                                        <br>
                                                        <br>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Admission Type:</div>
                                                            <div class="text-dark">
                                                                <b><?php echo e($applicantsDetails->admission_type); ?></b></div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Course Applied:</div>
                                                            <div class="text-dark">
                                                                <b><?php echo e($applicantsDetails->course_program); ?></b></div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">School Attended:</div>
                                                            <div class="text-dark">
                                                                <b><?php echo e($applicantsDetails->school_attended); ?></b></div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Certificates Obtained:</div>
                                                            <div class="text-dark">
                                                                <b><?php echo e($applicantsDetails->certificates_obtained); ?></b>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div class="fw-bold text-muted">Previous Project Topic:</div>
                                                            <div class="text-dark">
                                                                <b><?php echo e($applicantsDetails->pr_topic); ?></b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Degree Certificate and Olevel Section -->
                                    <div class="row gy-4 mb-4 mt-1">
                                        <div class="col-12">
                                            <div class="card rounded-4 shadow-lg border-0">
                                                <div class="card-header text-center bg-info text-white py-4 rounded-4">
                                                    <h5 class="mb-0">Certificates Uploaded</h5>
                                                </div>
                                                <div class="card-body text-center">
                                                    <div class="row">
                                                        <!-- Degree Certificate -->
                                                        <div class="col-12 col-md-6 mb-3">
                                                            <div class="image-container">
                                                                <img class="mx-auto d-block zoom-img"
                                                                    src="data:image/jpeg;base64,<?php echo e($applicantsDetails->cert); ?>"
                                                                    alt="Degree Certificate"
                                                                    style="height: 510px; width: 100%; object-fit: cover;">
                                                            </div>
                                                        </div>

                                                        <!-- Olevel Result -->
                                                        <div class="col-12 col-md-6 mb-3">
                                                            <div class="image-container">
                                                                <img class="mx-auto d-block zoom-img"
                                                                    src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel1); ?>"
                                                                    alt="Olevel Second Sitting"
                                                                    style="height: 500px; width: 100%; object-fit: cover;">
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($applicantsDetails->olevel2)): ?>
    <div class="col-12 col-md-6 mb-3">
        <div class="image-container">
            <img class="mx-auto d-block zoom-img" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel2); ?>" alt="Olevel Second Sitting" style="height: 500px; width: 100%; object-fit: cover;">
        </div>
    </div>
<?php endif; ?>

                                                    </div>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/admissions/layouts/viewUtmeApplicants.blade.php ENDPATH**/ ?>