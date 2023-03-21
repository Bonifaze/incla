<?php $__env->startSection('pagetitle'); ?> <?php echo e($program_course->course->code); ?>  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('staff-courses'); ?> active <?php $__env->stopSection(); ?>

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
                   <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       <?php echo e($program_course->program->name); ?> <?php echo e($program_course->course->code); ?> Student List
                    </h1>


            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>Id</th>
							  <th>Name</th>
							  <th>Mat No</th>
							  <th>Phone</th>
							  <th>Email</th>
							  <th>Guardian Contact</th>
							  <th>Guardian Phone</th>



						  </thead>

							<tbody>

						  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($result->student->full_name); ?></td>
							  <td><?php echo e($result->student->academic->mat_no); ?></td>
								<td><?php echo e($result->student->phone); ?></td>
								<td><?php echo e($result->student->email); ?></td>
								<td><?php echo e($result->student->contact->name); ?></td>
								<td><?php echo e($result->student->contact->phone); ?></td>



							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>



            </div>

				<!-- /.card-body -->


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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/academic/program_course_students.blade.php ENDPATH**/ ?>