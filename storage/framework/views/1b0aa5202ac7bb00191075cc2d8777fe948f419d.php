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
                       Audit Record of Modified Result
                        <a href="/program-courses/results/resultBarchat"
                                                        class="float-right btn btn-outline-info">VIEW BAR CHAT</a>
                    </h1>


                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<div class="table-responsive card-body">

                            <h3 class="card-title">  </h3>
                        </div>
						<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
						    
                            <th>Staff Name</th>
                              <th>Course </th>
							 <th>session</th>
							 <th>Semester</th>
                             <th>Level</th>
                                <th>Old Score</th>
                             <th>New Score</th>
                            
                            <th>Student MatNo.</th>
                            <th>Student Name</th>
                            <th>Date</th>
						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $modify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                              
                                <td><?php echo e($audit->course->course_code); ?> (<?php echo e($audit->course->course_title); ?>)</td>

							 <td><?php echo e($audit->sessions->name); ?></td>

                              <?php if($audit->semester==1): ?>
                                        <td>First</td>
                                        <?php else: ?>
                                        <td>Second</td>
                                        <?php endif; ?>
                             <td><?php echo e($audit->level); ?></td>
                              <td class="text-warning h2"><?php echo e($audit->old_total ?? null); ?></td>
                             <td class="text-success h1"><?php echo e($audit->total ?? null); ?></td>
                             <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                             <td><?php echo e($audit->full_name); ?></td>
                                   <td><?php echo e($audit->updated_at); ?></td>



							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/auditviewall.blade.php ENDPATH**/ ?>