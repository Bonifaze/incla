<?php $__env->startSection('pagetitle'); ?> Program Course Results  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('staff-results'); ?> active <?php $__env->stopSection(); ?>
 
 <!-- End Sidebar links -->




<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
         
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Program Course Results</h3>
				</div>
            
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
             <div class="table-responsive card-body">
  
						<table class="table table-striped">
						  <thead>
							
							  <th>Id</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
							  <th>Program</th>
							  <th>Level</th>
							  <th>Credit</th>
							  <th>Session</th>
							  <th>Semester</th>
							  <th>Result</th>

							
						  </thead>
						  
						  
						  <tbody>
						  
						  <?php $__currentLoopData = $pcourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pcourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  
							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($pcourse->course->code); ?></td>
								<td><?php echo e($pcourse->course->title); ?></td>
							   <td><?php echo e($pcourse->program->name); ?></td>
							   <td><?php echo e($pcourse->level); ?></td>
							 <td><?php echo e($pcourse->hours); ?></td>
								<td><?php echo e($pcourse->session->name); ?></td>
								<td><?php echo e($pcourse->semester); ?></td>
							 <td> <?php echo e($pcourse->results_count); ?> <a href="<?php echo e(route('program_course.result',base64_encode($pcourse->id))); ?>"> (View) </a></td>

							</tr>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							
						  </tbody>
						  
						  
						  
						</table>
						 <?php echo $pcourses->render(); ?>

						 
						
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

		function submitPCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to submit this course?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("submitPCourseForm"+id).submit();
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


		function revokePCourse(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to revoke your submission?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("revokePCourseForm"+id).submit();
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/staff/academic/results.blade.php ENDPATH**/ ?>