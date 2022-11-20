<?php
    
    if (!session('adminId')) {
        header('location: /adminLogin');
        exit();
    }
?>




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
                        UNDERGRADUATE Applicants Payments
                    </h1>
                    <div class=" ">



                        <!-- Content Wrapper -->
                    <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <div class="card-header py-3">
                                
                                <hr class="sidebar-divider">

                                <?php if(session('approvalMsg')): ?>
                                    <?php echo session('approvalMsg'); ?>

                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <hr class="sidebar-divider">
                                    <form action="/adminUtmeFilter" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <label for="start"><b class="text-success">Apllied From:</b></label>
                                        <input type="date" id="start" name="start_date" value=""
                                            class="mr-5 rounded">
                                        <input type="hidden" name="applicant_type" value="UTME">
                                        <label for="start"><b class="text-success">To:</b></label>
                                        <input type="date" id="start" name="end_date" value=""
                                            class="mr-5 rounded">
                                        <input type="submit" value="Filter" class="btn btn-success px-4 m-1">
                                    </form>
                                    <hr class="sidebar-divider">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>First Name</th>
                                                <th>Surname</th>
                                                <th>Phone Number</th>
                                                <th>RRR</th>
                                                <th>Fee Type</th>
                                                <th>Amount</th>
                                                <th>Transaction Date</th>
                                                <th>Full Details</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $__currentLoopData = $utmePayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utmeApplicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($utmeApplicant->first_name); ?></td>
                                                    <td><?php echo e($utmeApplicant->surname); ?></td>
                                                    <td><?php echo e($utmeApplicant->phone); ?></td>
                                                    <td><?php echo e($utmeApplicant->rrr); ?></td>
                                                    <td><?php echo e($utmeApplicant->fee_type); ?></td>
                                                    <td><?php echo e($utmeApplicant->amount); ?></td>
                                                    <td><?php echo e($utmeApplicant->transaction_date); ?></td>
                                                    <td><a href="/adminView/<?php echo e($utmeApplicant->applicant_type); ?>/<?php echo e(urlencode(base64_encode($utmeApplicant->id))); ?>"
                                                            class="btn btn-primary border mt-2">View </a></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/admissions/utmePayments.blade.php ENDPATH**/ ?>