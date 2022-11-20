<?php $__env->startSection('pagetitle'); ?> Student Fees  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?> 
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('bursary-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('bursary'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('remita-fees'); ?> active <?php $__env->stopSection(); ?>
 
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
                <h3 class="card-title">Student Fees</h3>
				</div>
            
             <div class="table-responsive card-body">
             
             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
						<table class="table table-striped">
						  <thead>
							
							  <th>#</th>
							  <th>Name</th>
							  <th>Amount</th>
							   <th>Provider Code</th>
							   <th>Provider</th>
							   <th>Total</th>
							   <th>Action</th>
							   
							   
							  
							 
							  
							   
							
						  </thead>
						  
						  
						  <tbody>
						    <?php $__currentLoopData = $feeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<tr>
							  <td><?php echo e($key+1); ?></td>
							  <td><?php echo e($fee->name); ?></td>
                              <td> &#8358;<?php echo e(number_format($fee->amount)); ?></td>
							   <td><?php echo e($fee->provider_code); ?></td>
							   <td><?php echo e($fee->provider); ?></td>
							   <td> &#8358;<?php echo e(number_format($fee->paidRemitas->sum('amount'))); ?></td>
                               <td> <a class="btn btn-info" target="_blank" href="<?php echo e(route("remita.fee-type",$fee->id)); ?>" > Show </a></td>

							</tr>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	

						  </tbody>
						  
						  
						  
						</table>
						
						
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

<?php $__env->startSection('pagescript'); ?>

<script src="<?php echo e(asset('js/bootbox.min.js')); ?>"></script>

 <script>
 
        

        	function confirm(id)
        	{
             bootbox.dialog({
                message: "<h4>You are about to confirm a payment</h4> <h5>Note: Are you sure? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("confirmForm"+id).submit();
                        	}
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                        }
                },
                callback: function (result) {}
                
            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }



	</script>

<!-- jQuery UI -->
<script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>

 <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/bursary/fee_types.blade.php ENDPATH**/ ?>