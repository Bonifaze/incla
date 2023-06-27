<?php $__env->startSection('pagetitle'); ?>
    <?php echo e($applicantsDetails -> surname); ?> Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
          <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                  PG Applicant Profile
                    </h1>
                                <div class="row gy-4">
                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Bio Data</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label mb-2">
                                                                <strong>Photo</strong>
                                                            </div>
                                                            <div class="rounded-circle">
                                                                <img class="rounded-circle p-3 mx-auto d-block" src="data:image/<?php echo e($applicantsDetails -> passport_type); ?>;base64,<?php echo e(base64_encode($applicantsDetails -> passport)); ?>" alt="Applicant Passport" style="height: 200px; width:200px;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Surname</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> surname); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>First Name</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> first_name); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Other Name</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> middle_name); ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Phone Number</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> phone); ?></div>
                                                        </div>
                                                        <!--//col-->
                                                        <!-- <div class="col text-end">
                                                            <a class="btn btn-success" href="#">Change</a>
                                                        </div> -->
                                                        <!--//col-->
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <!--//app-card-->
                                    </div>
                                    <!--//col-->
                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                                            <!--//app-card-header-->
                                            <div class="app-card-body px-4 w-100">

                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Email</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> email); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Gender</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> gender); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Date of Birth</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> dob); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Religion</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> religion); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Nationality</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> nationality); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>Addresss</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> address); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>State of Origin</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> state_origin); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label"><strong>LGA</strong></div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> lga); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row gy-4 mb-4 mt-1">
                                        <div class="col-6 col-lg-6">
                                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                <div class="app-card-body px-4 w-100">
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label mb-2">
                                                                    <strong>Degree Result</strong>
                                                                </div>
                                                                <div class="">
                                                                    <img class="mx-auto d-block"
                                                                            src="data:image/jpeg;base64,<?php echo e($applicantsDetails->jamb); ?>"
                                                                        alt="JAMB "
                                                                        style="height: 510px; width:400px;" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--//app-card-->
                                        </div>


                                            <div class="col-6 col-lg-6">
                                                <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                    <div class="app-card-body px-4 w-100">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="item-label mb-2">
                                                                        <strong>Academic Result</strong>
                                                                    </div>
                                                                    <div class="">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item">Intitution Attended: <b><?php echo e($applicantsDetails -> institution); ?></b></li>
                                                                            <li class="list-group-item">Period: <b><?php echo e($applicantsDetails -> period); ?></b></li>
                                                                            <li class="list-group-item">Course: <b><?php echo e($applicantsDetails -> course); ?></b></li>
                                                                            <li class="list-group-item">Certificate Name: <b><?php echo e($applicantsDetails -> certificate_name); ?></b></li>
                                                                            <li class="list-group-item">Certificate Type: <b><?php echo e($applicantsDetails -> certificate_type); ?></b></li>
                                                                            <li class="list-group-item">Class Honour: <b><?php echo e($applicantsDetails -> class_honour); ?></b></li>
                                                                            <li class="list-group-item">Program Mode: <b><?php echo e($applicantsDetails -> mode); ?></b></li>
                                                                            <li class="list-group-item">Program Type: <b><?php echo e($applicantsDetails -> type); ?></b></li>
                                                                            <li class="list-group-item">Research Topic: <b><?php echo e($applicantsDetails -> research_topic); ?></b></li>
                                                                            <li class="list-group-item">Course Applied: <b><?php echo e($applicantsDetails -> course_applied); ?></b></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//app-card-->
                                            </div>
                                    </div>

                                    <div class="row gy-4 mb-4 mt-1">
                                        <div class="col-12 col-lg-6">
                                            <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                <div class="app-card-body px-4 w-100">
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label mb-2">
                                                                    <strong>Olevel Result</strong>
                                                                </div>
                                                                <div class="">
                                                                    <img class="mx-auto d-block"
        src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel1); ?>"
                                                                        alt="Olevel"
                                                                        style="height: 510px; width:400px;" />
                                                                </div>
                                                                <div class="item-data card-title text-success"><?php echo e($applicantsDetails->olevel_awaiting); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>






                                                </div>
                                            </div>
                                            <!--//app-card-->
                                        </div>
                                    <!--//col-->
                                    <div class="col-12 col-lg-6">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                                            <!--//app-card-header-->
                                            <div class="app-card-body px-4 w-100">


                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label mb-2">
                                                                <strong>Olevel Result (second sitting)</strong>

                                                            </div>
                                                            <div class="">

                                                                <img class=" mx-auto d-block"
                                                                            src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel2); ?>"
                                                                    alt="Olevel second sitting"
                                                                    style="height: 500px; width:400px;" />
                                                            </div>
                                                            
                                                         </div>
                                                        </div>
                                                </div>







                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="app-card app-card-account shadow d-flex flex-column">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Refree Details</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <h5 class="text-success">Refree 1</h5>
                                                    <hr class="sidebar-divider">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Name</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> name1); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Position</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> position1); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Institution</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> institution1); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Email</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> email1); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <h5 class="text-success">Refree 2</h5>
                                                    <hr class="sidebar-divider">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Name</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> name2); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Position</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> position2); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Institution</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> institution2); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Email</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> email2); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <h5 class="text-success">Refree 3</h5>
                                                    <hr class="sidebar-divider">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Name</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> name3); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Position</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> position3); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Institution</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> institution3); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Email</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> email3); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center gx-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Sponsor Details</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Name</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> name); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Email </strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> sponsors_email); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Phone Number </strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> sponsors_phone); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Address</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> sponsors_address); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Occupation</strong>
                                                            </div>
                                                            <div class="item-data"><?php echo e($applicantsDetails -> occupation); ?></div>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

          </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/layouts/viewPgApplicants.blade.php ENDPATH**/ ?>