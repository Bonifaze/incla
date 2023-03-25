



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
                        List Students
                    </h1>

            <div class="card ">


             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
                                <th>Passport</th>
							  <th>Name</th>
							 <th>Phone</th>
                              <th>Matric No</th>

							  <th colspan="2">Action</th>

                              
							  

						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


							<tr>
							  <td><?php echo e($key + $students->firstItem()); ?>.</td>
                              	 <td>
                             <a href="data:image/png;base64,<?php echo e($student->passport); ?>" data-toggle="lightbox" data-title="Passport">
							<img src="data:image/png;base64,<?php echo e($student->passport); ?>" class="img elevation-2" alt="Passport" width="50px">
							</a>
                             </td>
							  <td><?php echo e($student->full_name); ?></td>
							 <td><?php echo e($student->phone); ?></td>
                                <?php if($student->academic): ?>
                               <td><?php echo e($student->academic->mat_no); ?></td>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', 'App\Student')): ?>
                                <td><a class="btn btn-default" href="<?php echo e(route('student.view',$student->id)); ?>"> View</a></td>
                               <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show', 'App\Student')): ?>
                                <td><a class="btn btn-default" href="<?php echo e(route('student.show',$student->id)); ?>">  Edit</a></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transcript', 'App\Student')): ?>
                                <td><a class="btn btn-info" href="<?php echo e(route('student.transcript',base64_encode($student->id))); ?>" target="_blank"> <i class="fa fa-eye"></i> Transcript</a></td>  
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('disable', 'App\Student')): ?>
                                <?php if($student->status == 1): ?>
                                    <td>
                                        <?php echo Form::open(['method' => 'patch', 'action' => 'AdminStudentsController@disable', 'id'=>'disableUForm'.$student->id]); ?>

                                        <?php echo e(Form::hidden('id', $student->id)); ?>

                                        <?php echo e(Form::hidden('status', 2)); ?>

                                        <?php echo e(Form::hidden('action', "disabled")); ?>



                                        <button type="submit" class="btn btn-danger" ><span class="icon-line2-trash"></span> Disable</button>
                                        <?php echo Form::close(); ?>


                                    </td>

                                <?php elseif($student->status == 2): ?>
                                    <td>
                                        <?php echo Form::open(['method' => 'patch', 'action' => 'AdminStudentsController@disable', 'id'=>'enableUForm'.$student->id]); ?>

                                        <?php echo e(Form::hidden('id', $student->id)); ?>

                                        <?php echo e(Form::hidden('status', 1)); ?>

                                        <?php echo e(Form::hidden('action', "enabled")); ?>


                                        <button type="submit" class="btn btn-success" ><span class="icon-line2-trash"></span> Enable</button>
                                        <?php echo Form::close(); ?>


                                    </td>

                                <?php endif; ?>
                                <?php else: ?>
                                    <td> </td>
                                <?php endif; ?>
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


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/students/admin/list.blade.php ENDPATH**/ ?>