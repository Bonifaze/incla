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

                                </thead>

                                <tbody>
                                    <tr>
                                        <td> Students</td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.college.program_level_students', [$program->id, 100])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(100)); ?>)</a></td>

                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.college.program_level_courses', [$program->id, 100])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>

                                    </tr>


                                    <tr>
                                        <td> Results <br> Download</td>
                                        <td>
                                                <a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 100, 1])); ?>">
                                                 Download </a>
                                                 <br><br>

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

                                        
                                        


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/academia/colleges/manage_program.blade.php ENDPATH**/ ?>