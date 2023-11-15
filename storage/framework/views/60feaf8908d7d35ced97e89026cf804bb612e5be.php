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
                               <div class="h2 text-center">Course Registration ends in:  <span class="h2 text-danger font-weight-bold" id="demo"></span> </div>
                            <div class="container">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Current Level Course </h6>
                                    <div class="dropdown no-arrow">
                                        
                                        <button onclick="setVisibility()" class="btn btn-sm btn-success shadow-sm" id="myButton"> Show Lower Level Courses </button>
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
                                        <form name=form1 id="form-1" method=post action="/course-reg">
                                            <?php echo csrf_field(); ?>
                                            <?php
                                                $tatolCredits = 0;
                                            ?>
                                            <input id="" type="hidden" name="student_id"
                                                value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                            <input id="" type="hidden" name="session" value="<?php echo e($session->id); ?>">
                                            
                                            

                                            <?php $__currentLoopData = $courseFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($course->is_registered == 0): ?>
                                                    <?php
                                                        $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;

                                                    ?>
                                                    <tr>
                                                        <td> <?php echo e($key + 1); ?>. <input type="checkbox"
                                                                id="<?php echo e($course->credit_unit); ?>" name="courses1[]"
                                                                <?php echo e($course->course_category == 1 ? 'checked ' : ''); ?>

                                                                value="<?php echo e($course->course_id); ?>"
                                                                class="<?php echo e($course->credit_unit); ?>"
                                                                onclick="<?php echo e($course->course_category == 1 ? '' : 'totalIt()'); ?>">
                                                            <input type="hidden" name="course_units1[]"
                                                                value="<?php echo e($course->credit_unit); ?>">
                                                            <input type="hidden" name="course_semester[]"
                                                                value="<?php echo e($course->semester); ?>">
                                                        </td>
                                                        <td><?php echo e($course->course_code); ?></td>
                                                        <td><?php echo e($course->course_title); ?></td>
                                                        <td><?php echo e($course->credit_unit); ?></td>
                                                        
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Credit Unit</strong></td>
                                                <td colspan="2"></td>
                                                <td id="tcu" name="total"></td>
                                            </tr>
                                    </tbody>

                                </table>
                                
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th col-span="1">Second Semester </th>
                                            <th>Course Code</th>
                                            <th>Course Title</th>
                                            <th>Credit Unit</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                            $tatolCredits = 0;
                                        ?>
                                        <input id="" type="hidden" name="student_id"
                                            value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                        <input id="" type="hidden" name="session" value="<?php echo e($session->id); ?>">
                                        

                                        <?php $__currentLoopData = $courseSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($course->is_registered == 0): ?>
                                                <?php
                                                    $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;
                                                ?>
                                                <tr>
                                                    <td> <?php echo e($key + 1); ?>. <input type="checkbox"
                                                            id="<?php echo e($course->credit_unit); ?>" name="courses2[]"
                                                            <?php echo e($course->course_category == 1 ? 'checked ' : ''); ?>

                                                            value="<?php echo e($course->course_id); ?>"
                                                            class="<?php echo e($course->credit_unit); ?>"
                                                            onclick="<?php echo e($course->course_category == 1 ? '' : 'totalIt2()'); ?>">
                                                        <input type="hidden" name="course_units2[]"
                                                            value="<?php echo e($course->credit_unit); ?>">
                                                        <input type="hidden" name="course_semester[]"
                                                            value="<?php echo e($course->semester); ?>">
                                                    </td>
                                                    <td><?php echo e($course->course_code); ?></td>
                                                    <td><?php echo e($course->course_title); ?></td>
                                                    <td><?php echo e($course->credit_unit); ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                        <tr>
                                            <td><strong>Total Credit Unit</strong> </td>
                                            <td colspan="2"></td>
                                            <td id="tcu2" name="total"></td>

                                        </tr>
                                    </tbody>

                                    <h4 id="limit" class=" font-weight-bold text-danger fw-bold"></h4>

                                </table>
                                
                                <div id="sub3" style="display: none">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-success">Lower First Level Course </h6>
                                    </div>

                                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>First Semester </th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Credit Unit</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <input id="" type="hidden" name="student_id"
                                                value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                            <input id="" type="hidden" name="session"
                                                value="<?php echo e($session->id); ?>">
                                            

                                            <?php $__currentLoopData = $lowercourseFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($key + 1); ?>. <input type="checkbox"
                                                            id="<?php echo e($course->credit_unit); ?>" name="courses1[]"
                                                            <?php echo e($course->course_category == 1 ? ' ' : ''); ?>

                                                            value="<?php echo e($course->course_id); ?>"
                                                            class="<?php echo e($course->credit_unit); ?>"
                                                            onclick="<?php echo e($course->course_category == 1 ? '' : 'totalIt2()'); ?>">
                                                        <input type="hidden" name="course_units2[]"
                                                            value="<?php echo e($course->credit_unit); ?>">
                                                        <input type="hidden" name="course_semester[]"
                                                            value="<?php echo e($course->semester); ?>">
                                                    </td>
                                                    <td><?php echo e($course->course_code); ?></td>
                                                    <td><?php echo e($course->course_title); ?></td>
                                                    <td><?php echo e($course->credit_unit); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            
                                            <h4 id="limit2" class="font-weight-bold text-danger fw-bold"></h4>
                                        </tbody>

                                    </table>
                                    
                                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Second Semester </th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Credit Unit</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <input id="" type="hidden" name="student_id"
                                                value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                            <input id="" type="hidden" name="session"
                                                value="<?php echo e($session->id); ?>">
                                            

                                            <?php $__currentLoopData = $lowercourseSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($key + 1); ?>. <input type="checkbox"
                                                            id="<?php echo e($course->credit_unit); ?>" name="courses2[]"
                                                            <?php echo e($course->course_category == 1 ? ' ' : ''); ?>

                                                            value="<?php echo e($course->course_id); ?>"
                                                            class="<?php echo e($course->credit_unit); ?>"
                                                            onclick="<?php echo e($course->course_category == 1 ? '' : 'totalIt2()'); ?>">
                                                        <input type="hidden" name="course_units2[]"
                                                            value="<?php echo e($course->credit_unit); ?>">
                                                        <input type="hidden" name="course_semester[]"
                                                            value="<?php echo e($course->semester); ?>">
                                                    </td>
                                                    <td><?php echo e($course->course_code); ?></td>
                                                    <td><?php echo e($course->course_title); ?></td>
                                                    <td><?php echo e($course->credit_unit); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            
                                        </tbody>

                                    </table>
                                </div>


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
                                                    
                                                    <td> <input class="itemcourse" type="checkbox" id="course"
                                                            name="courses[]"
                                                            <?php echo e($course->course_category == 1 ? 'disabled ' : ''); ?>

                                                            value="<?php echo e($course->course_id); ?>"
                                                            onclick="<?php echo e($course->course_category == 1 ? 'return false' : 'totalIt()'); ?>"><?php echo e($key + 1); ?>

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
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/course_registration.blade.php ENDPATH**/ ?>