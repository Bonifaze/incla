<?php $__env->startSection('pagetitle'); ?> List of Students  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('bursary-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('bursary'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('bursary-search'); ?> active <?php $__env->stopSection(); ?>

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
                        List of STUDENTS
                    </h1>
            <div class="card ">


             <div class="table-responsive card-body">

             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Name</th>
							  <th>Phone</th>
                              <th>Matric</th>
                              <th>Contact Name</th>
                              <th>Contact Phone</th>
							   <th>Debt</th>

						  </thead>


						  <tbody>
						    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
							  <td><?php echo e($key + 1); ?></td>
							  <td><?php echo e($student->fullName); ?></td>
							   <td><?php echo e($student->phone); ?></td>
							   <td><?php echo e($student->academic->mat_no); ?></td>
							   <td><?php echo e($student->contact->name); ?></td>
							   <td><?php echo e($student->contact->phones); ?></td>
							   <?php if(isset($student->debt)): ?>
                                <td> &#8358;<?php echo e(number_format($student->debt->debt)); ?></td>
                                <?php else: ?>
                                <td>  </td>
                                <?php endif; ?>


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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/bursary/list_students.blade.php ENDPATH**/ ?>