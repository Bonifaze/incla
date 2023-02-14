<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<?php 
    $course_ids = [];
?>
<body>
  <div class="row justify-content-center mb-4">
    <div class="col-md-5">
        <h1 class="text-center">Veritas University</h1>
        <h4 class="text-center">Faculty</h4>
        <h4 class="text-center">Department</h4>
        <h5 class="text-center"><?php echo e($meta['session']->name); ?> Academic Session</h5>
        <h5 class="text-center"><?php echo e($meta['level']); ?> Level, Semester <?php echo e($meta['semester']); ?> Result</h5>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th colspan="<?php echo e(8 + $program_courses->count()); ?>"></th>
                </tr>
                <tr>
                    <th rowspan="2">S/N</th>
                    <th rowspan="2">MATRIC NUMBER</th>
                    <th rowspan="2">NAME</th>
                    <th rowspan="2">Gender</th>
                    <th colspan="<?php echo e($program_courses->count()); ?>">Courses, Credit, Scores, Grades, GP</th>
                    <th rowspan="2">TC</th>
                    <th rowspan="2">TGP</th>
                    <th rowspan="2">GPA</th>
                    <th rowspan="2">Remark</th>
                </tr>
                <tr>
                    <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $course_ids[] = $program_course->course_id;
                        ?>
                        <th><?php echo e($program_course->course_code); ?> <br> <?php echo e($program_course->credit_unit); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $tc = 0;
                        $tgp = 0;
                        $gpa = 0.00;
                    ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($student->matric_number); ?></td>
                        <td><?php echo e($student->full_name); ?></td>
                        <td><?php echo e($student->gender[0]); ?></td>
                        <?php for($x = 0; $x < $program_courses->count(); $x++): ?>
                        <td>
                            <?php 
                                $student_course = $student->registered_courses->where('course_id', $course_ids[$x])->first();
                                $tc += $student_course?->course_unit;
                                $tgp += $student_course?->course_unit * $student_course?->grade_point;
                            ?>
                            <?php echo e($student_course?->total); ?> <br>
                            <?php echo e($student_course?->grade); ?> <br>
                            <?php echo e($student_course ? $student_course?->course_unit * $student_course?->grade_point : ''); ?>

                        </td>
                        <?php endfor; ?>
                        <td><?php echo e($tc); ?></td>
                        <td><?php echo e($tgp); ?></td>
                        <td><?php echo e($tc > 0 && $tgp > 0 ? number_format($tgp/$tc, 2) : '0.00'); ?></td>
                        <td>Remark</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html><?php /**PATH C:\Users\abdul\OneDrive\Documents\workspace\laravel\laraproject\resources\views/academia/departments/program_level_results_export.blade.php ENDPATH**/ ?>