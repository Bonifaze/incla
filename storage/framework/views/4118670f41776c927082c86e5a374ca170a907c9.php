<?php $__env->startSection('pagetitle'); ?>
    Show Staff Profile
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
<?php $__env->startSection('staff-profile'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="container-fluid">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Staff Profile
                </h1>
                                                     <div>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rbac', 'App\Staff')): ?>
                                                                <a class="btn btn-warning"
                                                                    href="<?php echo e(route('staff.show',$staff->id)); ?>">Edit Profile
                                                                </a>
                                                            <?php else: ?>
                                                            <?php endif; ?>
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
                                                    src="data:image/png;base64,<?php echo e($staff->passport); ?>"
                                                    alt="Student Passport" style="height: 200px; width:200px;" />
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="item-label mb-2">
                                                <strong>Signature</strong>
                                            </div>
                                            <div class="rounded-circle">
                                                <img class="rounded-circle p-3 mx-auto d-block"
                                                    src="data:image/png;base64,<?php echo e($staff->signature); ?>"
                                                    alt="Student signature" style="height: 200px; width:200px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Title</strong></div>
                                            <div class="item-data"><?php echo e($staff->title); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Surname</strong></div>
                                            <div class="item-data"><?php echo e($staff->surname); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>First Name</strong></div>
                                            <div class="item-data">
                                                <?php echo e($staff->first_name); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Other Name</strong></div>
                                            <div class="item-data">
                                                <?php echo e($staff->middle_name); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Maiden Name</strong></div>
                                            <?php echo e($staff->maiden_name); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Username / Official Email</strong></div>
                                            <div class="item-data text-primary font-weight-bold">
                                                <?php echo e($staff->username); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow d-flex flex-column align-items-start">

                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Email</strong></div>
                                            <div class="item-data"><?php echo e($staff->email); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Phone Number</strong></div>
                                            <div class="item-data"><?php echo e($staff->phone); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Gender</strong></div>
                                            <div class="item-data"><?php echo e($staff->gender); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Date of Birth</strong></div>
                                            <div class="item-data"><?php echo e($staff->dob); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Religion</strong></div>
                                            <div class="item-data"><?php echo e($staff->religion); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nationality</strong></div>
                                            <div class="item-data">
                                                <?php echo e($staff->nationality); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Address</strong></div>
                                            <div class="item-data"><?php echo e($staff->address); ?>

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
                                                <?php echo e($staff->state); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>LGA</strong></div>
                                            <?php echo e($staff->lga_name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Marital Status</strong></div>
                                            <?php echo e($staff->marital_status); ?>

                                        </div>
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
                                <h4 class="app-card-title">Emergency Contact</h4>
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
                                    <div class="item-data">
                                        <?php echo e($contact->name); ?>

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
                                        <strong>Relationship</strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($contact->relationship); ?>

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
                    <div class="app-card-body px-4 w-100">
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label">
                                        <strong>Addresss </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($contact->address); ?>

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
                                        <strong>State of Residence </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($contact->state); ?>

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
                                <h4 class="app-card-title">Work Infomatation</h4>
                            </div>
                        </div>
                    </div>
                    <div class="app-card-body px-4 w-100">
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label">
                                        <strong>Staff No.</strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->staff_no); ?>

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
                                        <strong>Staff Position</strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->position->name); ?>

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
                                        <strong>Staff Type </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->type->name); ?>

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
                                        <strong>Employment Type </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->employmentType->name); ?>

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
                                        <strong>Department </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->admin->name); ?>

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
                                        <strong>Grade level </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->grade_id); ?>

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
                                        <strong>Appointment Date </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->appointment_date); ?>

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
                                        <strong>Assumption Date </strong>
                                    </div>
                                    <div class="item-data">
                                        <?php echo e($work->assumption_date); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>

    <script>
        function submitAForm(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to assign this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addRForm" + id).submit();
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




        function submitRForm(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("removeRForm" + id).submit();
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/profile.blade.php ENDPATH**/ ?>