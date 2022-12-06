<?php $__env->startSection('pagetitle'); ?> Student Result Management  <?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?> active <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">






            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> <?php echo e($student->full_name); ?> <br /> <?php echo e($session->name); ?> - <?php echo e($session->semesterName($semester)); ?> Result Upload </h3>
				</div>
             <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive">

				<!-- form start -->

						<?php echo Form::open(array('route' => 'result.store', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

			<div class="card-body">
              <div class="box-body">

              			 <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              		<div class="row">

              			<div class="col-md-1 form-group">

						</div>

						<div class="col-md-6 form-group">
								<label for="hours"> <?php echo e($result->programCourse->course->code); ?> : <?php echo e($result->programCourse->course->title); ?></label>
								<?php echo Form::text("parameters[$result->id][result]", $result->total, array( 'placeholder' => '','class' => 'form-control', 'id' => 'hours', 'required' => 'required')); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('parameters[$result->id][result]')); ?></span>
							</div>

						<div class="col-md-3 form-group">

						</div>


					</div>

					<?php echo e(Form::hidden("parameters[$result->id][id]", $result->id)); ?>


					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php echo e(Form::hidden("data[student]", $student->id)); ?>

					<?php echo e(Form::hidden("data[session]", $session->id)); ?>

					<?php echo e(Form::hidden("data[semester]", $semester)); ?>


              </div>
             </div>


                <!-- /.card-body -->

                <div class="card-footer">

								<?php echo e(Form::submit('Update', array('class' => 'btn btn-primary'))); ?>


                </div>

                 </div>
               <!-- /.box-body -->


            <?php echo Form::close(); ?>


            </div>
























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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/results/upload.blade.php ENDPATH**/ ?>