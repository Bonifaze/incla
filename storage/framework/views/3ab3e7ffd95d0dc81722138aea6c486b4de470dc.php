<?php $__env->startSection('pagetitle'); ?> Remita Payment  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('bursary-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('bursary'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('remita-search'); ?> active <?php $__env->stopSection(); ?>

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
                       Student <?php echo e($remita->rrr); ?> Remita Details
                    </h1>

            <div class="card card-primary">


             <div class="table-responsive card-body">

             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<table class="table table-striped">
						  <tr>
                            <th scope="col"> Passport </th>
							  <th>Student Name</th>
							  <th>Matric Number</th>
                              <th>Service Type</th>
							   <th>Amount</th>
							   <th>RRR</th>
							   <th>Generated On</th>
                               <th>Staus</th>
						  </tr>
                            <tr>
                                <td> <img class="rounded-circle p-3 mx-auto d-block"
                                                    src="data:image/png;base64,<?php echo e($student->passport); ?>"
                                                    alt="Student Passport" style="height: 200px; width:200px;" /></td>
                                <td><?php echo e($student->fullname); ?></td>
                                <td><?php echo e($academic->mat_no); ?></td>
                                <td><?php echo e($feeType->name); ?></td>
                                <td>N<?php echo e($remita->amount); ?></td>
                                <td><?php echo e($remita->rrr); ?></td>
                                <td><?php echo e($remita->created_at->format('d-M-Y')); ?></td>

                                 <td><?php echo e($remita->status); ?></td>
                            <?php if($remita->status_code == 25): ?>
                            <td> <form method="POST" action="/bursary/remita/verifypayment">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" value="<?php echo e($remita->rrr); ?>"
                                                                placeholder="<?php echo e($remita->rrr); ?>" name="rrr">
                                                            <button class="btn btn-primary border mt-2">Verify
                                                                Payment</button>
                                                        </form></td>
                            <?php endif; ?>
                            </tr>
                            <?php if($remita->status_code == 01): ?>
                            <tr>
                                <th>Payment Date</th>
                                <th>Bank</th>
                                <th>Bank Branch</th>
                                <th>Updated On</th>
                                <th>Channel</th>
                                <th>Ip Address</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td><?php echo e($remita->transaction_date); ?></td>
                                <td><?php echo e($remita->bankName($remita->bank_code)); ?></td>
                                <td><?php echo e($remita->branch_code); ?></td>
                                <td><?php echo e($remita->updated_at->format('d-M-Y')); ?></td>
                                <td><?php echo e($remita->channel); ?></td>
                                <td><?php echo e($remita->request_ip); ?></td>
                                <td> <a class="btn btn-info" target="_blank" > Print Receipt </a></td>
                                
                            </tr>
                            <?php endif; ?>

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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/bursary/remita_show.blade.php ENDPATH**/ ?>