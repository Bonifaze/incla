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
                   <?php echo e($role->name); ?>

                    </h1>

            <div class="card">


             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  
							  <th>Name</th>
							 <th>Description</th>
							 <th>Action</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  <tr>
							  
							  <td><?php echo e($role->name); ?></td>
							 <td><?php echo e($role->description); ?></td>
							  <td><a href="<?php echo e(route('rbac.edit-role',$role->id)); ?>" class="btn btn-default"> Edit </a></td>

							    <td>
							    <?php echo Form::open(['method' => 'Patch', 'route' => 'rbac.delete-role', 'id'=>'deleteRoleForm'.$role->id]); ?>

				    		<?php echo e(Form::hidden('id', $role->id)); ?>



				    		<button onclick="deleteRForm(<?php echo e($role->id); ?>)" type="button" class="<?php echo e($role->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

						  </tbody>



						</table>


            </div>

             <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">List of assigned permissions</h4>
				</div>
           </div>


              <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?> <input type="checkbox"></td>
							  <td><?php echo e($permission->name); ?></td>
							 <td><?php echo e($permission->description); ?></td>
							 <td>
							<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.remove-perm', 'id'=>'removePForm'.$permission->id]); ?>

				    		<?php echo e(Form::hidden('perm_id', $permission->id)); ?>

				    		<?php echo e(Form::hidden('role_id', $role->id)); ?>


				    		<button onclick="submitRForm(<?php echo e($permission->id); ?>)" type="button" class="<?php echo e($permission->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Remove</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>

<div>


				    		<button onclick="submitRForm" type="button" class="btn btn-danger mb-4 ml-4" ><span class="icon-line2-trash"></span> Remove</button>
				    		</div>

            </div>









            <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title">Available permissions</h4>
				</div>
           </div>


             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							 <th>Description</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?><input type="checkbox"></td>
							  <td><?php echo e($perm->name); ?></td>
							 <td><?php echo e($perm->description); ?></td>

							  <td>
							<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.assign-perm', 'id'=>'addPForm'.$perm->id]); ?>

				    		<?php echo e(Form::hidden('perm_id', $perm->id)); ?>

				    		<?php echo e(Form::hidden('role_id', $role->id)); ?>


				    		<button onclick="submitAForm(<?php echo e($perm->id); ?>)" type="button" class="<?php echo e($perm->id); ?> btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
<div><?php echo Form::open(['method' => 'Post', 'route' => 'rbac.assign-perm', 'id'=>'addPForm'.$perm->id]); ?>

				    		<?php echo e(Form::hidden('perm_id', $perm->id)); ?>

				    		<?php echo e(Form::hidden('role_id', $role->id)); ?>


				    		<button onclick="submitAForm(<?php echo e($perm->id); ?>)" type="button" class="<?php echo e($perm->id); ?> btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		<?php echo Form::close(); ?>

</div><br>


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




 			function submitRForm(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to assign remove this permission</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("removePForm"+id).submit();
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



    </script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views//rbac/show-role.blade.php ENDPATH**/ ?>