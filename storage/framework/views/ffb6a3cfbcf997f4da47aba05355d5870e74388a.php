<?php $__env->startSection('pagetitle'); ?>Create session Admission <?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('rbac-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('rbac'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('create-perm'); ?> active <?php $__env->stopSection(); ?>

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
                     CREATE SESSION Admission
                    </h1>

            <!-- form start -->

            <div class="card card-primary">
              
              <!-- /.card-header -->
              <!-- form start -->


						<?php echo Form::open(array('route' => 'session.storeAdmission', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-12 form-group">
								<label for="name">Name :</label>
								<?php echo Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
							</div>
		<div class="col-md-12 form-group">
								<label for="dob">Date of Birth :</label>
								<?php echo Form::text('start_date', '2023-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'start_date', 'name' => 'start_date')); ?>

								<span class="text-danger"> <?php echo e($errors->first('start_date')); ?></span>
							</div>
              	<div class="col-md-12 form-group">
								<label for="dob">Date of Birth :</label>
								<?php echo Form::text('end_date', '2023-12-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'end_date', 'name' => 'end_date')); ?>

								<span class="text-danger"> <?php echo e($errors->first('end_date')); ?></span>
							</div>





							</div>





              </div>
              <!-- /.box-body -->
</div>
               <!-- /.card-body -->

                <div class="card-footer">


							<?php echo e(Form::submit('Create Session', array('class' => 'btn btn-success'))); ?>




                </div>
              <!-- /.box-body -->

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
  <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

	<!-- bootstrap datepicker -->
	<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
	<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<script type="text/javascript">
	//Date picker
	    $('#start_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#end_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//sessions/createAdmission.blade.php ENDPATH**/ ?>