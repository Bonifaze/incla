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
<style type="text/css">
    #sub3 {



        display: none;
    }
</style>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
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
                            <h6 class="m-0 font-weight-bold text-success">Current Level Course </h6>
                            <div class="dropdown no-arrow">
                                <input type=button class=" btn btn-sm btn-success shadow-sm" name=type id='bt1'
                                    value='Show Lower Level Courses' onclick="setVisibility('sub3');";>
                                

                            </div>

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
                                <form name=form1 id="form-1" method=post action="/course-reg">
                                    <?php echo csrf_field(); ?>
                                    <?php
                                        $tatolCredits = 0;
                                    ?>
                                    <input id="" type="text" name="student_id" value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                    <input id="" type="text" name="session" value="<?php echo e($session->id); ?>">
                                    

                                    <?php $__currentLoopData = $courseFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($course->is_registered == 0): ?>
                                            <?php
                                                $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;

                                            ?>
                                            <tr>


                                                <td> <input type="checkbox" id="<?php echo e($course->credit_unit); ?>" name="courses[]"
                                                        <?php echo e($course->course_category == 1 ? 'checked ' : ''); ?>

                                                        value="<?php echo e($course->id); ?>" class="<?php echo e($course->credit_unit); ?>"
                                                        onclick="<?php echo e($course->course_category == 1 ? 'return false' : 'totalIt()'); ?>">
                                                    <input type="hidden" name="course_units1[]"
                                                        value="<?php echo e($course->credit_unit); ?>">
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
                                    <th>Second Semester </th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Credit Unit</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $tatolCredits = 0;
                                ?>
                                <input id="" type="text" name="student_id" value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                <input id="" type="hidden" name="session" value="<?php echo e($session->id); ?>">
                                

                                <?php $__currentLoopData = $courseSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($course->is_registered == 0): ?>
                                        <?php
                                            $tatolCredits += $course->course_category == 1 ? $course->credit_unit : 0;

                                        ?>
                                        <tr>


                                            <td> <input type="checkbox" id="<?php echo e($course->credit_unit); ?>" name="courses[]"
                                                    <?php echo e($course->course_category == 1 ? 'checked ' : ''); ?>

                                                    value="<?php echo e($course->id); ?>" class="<?php echo e($course->credit_unit); ?>"
                                                    onclick="<?php echo e($course->course_category == 1 ? 'return false' : 'totalIt2()'); ?>">
                                                <input type="hidden" name="course_units2[]"
                                                    value="<?php echo e($course->credit_unit); ?>">
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

                        </table>
                        
                        <div id="sub3">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">Lower Level Course </h6>
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


                                    <input id="" type="hidden" name="student_id" value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                    <input id="" type="hidden" name="session" value="<?php echo e($session->id); ?>">
                                    

                                    <?php $__currentLoopData = $lowercourseFirst; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($course->is_registered == 0): ?>
                                            <tr>


                                                <td> <input type="checkbox" id="<?php echo e($course->credit_unit); ?>"
                                                        name="courses[]" class="<?php echo e($course->credit_unit); ?>"
                                                        value="<?php echo e($course->id); ?>" onclick=totalIt()>
                                                    <input type="hidden" name="course_units1[]"
                                                        value="<?php echo e($course->credit_unit); ?>">
                                                </td>
                                                <td><?php echo e($course->course_code); ?></td>
                                                <td><?php echo e($course->course_title); ?></td>
                                                <td><?php echo e($course->credit_unit); ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    
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


                                    <input id="" type="hidden" name="student_id" value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                    <input id="" type="hidden" name="session" value="<?php echo e($session->id); ?>">
                                    

                                    <?php $__currentLoopData = $lowercourseSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($course->is_registered == 0): ?>
                                            <tr>


                                                <td> <input type="checkbox" id="<?php echo e($course->credit_unit); ?>"
                                                        name="courses[]" class="<?php echo e($course->credit_unit); ?>"
                                                        value="<?php echo e($course->id); ?>" onclick=totalIt2()>
                                                    <input type="hidden" name="course_units2 []"
                                                        value="<?php echo e($course->credit_unit); ?>">
                                                </td>
                                                <td><?php echo e($course->course_code); ?></td>
                                                <td><?php echo e($course->course_title); ?></td>
                                                <td><?php echo e($course->credit_unit); ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    
                                </tbody>

                            </table>
                        </div>


                        
                        <button type="submit" class="btn btn-success">
                            <?php echo e(__('Register Course')); ?>

                        </button>
                        

                        </form><br><br>
                          <h1 class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                Registered Courses
                    </h1>
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                              <div class="dropdown no-arrow">
                                
                                <a href="/courseform" class=" btn btn-sm btn-success shadow-sm"><i
                                        class="fas fa-print text-white-50"></i> Print </a>

                            </div>

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

                                    <input id="" type="text" name="student_id"
                                        value="<?php echo e(Auth::guard('student')->user()->id); ?>">
                                    <input id="" type="text" name="session" value="<?php echo e($session->id); ?>">
                                    

                                    <?php
                                        $tatolCredits = 0;
                                    ?>

                                    <?php $__currentLoopData = $courseform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $tatolCredits += $course->credit_unit;

                                        ?>
                                        <tr>


                                            
                                            <td> <input class="itemcourse" type="checkbox" id="course"
                                                    name="courses[]"
                                                    <?php echo e($course->course_category == 1 ? 'disabled ' : ''); ?>

                                                    value="<?php echo e($course->course_id); ?>"
                                                    onclick="<?php echo e($course->course_category == 1 ? 'return false' : 'totalIt()'); ?>"><?php echo e($key + 1); ?>

                                            </td>
                                            <td><?php echo e($course->course_code); ?></td>
                                            <td><?php echo e($course->course_title); ?></td>
                                            <td><?php echo e($course->credit_unit); ?></td>
                                           
                                           
                                              
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
        function setVisibility(id) {
            if (document.getElementById('bt1').value == 'Hide Lower Lvevel Courses') {
                document.getElementById('bt1').value = 'Show Lower vevel Courses';
                document.getElementById(id).style.display = 'none';
            } else {
                document.getElementById('bt1').value = 'Hide Lower Lvevel Courses';
                document.getElementById(id).style.display = 'inline';
            }
        }
    </script>

    <script>
        function totalIt() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu").innerHTML = sum;
            if (sum > 11) {
                document.getElementById("limit").innerHTML =
                    "Total credit load should not exceed 11 for First Semester Courses";
                frm.cbs[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
        //Second seasemter total credit limit
        function totalIt2() {
            let sum = 0;
            frm = document.getElementById("form-1"),
                cbs = frm["courses[]"]
            for (i = 0; i < cbs.length; i++) {
                if (cbs[i].checked) {
                    sum += parseInt(cbs[i].id);
                }
            }
            document.getElementById("tcu2").innerHTML = sum;
            if (sum > 11) {
                document.getElementById("limit2").innerHTML =
                    "Total credit load should not exceed 11 For Second Semester Courses";
                frm.cbs[j].checked = false;
                // let unmarkedBoxCount = document.querySelectorAll('input[type="checkbox"]:not(:checked)');
                //  unmarkedBoxCount.disabled = true
            }
            //console.log(sum)
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/students/course_registration.blade.php ENDPATH**/ ?>