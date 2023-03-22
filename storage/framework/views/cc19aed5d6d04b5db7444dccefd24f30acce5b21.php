



<?php $__env->startSection('pagetitle'); ?>Edit Staff Work Profile <?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bootstrap-datepicker.css')); ?>" />

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bs-filestyle.css')); ?>" />


<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?> active <?php $__env->stopSection(); ?>


<!-- Page -->
 <?php $__env->startSection('staff-list'); ?> active <?php $__env->stopSection(); ?>

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
                    edit  Work information
                </h1>
            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

						<?php echo Form::model($work, ['method' => 'PATCH','route' => ['staff-work.update', $work->id], 'class' => 'nobottommargin', 'files' => true]); ?>

				<div class="card-body">

                     <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="box-body">

							 <div class="box-header">
              
            </div>


							<div class="row">

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('staff_no')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="staff_no">Staff No :</label>
								<?php echo Form::text('staff_no', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'staff_no', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('staff_no')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('staff_position_id')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="staff_position_id">Staff Position :</label>
								<?php echo e(Form::select('staff_position_id', $positions, null,['class' => 'form-control', 'id' => 'staff_position_id', 'name' => 'staff_position_id'])); ?>

							 <span class="text-danger"> <?php echo e($errors->first('staff_position_id')); ?></span>
							</div>
							</div>

							 <div class="col-md-4 form-group">
								<label for="staff_type_id">Staff Type :</label>
								<?php echo e(Form::select('staff_type_id', [
	                        		'' => 'Select',
	                        		'1' => 'Teaching',
	                        		'2' => 'Non-Teaching'],
	                        		$work->staff_type_id,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							</div>



							<div class="row">

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('employment_type_id')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="employment_type_id">Employment Type :</label>
								<?php echo e(Form::select('employment_type_id', $employment_types, null,['class' => 'form-control', 'id' => 'employment_type_id'])); ?>

							 <span class="text-danger"> <?php echo e($errors->first('employment_type_id')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('admin_department_id')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="admin_department_id">Department :</label>
								<?php echo e(Form::select('admin_department_id', $departments, null,['class' => 'form-control', 'id' => 'admin_department_id'])); ?>

							 <span class="text-danger"> <?php echo e($errors->first('admin_department_id')); ?></span>
							</div>
							</div>

							 <div class="col-md-4 form-group">
              			<div  <?php if($errors->has('grade_id')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="grade_id">Grade Level :</label>
								<?php echo Form::text('grade_id', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'grade_id', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('grade_id')); ?></span>
							 </div>
							</div>

							</div>



							<div class="row">

							<div class="col-md-4 form-group">
								<label for="appointment_date">Appointment Date :</label>
								<?php echo Form::text('appointment_date', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'appointment_date', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('appointment_date')); ?></span>
							</div>

							<div class="col-md-4 form-group">
								<label for="assumption_date">Assumption Date :</label>
								<?php echo Form::text('assumption_date', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'assumption_date', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('assumption_date')); ?></span>
							</div>

							<div class="col-md-4 form-group">
								<label for="last_promotion_date">Last Promotion Date :</label>
								<?php echo Form::text('last_promotion_date', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'last_promotion_date', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('last_promotion_date')); ?></span>
							</div>


							</div>









              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Edit Staff', array('class' => 'btn btn-primary'))); ?>





                </div>

                 </div>
               <!-- /.box-body -->


            <?php echo Form::close(); ?>



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

<!-- External JavaScripts
	============================================= -->
	<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

	<!-- bootstrap datepicker -->
	<script src="<?php echo e(asset('dist/js/components/bootstrap-datepicker.js')); ?>"></script>
<!-- Bootstrap File Upload Plugin -->
	<script src="<?php echo e(asset('dist/js/components/bs-filestyle.js')); ?>"></script>

<script type="text/javascript">
	//Date picker
	    $('#dob').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#appointment_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

  <script type="text/javascript">
	//Date picker
	    $('#assumption_date').datepicker({
	    	format: 'yyyy-mm-dd',
		      autoclose: true
	    })
  </script>

 <script  type="text/javascript">
		$(document).on('ready', function() {

			$("#passport").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fas fa-user\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>

	<script  type="text/javascript">
		$(document).on('ready', function() {

			$("#signature").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"fas fa-signature\"></i>",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
				elErrorContainer: "#errorBlock"



			});



		});

	</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/staff/work/edit.blade.php ENDPATH**/ ?>