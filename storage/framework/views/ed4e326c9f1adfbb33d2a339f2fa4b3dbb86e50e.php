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
                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Audit Record
                    </h1>


                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card ">
                        <div class="card-header">
                            <h6 class="app-page-title text-uppercase h6 font-weight-bold p-2 mb-2 text-success">
                                Audit Search by date
                            </h6>
                        </div>
                        <div class="">
                            <?php if(session('approvalMsg')): ?>
                                <?php echo session('approvalMsg'); ?>

                            <?php endif; ?>
                            <!-- form start -->
                            <?php echo Form::open(['route' => 'rbac.audit-find-date', 'method' => 'POST', 'class' => 'nobottommargin']); ?>

                            <div class="card-body">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="bootstrap-timepicker col-md-6 ">
                                            <div class="form-group">
                                                <label>Start Date:</label>
                                                <div class="input-group date" id="start_date" data-target-input="nearest">
                                                    <input type="text" name="start_date" placeholder="2022-01-01"
                                                        class="form-control datetimepicker-input" data-target="#start_date"
                                                        required='required' />
                                                    <div class="input-group-append" data-target="#start_date"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <span class="text-danger"> <?php echo e($errors->first('start_date')); ?></span>
                                            </div>
                                        </div>
                                        <div class="bootstrap-timepicker col-md-6 ">
                                            <div class="form-group">
                                                <label>End Date:</label>

                                                <div class="input-group date" id="end_date" data-target-input="nearest">
                                                    <input type="text" name="end_date" placeholder="2023-01-01"
                                                        class="form-control datetimepicker-input" data-target="#end_date"
                                                        required='required' />
                                                    <div class="input-group-append" data-target="#end_date"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                                <span class="text-danger"> <?php echo e($errors->first('end_date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="card-footer">
                                <?php echo e(Form::submit('Search', ['class' => 'btn btn-success'])); ?>

                            </div>
                        </div>
                        <!-- /.box-body -->




                        <?php echo Form::close(); ?>

                    </div>
                    
                    


                    <div class="table-responsive card-body">
                        <div class="card-header">
                            <h6
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Audit Logs
                            </h6>
                        </div>
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <th>S/N</th>
                                
                                <th>Staff Name</th>
                                <th>Event</th>
                                <th>Audited Model</th>
                                <th>Old Values</th>
                                <th>New Values</th>
                                <th>URL</th>
                                <th>IP Address</th>
                                <th>User PC/ Browser</th>
                                <th>Audit Id</th>
                                
                                
                                <th>Date</th>





                            </thead>


                            <tbody>

                                <?php $__currentLoopData = $article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        
                                        <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                                        <td><?php echo e($audit->event); ?></td>
                                        <td><?php echo e($audit->auditable_type); ?></td>
                                        <td>
                                            <table class="table">
                                                <?php $__currentLoopData = $audit->old_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><b><?php echo e($attribute); ?></b></td>

                                                        <td><?php echo e($value); ?></td>


                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </td>
                                        <td>
                                            <table class="table">
                                                <?php $__currentLoopData = $audit->new_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><b><?php echo e($attribute); ?></b></td>
                                                        <td><?php echo e($value); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </td>
                                        
                                        
                                        <td><?php echo e($audit->url); ?></td>
                                        <td><?php echo e($audit->ip_address); ?></td>
                                        <td><?php echo e($audit->user_agent); ?></td>
                                        
                                        
                                        <td><?php echo e($audit->auditable_id); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($audit->updated_at)->format('l j, F Y H:i:s')); ?></td>

                                        


                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a target="_blank" href="<?php echo e(route('rbac.auditviewallevent')); ?>"
                                    class="btn btn-primary mb-3 mt-3 float-right">View All Event</a>
                            </tbody>
                            <?php echo $article->render(); ?>



                        </table>



                    </div>

                    <div class="table-responsive card-body">
                        <div class="card-header">
                            <h6
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Audit Results
                            </h6>
                        </div>
                        <table class="table table-striped">
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

                                        <?php if($audit->semester == 1): ?>
                                            <td>First</td>
                                        <?php else: ?>
                                            <td>Second</td>
                                        <?php endif; ?>
                                        <td><?php echo e($audit->level); ?></td>
                                        <td><?php echo e($audit->old_total ?? null); ?></td>
                                        <td><?php echo e($audit->total ?? null); ?></td>
                                        <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>
                                        <td><?php echo e($audit->full_name); ?></td>
                                        <td> <?php echo e(\Carbon\Carbon::parse($audit->updated_at)->format('l j, F Y H:i:s')); ?></td>



                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <a target="_blank" href="<?php echo e(route('rbac.auditviewall')); ?>"
                                    class="btn btn-primary mb-3 mt-3 float-right">View All Result Changes</a>
                            </tbody>
                            <?php echo $modify->render(); ?>


                        </table>



                    </div>


                    <div class="table-responsive card-body">
                        <div class="card-header">
                            <h6
                                class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                                Audit Remita
                            </h6>
                        </div>
                        <table class="table table-striped">
                            <thead>

                                <th>S/N</th>
                                
                                <th>Staff Name</th>
                                <th>RRR </th>

                                <th>Fee/Amount</th>
                                <th>Student MatNo.</th>
                                <th>Student Name</th>
                                <th>Date</th>
                            </thead>


                            <tbody>

                                <?php $__currentLoopData = $remita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                                        <td><?php echo e($audit->rrr); ?></td>
                                        <td><?php echo e($audit->feeType->name ?? null); ?></td>
                                        


                                        <td><?php echo e($audit->student->academic->mat_no ?? null); ?></td>

                                        <td><?php echo e($audit->student->full_name ?? null); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($audit->updated_at)->format('l j, F Y H:i:s')); ?></td>



                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a target="_blank" href="<?php echo e(route('rbac.auditviewallremita')); ?>"
                                    class="btn btn-primary mb-3 mt-3 float-right">View All Verified</a>
                            </tbody>
                            <?php echo $modify->render(); ?>



                        </table>



                    </div>
                </div>

                

                <div class="table-responsive card-body">
                    <div class="card-header">
                        <h6
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            Audit Assigned Roles
                        </h6>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Role</th>
                                <th>Staff Name</th>
                                <th>Assigned By</th>
                                <th>Removed By</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($audit->role->name); ?></td>
                                    <td><?php echo e($audit->staff->full_name ?? null); ?></td>
                                    <td> <?php echo e($audit->StaffName); ?></td>
                                    <td> <?php echo e($audit->StaffNameremove); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($audit->created_at)->format('l j, F Y H:i:s')); ?>



                                    </td>
                                    

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <a target="_blank" href="<?php echo e(route('rbac.auditviewallassigned')); ?>"
                                class="btn btn-primary mb-3 mt-3 float-right">View All Assigned Roles</a>
                        </tbody>
                        <?php echo $modify->render(); ?>

                    </table>




                </div>
            </div>

    </div>
    </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#end_date').datetimepicker({
                format: 'YYYY-MM-DD',
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/audit.blade.php ENDPATH**/ ?>