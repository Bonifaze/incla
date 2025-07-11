<?php $__env->startSection('pagetitle'); ?>
    Staff Home
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
               Courses Result Not Uploaded
                    </h1>

                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="body">
                                    
                                    <div class="table-responsive">
                                                         <table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Course Title</th>
                                                    <th>Course Code</th>
                                                    <th>Semster</th>
                                                    <th>Level</th>

                                                     <th>HoD Approval</th>
                                                      <th>Dean Approval</th>
                                                       <th>SBC Approval</th>
                                                    <th>VC Approval</th>
                                                    <th>Lecturer</th>
                                                    <th>Phone</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $staff_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($staff_course->course_title); ?></td>
                                                        <td><?php echo e($staff_course->course_code); ?></td>
                                                            <td>
                                                              <?php if( $staff_course->semester_id == 1): ?>
                              First
                             <?php else: ?>
                             Second
                             <?php endif; ?>
                              </td>
                                                            </td>
                                                                <td><?php echo e($staff_course->level); ?></td>

                                                         <td><?php echo e($staff_course->hod_approval); ?></td>
                                                          <td><?php echo e($staff_course->dean_approval); ?></td>
                                                           <td><?php echo e($staff_course->sbc_approval); ?></td>
                                                        <td><?php echo e($staff_course->vc_senate_approval); ?></td>
                                                        <td><?php echo e($staff_course->staffName); ?></td>
                                                           <td><?php echo e($staff_course->staff_phone); ?></td>
                                                        <td><a href="<?php echo e(route('admin.view_scores', $staff_course->course_id)); ?>"
                                                                class="btn btn-primary">View Scores</a></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    <!-- jQuery UI -->
    <script src="<?php echo e(asset('v3/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Ekko Lightbox -->
    <script src="<?php echo e(asset('v3/plugins/ekko-lightbox/ekko-lightbox.min.js')); ?>"></script>
    <-- DATABABE SCRIPT -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/r-2.2.9/datatables.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/results/notuploaded_scores.blade.php ENDPATH**/ ?>