<?php $__env->startSection('pagetitle'); ?>
Home
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->
<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>
<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content">

        <?php if(session('signUpMsg')): ?>
        <?php echo session('signUpMsg'); ?>

        <?php endif; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
              <h3 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
            Profile
            </h3>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                
                
            </div>

            <!-- Content Row -->
            <div class="row card">
                <div class="card-body d-sm-flex align-items-center justify-content-between">
                    <h5 class="card-title text-success"></h5> <br>
                    <a href="/editprofile" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                </div>

                <div class="row gy-4 mb-4 mt-1">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Photo</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->passport); ?>" alt="Applicant Passport" style="height: 180px; width:200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Surname</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->surname); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>First Name</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->first_name); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Other Name</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->middle_name); ?></div>
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
                                            <div class="item-label"><strong>Email</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->email); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Phone Number</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->phone); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Gender</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->gender); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Date of Birth</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->dob); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>State of Origin</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->state_origin); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>LGA</strong></div>
                                            <div class="item-data"><?php echo e($applicantsDetails->lga); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="row card">
                    <div class="card-body d-sm-flex align-items-center justify-content-between">
                        <h5 class="card-title text-success">Academic Record</h5> <br>
                        
                        
                        
                    </div>
                </div>
                <div class="row gy-4 mb-4 mt-1">

                    <div class="col-12 col-lg-12">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong> Data</strong>
                                            </div>
                                            <div class="">
                                                <ul class="list-group list-group-flush">


                                                    <li class="list-group-item">Admiison Type.: <b><?php echo e($applicantsDetails->admission_type); ?></b>
                                                    </li>
                                                    <li class="list-group-item">Course Appliedy:
                                                        <b><?php echo e($applicantsDetails->course_program); ?></b>
                                                    </li>
                                                    <li class="list-group-item">School attended:
                                                        <b><?php echo e($applicantsDetails->school_attended); ?></b>
                                                    </li>
                                                    <li class="list-group-item">Certificate Obatained:
                                                        <b><?php echo e($applicantsDetails->certificates_obtained); ?></b>
                                                    </li>
                                                    <li class="list-group-item">Previous Project topic.:
                                                        <b><?php echo e($applicantsDetails->pr_topic); ?></b>
                                                    </li>
                                                </ul>
                                            </div>
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
                                                <strong>Olevel Result </strong>

                                            </div>
                                            <div class="">

                                                <img class=" mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->olevel1); ?>" alt="Olevel  sitting" style="height: 500px; width:400px;" />
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                        <!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">


                            <div class="item border-bottom py-3">
                                <diV class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label mb-2">
                                            <strong>Cerificate  </strong>

                                        </div>
                                        <div class="">

                                            <img class=" mx-auto d-block" src="data:image/jpeg;base64,<?php echo e($applicantsDetails->cert); ?>" alt="certificate" style="height: 500px; width:400px;" />
                                        </div>
                                        
                                </div>
                            </diV>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="card-body d-sm-flex align-items-center justify-content-between">
            <h5 class="card-title text-success">Sponsor Data</h5> <br>
            
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: <b><?php echo e($applicantsDetails->sponsor_surname); ?> <?php echo e($applicantsDetails->sponsor_othername); ?></b></li>
            <li class="list-group-item">Email: <b><?php echo e($applicantsDetails->sponsors_email); ?></b>
            </li>
            <li class="list-group-item">Phone Number:
                <b><?php echo e($applicantsDetails->sponsors_phone); ?></b>
            </li>
            <li class="list-group-item">Address:
                <b><?php echo e($applicantsDetails->sponsors_address); ?></b>
            </li>

            </li>
        </ul>
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions//viewprofile.blade.php ENDPATH**/ ?>