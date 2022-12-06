<?php $__env->startSection('pagetitle'); ?> Manage Student  <?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-remark'); ?> active <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">


         <div class="row">
             <div class="col-md-4 form-group">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"> Remark Upload for  <?php echo e($student->full_name); ?> </h3>
                </div>
                <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="table-responsive">

                    <!-- form start -->

                    <?php echo Form::open(array('method'=>'POST', 'class' => 'nobottommargin')); ?>

                    <div class="card-body">
                        <div class="box-body">

                            <?php if($student->hasResultSemesterRegistration()): ?>
                            This will allow for upload of outstanding and
                            carry over courses for this student, for this semester.
                            <?php else: ?>
                                No course registration is available for this student.<br />
                                This must be completed before remark upload will be available.
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                        <?php if($student->hasResultSemesterRegistration()): ?>
                        <a class="btn btn-outline-success" href="<?php echo e(route('result.semester.remark',base64_encode($student->id))); ?>">  Start </a>
                        <?php endif; ?>
                    </div>

                </div>
            <?php echo Form::close(); ?>

                <!-- /.box-body -->
           </div>

         </div>


             <!-- /.start second column -->
             <div class="col-md-4 form-group">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title"> Result History  <?php echo e($student->full_name); ?> </h3>
                     </div>
                     <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <div class="table-responsive">

                         <!-- form start -->

                         <div class="card-body">
                             <div class="box-body">

                                Displays all academic results for this student.<br />
                                 Only Senate approve result will be shown.s

                             </div>
                         </div>

                         <!-- /.card-body -->

                         <div class="card-footer">
                             <a class="btn btn-info" href="<?php echo e(route('result.student.history',base64_encode($student->id))); ?>" target="_blank"> <i class="fa fa-eye"></i> Result History</a>
                         </div>

                     </div>
                     <!-- /.box-body -->
                 </div>

             </div>


             <!-- /.start third column -->
             <div class="col-md-4 form-group">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title"> Brought Forward CGPA  </h3>
                     </div>
                     <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <div class="table-responsive">

                         <!-- form start -->

                         <?php echo Form::model($academic, ['method' => 'PATCH','route' => ['result.brought_forward_cgpa'], 'class' => 'nobottommargin']); ?>

                         <div class="card-body">
                             <div class="box-body">

                                 <div class="row">

                                     <div class="col-md-6 form-group">
                                         <label for="TC">Total Credit :</label>
                                         <?php echo Form::text('TC', $academic->TC, array( 'placeholder' => '','class' => 'form-control', 'id' => 'TC', 'name' => 'TC', 'required' => 'required')); ?>

                                         <span class="text-danger"> <?php echo e($errors->first('TC')); ?></span>
                                     </div>
                                     <?php echo e(Form::hidden("academic_id", $academic->id)); ?>

                                       <div class="col-md-6 form-group">
                                         <label for="TGP">Total Grade Point :</label>
                                         <?php echo Form::text('TGP', $academic->TGP, array( 'placeholder' => '','class' => 'form-control', 'id' => 'TGP', 'name' => 'TGP', 'required' => 'required')); ?>

                                         <span class="text-danger"> <?php echo e($errors->first('TGP')); ?></span>
                                     </div>


                                 </div>

                             </div>
                     </div>

                         <!-- form start
                         <div class="card-footer">
                             <?php echo e(Form::submit('Update', array('class' => 'btn btn-primary'))); ?>

                         </div>
                         -->
                         <?php echo Form::close(); ?>

                     </div>
                 </div>

             </div>

         </div>

             
            
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Result Upload for  <?php echo e($student->full_name); ?> </h3>
				</div>
             <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive">
  
				<!-- form start -->
            
						<?php echo Form::open(array('route' => 'result.upload', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

			<div class="card-body">
              <div class="box-body">
              			
              		<div class="row">
              			<div class="col-md-5 form-group">
								<label for="session_id">Session :</label>
								<?php echo e(Form::select('session_id', $sessions, null,['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

							<span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
							</div>
						
						<div class="col-md-4 form-group">
								<label for="semester">Semester :</label>
								<?php echo e(Form::select('semester', [
	                        		'1' => 'First Semester',
	                        		'2' => 'Second Semester'],
	                        		1,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
							</div>
						
						<div class="col-md-2 form-group">
								<label for="level">Level :</label>
								<?php echo e(Form::select('level', [
	                        		'100' => '100 Level',
	                        		'200' => '200 Level',
	                        		'300' => '300 Level',
	                        		'400' => '400 Level',
	                        		'500' => '500 Level',
	                        		'600' => '600 Level',
	                        		'700' => 'PGD',
	                        		'800' => 'MSc',
	                        		'900' => 'PhD'],
	                        		100,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
							</div>
						
					</div>	
					
					<?php echo e(Form::hidden('student_id', $student->id)); ?>

								
              </div>
             </div>
                
              
                <!-- /.card-body -->
                
                <div class="card-footer">
               
								<?php echo e(Form::submit('Select', array('class' => 'btn btn-primary'))); ?>

				
                </div>
                
                 </div>
               <!-- /.box-body -->

             
            <?php echo Form::close(); ?>

            		
            </div>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('register', 'App\StudentResult')): ?>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Course Registration for  <?php echo e($student->full_name); ?> </h3>
				</div>
             
             <div class="table-responsive">
  
				<!-- form start -->
            
						<?php echo Form::open(array('route' => 'result.registration', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

			<div class="card-body">
              <div class="box-body">
              			
              		<div class="row">
              			<div class="col-md-5 form-group">
								<label for="session_id">Session :</label>
								<?php echo e(Form::select('session_id', $sessions, null,['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

							<span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
							</div>
						
						<div class="col-md-4 form-group">
								<label for="semester">Semester :</label>
								<?php echo e(Form::select('semester', [
	                        		'1' => 'First Semester',
	                        		'2' => 'Second Semester'],
	                        		1,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
							</div>
						
						<div class="col-md-2 form-group">
								<label for="level">Level :</label>
								<?php echo e(Form::select('level', [
	                        		'100' => '100 Level',
	                        		'200' => '200 Level',
	                        		'300' => '300 Level',
	                        		'400' => '400 Level',
	                        		'500' => '500 Level',
	                        		'600' => '600 Level',
	                        		'700' => 'PGD',
	                        		'800' => 'MSc',
	                        		'900' => 'PhD'],
	                        		100,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
							</div>
						
					</div>	
					
					<?php echo e(Form::hidden('student_id', $student->id)); ?>

								
              </div>
             </div>
                
              
                <!-- /.card-body -->
                
                <div class="card-footer">
               
								<?php echo e(Form::submit('Select', array('class' => 'btn btn-primary'))); ?>

                </div>
                
                 </div>
               <!-- /.box-body -->

             
            <?php echo Form::close(); ?>

            		
            </div>

             <?php else: ?>

            <?php endif; ?>
            
            
            
            
            
            
             
            
            
             
            
            
             
            
            
            
            
            
            
            
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
<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/results/manage-student.blade.php ENDPATH**/ ?>