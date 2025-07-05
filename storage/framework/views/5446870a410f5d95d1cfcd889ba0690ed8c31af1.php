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
                      Edit Applicant
                    </h1>


        <div class="container">
            <div class="signup-content">
                <?php if(session('signUpMsg')): ?>
                    <?php echo session('signUpMsg'); ?>

                <?php endif; ?>
                <form method="POST" action="/editusersinfo" id="signup-form" class="shadow p-4">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">

                        <div class="form-group">
                            <label for="">Surname:  <strong><?php echo e($allApp->surname); ?></strong>  </label>
                            <input id="provider_code" type="text" class="form-input form-control m-3" name="surname" required value="<?php echo e($allApp->surname); ?>">

                            <label for="firstname">First Name:  <strong><?php echo e($allApp->first_name); ?></strong></label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="first_name"
                                required value="<?php echo e($allApp->first_name); ?>" autofocus>

                                 <label for="firstname">Middle Name:  <strong><?php echo e($allApp->middle_name); ?></strong></label>
                            <input id="amount" type="text" class="form-input form-control m-3" name="middle_name"
                                required value="<?php echo e($allApp->middle_name); ?>" autofocus>

                            <label for="">Phone:  <strong><?php echo e($allApp->phone); ?> </strong></label>
                            <input id="name" type="text" class="form-input form-control m-3" name="phone" required
                                value="<?php echo e($allApp->phone); ?>" autofocus>
                            <label for="firstname">Email:  <strong><?php echo e($allApp->email); ?></strong> </label>
                            <input id="name" type="text" class="form-input form-control m-3" name="email" required
                                value="<?php echo e($allApp->email); ?>" autofocus>
                            <label for="">Email verified:  <strong> <?php echo e($allApp->email_verified_at); ?> </strong> </label>
                            <input type="date" class="form-control" value="<?php echo e($allApp->email_verified_at); ?>"
                                name="email_verified_at">

                            <label for="firstname">Applicant Type:  <strong> <?php echo e($allApp->applicant_type); ?>

                                </strong></label>
                            
                            <select class="form-input form-control m-3" name="applicant_type">
                                <option value="<?php echo e($allApp->applicant_type); ?>" ><?php echo e($allApp->applicant_type); ?></option>
                                <option value="Licentiate"> Licentiate</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Certificate">Certificate</option>



                            </select>
                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                <?php echo e(__('Edit')); ?>

                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <br><BR><BR><BR><BR><BR>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions//editusers.blade.php ENDPATH**/ ?>