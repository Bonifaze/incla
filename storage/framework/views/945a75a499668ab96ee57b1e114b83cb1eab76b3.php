<?php $__env->startSection('pagetitle'); ?> List of Admin Departments  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('school-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('school'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('list-admins'); ?> active <?php $__env->stopSection(); ?>

 <!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

          <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       List of Administrative Departments
                    </h1>

            <div class="card ">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							  <th>Parent</th>
							 <th>Action</th>
                              <th>Action</th>
							 



						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($department->name); ?></td>
							 <td><?php echo e($department->parent->name); ?></td>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ICTOfficers', 'App\StudentResult')): ?>
							 <td><a class="btn btn-info" href="<?php echo e(route('admin.department.staff_list',$department->id)); ?>"> Staff List </td>
                             <td><a class="btn btn-warning" href="<?php echo e(route('admin.department.edit',$department->id)); ?>"> <i class="fa fa-edit"></i> Edit </td>
<?php else: ?> 
<td></td>
<?php endif; ?>
                                
							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
						 <?php echo $departments->render(); ?>



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




 			function deleteDepartment(id)
        	{
             bootbox.dialog({
                message: "<h4>Confirm you want to delete this Department</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteDepartmentForm"+id).submit();
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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admins/departments/list.blade.php ENDPATH**/ ?>