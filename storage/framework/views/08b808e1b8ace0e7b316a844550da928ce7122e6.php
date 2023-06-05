<?php $__env->startSection('pagetitle'); ?>
    <?php echo e($level); ?> Level Semester Results
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('vc-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vc'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('vc-list'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <?php
                        $session_id = $session->currentSession();
                        $semester = $session->currentSemester();
                        $semesterName = $session->semesterName($semester);
                    ?>
                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            <?php echo e($semesterName); ?> <?php echo e($level); ?> Level <?php echo e($session->currentSessionName()); ?> <br>ICT
                            Result status
                        </h1>

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive card-body">

                            <table class="table table-striped">
                                <thead>

                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Program</th>
                                    
                                    <th>Students Total</th>
                                    <th>Result Download</th>
                                    
                                    <th>HoD Approval</th>
                                    <th>Dean Approval</th>
                                    <th>SBC Approval</th>
                                    <th>VC Approval</th>

                                    <th>Student Result</th>
                                    



                                </thead>


                                <tbody>

                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $notReady = $program->vcNotReadyProgramCourses($session_id, $semester, $level);

                                            $students = $program->allregisteredStudentsCount($session_id, $semester, $level);

                                        ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($program->department->name); ?></td>
                                            <td><?php echo e($program->name); ?></td>
                                            
                                            
                                            
                                            <td> <?php echo e($program->registeredStudentsCount($level)); ?> </td>
                                            <td>
                                                <a class="btn btn-outline-dark"
                                                    href="<?php echo e(route('academia.department.export_view', [$program->id, $level, 1])); ?>">
                                                    1st Semester</a>

                                                <a class="btn btn-outline-primary"
                                                    href="<?php echo e(route('academia.department.export_view', [$program->id, $level, 2])); ?>">
                                                    2nd Semester </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-outline-dark"
                                                    href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), $level])); ?>">
                                                    Show (<?php echo e($program->levelCoursesCount($level)); ?>)</a>
                                            </td>
                                            
                                            
                                            <td>
                                                <?php if(!$program->is_DEANapproved): ?>
                                                    <a href="/staff-course/approve?by=dean&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-success"
                                                        onclick="return confirm('are you sure you want to proceed with this action?  Result will be made available for Student to View')">Approve</a>
                                                <?php else: ?>
                                                    <a href="/staff-course/revoke?by=dean&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to proceed with this action?   Result will not be made available for Student to View')">Revoke</a>
                                                <?php endif; ?>
                                            </td>
                                            
                                            <td>
                                                <?php if(!$program->is_approved): ?>
                                                    <a href="/staff-course/approve?by=sbc&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-success"
                                                        onclick="return confirm('are you sure you want to proceed with this action?  Result will be made available for Student to View')">Approve</a>
                                                <?php else: ?>
                                                    <a href="/staff-course/revoke?by=sbc&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to proceed with this action?   Result will not be made available for Student to View')">Revoke</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!$program->is_VCapproved): ?>
                                                    <a href="/staff-course/approve?by=vc&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-success"
                                                        onclick="return confirm('are you sure you want to proceed with this action?  Result will be made available for Student to View')">Approve</a>
                                                <?php else: ?>
                                                    <a href="/staff-course/revoke?by=vc&level=<?php echo e($level); ?>&program_id=<?php echo e($program->id); ?>"
                                                        class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to proceed with this action?   Result will not be made available for Student to View')">Revoke</a>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if(!$program->is_VCapproved): ?>
                                                    <P class="text-danger text-bold">Not Published</P>
                                                <?php else: ?>
                                                    <P class="text-success">Published</p>
                                                <?php endif; ?>
                                            </td>



                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>



                            </table>
                            <?php echo $programs->render(); ?>



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
        function approveResult(id, program, level) {
            bootbox.dialog({
                message: "<h4>Confirm you want to approve result for " + program + " " + level + " level ?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("approveResultForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/ict/level_results.blade.php ENDPATH**/ ?>