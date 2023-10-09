<?php $__env->startSection('pagetitle'); ?>
    <?php echo e($program->name); ?> Management
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        <?php echo e($program->name); ?>

                    </h1>

                    <div class="card">
                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>
                                    <th>Level</th>
                                    <th>100L</th>
                                    <th>200L</th>
                                    <th>300L</th>
                                    <th>400L</th>
                                    <th>500L</th>
                                    <th>PGD</th>
                                    <th>MSc</th>
                                    <th>PhD</th>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td> Students</td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 100])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(100)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 200])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(200)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 300])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(300)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 400])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(400)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 500])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(500)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 700])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(700)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 800])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(800)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 900])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(900)); ?>)</a></td>
                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 100])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 200])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(200)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 300])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(300)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 400])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(400)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 500])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(500)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 700])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(700)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 800])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(800)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 900])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(900)); ?>)</a></td>
                                    </tr>


                                    <tr>
                                        <td> Results <br> Download</td>
                                        <td>
                                                <a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 100, 1])); ?>">
                                                 First Semester </a>
                                                 <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 100, 2])); ?>">
                                                 Second Semester </a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 200, 1])); ?>">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 200, 2])); ?>">
                                                 Second Semester </a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 300, 1])); ?>">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 300, 2])); ?>">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 400, 1])); ?>">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 400, 2])); ?>">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 500, 1])); ?>">
                                                 First Semester</a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 500, 2])); ?>">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 700, 1])); ?>">
                                                First Semester </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 700, 2])); ?>">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 800, 1])); ?>">
                                                 First Semester</a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 800, 2])); ?>">
                                                 Second Semester </a>
                                                 </td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 900, 1])); ?>">
                                               First Semester  </a>
                                                   <br><br>
                                                <a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 900, 2])); ?>">
                                                 Second Semester</a>
                                                 </td>
                                    </tr>


                                    <tr>

                                        <td> Approval</td>
                                <td>
                               <?php if(!$program->is_DEAN100approved): ?>
                            <a href="/staff-course/approve?by=dean&level=100&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=100&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                  <td>
                               <?php if(!$program->is_DEAN200approved): ?>
                            <a href="/staff-course/approve?by=dean&level=200&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=200&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      <td>
                               <?php if(!$program->is_DEAN300approved): ?>
                            <a href="/staff-course/approve?by=dean&level=300&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=300&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      <td>
                               <?php if(!$program->is_DEAN400approved): ?>
                            <a href="/staff-course/approve?by=dean&level=400&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=400&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      <td>
                               <?php if(!$program->is_DEAN500approved): ?>
                            <a href="/staff-course/approve?by=dean&level=500&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=500&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      

                                      <td>
                               <?php if(!$program->is_DEAN700approved): ?>
                            <a href="/staff-course/approve?by=dean&level=700&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=700&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      <td>
                               <?php if(!$program->is_DEAN800approved): ?>
                            <a href="/staff-course/approve?by=dean&level=800&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=800&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>

                                      <td>
                               <?php if(!$program->is_DEAN900approved): ?>
                            <a href="/staff-course/approve?by=dean&level=900&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-success" onclick="return confirm('are you sure you want to proceed with this action?')">Approve</a>
                                 <?php else: ?>
                          <a href="/staff-course/revoke?by=dean&level=900&program_id=<?php echo e($program->id); ?>" class="btn btn-outline-danger" onclick="return confirm('are you sure you want to proceed with this action?')">Revoke</a>
                                 <?php endif; ?>
                                 </td>
                                        
                                        


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        <?php echo e($program->name); ?> Result Audit
                    </h1>
            <div class="table-responsive card-body">

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
                               <td><?php echo e($audit->old_total ?? null); ?></td>
                             <td><?php echo e($audit->total ?? null); ?></td>
                             <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                             <td><?php echo e($audit->full_name); ?></td>
                                   <td><?php echo e($audit->updated_at); ?></td>



							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						  </tbody>


						</table>



            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/academia/colleges/manage_program.blade.php ENDPATH**/ ?>