<?php $__env->startSection('pagetitle'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title><?php echo e($student->full_name); ?> Result</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .container {
        width: 750px;
        margin: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .school-logo {
        width: 80px;
        height: 80px;
    }
    .student-info, .result-table, .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .student-info td, .result-table td, .result-table th, .summary-table td {
        padding: 10px;
        border: 1px solid #000;
    }
    .result-table th, .summary-table th {
        background-color: #007BFF;
        color: white;
    }
    .summary-table td {
        font-weight: bold;
    }
    .signature {
        margin-top: 30px;
        text-align: right;
    }
</style>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        position: relative;
    }
    .content-wrapper {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-45deg);
        font-size: 60px;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.1);
        text-align: center;
        z-index: -1;
        pointer-events: none;
        white-space: nowrap;
    }
    .watermark img {
        width: 150px;
        opacity: 0.01;
        display: block;
        margin: 0 auto;
    }
    .watermark p {
        margin-top: -20px;
        font-size: 30px;
        color: rgba(211, 205, 205, 0.1);
    }
    table {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: white;
        position: relative;
    }
    td, th {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #D3D3D3;
    }
    .logo {
        width: 80px;
        max-width: 80px;
    }
    .student-passport {
        width: 80px;
        height: 80px;
    }
    h1 {
        text-align: center;
        font-size: 24px;
    }
    h3 {
        text-align: center;
        font-weight: bold;
        color: #4CAF50;
        margin-top: 20px;
    }
    @media print {
        body {
            margin: 0;
            padding: 0;
            background-color: white;
        }
        table, th, td {
            page-break-inside: avoid;
            border: 1px solid #000;
        }
        .logo {
            width: 60px;
            max-width: 60px;
        }
        .student-passport {
            width: 80px;
            height: 80px;
        }
        td, th {
            font-size: 12px;
        }
        .content-wrapper {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        h3 {
            text-align: center;
            font-weight: bold;
        }
    }
    @media (max-width: 768px) {
        td, th {
            font-size: 14px;
        }
        .logo {
            width: 50px;
        }
        .student-passport {
            width: 60px;
            height: 60px;
        }
    }
    .chart-container {
        width: 100%;
        height: 300px;
        margin-top: 30px;
    }
</style>

<div class="container">
    <div class="header">
        <table width="100%" height="80" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%" align="left">
                    <img src="<?php echo e(asset('img/letter_logo.png')); ?>" alt="School Logo" class="logo" />
                </td>
                <td width="60%" align="center">
                    <h1><strong>Institute of Consecrated Life in Africa</strong></h1>
                </td>
                <td width="20%" align="right">
                    <img src="data:image/jpeg;base64,<?php echo e($student->passport); ?>" alt="<?php echo e($student->full_name); ?> Image" class="student-passport" />
                </td>
            </tr>
        </table>
    </div>

    <table class="student-info">
        <tr>
            <td><strong>Name of Student:</strong> <?php echo e($student->full_name); ?></td>
            <td><strong>Matric No.:</strong> <?php echo e($academic->mat_no); ?></td>
        </tr>
        <tr>
            <td><strong>Gender:</strong> <?php echo e($student->gender); ?></td>
            <td><strong>Programme:</strong> <?php echo e($academic->program->name); ?></td>
        </tr>
        <tr>
            <td colspan="2"><strong>Department:</strong> <?php echo e($academic->program->department->name); ?></td>
        </tr>
    </table>

    <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h3>Academic Session: <?php echo e($session->name); ?></h3>

    <table class="result-table">
        <tr>
            <th>S/N</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credit Unit</th>
            <th>Score</th>
            <th>Grade</th>
            <th>Pass / Fail</th>
        </tr>
        <?php
            $tc1 = 0;
            $tgp1 = 0;
        ?>
        <?php $__currentLoopData = $session->registered_courses1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $tc1 += $result->course_unit;
            $tgp1 += $result->grade_point * $result->course_unit;
        ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($result->course_code); ?></td>
            <td><?php echo e($result->course_title); ?></td>
            <td align="center"><?php echo e($result->course_unit); ?></td>
            <td align="center"><?php echo e($result->total); ?></td>
            <td align="center"><?php echo e($result->grade); ?></td>
            <td align="center"><?php echo e($result->grade_status); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php
        $tgp_cgpa = 0;
        $tcu_cgpa = 0;
        foreach ($registered_courses->where('session','<=', $session->id) as $course) {
            if (($course->session == $session->id && $course->semester != 2) || $course->session < $session->id) {
                $tgp_cgpa += $course->grade_point * $course->course_unit;
                $tcu_cgpa += $course->course_unit;
            }
        }
    ?>

    <table class="summary-table">
        <tr>
            <th>Total Credit Load</th>
            <td><?php echo e($tc1); ?></td>
            <th>Total Credit Unit Value</th>
            <td><?php echo e($tgp1); ?></td>
        </tr>
        <tr>
            <th>Grade Points Average (GPA)</th>
            <td colspan="3"><?php echo e($tc1 > 0 ? number_format($tgp1/$tc1, 2) : '0.00'); ?></td>
        </tr>
        <tr>
            <th>TC</th>
            <td><?php echo e($tc1 > 0 ? $tcu_cgpa : 0); ?></td>
            <th>TGP</th>
            <td><?php echo e($tc1 > 0 ? $tgp_cgpa : 0); ?></td>
        </tr>
        <tr>
            <th>Cumulative GPA (CGPA)</th>
            <td colspan="3"><?php echo e($tc1 > 0 ? number_format($tgp_cgpa/$tcu_cgpa, 2) : '0.00'); ?></td>
        </tr>
    </table>

    <div class="chart-container">
        <canvas id="gpaChart<?php echo e($session->id); ?>"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('gpaChart<?php echo e($session->id); ?>').getContext('2d');
        var gpaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Credit Units', 'Grade Points'],
                datasets: [{
                    label: 'GPA Analytics',
                    data: [<?php echo e($tc1); ?>, <?php echo e($tgp1); ?>],
                    backgroundColor: ['#007BFF', '#28a745'],
                    borderColor: ['#007BFF', '#28a745'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="signature">
        <p><strong>Authorized Signature</strong></p>
        <p>_________________________</p>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/students/studentResult.blade.php ENDPATH**/ ?>