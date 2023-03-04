<?php $__env->startSection('pagetitle'); ?> List of Academic Sessions  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('school-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('school'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('list-sessions'); ?> active <?php $__env->stopSection(); ?>

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
                     List of Academics Sessions
                    </h1>

            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							  <th>Start</th>
							  <th>End</th>
							   <th>Semester</th>
							   <th>Status</th>
							 <th>Action</th>
							  <th>Action</th>




						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($session->name); ?></td>
							   <td><?php echo e($session->start_date); ?></td>
							   <td><?php echo e($session->end_date); ?></td>
							    
                                   <?php if( $session->semester  == 1): ?>
                             <td> First </td>
                             <?php else: ?>
                             <td>Second </td>
                             <?php endif; ?>
       <?php if( $session->status == 1): ?>
                             <td> Active </td>
                             <?php else: ?>
                             <td>Deactive </td>
                             <?php endif; ?>
							 
								<td><a class="btn btn-warning" href="<?php echo e(route('session.edit',$session->id)); ?>"> <i class="fa fa-edit"></i> Edit </td>

							<?php if($session->status == 1): ?>
									<td>Current Session</td>
								<?php elseif($session->status == 0): ?>
							 <td>
									<?php echo Form::open(['method' => 'Patch', 'route' => 'session.set_current', 'id'=>'setCurrentForm'.$session->id]); ?>

									<?php echo e(Form::hidden('id', $session->id)); ?>



									<button onclick="setCurrent(<?php echo e($session->id); ?>)" type="button" class="<?php echo e($session->id); ?> btn btn-primary" > Set Current</button>
									<?php echo Form::close(); ?>


								</td>
				    		<?php endif; ?>
							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
						 <?php echo $sessions->render(); ?>



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




		function setCurrent(id)
		{
			bootbox.dialog({
				message: "<h4>Confirm you want to set this as the current session?</h4>",
				buttons: {
					confirm: {
						label: 'Yes',
						className: 'btn-success',
						callback: function(){
							document.getElementById("setCurrentForm"+id).submit();
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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//sessions/list.blade.php ENDPATH**/ ?>