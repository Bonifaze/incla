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
                        RRR FEES
                    </h1>
                    <div class=" ">



                        <!-- Content Wrapper -->
                       <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">

                <!-- Page Heading -->

    

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <?php if(session('approvalMsg')): ?>
                                <?php echo session('approvalMsg'); ?>

                            <?php endif; ?>
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                
                                <div class="dropdown no-arrow">
                                    

                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive card-body">

                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>

                                            <th>RRR</th>
                                            <th colspan="2">Applicant Name</th>
                                            <th>Email</th>

                                            <th>Service Type</th>
                                            <th>Amount</th>
                                            <th>Generated</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <?php $__currentLoopData = $remitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $remita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>


                                                <td><?php echo e($remita->rrr); ?></td>
                                                <td><?php echo e($remita->users->surname ?? ' '); ?></td>
                                                <td><?php echo e($remita->users->first_name ?? ' '); ?></td>
                                                
                                                <td><?php echo e($remita->users->email ?? ' '); ?></td>




                                                
                                                
                                                <td><?php echo e($remita->feeType->name); ?></td>
                                                <td>&#8358;<?php echo e(number_format($remita->amount)); ?></td>
                                                <td><?php echo e($remita->created_at->format('d-M-Y')); ?></td>
                                                <td><?php echo e($remita->status); ?></td>
                                                <td>
                                                    <form method="POST" action="/verifypayment">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" value="<?php echo e($remita->rrr); ?>"
                                                            placeholder="<?php echo e($remita->rrr); ?>" name="rrr">
                                                        <button class="btn btn-primary border mt-2">Verify Payment</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/admissions/bursary/remita_lists.blade.php ENDPATH**/ ?>