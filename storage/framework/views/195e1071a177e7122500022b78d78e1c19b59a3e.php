<?php $__env->startSection('pagetitle'); ?>Edit Staff Contact <?php $__env->stopSection(); ?>


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
                    Edit Emergency Contact
                </h1>
            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

						<?php echo Form::model($contact, ['method' => 'PATCH','route' => ['staff-contact.update', $contact->id], 'class' => 'nobottommargin', 'files' => true]); ?>

				<div class="card-body">

                     <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="box-body">

							 <div class="box-header">
              
            </div>
							<div class="row">

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('name')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="esurname">Surname :</label>
								<?php echo Form::text('name', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'name', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('name')); ?></span>
							 </div>
							</div>

							 <div class="col-md-4 form-group">
              			<div  <?php if($errors->has('relationship')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="relationship">Relationship with Contact / Sponsor :</label>
								<?php echo Form::text('relationship', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'relationship', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('relationship')); ?></span>
							 </div>
							</div>

							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('email')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="email">Email :</label>
							 <?php echo Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email')); ?>

							<span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
							</div>
							</div>


							</div>


							<div class="row">


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('phone')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="phone">Phone :</label>
							 <?php echo Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('phone')); ?></span>
							</div>
							</div>

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('state')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="state">State of Residence :</label>
								<?php echo Form::text('state', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'state', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('state')); ?></span>
							 </div>
							</div>

							</div>



							<div class="row">
							<div class="col-md-12 form-group">
							<div  <?php if($errors->has('address')): ?> class ='has-error form-group' <?php endif; ?>>

								<label for="address">Address :</label>
								 <?php echo Form::textarea('address', null, array('placeholder' => '','rows'=>'4', 'class' => 'form-control', 'id' => 'address', 'required' => 'required')); ?>

								<span class="text-danger"> <?php echo e($errors->first('address')); ?></span>
								</div>
							</div>

							</div>







              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Edit Contact', array('class' => 'btn btn-primary'))); ?>





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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/contact/edit.blade.php ENDPATH**/ ?>