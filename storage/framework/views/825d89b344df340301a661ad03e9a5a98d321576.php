<?php $__env->startSection('pagetitle'); ?> List of Program Courses  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('courses-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('courses'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('list-roles'); ?> active <?php $__env->stopSection(); ?>

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
                        List Program Courses
                    </h1>

            <div class="card ">


            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  
							  <th>Course Code</th>
							  <th>Program</th>
							  <th>Level</th>
							  <th>Credit</th>
							  <th>Session</th>
							  
							  <th>Action</th>
							  <th>Action</th>



						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $pcourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pcourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  
							  <td><?php echo e($pcourse->course->courseDescribe ?? ' '); ?></td>
							   <td><?php echo e($pcourse->program->name); ?></td>
							   <td><?php echo e($pcourse->level); ?></td>
							 <td><?php echo e($pcourse->credit_unit); ?></td>
							 <td><?php echo e($pcourse->session->name); ?></td>
 
							<td><a href="<?php echo e(route('program_course.edit',$pcourse->id)); ?>" class="btn btn-warning"> Edit </td>

							    <td>
							    <?php echo Form::open(['method' => 'Delete', 'route' => 'program_course.delete', 'id'=>'deletePCourseForm'.$pcourse->id]); ?>

				    		<?php echo e(Form::hidden('id', $pcourse->id)); ?>



				    		<button onclick="deletePCourse(<?php echo e($pcourse->id); ?>)" type="button" class="<?php echo e($pcourse->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		<?php echo Form::close(); ?>


							 </td>
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




 			function deletePCourse(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this program course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deletePCourseForm"+id).submit();
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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/program-courses/list.blade.php ENDPATH**/ ?>