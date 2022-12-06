<?php $__env->startSection('pagetitle'); ?> Student Result Management  <?php $__env->stopSection(); ?>

<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('results-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('results'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-remark'); ?> active <?php $__env->stopSection(); ?>

<!-- End Sidebar links -->




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
                <h3 class="card-title"> Modify Excess Credit </h3>
				</div>
             <?php echo $__env->make("partialsv3.flash", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <div class="table-responsive">
  
				<!-- form start -->
            
			<?php echo Form::model($registration, ['method' => 'PATCH','route' => ['semester.registration.update-excess', base64_encode($registration->id)], 'class' => 'nobottommargin']); ?>

			<div class="card-body">
              <div class="box-body">
              			
              		<div class="row">
              			
              			<div class="col-md-4 form-group">
								<label for="excess_credit">Excess Credit Approved : </label>
								<?php echo Form::text('excess_credit', $registration->excess_credit, array( 'placeholder' => '','class' => 'form-control', 'id' => 'excess_credit', 'required' => 'required')); ?>


							</div>
                        <?php echo e(Form::hidden("registration_id", $registration->id)); ?>



					</div>	
					
					
								
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/results/modify_excess.blade.php ENDPATH**/ ?>