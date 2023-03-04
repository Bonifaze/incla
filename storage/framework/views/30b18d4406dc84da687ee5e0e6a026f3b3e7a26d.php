<?php $__env->startSection('pagetitle'); ?> List of Staff  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('list-staff'); ?> active <?php $__env->stopSection(); ?>

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
                    List of Staff
                </h1>
            <div class="card">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  	<thead>
						  	  <th>S/N</th>
							  
                                <th>Passport</th>
							  <th>Name</th>
							  <th>Email</th>
							  <th>Phone</th>
							  <th col-span="3">Action</th>
							  

							</thead>


						  <tbody>

						  <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($key + $staff->firstItem()); ?></td>
                              <td><div class="image">
          						<img src="data:image/png;base64,<?php echo e($stf->passport); ?>" class="img-circle elevation-2" height ="100" alt="<?php echo e($stf->fullName); ?> Image">
        						</div></td>
							  
							  <td><?php echo e($stf->fullName); ?></td>
							   <td> <?php echo e($stf->username); ?></td>
							    <td> <?php echo e($stf->phone); ?> </td>
							     <td><a href="<?php echo e(route('staff.view',$stf->id)); ?>" class="btn btn-primary"> View </a></td>
								<td><a href="<?php echo e(route('staff.show',$stf->id)); ?>" class="btn btn-default"> Edit </a></td>
							
								

        						<?php if($stf->id == Auth::guard('staff')->user()->id): ?>
							   <td class="info">
							   <strong>Logged</strong>
							    </td>

							    <?php elseif($stf->status == 1): ?>
							    <td>
								<?php echo Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'disableUForm'.$stf->id]); ?>

				    		<?php echo e(Form::hidden('id', $stf->id)); ?>

				    		<?php echo e(Form::hidden('status', 2)); ?>

				    		<?php echo e(Form::hidden('action', "disabled")); ?>



				    		<button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
				    		<?php echo Form::close(); ?>


							 </td>

				    		<?php elseif($stf->status == 2): ?>
							 <td>
								<?php echo Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'enableUForm'.$stf->id]); ?>

				    		<?php echo e(Form::hidden('id', $stf->id)); ?>

				    		<?php echo e(Form::hidden('status', 1)); ?>

				    		<?php echo e(Form::hidden('action', "enabled")); ?>


				    		<button type="submit" class="btn btn-success" ><span class="icon-line2-trash"></span> Enable</button>
				    		<?php echo Form::close(); ?>


							 </td>

							  <?php endif; ?>
							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
						 <?php echo $staff->render(); ?>



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




<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/admin/list.blade.php ENDPATH**/ ?>