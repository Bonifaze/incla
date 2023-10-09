<?php $__env->startSection('pagetitle'); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('cbt-open'); ?> menu-open <?php $__env->stopSection(); ?>

<?php $__env->startSection('cbt'); ?> active <?php $__env->stopSection(); ?>

<!-- Page -->
 <?php $__env->startSection('upload-questions'); ?> active <?php $__env->stopSection(); ?>

 <!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- left column -->
        <div class="col_full">
          <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Result Bar Chat  <a href="/rbac/auditviewall"
                                                        class="float-right btn btn-outline-info">VIEW RESULT AUDIT</a>
                    </h1>



<canvas id="modificationChart" width="380" height="200"></canvas>






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

<script>
    var ctx = document.getElementById('modificationChart').getContext('2d');
    
     var data2 = <?php echo json_encode($programModifications, 15, 512) ?>;
    
 var data = <?php echo json_encode($programModifications->map(function($item) {
    return [
        'program_name' => $item->program->name, 'result' => $item->ca2_score + $item->ca3_score + $item->ca1_score + $item->exam_score, // ... other data properties you want to include in the chart
    ];
})->toArray()) ?>;



    var programs = data.map(item => item.program_name);
    var modificationCounts = data2.map(item => item.modification_count);
// Define an array of colors
    var colors = ['rgba(255,0,0)', 'rgba(0,255,0)', 'rgba(0,0,255)', 'rgba(255,255,0)', 'rgba(255,0,255)', 'rgba(0,255,255)', 'rgba(0,0,0)', 'rgba(0,0,128)', 'rgba(139,69,19)', 'rgba(188,143,143)']; // Add more colors if needed
    var backgroundColors = modificationCounts.map((count, index) => colors[index % colors.length]); // Use colors in a cyclic manner

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: programs,
            datasets: [{
                label: 'Result Count changes',
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/rbac/resultbarchat.blade.php ENDPATH**/ ?>