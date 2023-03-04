<?php $__env->startSection('pagetitle'); ?>Edit Role <?php $__env->stopSection(); ?>




<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('rbac-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('rbac'); ?> active <?php $__env->stopSection(); ?>


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


            <!-- form start -->

            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

						<?php echo Form::model($role, ['method' => 'PATCH','route' => ['rbac.update-role', $role->id]]); ?>

						<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
								<label for="name">Name :</label>
								<?php echo Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
							</div>

							<div class="col-md-6 form-group">
								<label for="description">Description :</label>
								<?php echo Form::text('description', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'description')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('description')); ?></span>
							</div>




							</div>




							<div class="row">



							</div>
              </div>


            </div>

             <div class="card-footer">


							<?php echo e(Form::submit('Edit User Role', array('class' => 'btn btn-primary'))); ?>




                </div>
            <?php echo Form::close(); ?>




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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/edit-role.blade.php ENDPATH**/ ?>