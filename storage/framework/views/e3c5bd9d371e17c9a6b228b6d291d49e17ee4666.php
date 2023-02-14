



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

                    <div class="card card-primary">
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
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 100])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(100)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 200])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(200)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 300])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(300)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 400])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(400)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 500])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(500)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 700])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(700)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 800])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(800)); ?>)</a></td>
                                        <td><a class="btn btn-outline-info"
                                                href="<?php echo e(route('academia.department.program_level_students', [base64_encode($program->id), 900])); ?>">
                                                List (<?php echo e($program->registeredStudentsCount(900)); ?>)</a></td>
                                    </tr>
                                    <tr>
                                        <td> Courses</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 100])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 200])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(200)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 300])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(300)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 400])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(400)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 500])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(500)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 700])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(700)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 800])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(800)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.program_level_courses', [base64_encode($program->id), 900])); ?>">
                                                Show (<?php echo e($program->levelCoursesCount(900)); ?>)</a></td>
                                    </tr>

                                    <tr>
                                        <td> Results</td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 100, 1])); ?>">
                                                Download First Semester (<?php echo e($program->levelCoursesCount(100)); ?>)</a><a class="btn btn-outline-primary"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 100, 2])); ?>">
                                                Download second Semester (<?php echo e($program->levelCoursesCount(100)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 200, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(200)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 300, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(300)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 400, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(400)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 500, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(500)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 700, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(700)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 800, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(800)); ?>)</a></td>
                                        <td><a class="btn btn-outline-dark"
                                                href="<?php echo e(route('academia.department.export_view', [$program->id, 900, 1])); ?>">
                                                Download (<?php echo e($program->levelCoursesCount(900)); ?>)</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/academia/departments/manage_program.blade.php ENDPATH**/ ?>