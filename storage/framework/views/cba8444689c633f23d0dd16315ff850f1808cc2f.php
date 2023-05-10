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
                  Remita Service Types Fees
                    </h1>
                    <div class=" ">


  <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">



                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <?php if(session('signUpMsg')): ?>
                                <?php echo session('signUpMsg'); ?>

                            <?php endif; ?>
                            <div class="card-header py-3">

                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive card-body">

                                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                    <table class="table table-striped">
                                        <thead>

                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Provider Code</th>
                                            <th>Provider</th>
                                            <th>Total</th>
                                            
                                            <th>Action</th>







                                        </thead>


                                        <tbody>
                                        <?php
                                $tatolAmount = 0;
                                      $tatolAmount1 = 0;
                                      $totalBal =0;
                            ?>
                                            <?php $__currentLoopData = $feeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php
                                      $tatolAmount += $fee->paidRemitas->sum('amount');
                                   ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($fee->name); ?></td>
                                                    <td> &#8358;<?php echo e(number_format($fee->amount)); ?></td>
                                                    <td><?php echo e($fee->provider_code); ?></td>
                                                    <td><?php echo e($fee->provider); ?></td>
                                                    <td> &#8358;<?php echo e(number_format($fee->paidRemitas->sum('amount'))); ?></td>
                                                      
                                                    <td> <a class="btn btn-success" target="_blank"
                                                            href="<?php echo e(route('remita.fee-type', $fee->id)); ?>"> Show </a></td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td></td>
                                        <td><strong>Total </strong></td>
                                        <td></td>
                                        <td ></td>
                                        <td></td>
                                       <td><strong>&#8358;<?php echo e(number_format(  $tatolAmount)); ?> </strong></td>
                                        
                                   <td></td>
                                        

                                    </tr>
                                        </tbody>



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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/bursary/fee_types.blade.php ENDPATH**/ ?>