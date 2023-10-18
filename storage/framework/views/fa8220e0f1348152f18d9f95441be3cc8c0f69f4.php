<?php $__env->startSection('pagetitle'); ?>
    Staff Courses
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Staff Courses
                    </h1>

                    <div class="card shadow border border-success">


                      <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    
                                    <div class="table-responsive mt-5">
                                        <table class="table  table-striped table-hover tbl" id="dataTable" width="100%"
                                        cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                     <th>Course Code</th>
                                                    <th>Course Title</th>
                                                    <th>Semester</th>
                                                    <th>Students</th>
                                                    <th>Student Program</th>
                                                    <th>Upload Status</th>
                                                    <th>HoD Approval</th>
                                                    <th>Action</th>
                                                     <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($staff_course->course_code); ?></td>
                                                        <td><?php echo e($staff_course->course_title); ?></td>
                                                          <td >
                                                          <?php if($staff_course->semester==1): ?>
                                                                First
                                                          <?php else: ?>
                                                                Second
                                                          <?php endif; ?>
                                                          </td>
                                                        <th><?php echo e($staff_course->total_students); ?></th>
                                                        <th><?php echo e($staff_course->program->name ?? null); ?></th>
                                                        <td><?php echo e($staff_course->upload_status); ?></td>
                                                        <td><?php echo e($staff_course->hod_approval); ?></td>
                                                        <td><?php if($staff_course->hod_approval != 'approved'): ?> <a href="<?php echo e(route('admin.scores_upload', $staff_course->id)); ?>"
                                                                class="btn btn-primary">Upload Scores</a> <?php else: ?> <p class="text-warning text-bold ">Kindly Ask HoD TO REVOKE</p> <?php endif; ?></td>
                                                                 <?php if($staff_course->hod_approval == 'approved'): ?>
                                                <td></td>
                                            <?php else: ?>
                                                <td>
                                                    <form
                                                        action="<?php echo e(route('staff.assign.destroy', $staff_course->id)); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to drop this course?')" data-bs-toggle="modal"
                                                            data-bs-target="#myModal"> <i class="fas fa-solid fa-trash"></i>
                                                            DROP</button>

                                                    </form>
                                                </td>
                                            <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            <div class="table-responsive card-body">
               <div
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm  text-success border">
                       Result Audit
                                                    <a href="/program-courses/results/resultBarchat"
                                                        class="float-right btn btn-outline-info">VIEW BAR CHAT</a>

                    </div>

                            <h3 class="card-title">  </h3>
                        </div>
						<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
						  <thead>

							  <th>S/N</th>
						    
                            <th>Staff Name</th>
                              <th>Course </th>
							 <th>session</th>
							 <th>Semester</th>
                             <th>Level</th>
                                <th>Old Score</th>
                             <th>New Score</th>
                            
                            <th>Student MatNo.</th>
                            <th>Student Name</th>
                            <th>Date</th>
						  </thead>


						  <tbody>

						  <?php $__currentLoopData = $modify; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							<tr>
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                              
                                <td><?php echo e($audit->course->course_code); ?> (<?php echo e($audit->course->course_title); ?>)</td>

							 <td><?php echo e($audit->sessions->name); ?></td>

                              <?php if($audit->semester==1): ?>
                                        <td>First</td>
                                        <?php else: ?>
                                        <td>Second</td>
                                        <?php endif; ?>
                             <td><?php echo e($audit->level); ?></td>
                              <td class="text-warning h2"><?php echo e($audit->old_total ?? null); ?></td>
                             <td class="text-success h1"><?php echo e($audit->total ?? null); ?></td>
                             <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                             <td><?php echo e($audit->full_name); ?></td>
                                   <td><?php echo e($audit->updated_at); ?></td>



							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						  </tbody>


						</table>



            </div>
                </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/course_upload.blade.php ENDPATH**/ ?>