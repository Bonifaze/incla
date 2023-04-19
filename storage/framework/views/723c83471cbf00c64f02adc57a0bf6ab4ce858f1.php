<?php $__env->startSection('pagetitle'); ?>Create New Student <?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bootstrap-datepicker.css')); ?>" />

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bs-filestyle.css')); ?>" />


<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?> active <?php $__env->stopSection(); ?>


<!-- Page -->
 <?php $__env->startSection('student-create'); ?> active <?php $__env->stopSection(); ?>

 <!-- End Sidebar links -->




<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

            <div class="card">
                <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Create Students
                    </h1>


              <!-- /.card-header -->
            <!-- form start -->

						<?php echo Form::open(array('route' => 'student.store', 'method'=>'POST', 'class' => 'nobottommargin', 'files' => true)); ?>

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
								<?php echo Form::text('dob', '2002-07-01', array('placeholder' => '', 'class' => 'form-control', 'id' => 'dob', 'name' => 'dob')); ?>

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
	                        		'Single',
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
							<div  <?php if($errors->has('hobbies')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="hobbies">Hobbies :</label>

                                <?php echo Form::text('hobbies', null, array('placeholder' => 'Cooking', 'class' => 'form-control', 'id' => 'hobbies', 'name' => 'hobbies')); ?>

							<span class="text-danger"> <?php echo e($errors->first('hobbies')); ?></span>
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
              <h3 class="box-title">Emergency Contact / Sponsor Information</h3>
            </div>



							<div class="row">
              			<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('etitle')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="etitle">Title :</label>
								<?php echo Form::text('etitle', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'etitle', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('etitle')); ?></span>
							 </div>
							</div>

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


							</div>


							<div class="row">
              			<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('relationship')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="relationship">Relationship with Contact / Sponsor :</label>
								<?php echo Form::text('relationship', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'relationship', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('relationship')); ?></span>
							 </div>
							</div>

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('estate')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="estate">State of Residence :</label>
								<?php echo Form::text('estate', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'estate', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('estate')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('ecity')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="ecity">City of Residence :</label>
								<?php echo Form::text('ecity', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'ecity', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('ecity')); ?></span>
							</div>
							</div>


							</div>

							<div class="row">
							<div class="col-md-6 form-group">
							<div  <?php if($errors->has('eemail')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="eemail">Email :</label>

                                <?php echo Form::email('eemail', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'eemail', 'name' => 'eemail')); ?>

							<span class="text-danger"> <?php echo e($errors->first('eemail')); ?></span>
							</div>
							</div>


							<div class="col-md-6 form-group">
							<div  <?php if($errors->has('ephone')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="ephone">Phone :</label>

                                <?php echo Form::text('ephone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'ephone', 'name' => 'ephone', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('ephone')); ?></span>
							</div>
							</div>
							</div>





							<div class="row">
							<div class="col-md-12 form-group">
							<div  <?php if($errors->has('eaddress')): ?> class ='has-error form-group' <?php endif; ?>>

								<label for="eaddress">Address :</label>
								 <?php echo Form::text('eaddress', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'eaddress', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('eaddress')); ?></span>
								</div>
							</div>

							</div>

						<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Academic Information</h3>
            </div>



							<div class="row">
              			<div class="col-md-4 form-group">
								<label for="mode_of_entry">Mode of Entry :</label>
								<?php echo e(Form::select('mode_of_entry', [
	                        		'UTME' => 'UTME',
	                        		'DE' => 'Direct Entry',
	                        		'TRANSFER' => 'Transfer',
	                       			'PGD' => 'PGD',
	                       			'MSc' => 'Masters',
                                    'MBA' => 'MBA',
                                    'MPA' => 'MPA',
	                       			'PhD' => 'PhD'],
	                        		'UTME',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>



							<div class="col-md-4 form-group">
								<label for="mode_of_study">Mode of Study :</label>
								<?php echo e(Form::select('mode_of_study', [
	                        		'Full Time' => 'Full Time',
	                        		'Part Time' => 'Part Time',
	                        		'Sandwich' => 'Sandwich',
	                       			'Distance Learning' => 'Distance Learning'],
	                        		'Full Time',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>


							<div class="col-md-4 form-group">
								<label for="entry_session_id">Entry Session :</label>
								<?php echo e(Form::select('entry_session_id', $sessions, null,['class' => 'form-control', 'id' => 'entry_session_id', 'name' => 'entry_session_id'])); ?>

							<span class="text-danger"> <?php echo e($errors->first('entry_session_id')); ?></span>

							</div>


							</div>


							<div class="row">
              			
                               
                                    <?php echo Form::hidden('serial_no', 0, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]); ?>

                                    

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('jamb_no')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="jamb_no">Jamb Number :</label>
								<?php echo Form::text('jamb_no', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'jamb_no')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('jamb_no')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('jamb_score')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="jamb_score">Jamb Score :</label>
								<?php echo Form::text('jamb_score', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'jamb_score')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('jamb_score')); ?></span>
							</div>
							</div>
<div class="col-md-4 form-group">
								<label for="level">Level :</label>
								<?php echo e(Form::select('level', [
	                        		'100' => '100',
	                        		'200' => '200',
	                        		'700' => 'PGD',
	                        		'800' => 'MSc/MBA/MPA',
	                       			'900' => 'PhD'],
	                        		'100',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							</div>

							<div class="row">
							<div class="col-md-12 form-group">
								<label for="program_id">Program :</label>
								<?php echo e(Form::select('program_id', $programs, null,['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id'])); ?>

							<span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>

							</div>



							</div>



							<div class="box-header">
              <h3 class="box-title">&nbsp;</h3>
            </div>


							 <div class="box-header">
              <h3 class="box-title">Medical Information</h3>
            </div>



							<div class="row">
              			<div class="col-md-4 form-group">
								<label for="physical">Physical Condition :</label>
								<?php echo e(Form::select('physical', [
	                        		'normal' => 'Normal',
	                        		'blind' => 'Blind',
	                        		'dumb' => 'Dumb',
	                       			'deafdumb' => 'Deaf and Dumb',
	                       			'other' => 'Other'],
	                        		'normal',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>

							<div class="col-md-4 form-group">
								<label for="blood_group">Blood Group :</label>
								<?php echo e(Form::select('blood_group', [
	                        		'A+' => 'A+',
	                        		'A-' => 'A-',
	                        		'B+' => 'B+',
	                        		'B-' => 'B-',
	                        		'AB+' => 'AB+',
	                        		'AB-' => 'AB-',
	                        		'O+' => 'O+',
	                       			'O-' => 'O-'],
	                        		'O+',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>


							<div class="col-md-4 form-group">
								<label for="genotype">Genotype :</label>
								<?php echo e(Form::select('genotype', [
	                        		'AA' => 'AA',
	                        		'AS' => 'AS',
	                        		'SS' => 'SS'],
	                        		'AA',
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>
							</div>


							<div class="row">
              			<div class="col-md-6 form-group">
              			<div  <?php if($errors->has('condition')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="condition">Known Medical Condition :</label>
								 <?php echo Form::textarea('condition', null, array('placeholder' => 'Asthma or None','rows'=>'3', 'class' => 'form-control', 'id' => 'condition', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('condition')); ?></span>
							 </div>
							</div>

							<div class="col-md-6 form-group">
              			<div  <?php if($errors->has('allergies')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="allergies">Known Allergies :</label>
								 <?php echo Form::textarea('allergies', null, array('placeholder' => 'Peanuts, sulphur or None','rows'=>'3', 'class' => 'form-control', 'id' => 'allergies', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('allergies')); ?></span>
							 </div>
							</div>

							</div>




              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Create Student', array('class' => 'btn btn-primary'))); ?>





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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/admin/create.blade.php ENDPATH**/ ?>