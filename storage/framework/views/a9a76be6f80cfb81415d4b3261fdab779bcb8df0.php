<?php $__env->startSection('pagetitle'); ?>
    Student Result Management
<?php $__env->stopSection(); ?>

<!-- Treeview -->
<?php $__env->startSection('results-zopen'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('resulzts'); ?>
    active
<?php $__env->stopSection(); ?>


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
                        Course Registration for <?php echo e($student->full_name); ?>

                    </h1>
                    <h5 class="app-page-title text-uppercase h5 font-weight p-2 mb-2 shadow-sm text-center text">
                         <?php echo e($session->name); ?> Academic Session
                    </h5>


                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <h1 class=" text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-left text-success border">
                        Registered Courses
                        
                        
                        <?php
                            $student_id = 0;
                        ?>

                        <a class="btn btn-primary" href="<?php echo e(route('semester.registration', [base64_encode($student->id), $session])); ?>"
                            target="_blank"> <i class="fa fa-eye"></i> Print Form </a>
                        




                    </h1>
                    
                            
                       
                                

                                            

                                

                                
                                        
                                        
                                            


				    		
                    
                         
                        

                        
                    


                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th> Semester</th>
                                <th>Credit Unit</th>
                                <th>Action</th>

                            </thead>


                            <tbody>
<?php
                                    $tatolCredits = 0;
                                ?>
                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                        $tatolCredits += $res->course_unit;

                                    ?>
                                    <tr>

                                        <td><?php echo e($loop->iteration); ?>

                                        
                                        </td>
                                        <td><?php echo e($res->course_code); ?></td>
                                        <td><?php echo e($res->course_title); ?></td>
                                        
                                        <?php if($res->semester==1): ?>
                                        <td>First</td>
                                        <?php else: ?>
                                        <td>Second</td>
                                        <?php endif; ?>
                                        
                                        <td><?php echo e($res->course_unit); ?></td>
                                        <td>
                                               
                                            <?php echo Form::open(['method' => 'post', 'route' => 'result.remove-course', 'id' => 'removeRCourse' . $res->id]); ?>

                                            <?php echo e(Form::hidden('id', $res->id)); ?>

                                            <?php echo e(Form::hidden('student_id', $student->id)); ?>

                                            <?php echo e(Form::hidden('session_id', $session->id)); ?>

                                            <?php echo e(Form::hidden('semester', $semester)); ?>

                                            <?php echo e(Form::hidden('level', $level)); ?>


                                            <button onclick="removeRCForm(<?php echo e($res->id); ?>)" type="button"
                                                class="<?php echo e($res->id); ?> btn btn-danger"><span
                                                    class="icon-line2-trash"></span><i
                                                                class="fas fa-solid fa-trash"></i>  Drop</button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><strong> Registered Credits </strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                     <td> <strong> <?php echo e($tatolCredits); ?> </strong></td>
                                    <td> </td>

                                </tr>
                                <tr>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    
                                    

                                    <td> </td>

                                </tr>

                            </tbody>



                        </table>
                        


                    </div>

                    <?php $registration = $student->getSemesterRegistration($session->id,$semester) ?>

                    <div class="card-footer">

                        
                        

                    </div>

                    

                    <p> <br /></p>

                    <h1 class=" text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-left text-success border">
                      
                      Cuurent Level Courses
                    </h1>

                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Level</th>
                                <th>Semester</th>
                                <th>Credit Unit</th>
                                <th>Action</th>

                            </thead>


                            <tbody>

                                <?php $__currentLoopData = $fresh_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fcourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?>

                                        
                                        </td>
                                        <td><?php echo e($fcourse->course->course_code); ?></td>
                                        <td><?php echo e($fcourse->course->course_title); ?></td>
                                        <td><?php echo e($fcourse->level); ?></td>
                                         <?php if($fcourse->semester==1): ?>
                                        <td>First</td>
                                        <?php else: ?>
                                        <td>Second</td>
                                        <?php endif; ?>
                                        <td><?php echo e($fcourse->credit_unit); ?></td>
                                        <td>
                                            <?php echo Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id' => 'addFCForm' . $fcourse->id]); ?>

                                            <?php echo e(Form::hidden('course_id', $fcourse->course->id)); ?>

                                            <?php echo e(Form::hidden('student_id', $student->id)); ?>

                                            <?php echo e(Form::hidden('session_id', $session->id)); ?>

                                            <?php echo e(Form::hidden('semester', $semester)); ?>

                                            <?php echo e(Form::hidden('level', $student->academic->level)); ?>

                                            <?php echo e(Form::hidden('program_id', $student->academic->program_id)); ?>



                                            <button onclick="addFCourse(<?php echo e($fcourse->id); ?>)" type="button"
                                                class="<?php echo e($fcourse->id); ?> btn btn-success"><span class="icon-plus"></span>
                                               <i class="fas fa-plus"></i>  Add</button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>



                        </table>
                        

                    </div>



                    

                    <div class="table-responsive">

                        <table class="table table-striped">
                            


                            <tbody>

                                <?php $__currentLoopData = $carry_over; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $co): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> <?php echo e($loop->iteration); ?>

                                        
                                        </td>
                                        <td><?php echo e($co->course->course_code ?? null); ?></td>
                                        <td><?php echo e($co->course->course_title ?? null); ?></td>
                                        <td><?php echo e($co->level ?? null); ?></td>
                                        <td><?php echo e($co->credit_unit ?? null); ?></td>
                                        <td>
                                            <?php echo Form::open(['method' => 'Post', 'route' => 'result.add-course', 'id' => 'addCOForm' . $co->id]); ?>

                                            <?php echo e(Form::hidden('course_id', $co->course->id ?? null)); ?>

                                            <?php echo e(Form::hidden('student_id', $student->id)); ?>

                                            <?php echo e(Form::hidden('session_id', $session->id)); ?>

                                            <?php echo e(Form::hidden('semester', $semester)); ?>

                                            <?php echo e(Form::hidden('level', $level)); ?>

                                            <?php echo e(Form::hidden('program_id', $student->academic->program_id)); ?>


                                            <button onclick="addCOver(<?php echo e($co->id); ?>)" type="button"
                                                class="<?php echo e($co->id); ?> btn btn-success"><span class="icon-plus"></span>
                                                 <i class="fas fa-plus"></i> Add</button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>



                        </table>
                        


                    </div>























                </div>
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
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>



    <script>
        function removeRCForm(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Drop this course for <?php echo e($student->full_name); ?></h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("removeRCourse" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addOut(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Add this course for <?php echo e($student->full_name); ?></h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addOutForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addFCourse(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want to Add this course for <?php echo e($student->full_name); ?></h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addFCForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }


        function addCOver(id) {
            bootbox.dialog({
                message: "<h4>Are you Sure want toAdd  this course for <?php echo e($student->full_name); ?></h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("addCOForm" + id).submit();
                        }
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger',
                    }
                },
                callback: function(result) {}

            });
            // e.preventDefault(); // avoid to execute the actual submit of the form if onsubmit is used.
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/results/course_registration.blade.php ENDPATH**/ ?>