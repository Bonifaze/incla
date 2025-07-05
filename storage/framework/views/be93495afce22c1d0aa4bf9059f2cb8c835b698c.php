<?php $__env->startSection('pagetitle'); ?>Edit Student <?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bootstrap-datepicker.css')); ?>" />

<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/components/bs-filestyle.css')); ?>" />


<?php $__env->stopSection(); ?>



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
                       Edit <?php echo e($student->fullName); ?>

                    </h1>

            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

					<?php echo Form::model($student, ['method' => 'PATCH','route' => ['student.updateedit', $student->id], 'class' => 'nobottommargin', 'files' => true]); ?>


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
	                        		$student->gender,
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
								<?php echo Form::text('dob', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'dob', 'name' => 'dob')); ?>

								<span class="text-danger"> <?php echo e($errors->first('dob')); ?></span>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('email')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="email">Email :</label>

                                <?php echo Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')); ?>

							<span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
							</div>
							</div>



							</div>


							<div class="row">


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




						
							</div>


							<div class="row">
							<div class="col-md-12 form-group">
							<div  <?php if($errors->has('address')): ?> class ='has-error form-group' <?php endif; ?>>

								<label for="address">Address :</label>
								 <?php echo Form::textarea('address', null, array('placeholder' => '','rows'=>'3', 'class' => 'form-control', 'id' => 'address', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('address')); ?></span>
								</div>
							</div>

							</div>

							<div class="row">
							<div class="col-md-6 form-group">
								<label for="passport">Passport :</label>
								<?php echo Form::file('passport', array('class' => 'form-control file-loading', 'id' => 'passport', 'placeholder'=>'Choose profile pic', 'name' => 'passport',  'accept' => 'image/*')); ?>

								<span class="text-danger"> <?php echo e($errors->first('passport')); ?></span>
							</div>

							<div class="col-md-6 form-group">
								<label for="signature">Signature :</label>
								<?php echo Form::file('signature', array('class' => 'form-control file-loading', 'id' => 'signature', 'placeholder'=>'Choose Signature pic', 'name' => 'signature',  'accept' => 'image/*')); ?>

								<span class="text-danger"> <?php echo e($errors->first('signature')); ?></span>
							</div>

							</div>





              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Edit Student', array('class' => 'btn btn-primary'))); ?>





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


<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/students/edit.blade.php ENDPATH**/ ?>