<?php $__env->startSection('pagetitle'); ?> Edit Program Course <?php $__env->stopSection(); ?>


<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('courses-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('courses'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('create-course'); ?> active <?php $__env->stopSection(); ?>

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
                       Edit Program course
                    </h1>
            <div class="card">

              <!-- /.card-header -->
              <!-- form start -->
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<?php echo Form::model($pcourse, ['method' => 'PATCH','route' => ['program_course.update', $pcourse->id]]); ?>


 			<div class="card-body">

              <div class="box-body">

              			<div class="row">
              			

							<div class="col-md-5 form-group">
								<label for="program_id">Program :</label>
								<select name="program_id" id="program_id" class="form-control">
									<option value="">Select Program</option>
									<?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($id); ?>" <?php echo e($pcourse->program_id == $id ? 'selected' : ''); ?>><?php echo e($name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							<span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
							</div>

							     <?php echo Form::hidden('level', 100, [
                                        'placeholder' => '',
                                        'class' => 'form-control',
                                        'id' => 'serial_no',
                                        'readonly',
                                    ]); ?>



                                

                            <div class="col-md-4 form-group">
								<label for="session_id">Session :</label>
								<?php echo e(Form::select('session_id', $sessions, null,['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

							<span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
							</div>

							<div class="col-md-3 form-group">
								<label for="semester">Semester :</label>
								<?php echo e(Form::select('semester', [
	                        		'1' => 'First Semester',
	                        		'2' => 'Second Semester',
	                        		],
	                        		$pcourse->semester,
	                       			 ['class' => 'form-control select2']
	                    			)); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
							</div>
							</div>


							<div class="row">



							</div>



							<div class="row">
              				<div class="col-md-8 form-group">
								<label for="course_id">Course Describe :</label>
								<select name="course_id" id="course_id" class="form-control">
									<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($id); ?>" <?php echo e($pcourse->course_id == $id ? 'selected' : ''); ?>><?php echo e($name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>


							<span class="text-danger"> <?php echo e($errors->first('course_id')); ?></span>
							</div>

							<div class="col-md-4 form-group">
								<label for="hours">Credit Load :</label>
								<?php echo Form::text('credit_unit', $pcourse->credit_unit, array( 'placeholder' => '','class' => 'form-control', 'id' => 'credit_unit', 'required' => 'required')); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('hours')); ?></span>
							</div>

							</div>




        
              </div>
               <!-- /.card-body -->

                <div class="card-footer">


							<?php echo e(Form::submit('Edit Program Course', array('class' => 'btn btn-primary'))); ?>



                </div>
              <!-- /.box-body -->


            <?php echo Form::close(); ?>




          </div>
          <!-- /.box -->

        </div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">
						Staff Allocation
					</h4>
					<div class="mt-4">
						<?php if(session()->has('msg')): ?>
							<div class="alert alert-danger"><?php echo e(session()->get('msg')); ?></div>
						<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Course Code</th>
										<th>Course Title</th>
										<th>Staff Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($loop->iteration); ?></td>
											<td><?php echo e($staff_course->course_code); ?></td>
											<td><?php echo e($staff_course->course_title); ?></td>
											<td><?php echo e($staff_course->staff_name); ?></td>
											<td><a href="<?php echo e(route('drop_staff_course', $staff_course->id)); ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to drop this course?')">Drop</a></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script type="text/javascript">

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


</script>

	<script>
function getHours()
{

	 course_id = document.getElementById("course_id").value;
	 $.ajax({
            type: 'post',
            url: "<?php echo e(route('course.program_course_get_course_hours')); ?>",
            data: {
                '_token': $('input[name=_token]').val(),
                'course_id': course_id


            },
            success: function(dataC,status) {
            	//console.log(dataC);

            	$('#hours').attr('value', dataC);

            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#hours').html(errorThrown);
            }

        });



}


function getLecturers(program_id)
{

	 $.ajax({
            type: 'post',
            url: "<?php echo e(route('staff.program_course_get_lecturers')); ?>",
            data: {
                '_token': $('input[name=_token]').val(),
                'program_id': program_id


            },
            success: function(dataL,status) {
            	//console.log(dataL);

            	var listitems = '';
            	$.each(dataL,function(key, value)
            			{
           		 listitems += '<option value=' + key + '>' + value + '</option>';
            			});
            	$('#lecturer_id').html(listitems);

            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#lecturers_id').html(errorThrown);
            }

        });



}



	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views//program-courses/edit.blade.php ENDPATH**/ ?>