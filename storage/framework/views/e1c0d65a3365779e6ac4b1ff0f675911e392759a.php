<?php $__env->startSection('pagetitle'); ?>
    List of Students
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('bursary-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bursary'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('bursary-search'); ?>
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

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        EDIT Remita Service Type
                    </h1>
                  <div class="container">
            <div class="signup-content">
                <?php if(session('signUpMsg')): ?>
                    <?php echo session('signUpMsg'); ?>

                <?php endif; ?>
                <form method="POST" action="/editRemitaServiceTypefee" id="signup-form" class="shadow p-4">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">

                        <div class="form-group">

                            <input id="provider_code" type="text" class="form-input form-control m-3"
                                name="provider_code" required value="<?php echo e($fee_types->provider_code); ?>" readonly>
                            <input id="amount" type="text" class="form-input form-control m-3" name="amount" required
                                value="<?php echo e($fee_types->amount); ?>" autofocus>
                            <input id="name" type="text" class="form-input form-control m-3" name="name" required
                                value="<?php echo e($fee_types->name); ?>" autofocus>
                            
                            <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mx-3 px-4">
                                <?php echo e(__('Edit Service Type')); ?>

                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
                    <!-- /.box -->

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/admissions//editRemitaServiceType.blade.php ENDPATH**/ ?>