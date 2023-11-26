<?php $__env->startSection('pagetitle'); ?> Edit Program Course Lecturer <?php $__env->stopSection(); ?>


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


            <!-- form start -->

            <div class="card card-primary">

                             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                       Change <?php echo $pcourse->course->courseDescribe; ?> Lecturer
                    </h1>



              <!-- /.card-header -->
              <!-- form start -->
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            

              <form method="POST" action="/program-courses/change-lecturer" enctype="multipart/form-data" class="p-3">
                        <?php echo csrf_field(); ?>



 			<div class="card-body">

              <div class="box-body">
              <div class="col-md-6 form-group">

								<label for="lecturer_id">Select Lecturer :</label>
								<?php echo Form::select('staff_id', $lecturers, $pcourse->lecturer_id,['class' => 'form-control', 'id' => 'lecturer_id', 'name' => 'staff_id', 'required' => 'required']); ?>

	                    			<span class="text-danger"> <?php echo e($errors->first('lecturer_id')); ?></span>
							</div>

							<div class="row">
                      <div class="col-md-6 form-group">




                                            <?php echo Form::hidden('program_id', $pcourse->program_id , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'program_id',
                                                'required' => 'required',
                                                'readonly',
                                            ]); ?>



                                            <?php echo Form::hidden('level', $pcourse->level , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'level',
                                                'required' => 'required',
                                                'readonly',
                                            ]); ?>


                                            <?php echo Form::hidden('course_id', $pcourse->course_id , [
                                                'placeholder' => '080xxxxx',
                                                'class' => 'form-control',
                                                'id' => 'ephone',
                                                'name' => 'course_id',
                                                'required' => 'required',
                                                'readonly',
                                            ]); ?>

                                            </div>

							
							</div>




              </div>
              </div>
               <!-- /.card-body -->

                <div class="card-footer">
 

							<?php echo e(Form::submit('Change Lecturer', array('class' => 'btn btn-primary'))); ?>



                </div>
              <!-- /.box-body -->


            <?php echo Form::close(); ?>



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
                                        <th>Phone Number</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($loop->iteration); ?></td>
											<td><?php echo e($staff_course->course_code); ?></td>
											<td><?php echo e($staff_course->course_title); ?></td>
											<td><?php echo e($staff_course->staff_name); ?> </td>
                                            <td><?php echo e($staff_course->staff_phone); ?></td>
											<td><a href="<?php echo e(route('drop_staff_course', $staff_course->id)); ?>" class="btn btn-danger" onclick="return confirm('are you sure you want to drop this course?')">Drop</a></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>


							</table>

						</div>
					</div>
				</div>
			</div>
      <div class="card-footer"> if the course has not been allocated to a staff please click here
  <a href="<?php echo e(route('program_course.assign')); ?>"
                                        class="btn btn-primary">

                                        <p>Allocate Course to Staff </p>
                                    </a>


                </div>
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
<script type="text/javascript">

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});


</script>

	<script>

function getCourses()
{

	 program_id = document.getElementById("host_program_id").value;
	 $.ajax({
            type: 'post',
            url: "<?php echo e(route('course.program_course_get_courses')); ?>",
            data: {
                '_token': $('input[name=_token]').val(),
                'program_id': program_id


            },
            success: function(data,status) {
            	//console.log(data);

            	var listitems = '';
            	$.each(data,function(key, value)
            			{
           		 listitems += '<option value=' + key + '>' + value + '</option>';
            			});
            	$('#course_id').html(listitems);
            	getHours();
            	getLecturers(program_id)
            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
            	$('#course_id').html(errorThrown);
            }

        });



}

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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/unnice/Desktop/workspace/laravel/laraproject/resources/views//program-courses/change_lecturer.blade.php ENDPATH**/ ?>