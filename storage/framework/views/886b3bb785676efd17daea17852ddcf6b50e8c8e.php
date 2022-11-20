<?php $__env->startSection('pagetitle'); ?>Edit Student Contact <?php $__env->stopSection(); ?>



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
                        edit Student Sponsor
                    </h1>
            <div class="card">

              <!-- /.card-header -->
            <!-- form start -->

				<?php echo Form::model($contact, ['method' => 'PATCH','route' => ['student-contact.update', $contact->id], 'class' => 'nobottommargin', 'files' => true]); ?>


				<div class="card-body">

                     <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="box-body">



							<div class="row">
              			<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('title')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="title">Title :</label>
								<?php echo Form::text('title', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'title', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('title')); ?></span>
							 </div>
							</div>

							<div class="col-md-4 form-group">
              			<div  <?php if($errors->has('surname')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="surname">Surname :</label>
								<?php echo Form::text('surname', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'surname', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('surname')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('other_names')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="other_names">Other Names :</label>
								<?php echo Form::text('other_names', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'other_names', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('other_names')); ?></span>
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
              			<div  <?php if($errors->has('state')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="state">State of Residence :</label>
								<?php echo Form::text('state', null, array( 'placeholder' => '','class' => 'form-control', 'id' => 'state', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('state')); ?></span>
							 </div>
							</div>


							<div class="col-md-4 form-group">
							<div  <?php if($errors->has('city')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="city">City of Residence :</label>
								<?php echo Form::text('city', null, array('placeholder' => '', 'class' => 'form-control', 'id' => 'city', 'required' => 'required')); ?>

							 <span class="text-danger"> <?php echo e($errors->first('city')); ?></span>
							</div>
							</div>


							</div>

							<div class="row">
							<div class="col-md-6 form-group">
							<div  <?php if($errors->has('email')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="email">Email :</label>

                                <?php echo Form::email('email', null, array('placeholder' => 'john@doe.com', 'class' => 'form-control', 'id' => 'email', 'name' => 'email')); ?>

							<span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
							</div>
							</div>


							<div class="col-md-6 form-group">
							<div  <?php if($errors->has('phone')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="phone">Phone :</label>

                                <?php echo Form::text('phone', null, array('placeholder' => '080xxxxx', 'class' => 'form-control', 'id' => 'phone', 'name' => 'phone', 'required' => 'required')); ?>

							<span class="text-danger"> <?php echo e($errors->first('phone')); ?></span>
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



								<?php echo e(Form::submit('Edit Student Contact', array('class' => 'btn btn-primary'))); ?>





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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/admin/contact/edit.blade.php ENDPATH**/ ?>