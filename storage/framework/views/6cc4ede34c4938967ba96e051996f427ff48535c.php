<?php $__env->startSection('pagetitle'); ?>
    Staff Assigned Roles
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
                       Audit Record of Assigned staff Roles
                    </h1>


                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="table-responsive card-body">
 <div class="card-header">

                        </div>
			<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Role</th>
            <th>Staff Name</th>
            <th>Assigned By</th>
             <th>Removed By</th>
             <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>  $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
         <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($audit->role->name); ?></td>
            <td><?php echo e($audit->staff->full_name ?? null); ?></td>
          <td> <?php echo e($audit->StaffName); ?></td>
          <td> <?php echo e($audit->StaffNameremove); ?></td>
          <td><?php echo e(\Carbon\Carbon::parse($audit->created_at)->format('l j, F Y H:i:s')); ?>



</td>


        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a target="_blank" href="<?php echo e(route('rbac.auditviewallremita')); ?>" class="btn btn-primary mb-3 mt-3 float-right">View All Assigned Roles</a>
    </tbody>
     
</table>




            </div>
    </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
     <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/auditviewallassigned.blade.php ENDPATH**/ ?>