<?php $__env->startSection('pagetitle'); ?>
    Students Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content bg-white">
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid">
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Students Information
                </h1>
 <div class="row ">
 <div class="col-4"></div>
 <div class="col-4"></div>
                                        <div class="col-4">
						  <?php echo Form::open(['method' => 'Patch', 'route' => 'student.reset', 'id'=>'resetPasswordForm'.$student->id]); ?>

						  <?php echo e(Form::hidden('id', $student->id)); ?>



						  <button onclick="resetPassword(<?php echo e($student->id); ?>)" type="button" class="<?php echo e($student->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Reset Password</button>
						  <?php echo Form::close(); ?>

					  </div>
                           </div>
                <div class="row py-4">



                    <div class="col-12 col-lg-6">

                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start ">

                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Bio Data     <a class="btn btn-info" href="<?php echo e(route('student.edit',$student->id)); ?>"> <i class="fa fa-edit"></i> Edit </a></h4>

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
                                                    alt="Student Passport" style="height: 200px; width:200px;" />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Signature</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block"
                                                    src="data:image/png;base64,<?php echo e($student->signature); ?>"
                                                    alt="Student signature" style="height: 200px; width:200px;" />
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
                                                <?php echo e($student->state); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>LGA</strong></div>
                                            <div class="item-data"><?php echo e($student->lga_name); ?>

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



                    <div class="col-12 mt-3">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center px-3">
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Sponsor Details     <a class="btn btn-info" href="<?php echo e(route('student-contact.edit',$contact->id)); ?>"> <i class="fa fa-edit"></i> Edit </a></h4>
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
                                        <h4 class="app-card-title">Academic Information    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', 'App\Student')): ?> <a class="btn btn-info" href="<?php echo e(route('student-academic.edit',$academic->id)); ?>"> <i class="fa fa-edit"></i> Edit </a> <?php endif; ?></h4>
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
                                        <h4 class="app-card-title">Medical Information    <a class="btn btn-info" href="<?php echo e(route('student-medical.edit',$medical->id)); ?>"> <i class="fa fa-edit"></i> Edit </a></h4>
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
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Ekko Lightbox -->
    <script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>

    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>

    <script>
        function resetPassword(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to Reset this students password?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("resetPasswordForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/admin/show.blade.php ENDPATH**/ ?>