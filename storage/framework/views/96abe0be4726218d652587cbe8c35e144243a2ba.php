<?php $__env->startSection('pagetitle'); ?>
Home
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('student-open'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('home'); ?>
active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->

<?php $__env->startSection('content'); ?>
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="dashboard-body">

                <div class="row gy-4">
                    <div class="col-lg-9">
                        <!-- Widgets Start -->
                        <div class="row gy-4">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">155+</h4>
                                        <span class="text-gray-600">Completed Courses</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-600 text-white text-2xl"><i class="ph-fill ph-book-open"></i></span>
                                            <div id="complete-course" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">39+</h4>
                                        <span class="text-gray-600">Earned Certificate</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i class="ph-fill ph-certificate"></i></span>
                                            <div id="earned-certificate" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">25+</h4>
                                        <span class="text-gray-600">Course in Progress</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-purple-600 text-white text-2xl"> <i class="ph-fill ph-graduation-cap"></i></span>
                                            <div id="course-progress" class="remove-tooltip-title rounded-tooltip-value"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mb-2">18k+</h4>
                                        <span class="text-gray-600">Community Support</span>
                                        <div class="flex-between gap-8 mt-16">
                                            <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-warning-600 text-white text-2xl"><i class="ph-fill ph-users-three"></i></span>
                                            <div id="community-support" class="remove-tooltip-title rounded-tooltip-value"></div>
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

                        <!-- Assignment Start -->
                        <div class="card mt-24">
                            <div class="card-body">
                                <div class="mb-20 flex-between flex-wrap gap-8">
                                    <h4 class="mb-0">Assignments</h4>
                                    <a href="assignment.html" class="text-13 fw-medium text-main-600 hover-text-decoration-underline">See All</a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph-fill ph-graduation-cap"></i></span>
                                        <div>
                                            <h6 class="mb-0">Do The Research</h6>
                                            <span class="text-13 text-gray-400">Due in 9 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1 mb-16">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-code"></i></span>
                                        <div>
                                            <h6 class="mb-0">PHP Dvelopment</h6>
                                            <span class="text-13 text-gray-400">Due in 2 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                                <div class="p-xl-4 py-16 px-12 flex-between gap-8 rounded-8 border border-gray-100 hover-border-gray-200 transition-1">
                                    <div class="flex-align flex-wrap gap-8">
                                        <span class="text-main-600 bg-main-50 w-44 h-44 rounded-circle flex-center text-2xl flex-shrink-0"><i class="ph ph-bezier-curve"></i></span>
                                        <div>
                                            <h6 class="mb-0">Graphic Design</h6>
                                            <span class="text-13 text-gray-400">Due in 5 days</span>
                                        </div>
                                    </div>
                                    <a href="assignment.html" class="text-gray-900 hover-text-main-600"><i class="ph ph-caret-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Assignment End -->

                        <!-- Progress Bar Start -->
                        <div class="card mt-24">
                            <div class="card-header border-bottom border-gray-100">
                                <h5 class="mb-0">My Progress</h5>
                            </div>
                            <div class="card-body">
                               <div id="radialMultipleBar"></div>

                               <div class="">
                                    <h6 class="text-lg mb-16 text-center"> <span class="text-gray-400">Total hour:</span> 6h 32 min</h6>
                                    <div class="flex-between gap-8 flex-wrap">
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-main-600"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-main-two-600"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                        <div class="flex-align flex-column">
                                            <h6 class="mb-6">60/60</h6>
                                            <span class="w-30 h-3 rounded-pill bg-gray-500"></span>
                                            <span class="text-13 mt-6 text-gray-600">Completed</span>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <!-- Progress bar end -->
                    </div>

                </div>
            </div>
        </div>
    </section>


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
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

<?php echo $__env->make('layouts.adminsials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Downloads\Onoyima (1)\work\incla\resources\views/admissions/home.blade.php ENDPATH**/ ?>