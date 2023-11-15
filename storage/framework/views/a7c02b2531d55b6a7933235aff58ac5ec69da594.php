<head>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?php echo e(asset('v3/plugins/chart.js/Chart.min.js')); ?>"></script>


    <?php echo $__env->yieldContent('pagescript'); ?>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000100',
                        light: '#c2c4c4',
                        gray: '#91a1a4'
                    }
                }
            }
        }
    </script>
</head>
<?php $__env->startSection('content'); ?>
<body class="w-full bg-slate-900 min-h-screen p-10">
    <div class="flex items-center justify-between">
        <div class="">
            <h1 class="text-white text-3xl font-semibold uppercase pulse-animation">Course Results Correction Chart</h1>
            
        </div>
        <div class="text-white text-2xl font-semibold pulse-animation">
               <?php echo e($program->name); ?>

        </div>
    </div>

 <main class="border border-gray p-5 rounded-lg my-14">
        <canvas id="modificationChart" width="150" height="50"></canvas>
    </main>

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

  <?php $__env->startSection('pagescript'); ?>
</body>

<?php $__env->stopSection(); ?>




<script>
    var ctx = document.getElementById('modificationChart').getContext('2d');
    
     var data2 = <?php echo json_encode($programModifications, 15, 512) ?>;
    
 var data = <?php echo json_encode($programModifications->map(function($item) {
    return [
        'course_code' => $item->course->course_code, 'result' => $item->ca2_score + $item->ca3_score + $item->ca1_score + $item->exam_score, // ... other data properties you want to include in the chart
    ];
})->toArray()) ?>;



    var courses = data.map(item => item.course_code);

    var modificationCounts = data2.map(item => item.modification_count);
// Define an array of colors
    var colors = ['rgba(255,0,0)', 'rgba(0,255,0)', 'rgba(0,0,255)', 'rgba(255,255,0)', 'rgba(255,0,255)', 'rgba(0,255,255)', 'rgba(0,0,0)', 'rgba(0,0,128)', 'rgba(139,69,19)', 'rgba(188,143,143)']; // Add more colors if needed
    var backgroundColors = modificationCounts.map((count, index) => colors[index % colors.length]); // Use colors in a cyclic manner

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: courses,
            datasets: [{
                label: 'Result Course Count',
                data: modificationCounts,
                backgroundColor: backgroundColors,
               // backgroundColor: 'rgba(255,0,0)',
                borderColor: 'rgba(0,0,0)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/rbac/resultbarchatCourse.blade.php ENDPATH**/ ?>