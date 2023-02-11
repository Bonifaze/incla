



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
							 <th>Unit</th>
							 
                              <th>Lecturer</th>
                              <th>Contact</th>
                              <th>Students Registered</th>
                              <th>Status</th>
                              <th>Action</th>





						  </thead>


						  <tbody>
                          <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <tr>
                             <td> <?php echo e($loop->iteration); ?></td>
                             <td> <?php echo e($program_course->course->course_code); ?> <?php echo e($program_course->course_id); ?></td>
                             <td> <?php echo e($program_course->course->course_title); ?></td>
                             <td> <?php echo e($program_course->credit_unit); ?></td>
                             
                             
                                  <td>  <?php echo e($program_course->staff_name  ?? ' '); ?>

                                  

                                 <?php if($program_course->approval < 1 ): ?>
                                 <a class="btn btn-outline-warning" href="<?php echo e(route('program_course.change-lecturer',base64_encode($program_course->id))); ?>"> Change </a>
                                 <?php endif; ?>
                             </td>
                             <td> <?php echo e($program_course->lecturer->phone); ?></td>
                             <td>
                                 <a class="btn btn-primary" target="_blank" href="<?php echo e(route('program_course.students',base64_encode($program_course->id))); ?>">  List </a>
                                 <a class="btn btn-info" target="_blank" href="<?php echo e(route('program_course.students_download',base64_encode($program_course->id))); ?>">  Download </a>
                                 <?php if(!$program_course->is_approved): ?>
                                 <a href="/staff-course/approve?course_id=<?php echo e($program_course->course_id); ?>&program_id=<?php echo e($program_course->program_id); ?>&by=hod" class="btn btn-outline-success" onclick="return confirm('Are you sure you want to approve this course?')">Approve</a>
                                 <?php else: ?>
                                 <a href="/staff-course/revoke?course_id=<?php echo e($program_course->course_id); ?>&program_id=<?php echo e($program_course->program_id); ?>&by=hod" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to revoke approval for this course?')">Revoke Approval</a>
                                 <?php endif; ?>
                             </td>

                             <?php if($program_course->approval == 1): ?>
                                 <td> <a target="_blank" href="<?php echo e(route('program_course.result',base64_encode($program_course->id))); ?>"> View Result </a> </td>
                                 <td>
                                     <?php echo Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'approvePCourseForm'.$program_course->id]); ?>

                                     <?php echo e(Form::hidden('program_course_id', $program_course->id)); ?>

                                     <?php echo e(Form::hidden('approval', "2")); ?>

                                     <?php echo e(Form::hidden('current', $program_course->approval)); ?>

                                     <button onclick="approvePCourse(<?php echo e($program_course->id); ?>)" type="button" class="<?php echo e($program_course->id); ?> btn btn-outline-success" > Approve </button>
                                     <?php echo Form::close(); ?>

                                 </td>

                             <?php elseif($program_course->approval == 2): ?>
                                 <td> <a target="_blank" href="<?php echo e(route('program_course.result',base64_encode($program_course->id))); ?>"> View Result </a> </td>
                                 <td>
                                     <?php echo Form::open(['method' => 'patch', 'route' => 'program_course.approval', 'id'=>'revokePCourseForm'.$program_course->id]); ?>

                                     <?php echo e(Form::hidden('program_course_id', $program_course->id)); ?>

                                     <?php echo e(Form::hidden('approval', "1")); ?>

                                     <?php echo e(Form::hidden('current', $program_course->approval)); ?>

                                     <button onclick="revokePCourse(<?php echo e($program_course->id); ?>)" type="button" class="<?php echo e($program_course->id); ?> btn btn-outline-warning" > Revoke </button>
                                     <?php echo Form::close(); ?>

                                 </td>
                             <?php else: ?>
                                 <td> <?php echo e($program_course->action); ?> </td>
                                 <td> <?php echo e($program_course->status); ?></td>
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



<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/academia/departments/program_level_courses.blade.php ENDPATH**/ ?>