<?php

if(!session('adminId'))
{

  header('location: /adminLogin');
  exit;
}
?>




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
                   UTME APPLICANT PROFILE
                    </h1>





 <div class="app-wrapper">
                            <div class="app-content pt-3 p-md-3 p-lg-4">
                                <div class="container-xl">
                                    
                                    <?php echo csrf_field(); ?>
                                    <?php if(session('approvalMsg')): ?>
                                        <?php echo session('approvalMsg'); ?>

                                    <?php endif; ?>
                                    <div class="row py-4">
                                        <div class="col-12 col-lg-6">
                                            <div
                                                class="app-card app-card-account shadow d-flex flex-column align-items-start ">

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
                                                                    <img class="rounded-circle p-3 mx-auto d-block"
                                                                        src="data:image/<?php echo e($applicantsDetails->passport_type); ?>;base64,<?php echo e(base64_encode($applicantsDetails->passport)); ?>"
                                                                        alt="Applicant Passport"
                                                                        style="height: 200px; width:200px;" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Surname</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->surname); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>First Name</strong></div>
                                                                <div class="item-data">
                                                                    <?php echo e($applicantsDetails->first_name); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Other Name</strong></div>
                                                                <div class="item-data">
                                                                    <?php echo e($applicantsDetails->middle_name); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Phone Number</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->phone); ?>

                                                                </div>
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
                                            <div
                                                class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                                <!--//app-card-header-->
                                                <div class="app-card-body px-4 w-100">

                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Email</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->email); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Gender</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->gender); ?>

                                                                </div>
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
                                                                <div class="item-label"><strong>Religion</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->religion); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Nationality</strong></div>
                                                                <div class="item-data">
                                                                    <?php echo e($applicantsDetails->nationality); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>Address</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->address); ?>

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
                                                                    <?php echo e($applicantsDetails->state_origin); ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item border-bottom py-3">
                                                        <div class="row justify-content-between align-items-center">
                                                            <div class="col-auto">
                                                                <div class="item-label"><strong>LGA</strong></div>
                                                                <div class="item-data"><?php echo e($applicantsDetails->lga); ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row gy-4 mb-4 mt-1">
                                            <div class="col-12 col-lg-12">
                                                <div
                                                    class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                    <div class="app-card-body px-4 w-100">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="">
                                                                    <div class="item-label mb-2">
                                                                        <strong>Jamb Result</strong>
                                                                    </div>
                                                                    <div class="">
                                                                        <img class="mx-auto d-block"
                                                                            src="data:image/<?php echo e($applicantsDetails->jamb_type); ?>;base64,<?php echo e(base64_encode($applicantsDetails->jamb)); ?>"
                                                                            alt="Jamb Result"
                                                                            style="height: 510px; width:400px;" />
                                                                    </div>
                                                                    <div class="item-data card-title text-success">
                                                                        <?php echo e($applicantsDetails->olevel_awaiting); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//app-card-->
                                            </div>
                                            <!--//col-->
                                            <div class="col-6 col-lg-12">
                                                <div
                                                    class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                    <div class="app-card-body px-4 w-100">
                                                        <div class="item border-bottom py-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="">
                                                                    <div class="item-label mb-2">
                                                                        <strong>Jamb Data</strong>
                                                                    </div>
                                                                    <div class="">
                                                                        <ul class="list-group list-group-flush">


                                                                            <li class="list-group-item">Jamb Registration
                                                                                No.:
                                                                                <b><?php echo e($applicantsDetails->jamb_reg_no); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Jamb Score:
                                                                                <b><?php echo e($applicantsDetails->score); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">University First
                                                                                Choice:
                                                                                <b><?php echo e($applicantsDetails->first_choice); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">University Second
                                                                                Choice:
                                                                                <b><?php echo e($applicantsDetails->second_choice); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Course Applied:
                                                                                <b><?php echo e($applicantsDetails->course_applied); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Subject 1:
                                                                                <b><?php echo e($applicantsDetails->subject_1); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Subject 2:
                                                                                <b><?php echo e($applicantsDetails->subject_2); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Subject 3:
                                                                                <b><?php echo e($applicantsDetails->subject_3); ?></b>
                                                                            </li>
                                                                            <li class="list-group-item">Subject 4:
                                                                                <b><?php echo e($applicantsDetails->subject_4); ?></b>
                                                                            </li>
                                                                        </ul><br>
                                                                        <form method="POST" action="/changecourse">
                                                                            <?php echo csrf_field(); ?>
                                                                            <div class="form-group">
                                                                                <div class="form-group">
                                                                                    <input type="hidden"
                                                                                        value="<?php echo e($applicantsDetails->jamb_reg_no); ?>"
                                                                                        name="jamb_reg_no">
                                                                                    <label
                                                                                        for="refferal"><?php echo e(__('Change Course of Study')); ?>

                                                                                    </label>
                                                                                    <select class="form-select"
                                                                                        name="course_applied">
                                                                                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <option
                                                                                                value="<?php echo e($program->name); ?>">
                                                                                                <?php echo e($program->name); ?>

                                                                                            </option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                    </select>
                                                                                    <button type="submit"
                                                                                        class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                                                                        <?php echo e(__('Change Course')); ?>

                                                                                    </button>

                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//app-card-->
                                            </div>
                                            <div class="row gy-4 mb-4 mt-1">
                                                <div class="col-12 col-lg-12">
                                                    <div
                                                        class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="">
                                                                        <div class="item-label mb-2">
                                                                            <strong>Olevel Result</strong>
                                                                        </div>
                                                                        <div class="">
                                                                            <img class="mx-auto d-block"
                                                                                src="data:image/<?php echo e($applicantsDetails->olevel1_type); ?>;base64,<?php echo e(base64_encode($applicantsDetails->olevel1)); ?>"
                                                                                alt="Olevel"
                                                                                style="height: 510px; width:400px;" />
                                                                        </div>
                                                                        <div class="item-data card-title text-success">
                                                                            <?php echo e($applicantsDetails->olevel_awaiting); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>






                                                        </div>
                                                    </div>
                                                    <!--//app-card-->
                                                </div>
                                                <!--//col-->
                                                <div class="col-12 col-lg-12">
                                                    <div
                                                        class="app-card app-card-account shadow d-flex flex-column align-items-start">

                                                        <!--//app-card-header-->
                                                        <div class="app-card-body px-4 w-100">


                                                            <div class="item border-bottom py-3">
                                                                <di class="row justify-content-between align-items-center">
                                                                    <div class="">
                                                                        <div class="item-label mb-2">
                                                                            <strong>Olevel Result (second sitting)</strong>

                                                                        </div>
                                                                        <div class="">

                                                                            <img class=" mx-auto d-block"
                                                                                src="data:image/<?php echo e($applicantsDetails->olevel2_type); ?>;base64,<?php echo e(base64_encode($applicantsDetails->olevel2)); ?>"
                                                                                alt="Olevel second sitting"
                                                                                style="height: 500px; width:400px;" />
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </di </div>







                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <div
                                                        class="app-card app-card-account shadow d-flex flex-column align-items-start">
                                                        <div class="app-card-header p-3 border-bottom-0">
                                                            <div class="row align-items-center px-3">
                                                                <div class="col-auto">
                                                                    <h4 class="app-card-title">Sponsor Details</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="item-label">
                                                                            <strong>Name</strong>
                                                                        </div>
                                                                        <div class="item-data">
                                                                            <?php echo e($applicantsDetails->name); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="item-label">
                                                                            <strong>Email </strong>
                                                                        </div>
                                                                        <div class="item-data">
                                                                            <?php echo e($applicantsDetails->sponsors_email); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="item-label">
                                                                            <strong>Phone Number </strong>
                                                                        </div>
                                                                        <div class="item-data">
                                                                            <?php echo e($applicantsDetails->sponsors_phone); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="item-label">
                                                                            <strong>Address</strong>
                                                                        </div>
                                                                        <div class="item-data">
                                                                            <?php echo e($applicantsDetails->sponsors_address); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="app-card-body px-4 w-100">
                                                            <div class="item border-bottom py-3">
                                                                <div
                                                                    class="row justify-content-between align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="item-label">
                                                                            <strong>Occupation</strong>
                                                                        </div>
                                                                        <div class="item-data">
                                                                            <?php echo e($applicantsDetails->occupation); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <form method="get"
                                                        action="/approval/<?php echo e($applicantsDetails->applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicantsDetails->user_id))); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group shadow-textarea">
                                                            <label for="exampleFormControlTextarea6"
                                                                class="fw-bold">Registrar's Approval
                                                                Comment</label>
                                                            <textarea class="form-control " name="comment">
                                                    </textarea>
                                                            <button type="submit"
                                                                class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                                                <?php echo e(__('Approve')); ?>

                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-12 col-lg-6">

                                                    <form method="get"
                                                        action="/rejection/<?php echo e($applicantsDetails->applicant_type); ?>/<?php echo e(urlencode(base64_encode($applicantsDetails->user_id))); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="form-group shadow-textarea">
                                                            <label for="exampleFormControlTextarea6"
                                                                class="fw-bold">Registrar's Rejection
                                                                Comment</label>
                                                            <textarea class="form-control z-depth-1 shadow" name="comment">
                                                    </textarea>
                                                            <button type="submit"
                                                                class=" btn text-white fw-bold bg-danger bg-gradient mb-3 px-5 float-end">
                                                                <?php echo e(__('Reject ')); ?>

                                                            </button>
                                                        </div>
                                                    </form>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/admissions/layouts/viewUtmeApplicants.blade.php ENDPATH**/ ?>