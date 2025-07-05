<?php $__env->startSection('pagetitle'); ?> Semester Result Remark  <?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('results-opxen'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('resultxs'); ?> active <?php $__env->stopSection(); ?>
 <!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">

         <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card card-success">
            <div class="card-header">
                <h4 class="card-title">Courses added  for <?php echo e($student->fullName); ?></h4>
				</div>
           </div>

           <div class="table-responsive">

						<table class="table table-striped">
						  <thead>

							  <th>#</th>
							  <th>Course Code</th>
							  <th>Course Title</th>
                               <th>Course Type</th>
							 <th>Action</th>

						  </thead>

						  <tbody>

                          <?php $__currentLoopData = $outstandings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $out): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                  <td><?php echo e($loop->iteration); ?></td>
                                  <td><?php echo e($out->course->course_code); ?></td>
                                  <td><?php echo e($out->course->course_title); ?></td>

                                  <?php if($out->type=='co'): ?>
                                    <td>Carry Over</td>
                                  <?php else: ?>
                                       <td>Outstanding</td>
                                  <?php endif; ?>

                                 <td>
                                      <?php echo Form::open(['method' => 'Delete', 'route' => 'result.remove_semester_remark', 'id'=>'removeRCourse'.$out->id]); ?>

                                      <?php echo e(Form::hidden('id', $out->id)); ?>

                                     <?php echo e(Form::hidden('student_id', $student->id)); ?>

                                     

                                      <button onclick="removeRCForm(<?php echo e($out->id); ?>)" type="button" class="<?php echo e($out->id); ?> btn btn-danger" ><span class="icon-line2-trash"></span> Remove</button>
                                      <?php echo Form::close(); ?>

                                  </td>
                              </tr>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </tbody>



  </table>


</div>




            <!-- form start -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Remark Courses for <?php echo e($student->fullName); ?></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <?php echo Form::open(array('route' => 'result.add_semester_remark', 'method'=>'POST', 'class' => 'nobottommargin')); ?>

                <div class="card-body">

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="course_id">Course :</label>
                                <?php echo e(Form::select('course_id', $courses, null,['class' => 'form-control', 'id' => 'course_id', 'name' => 'course_id'])); ?>

                                <span class="text-danger"> <?php echo e($errors->first('course_id')); ?></span>
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="type">Type:</label>
                                <?php echo e(Form::select('type', [
                                    'out' => 'Outstanding',
                                    'co' => 'Carry Over'],
                                    'co',
                                        ['class' => 'form-control select2']
                                    )); ?>

                                <span class="text-danger"> <?php echo e($errors->first('type')); ?></span>
                            </div>

                             <div class="col-md-4 mt-3 form-group">
                                  <div style="margin-left:50px; margin-top:15px">
                    <?php echo e(Form::submit('Add Course', array('class' => 'btn btn-primary'))); ?>

                </div>
                            </div>

                        </div>
                        <?php echo e(Form::hidden('student_id', $student->id)); ?>


                    </div>
                </div>
                <!-- /.card-body -->
                
                <!-- /.box-body -->
                <?php echo Form::close(); ?>

            </div>
<!-- /.form end -->

</div>
<!--/.col (left) -->

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js')?>"></script>



<script>



function removeRCForm(id)
{
bootbox.dialog({
message: "<h4>Confirm you want to remove this course</h4>",
buttons: {
confirm: {
  label: 'Yes',
  className: 'btn-success',
  callback: function(){
      document.getElementById("removeRCourse"+id).submit();
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

</script><?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/results/semester_remark.blade.php ENDPATH**/ ?>