<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <?php echo $__env->make('layouts.usersidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <!-- left column -->
            <div class="container-fluid">

                <div class="app-wrapper">
                    <div class="app-content pt-3 p-md-3 p-lg-4">
                        <div class="container-xl">
                            <h1 class="app-page-title h5 fw-bold p-2 shadow-sm text-center text-success mb-4 border">
                                Students Information</h1>

                            <div class="col-auto">
                                <div class="card border-left-success shadow h-100 py-3">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h4 text-success";>
                                                    <ul>
                                                        <li>Matric Number: <span class="text-black">
                                                                <?php echo e($academic->mat_no); ?></span> </li>
                                                        <li>Username: <span class="text-black"> <?php echo e($student->username); ?>

                                                            </span></li>
                                                        <li>Password: <span class="text-black">welcome </span></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class=" btn btn-success">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-4">
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
                                                            <strong>Passport</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/png;base64,<?php echo e($student->passport); ?>"
                                                                alt="Student Passport"
                                                                style="height: 200px; width:200px;" />
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Signature</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/png;base64,<?php echo e($student->signature); ?>"
                                                                alt="Student signature"
                                                                style="height: 200px; width:200px;" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Surname</strong></div>
                                                        <div class="item-data"><?php echo e($student->surname); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>First Name</strong></div>
                                                        <div class="item-data">
                                                            <?php echo e($student->first_name); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Other Name</strong></div>
                                                        <div class="item-data">
                                                            <?php echo e($student->middle_name); ?>

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
                                                        <div class="item-label"><strong>Username</strong></div>
                                                        <div class="item-data">
                                                            <?php echo e($student->username); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Phone Number</strong></div>
                                                        <div class="item-data"><?php echo e($student->phone); ?>

                                                        </div>
                                                    </div>
                                                    <!--//col-->
                                                    <!-- <div class="col text-end">
                                                                                        <a class="btn btn-success" href="#">Change</a>
                                                                                    </div> -->
                                                    <!--//col-->
                                                </div>
                                            </div>

                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Email</strong></div>
                                                        <div class="item-data"><?php echo e($student->email); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Gender</strong></div>
                                                        <div class="item-data"><?php echo e($student->gender); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Date of Birth</strong></div>
                                                        <div class="item-data"><?php echo e($student->dob); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Religion</strong></div>
                                                        <div class="item-data"><?php echo e($student->religion); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Nationality</strong></div>
                                                        <div class="item-data">
                                                            <?php echo e($student->nationality); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Address</strong></div>
                                                        <div class="item-data"><?php echo e($student->address); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>State of Origin</strong>
                                                        </div>
                                                        <div class="item-data">
                                                            <?php echo e($student->state_origin); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>LGA</strong></div>
                                                        <div class="item-data"><?php echo e($student->lga); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Hobbies</strong></div>
                                                        <div class="item-data"><?php echo e($student->hobbies); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row gy-4 mb-4 mt-1">

                                    <div class="col-12 mt-3">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center px-3">
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
                                                                <strong>Title</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($contact->title); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Surname</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($contact->surname); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Surname</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($contact->other_names); ?>

                                                            </div>
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
                                                            <div class="item-data">
                                                                <?php echo e($contact->email); ?>

                                                            </div>
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
                                                            <div class="item-data">
                                                                <?php echo e($contact->phone); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center px-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Academic Information</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Mode of Entry</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->mode_of_entry); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Mode of Study</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->mode_of_study); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Matric Number</strong>
                                                            </div>
                                                            <div class="item-data">

                                                                <?php echo e($academic->mat_no); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Program </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->program->name); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Level </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->level); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Entry Session </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->session->name); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Jamb No </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->jamb_no); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Jamb Score </strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($academic->jamb_score); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                            <div class="app-card-header p-3 border-bottom-0">
                                                <div class="row align-items-center px-3">
                                                    <div class="col-auto">
                                                        <h4 class="app-card-title">Medical Information</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Physical Status</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($medical->physical); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Blood Group</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($medical->blood_group); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Genotype</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($medical->genotype); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Known Medical Condition</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($medical->condition); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="app-card-body px-4 w-100">
                                                <div class="item border-bottom py-3">
                                                    <div class="row justify-content-between align-items-center">
                                                        <div class="col-auto">
                                                            <div class="item-label">
                                                                <strong>Allergies</strong>
                                                            </div>
                                                            <div class="item-data">
                                                                <?php echo e($medical->allergies); ?>

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
                </div>
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>







    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.userapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/students/admin/show.blade.php ENDPATH**/ ?>