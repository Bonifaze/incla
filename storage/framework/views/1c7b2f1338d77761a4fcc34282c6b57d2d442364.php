<?php $__env->startSection('pagetitle'); ?> <?php echo e($level); ?> Level Semester Results  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('vc-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('vc'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('vc-list'); ?> active <?php $__env->stopSection(); ?>
 
 <!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

			<?php
				$session_id = $session->currentSession();
                $semester = $session->currentSemester();
			    $semesterName =  $session->semesterName($semester);
			?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo e($semesterName); ?> <?php echo e($level); ?> Level <?php echo e($session->currentSessionName()); ?> Result status</h3>
				</div>
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Department</th>
							  <th>Program</th>
							  <th>Results ready</th>
							   <th>Results Outstanding</th>
							   <th>Results Approved</th>
							   <th>Students Total</th>
							 <th>Action</th>

							   
							
						  </thead>
						  
						  
						  <tbody>

						  <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						   <?php
						   $notReady = $program->vcNotReadyProgramCourses($session_id,$semester,$level);
                           $ready = $program->vcReadyProgramCourses($session_id,$semester,$level);
                           $students = $program->allregisteredStudentsCount($session_id,$semester,$level);
                           $approved = $program->vcApprovedProgramCourses($session_id,$semester,$level);
							?>
						   <tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($program->department->name); ?></td>
							  <td><?php echo e($program->name); ?></td>
							  <td> <?php echo e($ready); ?> </td>
							  <td> <?php echo e($notReady); ?> </td>
							  <td> <?php echo e($approved); ?> </td>
							  <td> <?php echo e($students); ?></td>
								<td>
									<!-- change to notReady == 0 AND $ready > 0) to ensure all results are available before approval -->
									<?php if($notReady > -1 AND $ready > 0): ?>
									 <?php echo Form::open(['method' => 'post', 'route' => 'program_course.vc_approval', 'id'=>'approveResultForm'.$program->id]); ?>

								   <?php echo e(Form::hidden('program_id', $program->id)); ?>

								   <?php echo e(Form::hidden('session_id', $session_id)); ?>

								   <?php echo e(Form::hidden('semester', $semester)); ?>

			  					   <?php echo e(Form::hidden('level', $level)); ?>


										<button onclick="approveResult(<?php echo e($program->id); ?>,'<?php echo e($program->name); ?>','<?php echo e($level); ?>')" type="button" class="<?php echo e($program->id); ?> btn btn-info" > Approve </button>
										<?php echo Form::close(); ?>

									<?php elseif($ready == 0 AND $notReady == 0 AND $approved == 0): ?>
										No Result
									<?php elseif($notReady == 0 AND $approved > 0): ?>
										Approved
									<?php endif; ?>

								</td>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						  </tbody>
						  
						  
						  
						</table>
						 <?php echo $programs->render(); ?>


						
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
	<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

	<script>




		function approveResult(id,program,level)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to approve result for " + program + " " + level + " level ?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("approveResultForm"+id).submit();
						}
					},
					cancel: {
						label: 'No',
						className: 'btn-danger',
					}
				},
				callback: function (result) {}

			});
			// e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
		}

	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/vc/level_results.blade.php ENDPATH**/ ?>