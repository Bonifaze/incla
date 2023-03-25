



<?php $__env->startSection('pagetitle'); ?> Search Student  <?php $__env->stopSection(); ?>




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
                        Search Students
                    </h1>

            <div class="card">

             <div class="table-responsive">

				<!-- form start -->
             <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<?php echo Form::open(array('route' => 'student.find', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

			<div class="card-body">
              <div class="box-body">

              			<div class="row">
              			<div class="col-md-6 form-group">
              			<div  <?php if($errors->has('data')): ?> class ='has-error form-group' <?php endif; ?>>
								<label for="data">Surname, First Name, ID, Mat No, Email or Phone Number:</label>
								<?php echo Form::search('data', null, array( 'placeholder' => 'Surname, First Name, ID, Mat No, Email or Phone Number','class' => 'form-control', 'id' => 'data', 'required' => 'required')); ?>


								</div>
								</div>
								</div>
              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								<?php echo e(Form::submit('Search', array('class' => 'btn btn-primary'))); ?>


                </div>

                 </div>
               <!-- /.box-body -->


            <?php echo Form::close(); ?>


            </div>


            <div class="card ">

               
                <div class="table-responsive">

                    <!-- form start -->

                    <?php echo Form::open(array('route' => 'student.find_matric', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <div  <?php if($errors->has('data')): ?> class ='has-error form-group' <?php endif; ?>>
                                        <label for="data"> Mat No:</label>
                                        <?php echo Form::search('data', null, array( 'placeholder' => ' Mat No','class' => 'form-control', 'id' => 'data', 'required' => 'required')); ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        <?php echo e(Form::submit('Search', array('class' => 'btn btn-primary'))); ?>


                    </div>

                </div>
                <!-- /.box-body -->


                <?php echo Form::close(); ?>


            </div>
























          </div>

               <div class="card ">

          
                <div class="table-responsive">

                    <!-- form start -->

                    <?php echo Form::open(array('route' => 'student.findprogram', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">

                                <div class="col-md-6 form-group">
								<label for="program">Program :</label>
  					                                     <?php echo e(Form::select('program_id', $programs, null, [ 'class' => 'form-control','placeholder'=>'Select Program', 'id' => 'program_id', 'name' => 'program_id'])); ?> 

							      <span class="text-danger"> <?php echo e($errors->first('program')); ?></span>
						        </div>
                     <div class="col-md-4 form-group">
                                            <label for="level">Level :</label>
                                            <?php echo e(Form::select(
                                                'level',
                                                [
                                                    '100' => '100 Level',
                                                    '200' => '200 Level',
                                                    '300' => '300 Level',
                                                    '400' => '400 Level',
                                                    '500' => '500 Level',
                                                    '600' => '600 Level',
                                                    '700' => 'PGD',
                                                    '800' => 'MSc',
                                                    '900' => 'PhD',
                                                    '1000' => 'Graduate',
                                                ],
                                                100,
                                                ['class' => 'form-control select2'],
                                            )); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
                                        </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        <?php echo e(Form::submit('Search', array('class' => 'btn btn-primary'))); ?>


                    </div>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/students/admin/search.blade.php ENDPATH**/ ?>