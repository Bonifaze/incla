<table border="1">
    <tr>
    <td>SN</td>
        <td>Data Id</td>
    <td>Course</td>
    <td>Lecturer</td>
    <td>Lecturer</td>
    <td>Program</td>
    <td>Status</td>
</tr>
                <?php $__currentLoopData = $program_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr class="table-success">
        <td><?php echo e($key); ?></td>
        <td><?php echo e($program_course->course->code); ?></td>
        <td><?php echo e($program_course->id); ?></td>
        <td><?php echo e($program_course->lecturer->full_name); ?> </td>
        <td><?php echo e($program_course->lecturer->phone); ?> </td>
        <td> <?php echo e($program_course->program->name); ?></td>
        <td <?php echo $program_course->statusColor(); ?>><?php echo e($program_course->status); ?></td>
    </tr>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/utilities/results.blade.php ENDPATH**/ ?>