<?php $__env->startSection('pagetitle'); ?>
    Home
<?php $__env->stopSection(); ?>


<?php $__env->startSection('student-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('student'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <section class="content">
            <div class="container-fluid">
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Course Registration
                    </h1>

                    <div id="content-wrapper" class="d-flex flex-column">
                        <!-- Main Content -->
                        <div id="content m-4">
                            <?php if(session('approvalMsg')): ?>
                                <?php echo session('approvalMsg'); ?>

                            <?php endif; ?>
                            
                            <div class="container">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    
                                    <div class="dropdown no-arrow">
                                        
                                        
                                    </div>

                                </div>
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th col-span="1">First Semester </th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Unit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <form name="form1" id="form-1" method="post" action="/course-reg">
                                            <?php echo csrf_field(); ?>
                                            <?php
                                                $totalCredits = 0;
                                            ?>
                                            <input type="hidden" name="student_id"
                                                value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                            <input type="hidden" name="session" value="<?php echo e($session->id); ?>">

                                            <?php $__currentLoopData = $courseFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($course->is_registered == 0): ?>
                                                    <?php
                                                        $totalCredits += $course->credit_unit;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e($key + 1); ?>.
                                                            <input type="checkbox" name="courses1[]"
                                                                value="<?php echo e($course->course_id); ?>"
                                                                data-credit="<?php echo e($course->credit_unit); ?>"
                                                                class="course-checkbox" onclick="calculateTotalCredits()">
                                                            <input type="hidden" name="course_units1[]"
                                                                value="<?php echo e($course->credit_unit); ?>">
                                                            <input type="hidden" name="course_semester[]"
                                                                value="<?php echo e($course->semester); ?>">
                                                        </td>
                                                        <td><?php echo e($course->course_code); ?></td>
                                                        <td><?php echo e($course->course_title); ?></td>
                                                        <td><?php echo e($course->credit_unit); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td><strong>Total Credit Unit</strong></td>
                                                <td colspan="2"></td>
                                                <td id="tcu">0</td>
                                            </tr>

                                    </tbody>

                                    <script>
                                        function calculateTotalCredits() {
                                            let totalCredits = 0;

                                            // Select all checked checkboxes and sum their credit units
                                            document.querySelectorAll('.course-checkbox:checked').forEach((checkbox) => {
                                                totalCredits += parseInt(checkbox.getAttribute('data-credit'));
                                            });

                                            // Update the total credit unit display
                                            document.getElementById('tcu').innerText = totalCredits;
                                        }
                                    </script>


                                </table>
                                

                                


                                <button type="submit" class="btn btn-success">
                                    <?php echo e(__('Register Course')); ?>

                                </button>
                                

                                </form><br><br>
                                <h1
                                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                    Registered Courses
                                </h1>

                                <div class="dropdown no-arrow my-3">
                                    
                                    <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                            class="fas fa-print text-white-50"></i> Print </a>

                                </div>

                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Unit</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <form name=form1 method=post action="/dropcourse-reg">
                                            <?php echo csrf_field(); ?>

                                            <input id="" type="hidden" name="student_id"
                                                value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                            <input id="" type="hidden" name="session"
                                                value="<?php echo e($session->id); ?>">
                                            

                                            <?php
                                                $tatolCredits = 0;
                                            ?>

                                            <?php $__currentLoopData = $courseform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $tatolCredits += $course->course_unit;

                                                ?>
                                                <tr>
                                                    
                                                    <td>  <?php echo e($key + 1); ?>.<input class="itemcourse" type="checkbox" id="course"
                                                            name="courses[]"

                                                            value="<?php echo e($course->course_id); ?>">



                                                    </td>
                                                    <td><?php echo e($course->course_code); ?> </td>
                                                    <td><?php echo e($course->course_title); ?></td>
                                                    <td><?php echo e($course->course_unit); ?></td>
                                                    
                                                    
                                                    
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Credit Unit</strong> </td>
                                                <td colspan="2"></td>
                                                <td id="result" name="total"><?php echo e($tatolCredits); ?></td>

                                            </tr>
                                    </tbody>

                                </table>
                                <button type="submit" class="btn btn-danger">
                                    <?php echo e(__('Drop course')); ?>

                                </button>
                                
                            </div>
                            </form>

                            <!-- Begin Page Content -->
                        </div>
                    </div>





                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>




    <script language="JavaScript">
        function setVisibility() {
            let x = document.getElementById("sub3");
            if (x.style.display === "none") {
                x.style.display = "block";
                document.getElementById("myButton").innerHTML = "Hide Lower Level Courses";
            } else {
                x.style.display = "none";
                document.getElementById("myButton").innerHTML = "Show Lower Level Courses";
            }
        }
    </script>

    <script>
        function totalIt() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses1[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu").innerHTML = sum;
            if (sum > 24) {
                document.getElementById("limit").innerHTML =
                    "Total credit load should not exceed 24 unit for First Semester Courses";
                frm.cbs[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
        //Second seasemter total credit limit
        function totalIt2() {
            let sum1 = 0;
            frm1 = document.getElementById("form-1"),
                cbs1 = frm1["courses2[]"]
            for (i = 0; i < cbs1.length; i++) {
                if (cbs1[i].checked) {
                    sum1 += parseInt(cbs1[i].id);
                }
            }
            document.getElementById("tcu2").innerHTML = sum1;
            if (sum1 > 24) {
                document.getElementById("limit2").innerHTML =
                    "Total credit load should not exceed 24 unit For Second Semester Courses";
                frm.cbs1[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }


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

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/students/course_registration.blade.php ENDPATH**/ ?>