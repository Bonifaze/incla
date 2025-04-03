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
    <div class="content-wrapper ">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border ">
                        Staff Home
                    </h1>
                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="card shadow border border-success"></div>

                    <div class="row gy-4">
                        <!-- Widgets Start -->
                        <div class="col-lg-12">
                            <div class="row">
                                <!-- Applicants Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-primary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Applicants</p>
                                                        <h4 class="card-title"><?php echo e($totalApplicants); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-warning card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Pending</p>
                                                        <h4 class="card-title"><?php echo e($totalRecommended); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Approved Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-success card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="fas fa-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Approved</p>
                                                        <h4 class="card-title"><?php echo e($totalApproved); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Students Card -->
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="card card-stats card-secondary card-round">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="far fa-check-circle"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Students</p>
                                                        <h4 class="card-title"><?php echo e($totalStudents); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Widgets End -->
                    </div>



                    <div class="row justify-content-center">
                        <!-- Pie Chart for Approved Applicants Analytics -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow border border-success p-3">
                                <h5 class="card-title text-center mb-4">Applicant Analytics (Pie Chart)</h5>
                                <canvas id="applicantPieChart" width="400" height="400"></canvas>
                            </div>
                        </div>

                        <!-- Bar Chart for student analytics -->
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card shadow border border-success p-3">
                                <h5 class="card-title text-center mb-4">Applicant Analytics (Bar Chart)</h5>
                                <canvas id="applicantBarChart" width="400" height="400"></canvas>
                            </div>
                        </div>

                    </div>

                </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    


    <script>
        // Pie Chart
        var ctxPie = document.getElementById('applicantPieChart').getContext('2d');
        var applicantPieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Certificate', 'Licentiate', 'Diploma'],
                datasets: [{
                    data: [<?php echo e($certificateCount); ?>, <?php echo e($licentiateCount); ?>, <?php echo e($diplomaCount); ?>],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56'],
                    hoverBackgroundColor: ['#ff4569', '#1e90ff', '#ffb200']
                }]
            },
            options: {
                responsive: true
            }
        });

        // Bar Chart
        var ctxBar = document.getElementById('applicantBarChart').getContext('2d');
        var applicantBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Certificate', 'Licentiate', 'Diploma'], // X-axis labels
                datasets: [{
                    data: [<?php echo e($certificateCount); ?>, <?php echo e($licentiateCount); ?>, <?php echo e($diplomaCount); ?>],
                    backgroundColor: ['#ff6384', '#36a2eb', '#ffcd56'],
                    borderColor: ['#ff4569', '#1e90ff', '#ffb200'],
                    borderWidth: 1,
                    hoverBackgroundColor: ['#ff4569', '#1e90ff', '#ffb200'],
                    label: 'Applicant Categories'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            // Legend will show x-axis labels (Certificate, Licentiate, Diploma)
                            generateLabels: function(chart) {
                                return chart.data.labels.map(function(label, index) {
                                    return {
                                        text: label, // Label text for the legend
                                        fillStyle: chart.data.datasets[0].backgroundColor[index], // Color for the label
                                        strokeStyle: chart.data.datasets[0].borderColor[index], // Border color for the label
                                        lineWidth: 1
                                    };
                                });
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("october 31, 2023 23:59:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/staff/home.blade.php ENDPATH**/ ?>