<?php $__env->startSection('pagetitle'); ?> Show Security Role details  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('rbac-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('rbac'); ?> active <?php $__env->stopSection(); ?>

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
                   <?php echo e($roles->name); ?>

                    </h1>

            <div class="card">


             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
                            <th>Phone</th>

							  <th>Action</th>


						  </thead>


						  <tbody>
<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($roles->staff->full_name ?? null); ?></td>
							 <td><?php echo e($roles->staff->phone ?? null); ?></td>


							    <td>
								<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.remove-role', 'id'=>'removeRForm'.$roles->role_id]); ?>

				    		<?php echo e(Form::text('role_id', $roles->role_id)); ?>

				    		<?php echo e(Form::text('staff_id', $roles->staff_id)); ?>


				    		<button onclick="submitRForm(<?php echo e($roles->role_id); ?>)" type="button" class="<?php echo e($roles->role_id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Remove Role</button>
				    		<?php echo Form::close(); ?>

							 </td>
		<td><a href="<?php echo e(route('staff.show',$roles->staff_id)); ?>" class="btn btn-default"> Edit </a></td>

<?php if($roles->staff_id == Auth::guard('staff')->user()->id): ?>
							   <td class="info">
							   <strong>Logged</strong>
							    </td>

							    <?php elseif($roles->staff->status == 1 ?? null): ?>
							    <td>
								<?php echo Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'disableUForm'.$roles->staff_id]); ?>

				    		<?php echo e(Form::hidden('id', $roles->staff_id)); ?>

				    		<?php echo e(Form::hidden('status', 2)); ?>

				    		<?php echo e(Form::hidden('action', "disabled")); ?>



				    		<button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
				    		<?php echo Form::close(); ?>


							 </td>

				    		<?php elseif($roles->staff->status == 2 ?? null): ?>
							 <td>
								<?php echo Form::open(['method' => 'patch', 'action' => 'StaffController@disable', 'id'=>'enableUForm'.$roles->staff_id]); ?>

				    		<?php echo e(Form::hidden('id', $roles->staff_id)); ?>

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
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>

 <script>


 			function submitAForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign this permission</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addPForm"+id).submit();
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







 			function deleteRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteRoleForm"+id).submit();
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
	function submitRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("removeRForm"+id).submit();
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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/show-staff.blade.php ENDPATH**/ ?>