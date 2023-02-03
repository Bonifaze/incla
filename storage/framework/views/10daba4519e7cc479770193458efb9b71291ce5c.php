<?php $__env->startSection('pagetitle'); ?> <?php echo e($program_course->course->code); ?>  <?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


						<table class="table table-striped">

							<tbody>

							<tr>
								<td>ID</td>
								<td>NAME</td>
								<td>Mat No</td>

							</tr>
						  
						  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  
							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($result->full_name); ?></td>
							  <td><?php echo e($result->mat_no); ?></td>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						  </tbody>

						</table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/academic/program_course_students_download.blade.php ENDPATH**/ ?>