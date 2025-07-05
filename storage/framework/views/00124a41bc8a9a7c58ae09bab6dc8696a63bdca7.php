<?php $__env->startSection('pagetitle'); ?>Edit Student Medical <?php $__env->stopSection(); ?>



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
                    edit Student medica Record
                    </h1>
            <div class="card ">

              <!-- /.card-header -->
            <!-- form start -->

				<?php echo Form::model($medical, ['method' => 'PATCH','route' => ['student-medical.update', $medical->id], 'class' => 'nobottommargin', 'files' => true]); ?>


				<div class="card-body">

                     <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="box-body">




							<div class="row">


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
	                        		$medical->blood_group,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>


							<div class="col-md-4 form-group">
								<label for="genotype">Genotype :</label>
								<?php echo e(Form::select('genotype', [
	                        		'AA' => 'AA',
	                        		'AS' => 'AS',
	                        		'SS' => 'SS'],
	                        		$medical->genotype,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>


							</div>
							</div>






              </div>

               </div>





                <!-- /.card-body -->

                <div class="card-footer">



								<?php echo e(Form::submit('Edit Student Medical', array('class' => 'btn btn-primary'))); ?>





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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/students/admin/medical/edit.blade.php ENDPATH**/ ?>