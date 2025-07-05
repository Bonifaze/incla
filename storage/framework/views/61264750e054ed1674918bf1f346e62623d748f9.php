<?php $__env->startSection('pagetitle'); ?> List Security Roles  <?php $__env->stopSection(); ?>



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
                   LIST OF ALL ROLES
                    </h1>
            <div class="card ">
              

             <div class="table-responsive card-body">


						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
                              <th>Role</th>
							 <th>Description</th>
							  <th>Action</th>
							  <th>Action</th>
							  <th>Action</th>


						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($role->name); ?></td>
                              <td><?php echo e($role->role); ?></td>
							 <td><?php echo e($role->description); ?></td>
							 <td><a href="<?php echo e(route('rbac.show-role',$role->id)); ?>" class="btn btn-default"> Assign Permission </td>

							 <td><a href="<?php echo e(route('rbac.edit-role',$role->id)); ?>" class="btn btn-default"> Edit </td>

							    <td>
							    <?php echo Form::open(['method' => 'Patch', 'route' => 'rbac.delete-role', 'id'=>'deleteRoleForm'.$role->id]); ?>

				    		<?php echo e(Form::hidden('id', $role->id)); ?>



				    		<button onclick="deleteRForm(<?php echo e($role->id); ?>)" type="button" class="<?php echo e($role->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Delete</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
						 <?php echo $roles->render(); ?>



           </div>
            </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

 <script>




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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views//rbac/list-roles.blade.php ENDPATH**/ ?>