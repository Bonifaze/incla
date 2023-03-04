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
                        VIEW Remita Service Type
                    </h1>
               <div id="content-wrapper" class="d-flex flex-column">

            <!-- Begin Page Content -->
            <div class="container-fluid ">

                <!-- Page Heading -->

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    

                    <br>
                </div>

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <?php if(session('signUpMsg')): ?>
                                <?php echo session('signUpMsg'); ?>

                            <?php endif; ?>
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Live Remita Service Types </h6>
                                <div class="dropdown no-arrow">

                                    <a href="/addRemitaServiceType"
                                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-plus text-white-50"></i> Add </a>

                                </div>

                            </div>

                            <div class="card-body">
                                <div class="table-responsive card-body">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Service Type</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                
                                                <th colspan="2">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            <?php $__currentLoopData = $fee_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fee_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($fee_types->provider_code); ?></td>
                                                    <td><?php echo e($fee_types->name); ?></td>
                                                    <td><?php echo e($fee_types->amount); ?></td>
                                                    
                                                    <td><a href="/editRemitaServiceType/<?php echo e($fee_types->provider_code); ?>"
                                                            class="btn btn-warning">Edit</a></td>



                                                    <td>
                                                        <form method="POST" action="/suspendRemitaServiceType">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" value="<?php echo e($fee_types->provider_code); ?>"
                                                                placeholder="<?php echo e($fee_types->provider_code); ?>"
                                                                name="provider_code">
                                                            <button class="btn btn-danger border mt-2">Suspend</button>
                                                        </form>
                                                    </td>
                                                    

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Card Header - Dropdown -->
                        <div class="card m-3 shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success mb-3">Suspended Remita Service Types</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Service Type</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            <?php $__currentLoopData = $fee_typess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fee_types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <td><?php echo e($fee_types->provider_code); ?></td>
                                                    <td><?php echo e($fee_types->name); ?></td>
                                                    <td><?php echo e($fee_types->amount); ?></td>
                                                    
                                                    

                                                    <td>
                                                        <form method="POST" action="/activeRemitaServiceType">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" value="<?php echo e($fee_types->provider_code); ?>"
                                                                placeholder="<?php echo e($fee_types->provider_code); ?>"
                                                                name="provider_code">
                                                            <button class="btn btn-success border mt-2">Activate</button>
                                                        </form>
                                                    </td>
                                                    

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
            <!-- /.container-fluid -->

            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions//viewRemitaServiceType.blade.php ENDPATH**/ ?>