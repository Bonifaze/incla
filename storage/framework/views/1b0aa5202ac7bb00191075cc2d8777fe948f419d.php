<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo e(asset('v3/plugins/chart.js/Chart.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('v3/dist/css/adminlte.min.css')); ?>" />

    <style>
        @keyframes pulse {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(1.05);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>

    <?php echo $__env->yieldContent('pagescript'); ?>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000375',
                        light: '#c2c4c4',
                        gray: '#91a1a4'
                    }
                }
            }
        }
    </script>
</head>





<body class="w-full p-10 min-h-screen bg-slate-900">

    <div class="flex items-center justify-between mb-5">
        <h1 class="text-white text-3xl font-semibold uppercase pulse-animation">Spotlight Audit Record of Modified Result</h1>
        <a href="/program-courses/results/resultBarchat" class="bg-emerald-500 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg">
            View Chart
        </a>
    </div>

    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="text-white">
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
                <td class="text-white"><?php echo e($loop->iteration); ?></td>
                <td class="text-white"><?php echo e($audit->staff->full_name ?? null); ?></td>
                
                <td class="text-white"><?php echo e($audit->course->course_code); ?> (<?php echo e($audit->course->course_title); ?>)</td>

                <td class="text-white"><?php echo e($audit->sessions->name); ?></td>

                <?php if($audit->semester==1): ?>
                <td class="text-white">First</td>
                <?php else: ?>
                <td class="text-white">Second</td>
                <?php endif; ?>
                <td class="text-white"><?php echo e($audit->level); ?></td>
                <td class="text-warning h2"><?php echo e($audit->old_total ?? null); ?></td>
                <td class="text-success h1"><?php echo e($audit->total ?? null); ?></td>
                <td class="text-white"><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                <td class="text-white"><?php echo e($audit->full_name); ?></td>
                <td class="text-white"><?php echo e($audit->updated_at); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    </div>
    <div class="flex justify-center mb-4">
        <?php echo e($modify->links()); ?>

    </div>
</body>


<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
<script type="text/javascript">
    $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/auditviewall.blade.php ENDPATH**/ ?>