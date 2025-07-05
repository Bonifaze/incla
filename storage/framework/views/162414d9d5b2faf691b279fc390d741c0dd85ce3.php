<?php $__env->startSection('pagetitle'); ?>
    Students Information
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">


    <style>
        /* General Card Styling */
        .app-card {
            background-color: #e5e5e5;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .app-card-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e0e0e0;
        }

        .app-card-title {
            font-size: 20px;
            font-weight: 600;
            color: #007bff;
        }

        /* Image Styling */
        .image-section {
            text-align: center;
        }

        .image-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .img-fluid {
            transition: transform 0.3s ease;
        }

        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
        }

        /* Info Section Styling */
        .info-section .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f0f0f0;
            padding: 10px 0;
        }

        .info-label {
            font-size: 14px;
            font-weight: 600;
            color: #555;
        }

        .info-data {
            font-size: 14px;
            color: #777;
        }

        /* Remove bottom border on last item */
        .info-section .info-item:last-child {
            border-bottom: none;
        }

        .app-card-body {
            padding-top: 20px;
        }

        /* Row Styling */
        .row {
            margin-bottom: 20px;
        }

        /* Responsive Design Adjustments */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .col-md-6 {
                width: 100%;
            }
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content bg-white">
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Students Information
                </h1>

                <div class="col-4">
                    <?php echo Form::open(['method' => 'Patch', 'route' => 'student.reset', 'id' => 'resetPasswordForm' . $student->id]); ?>

                    <?php echo e(Form::hidden('id', $student->id)); ?>



                    <button onclick="resetPassword(<?php echo e($student->id); ?>)" type="button"
                        class="<?php echo e($student->id); ?> btn btn-danger"><span class="icon-line2-trash"></span> Reset
                        Password</button>
                    <?php echo Form::close(); ?>

                </div>






                <div class="container-fluid">

                    <div class="container px-4">
                        <!-- Student Bio Data Card -->

                        <div class="row mb-4">

                            <div class="col-md-6 mb-4">
                                <div class="app-card app-card-account shadow-lg rounded-3">
                                    <div class="app-card-header p-4 border-bottom">
                                        
                                        <h4 class="app-card-title">Student Bio Data <a class="btn btn-info"
                                            href="<?php echo e(route('student.edit', $student->id)); ?>"> <i class="fa fa-edit"></i>
                                            Edit </a> </h4>

                                    </div>
                                    <div class="app-card-body p-4">
                                        <div class="row">
                                            <!-- Passport and Signature -->
                                            <div class="col-md-6 mb-4">
                                                <div class="image-section">
                                                    
                                                    <img class="img-fluid rounded-circle shadow" src="data:image/png;base64,<?php echo e($student->passport); ?>" alt="Student Passport" style="height: 220px; width: 180px; object-fit: cover;" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="image-section">
                                                    
                                                    <img class="img-fluid rounded-circle shadow" src="data:image/png;base64,<?php echo e($student->signature); ?>" alt="Student Signature" style="height: 220px; width: 180px; object-fit: cover;" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Personal Info -->
                                        <div class="info-section">
                                         <div class="info-item py-3">
                                                <div class="info-label"><strong>Title</strong></div>
                                                <div class="info-data"><?php echo e($student->title); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Surname</strong></div>
                                                <div class="info-data"><?php echo e($student->surname); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>First Name</strong></div>
                                                <div class="info-data"><?php echo e($student->first_name); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Other Name</strong></div>
                                                <div class="info-data"><?php echo e($student->middle_name); ?></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Student Info Card -->
                            <div class="col-md-6 mb-4">
                                <div class="app-card app-card-account shadow-lg rounded-3">
                                    <div class="app-card-body p-4">
                                        <div class="info-section">
                                         <div class="info-item py-3">
                                                <div class="info-label"><strong>Username</strong></div>
                                                <div class="info-data"><?php echo e($student->username); ?></div>
                                            </div>

                                         <div class="info-item py-3">
                                                <div class="info-label"><strong>Phone Number</strong></div>
                                                <div class="info-data"><?php echo e($student->phone); ?></div>
                                            </div>

                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Email</strong></div>
                                                <div class="info-data"><?php echo e($student->email); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Gender</strong></div>
                                                <div class="info-data"><?php echo e($student->gender); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Date of Birth</strong></div>
                                                <div class="info-data"><?php echo e($student->dob); ?></div>
                                            </div>

                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Address</strong></div>
                                                <div class="info-data"><?php echo e($student->address); ?></div>
                                            </div>
                                             <div class="info-item py-3">
                                                <div class="info-label"><strong>Nationality</strong></div>
                                                <div class="info-data"><?php echo e($student->nationality); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>State of Origin</strong></div>
                                                <div class="info-data"><?php echo e($student->state); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Local Govt Area</strong></div>
                                                <div class="info-data"><?php echo e($student->lga_name); ?></div>
                                            </div>
                                            
                                             <div class="info-item py-3">
                                                <div class="info-label"><strong>Blood Group</strong></div>
                                                <div class="info-data"><?php echo e($medical->blood_group); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Genotype</strong></div>
                                                <div class="info-data"><?php echo e($medical->genotype); ?></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Info Cards -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-4">
                                <div class="app-card app-card-account shadow-lg rounded-3">
                                     <div class="app-card-header p-4 border-bottom">
                                        
                                        <h4 class="app-card-title">Sponsor Details <a class="btn btn-info"
                                            href="<?php echo e(route('student-contact.edit', $contact->id)); ?>"> <i
                                                class="fa fa-edit"></i> Edit </a></h4>
                                    </div>
                                    <div class="app-card-body p-4">
                                        <div class="info-section">

                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Surname</strong></div>
                                                <div class="info-data"><?php echo e($contact->surname); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Other Name</strong></div>
                                                <div class="info-data"><?php echo e($contact->other_names); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Email</strong></div>
                                                <div class="info-data"><?php echo e($contact->email); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Phone</strong></div>
                                                <div class="info-data"><?php echo e($contact->phone); ?></div>
                                            </div>
                                                <div class="info-item py-3">
                                                <div class="info-label"><strong>Address</strong></div>
                                                <div class="info-data"><?php echo e($contact->address); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sponsor Info Card -->
                            <div class="col-md-6 mb-4">
                                <div class="app-card app-card-account shadow-lg rounded-3">
                                    <div class="app-card-header p-4 border-bottom">
                                        <!-- <h4 class="app-card-title text-primary">Academics</h4> -->
                                        <h4 class="app-card-title">Academic Information    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', 'App\Student')): ?> <a class="btn btn-info" href="<?php echo e(route('student-academic.edit',$academic->id)); ?>"> <i class="fa fa-edit"></i> Edit </a> <?php endif; ?></h4>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transcript', 'App\Student')): ?>
                                                              <a class="btn btn-primary" href="<?php echo e(route('student.transcript',base64_encode($student->id))); ?>" target="_blank"> <i class="fa fa-eye"></i> Transcript</a>

                                                                 <?php endif; ?>

                                    </div>
                                    <div class="app-card-body p-4">
                                        <div class="info-section">
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Mode of Entry</strong></div>
                                                <div class="info-data"><?php echo e($academic->mode_of_entry); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Mode of Study</strong></div>
                                                <div class="info-data"><?php echo e($academic->mode_of_study); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Reg No. </strong></div>
                                                <div class="info-data"><?php echo e($academic->mat_no); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Program</strong></div>
                                                <div class="info-data"><?php echo e($academic->program->name); ?></div>
                                            </div>
                                            <div class="info-item py-3">
                                                <div class="info-label"><strong>Session Admitted</strong></div>
                                                <div class="info-data"><?php echo e($academic->session->name); ?></div>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/students/admin/show.blade.php ENDPATH**/ ?>