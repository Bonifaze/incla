<?php $__env->startSection('pagetitle'); ?>
    Student Result Management
<?php $__env->stopSection(); ?>

<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('results-openuj'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('resulhts'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('exam-remark'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->




<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">






                    <div class="card card-primary">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Student Result Management
                        </h1>
                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive">

                            <!-- form start -->

                            <?php echo Form::open(['route' => 'result.program_find_student', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">

                                    <div class="row">

                                        <div class="col-md-6 form-group">
                                            <label for="mat_no">Student Id or Matric Number :</label>
                                            <?php echo Form::text('mat_no', null, [
                                                'placeholder' => '',
                                                'class' => 'form-control',
                                                'id' => 'mat_no',
                                                'required' => 'required',
                                            ]); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('mat_no')); ?></span>
                                        </div>

                                        <div class="col-md-6 form-group">
                                            <label for="program">Program :</label>
                                            <?php echo e(Form::select('program', $programs, null, ['class' => 'form-control', 'id' => 'program', 'name' => 'program'])); ?>

                                            <span class="text-danger"> <?php echo e($errors->first('program')); ?></span>
                                        </div>


                                    </div>



                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">

                                <?php echo e(Form::submit('Search', ['class' => 'btn btn-primary'])); ?>


                            </div>

                        </div>
                        <!-- /.box-body -->


                        <?php echo Form::close(); ?>


                    </div>
























                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->

  
            <div class="card card-primary">
                <h1
                    class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                    Download Old Result <span class="text-primary">
                    </span>
                </h1>

                <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="table-responsive">

                    <!-- form start -->

                    <?php echo Form::open([
                        'route' => 'academia.department.export_view_oldresult',
                        'method' => 'GET',
                        'class' => 'nobottommargin',
                    ]); ?>

                    <div class="card-body">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6  form-group">
                                    <label for="session_id">Session :</label>
                                    <?php echo e(Form::select('session_id', $sessions, null, ['class' => 'form-control', 'id' => 'session_id', 'name' => 'session_id'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('session_id')); ?></span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="session_id">Session :</label>
                                    <?php echo e(Form::select('program_id', $programs, null, ['class' => 'form-control', 'id' => 'program_id', 'name' => 'program_id'])); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('program_id')); ?></span>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label for="semester">Semester :</label>
                                    <?php echo e(Form::select(
                                        'semester',
                                        [
                                            '1' => 'First Semester',
                                            '2' => 'Second Semester',
                                        ],
                                        1,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('semester')); ?></span>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="level">Level :</label>
                                    <?php echo e(Form::select(
                                        'level',
                                        [
                                            '100' => '100 Level',
                                            '200' => '200 Level',
                                            '300' => '300 Level',
                                            '400' => '400 Level',
                                            '500' => '500 Level',
                                            '600' => '600 Level',
                                            '700' => 'PGD',
                                            '800' => 'MSc',
                                            '900' => 'PhD',
                                        ],
                                        100,
                                        ['class' => 'form-control select2'],
                                    )); ?>

                                    <span class="text-danger"> <?php echo e($errors->first('level')); ?></span>
                                </div>

                            </div>


                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="card-footer">

                        <?php echo e(Form::submit('Download', ['class' => 'btn btn-primary float-right'])); ?>


                    </div>

                </div>
                <!-- /.box-body -->


                <?php echo Form::close(); ?>


            </div>
            


            
              <div
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm  text-success border">
                       Result Audit
                                                    <a href="/program-courses/results/resultBarchat"
                                                        class="float-right btn btn-outline-info">VIEW BAR CHAT</a>

                    </div>
            <div class="table-responsive card-body">

                            <h3 class="card-title">  </h3>
                        </div>
						<table class="table table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
						  <thead>

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
							  <td><?php echo e($loop->iteration); ?></td>
							  <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                              
                                <td><?php echo e($audit->course->course_code); ?> (<?php echo e($audit->course->course_title); ?>)</td>

							 <td><?php echo e($audit->sessions->name); ?></td>

                              <?php if($audit->semester==1): ?>
                                        <td>First</td>
                                        <?php else: ?>
                                        <td>Second</td>
                                        <?php endif; ?>
                             <td><?php echo e($audit->level); ?></td>
                               <td class="text-warning h2"><?php echo e($audit->old_total ?? null); ?></td>
                             <td class="text-success h1"><?php echo e($audit->total ?? null); ?></td>
                             <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                             <td><?php echo e($audit->full_name); ?></td>
                                   <td><?php echo e($audit->updated_at); ?></td>



							</tr>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						  </tbody>


						</table>



            </div>

    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/results/program-search-student.blade.php ENDPATH**/ ?>