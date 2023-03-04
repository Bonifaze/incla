<?php $__env->startSection('pagetitle'); ?> <?php echo e($level); ?> Level Courses <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

             <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card card-primary">
                 <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       <?php echo e($level); ?> Level Courses
                    </h1>

             <div class="table-responsive card-body">

						<table class="table table-striped">
						  <thead>

							  <th>S/N</th>
                              <th>Code</th>
							 <th>Title</th>
							 <th>Credit</th>
							 <th>Semester</th>
                              <th>Action</th>
                              
                              
                              <th>Status</th>




						  </thead>


						  <tbody>
                          <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <tr>
                             <td> <?php echo e($loop->iteration); ?></td>
                             <td> <?php echo e($program_course->course->course_code); ?></td>
                             <td> <?php echo e($program_course->course->course_title); ?></td>
                             <td> <?php echo e($program_course->credit_unit); ?></td>
                              <?php if( $program_course->semester == 1): ?>
                             <td> First </td>
                             <?php else: ?>
                             <td>Second </td>
                             <?php endif; ?>

                             
                             
                              <td><a class="btn btn-info" href="/admin/download/<?php echo e($program_course->staff_course_id); ?>">  Download </a> </td>
                             
                             
                             <td> <?php echo e($program_course->staff_course_status); ?> </td>
                             
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
<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

 <script>
     function approvePCourse(id)
     {
         bootbox.dialog({
             message: "<h4>Confirm you want to approve this course?</h4>",
             buttons: {
                 confirm: {
                     label: 'Yes',
                     className: 'btn-success',
                     callback: function(){
                         document.getElementById("approvePCourseForm"+id).submit();
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
    function revokePCourse(id)
    {
        bootbox.dialog({
            message: "<h4>Confirm you want to revoke this course approval?</h4>",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success',
                    callback: function(){
                        document.getElementById("revokePCourseForm"+id).submit();
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
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/exam-officers/program_level_courses.blade.php ENDPATH**/ ?>