<?php $__env->startSection('pagetitle'); ?> Show Staff Role details  <?php $__env->stopSection(); ?>



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
                       <?php echo e($staff->fullName); ?>

                    </h1>
            <div class="card ">

				<?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  
							  <th>Name</th>
							 <th>Email</th>
							 <th>Phone</th>
                             <th>email</th>


						  </thead>


						  <tbody>

						  <tr>
							  
							  <td><?php echo e($staff->fullName); ?></td>
							 <td><?php echo e($staff->email); ?></td>
							 <td><?php echo e($staff->phone); ?></td>
							 <td><?php echo e($staff->username); ?></td>

							</tr>

						  </tbody>



						</table>


            </div>

             <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title"> List of assigned Roles</h4>
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

						  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>

							  <td><?php echo e($loop->iteration); ?> <input type="checkbox"></td>
							  <td><?php echo e($role->name); ?></td>
							 <td><?php echo e($role->description); ?></td>
							 <td>
							<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.remove-role', 'id'=>'removeRForm'.$role->id]); ?>

				    		<?php echo e(Form::hidden('role_id', $role->id)); ?>

				    		<?php echo e(Form::hidden('staff_id', $staff->id)); ?>


				    		<button onclick="submitRForm(<?php echo e($role->id); ?>)" type="button" class="<?php echo e($role->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Remove Role</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>



            </div>








              <div class="card card-info">
            <div class="card-header">
                <h4 class="card-title"> Available Roles</h4>
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

						  <?php $__currentLoopData = $rls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?><input type="checkbox"></td>
							  <td><?php echo e($rl->name); ?></td>
							 <td><?php echo e($rl->description); ?></td>

							  <td>
							<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.assign-role', 'id'=>'addRForm'.$rl->id]); ?>

				    		<?php echo e(Form::hidden('role_id', $rl->id)); ?>

				    		<?php echo e(Form::hidden('staff_id', $staff->id)); ?>


				    		<button onclick="submitAForm(<?php echo e($rl->id); ?>)" type="button" class="<?php echo e($rl->id); ?> btn btn-primary" ><span class="icon-line2-trash"></span> Assign</button>
				    		<?php echo Form::close(); ?>


							 </td>


							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>


						</table>


<div>
	<?php echo Form::open(['method' => 'Post', 'route' => 'rbac.assign-role', 'id'=>'addRForm'.$rl->id]); ?>

				    		<?php echo e(Form::hidden('role_id', $rl->id)); ?>

				    		<?php echo e(Form::hidden('staff_id', $staff->id)); ?>


				    		<button onclick="submitAForm(<?php echo e($rl->id); ?>)" type="button" class="<?php echo e($rl->id); ?> btn btn-primary" ><span class="icon-line2-trash"></span> Assign Roles</button>
				    		<?php echo Form::close(); ?></div><br>

            </div>





             <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">Staff Effective Permissions</h4>
				</div>
           </div>




             <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							   
							  <th>Name</th>
							 <th>Description</th>


						  </thead>


						  <tbody>


							<?php $__currentLoopData = $perms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  
							  <td><?php echo e($perm->name); ?></td>
							 <td><?php echo e($perm->description); ?></td>

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
                message: "<h4>Confirm you want to assign this Role</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("addRForm"+id).submit();
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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/staff/security.blade.php ENDPATH**/ ?>