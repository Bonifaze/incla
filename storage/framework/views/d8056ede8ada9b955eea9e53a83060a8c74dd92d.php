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
                       Audit Record of all the Event Made
                    </h1>


                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="table-responsive card-body">


                        </div>
						<table class="table table-striped"
                        id="dataTable"
                        width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
                             
                              <th>Staff Name</th>
							 <th>Event</th>
							 <th>Audited Model</th>
                             <th>Old Values</th>
							<th>New Values</th>
                            <th>URL</th>
                            <th>IP Address</th>
                            <th>User PC/ Browser</th>
						    <th>Audit Id</th>
                            
                            
                            <th>Date</th>





						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
                                
                              <td><?php echo e($audit->staff->full_name ?? null); ?></td>
							 <td><?php echo e($audit->event); ?></td>
                             <td><?php echo e($audit->auditable_type); ?></td>
                             <td>
                              <table class="table">
                    <?php $__currentLoopData = $audit->old_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><b><?php echo e($attribute); ?></b></td>

                        <td><?php echo e($value); ?></td>


                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                  </td>
                       <td>
                              <table class="table">
                    <?php $__currentLoopData = $audit->new_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><b><?php echo e($attribute); ?></b></td>
                        <td><?php echo e($value); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </table>
                  </td>
                             
                              
                               <td><?php echo e($audit->url); ?></td>
                                <td><?php echo e($audit->ip_address); ?></td>
                                 <td><?php echo e($audit->user_agent); ?></td>
                                  
                                   
							  <td><?php echo e($audit->auditable_id); ?></td>
                                    <td><?php echo e($audit->updated_at); ?></td>

							 


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<p  class="text-danger text-bold mb-3 mt-3 float-right">Loads 100 record(s) per page</p>
						  </tbody>


<?php echo $article->render(); ?>

						</table>





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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/auditviewallevent.blade.php ENDPATH**/ ?>