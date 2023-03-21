<?php $__env->startSection('pagetitle'); ?>Create New Staff <?php $__env->stopSection(); ?>


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
 <?php $__env->startSection('staff-create'); ?> active <?php $__env->stopSection(); ?>

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
                        create staff
                    </h1>
            <div class="card ">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
            <!-- form start -->

						<?php echo Form::open(array('route' => 'staff.store', 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)); ?>

				<div class="card-body">

                     <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="box-body">

              			<div class="row">
              			<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('surname')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="surname">Surname :</label>
								<?php echo Form::text('surname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'surname', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('surname')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('first_name')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="first_name">First Name :</label>
								<?php echo Form::text('first_name', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'first_name', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('first_name')); ?></span>
							</div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('middle_name')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="middle_name">Middle Name :</label>
								<?php echo Form::text('middle_name', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'middle_name')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('middle_name')); ?></span>
							</div>
							</div>


							</div>

							<div class="row">
							<div class="col-md-4 form-group">
								<label for="type">Gender :</label>
								<?php echo e(Form::select('gender', [
	                        		'Male' => 'Male',
	                       			 'Female' => 'Female'],
	                        		'Female',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('phone')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="phone">Phone :</label>

                                <?php echo Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'name' => 'phone', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('phone')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('title')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="title">Title :</label>

                                <?php echo Form::text('title', null, array('placeholder' => 'Mr', 'class' => 'form-control', 'id' => 'title', 'name' => 'title', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('title')); ?></span>
							</div>
							</div>
							</div>




							<div class="row">
							<div class="col-md-4 form-group">
								<label for="dob">Date of Birth :</label>
								<?php echo Form::text('dob', '1980-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'dob', 'name' => 'dob')); ?>

								<span class="text-danger"> <?php echo e($errors->first('dob')); ?></span>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('email')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="email">Email :</label>

                                <?php echo Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')); ?>

							<span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
								<label for="marital_status">Marital Status :</label>
								<?php echo e(Form::select('marital_status', [
	                        		'Single' => 'Single',
	                        		'Religious' => 'Religious',
	                       			'Married' => 'Married'],
	                        		'Married',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							</div>


							<div class="row">
							<div class="col-md-4 form-group">
								<div  <?php if($errors->has('nationality')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="nationality">Nationality :</label>

                                <?php echo Form::text('nationality', 'Nigeria', array('placeholder' => 'Nigeria', 'class' => 'form-control', 'id' => 'nationality', 'name' => 'nationality', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('nationality')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('state')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="state">State of Origin :</label>

                                <?php echo Form::text('state', null, array('placeholder' => 'Imo', 'class' => 'form-control', 'id' => 'state', 'name' => 'state', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('state')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('lga_name')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="lga_name">LGA :</label>

                                <?php echo Form::text('lga_name', null, array('placeholder' => 'Ahiazu-Mbaise', 'class' => 'form-control', 'id' => 'lga_name', 'name' => 'lga_name', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('lga_name')); ?></span>
							</div>
							</div>
							</div>

							<div class="row">
							<div class="col-md-4 form-group">
								<label for="city">City or Residence :</label>
								<?php echo Form::text('city', null, array('placeholder' => 'Abuja', 'class' => 'form-control', 'id' => 'city', 'name' => 'city')); ?>

								<span class="text-danger"> <?php echo e($errors->first('city')); ?></span>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('maiden_name')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="maiden_name">Maiden Name :</label>

                                <?php echo Form::text('maiden_name', null, array('placeholder' => ' ', 'class' => 'form-control', 'id' => 'maiden_name', 'name' => 'maiden_name')); ?>

							<span class="text-danger"> <?php echo e($errors->first('maiden_name')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
								<label for="religion">Religion :</label>
								<?php echo e(Form::select('religion', [
	                        		'Christain/Non Catholic' => 'Christain/Non Catholic',
	                        		'Catholic' => 'Catholic',
	                        		'Other' => 'Other',
	                       			'Muslim' => 'Muslim'],
	                        		'Catholic',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							</div>


							<div class="row">
							<div class="col-md-12 form-group">
							<div  <?php if($errors->has('address')): ?> class ='has-error form-group' <?php endif; ?>>

								<label for="address">Address :</label>
								 <?php echo Form::text('address', null, array('placeholder' => '','rows'=>'3', 'class' => 'form-control', 'id' => 'address', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('address')); ?></span>
								</div>
							</div>

							</div>

							<div class="row">
							<div class="col-md-6 form-group">
								<label for="passport">Passport :</label>
								<?php echo Form::file('passport', array('class' => 'form-control file-loading', 'id' => 'passport', 'placeholder'=>'Choose profile pic', 'name' => 'passport',  'accept' => 'image/*', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
							</div>

							<div class="col-md-6 form-group">
								<label for="signature">Signature :</label>
								<?php echo Form::file('signature', array('class' => 'form-control file-loading', 'id' => 'signature', 'placeholder'=>'Choose Signature pic', 'name' => 'signature',  'accept' => 'image/*', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('signature')); ?></span>
							</div>

							</div>

							<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Emergency Contact </h3>
            </div>



							<div class="row">

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('esurname')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="esurname">Surname :</label>
								<?php echo Form::text('esurname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'esurname', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('esurname')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('eother_names')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="eother_names">Other Names :</label>
								<?php echo Form::text('eother_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'eother_names', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('eother_names')); ?></span>
							</div>
							</div>

							 <div class="col-md-4 form-group">
              			<div  <?php if($errors->has('relationship')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="relationship">Relationship with Contact / Sponsor :</label>
								<?php echo Form::text('relationship', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'relationship', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('relationship')); ?></span>
							 </div>
							</div>

							</div>


							<div class="row">

              			<div class="col-md-4 form-group">
							<div  <?php if($errors->has('eemail')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="eemail">Email :</label>
							 <?php echo Form::email('eemail', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'eemail', 'name' => 'eemail')); ?>

							<span class="text-danger"> <?php echo e($errors->first('eemail')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('ephone')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="ephone">Phone :</label>
							 <?php echo Form::text('ephone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'ephone', 'name' => 'ephone', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('ephone')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('estate')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="estate">State of Residence :</label>
								<?php echo Form::text('estate', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'estate', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('estate')); ?></span>
							 </div>
							</div>

							</div>



							<div class="row">
							<div class="col-md-12 form-group">
							<div  <?php if($errors->has('eaddress')): ?> class ='has-error form-group' <?php endif; ?>>

								<label for="eaddress">Address :</label>
								 <?php echo Form::textarea('eaddress', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'eaddress', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('eaddress')); ?></span>
								</div>
							</div>

							</div>

						<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Work Information</h3>
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
	                        		'2',
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
							<div  <?php if($errors->has('username')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="username">Official Email :</label>
								<?php echo Form::email('username', null, array( 'placeholder' => '@veritas.edu.ng','class' => 'form-control', 'id' => 'username', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('username')); ?></span>
							 </div>
							</div>

							<div class="col-md-4 form-group">
								<label for="appointment_date">Appointment Date :</label>
								<?php echo Form::text('appointment_date', '2015-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'appointment_date', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('appointment_date')); ?></span>
							</div>

							<div class="col-md-4 form-group">
								<label for="assumption_date">Assumption Date :</label>
								<?php echo Form::text('assumption_date', '2015-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'assumption_date', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('assumption_date')); ?></span>
							</div>


							</div>









              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Create Staff', array('class' => 'btn btn-primary'))); ?>





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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/admin/create.blade.php ENDPATH**/ ?>