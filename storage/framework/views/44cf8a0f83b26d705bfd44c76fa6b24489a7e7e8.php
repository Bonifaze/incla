<?php $__env->startSection('pagetitle'); ?> Programs <?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?> active <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-primary">
             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                      <?php echo e($department->name); ?> Programs
                    </h1>


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Program</th>
							  <th>Students</th>
							 <th>View</th>





						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
                             <td><?php echo e($program->name); ?></td>
							  <td> <?php echo e($program->registeredStudentsCount(1000)); ?> </td>
                                <td><a class="btn btn-outline-info" href="<?php echo e(route('exam_officer.manage_program',base64_encode($program->id))); ?>">  View </a></td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>


            </div>

          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->


            
            
            

            <div class="table-responsive card-body">
  <div
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm  text-success border">
                       Result Audit
                                                    <a href="/program-courses/results/resultBarchat"
                                                        class="float-right btn btn-outline-info">VIEW BAR CHAT</a>

                    </div>
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

    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

 <script>




 			function deleteCollege(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this College</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteCollegeForm"+id).submit();
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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/exam-officers/programs.blade.php ENDPATH**/ ?>