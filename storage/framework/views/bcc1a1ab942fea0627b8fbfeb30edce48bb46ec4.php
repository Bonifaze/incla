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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <div class="card">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                         Student Information
                        </h1>


                        <div class="col-auto">
                            <div class="card border-left-success shadow h-100 py-3">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h4 text-success";>
                                                <ul>
                                                    <li>Matric Number: <span class="text-dark font-weight-bold">
                                                            <?php echo e($academic->mat_no); ?></span> </li>
                                                    <li>Username: <span class="text-primary font-weight-bold font-italic"> <?php echo e($student->username); ?>

                                                        </span></li>
                                                    <li>Password: <span class="text-dark font-weight-bold">welcome </span></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <form class="form-horizontal" method="POST"
                                                action="<?php echo e(route('student.login.submit')); ?>">
                                                <?php echo csrf_field(); ?>


                                                <input id="email" type="hidden" placeholder="Username"
                                                    class=" form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                    name="email" value="<?php echo e($student->username); ?>" required autofocus>




                                                <input id="password" type="hidden" placeholder="Password"
                                                    class=" form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                    name="password" value="welcome">



                                                <input type="checkbox" value="None" id="checkbox1" class=""
                                                    style="appearance:none; -webkit-appearance:none; -moz-appearance: none; width: 18px; height: 18px; border-radius: 50p% boder:2px solid green; outline:none;"
                                                    name="check" checked>

                                                <button type="submit" class="shadow-sm btn btn-success shadow-lg p-3 mb-5 bg rounded font-weight-bold "><i class="fas fa-solid fa-door-open"></i>
                                                    <?php echo e(__('Login Student Portal')); ?></button>

                                            </form>

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
                                                                src="data:image/jpg;base64,<?php echo e($student->passport); ?>"
                                                                alt="Student Passport"
                                                                style="height: 250px; width:225px;" />
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="item-label mb-2">
                                                            <strong>Signature</strong>
                                                        </div>
                                                        <div class="rounded-circle">
                                                            <img class="rounded-circle p-3 mx-auto d-block"
                                                                src="data:image/jpg;base64,<?php echo e($student->signature); ?>"
                                                                alt="Student signature"
                                                                style="height: 250px; width:225px;" />
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

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions/students/admin/show.blade.php ENDPATH**/ ?>