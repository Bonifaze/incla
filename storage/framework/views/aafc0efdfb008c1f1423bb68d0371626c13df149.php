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
                <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Staff Home 
                </h1>
                <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                



                <div class="card shadow border border-success">


                </div>

                <div class="row gy-4">

                    <div class="col-lg-9">
                        <!-- Widgets Start -->

                        


                                <div class="container">
                                    <div class="page-inner">
                                        <!-- Card -->
                                        
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
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
                                                                    <h4 class="card-title">1,294</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
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
                                                                    <h4 class="card-title">1303</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
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
                                                                    <h4 class="card-title">$ 1,345</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
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
                                                                    <h4 class="card-title">576</h4>
                                                                </div>
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

<div class="col-lg-3">
    <!-- Calendar Start -->
    <div class="card">
        <div class="card-body">
            <div class="calendar">
                <div class="calendar__header">
                    <button type="button" class="calendar__arrow left"><i class="ph ph-caret-left"></i></button>
                    <p class="display h6 mb-0">""</p>
                    <button type="button" class="calendar__arrow right"><i class="ph ph-caret-right"></i></button>
                </div>

                <div class="calendar__week week">
                    <div class="calendar__week-text">Su</div>
                    <div class="calendar__week-text">Mo</div>
                    <div class="calendar__week-text">Tu</div>
                    <div class="calendar__week-text">We</div>
                    <div class="calendar__week-text">Th</div>
                    <div class="calendar__week-text">Fr</div>
                    <div class="calendar__week-text">Sa</div>
                </div>
                <div class="days"></div>
            </div>
        </div>
    </div>
    <!-- Calendar End -->



</div>

</div>

</div>
</section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
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

<script>
    function updateCalendar() {
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const date = new Date();

        const currentMonth = date.getMonth(); // Current month (0-11)
        const currentYear = date.getFullYear(); // Current year (e.g., 2025)
        const currentDay = date.getDate(); // Current day of the month (1-31)

        // Display the current month and year in the calendar header
        document.querySelector('.calendar__header .display').innerHTML = `${monthNames[currentMonth]} ${currentYear}`;

        // Get the first day of the month and the total number of days in the month
        const firstDay = new Date(currentYear, currentMonth, 1).getDay(); // Day of the week for the 1st of the month (0-6)
        const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate(); // Total days in the month

        // Generate the days of the month in the calendar
        const daysContainer = document.querySelector('.days');
        daysContainer.innerHTML = ''; // Clear any previous days

        // Create empty cells for the days before the first day of the month
        for (let i = 0; i < firstDay; i++) {
            daysContainer.innerHTML += `<div class="calendar__day empty"></div>`;
        }

        // Add the actual days of the month
        for (let i = 1; i <= totalDays; i++) {
            // Check if the day is the current day and add the 'today' class
            const isToday = i === currentDay ? 'today' : '';

            // Add the day to the calendar
            daysContainer.innerHTML += `<div class="calendar__day ${isToday}">${i}</div>`;
        }
    }

    // Call the updateCalendar function when the page loads
    window.onload = updateCalendar;

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/staff/home.blade.php ENDPATH**/ ?>