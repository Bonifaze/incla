<?php $__env->startSection('pagetitle'); ?> List Students  <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Ekko Lightbox -->
  <link rel="stylesheet" href="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.css')); ?>">
<?php $__env->stopSection(); ?>


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
                        List Students Entery Session
                    </h1>
            <div class="card ">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
							  <th>Surname</th>
							 <th>Other Name</th>
                              <th>Matric No</th>
                              <th>Department</th>
                              <th>Degree & Program Name</th>
                              <th>Blood Group</th>
                              <th>year of Entry</th>


						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


							<tr>
							  <td><?php echo e($key + $students->firstItem()); ?>.</td>
							  <td><?php echo e($student->surname); ?></td>
							 <td><?php echo e($student->first_name); ?>  <?php echo e($student->middle_name); ?></td>
                                <?php if($student->academic): ?>
                               <td><?php echo e($student->academic->mat_no); ?></td>
                                <?php endif; ?>
        <td><?php echo e($student->academic->program->department->name); ?></td>
         <td> ( <?php echo e($student->academic->program->degree); ?> ) <?php echo e($student->academic->program->name); ?></td>
         <td><?php echo e($student->medical->blood_group); ?></td>
         <td><?php echo e($student->academic->session->name); ?></td>

							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						  </tbody>



						</table>
						 <?php echo $students->render(); ?>



            </div>

          </div>
              <!-- /.card-body -->
            </div>

          </div>
          <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>

<script src="<?php echo asset('js/bootbox.min.js')?>"></script>

<!-- Ekko Lightbox -->
<script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>

 <script>



        	function deleteOption(id)
        	{
             bootbox.dialog({
                message: "<h4>You are about to delete a Patient</h4> <h5>Note: This action is permanent and irreversible? </h5>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function(){
                        	document.getElementById("deleteForm"+id).submit();
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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/admin/plain_list_session.blade.php ENDPATH**/ ?>