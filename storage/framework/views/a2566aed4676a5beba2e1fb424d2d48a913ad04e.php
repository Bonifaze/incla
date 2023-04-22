



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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- left column -->
            <div class="col_full">

                <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Remitas with Status 025
                </h1>

                <div class="card">

                    <div class="table-responsive card-body">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>RRR</th>
                                    <th>Fee type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $remitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($remita->id); ?></td>
                                    <td><?php echo e($remita->rrr); ?></td>
                                    <td><?php echo e($remita->fee_type); ?></td>
                                    <td><?php echo e($remita->status_code); ?></td>
                                    <td><?php echo e($remita->created_at); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <?php echo e($remitas->links()); ?>

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
<!-- jQuery UI -->
<script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>
<-- DATABABE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hp\Documents\WEB DEV\Work-VUNA\laraproject\resources\views/remitas/remitaBankVerification.blade.php ENDPATH**/ ?>