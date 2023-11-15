<?php $__env->startSection('content'); ?>

            <div class="">
                <!-- left column -->
                <div class="col_full">


                    <div class="">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">


                        </h1>

                        <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="table-responsive card-body">

                            <table class="table table-striped text-white">
                                <thead class="text-white">

                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Program</th>


                                    <th>Action</th>



                                </thead>


                                <tbody>

                                    <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr >
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($program->department->name); ?></td>
                                            <td class="h4"><?php echo e($program->name); ?></td>
                                             <td><a href="<?php echo e(route('program_course.resultbarchatCourse',$program->id)); ?>" class="btn btn-success"><i class="fa fa-eye"></i> View </a></td>







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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

    <script>
        function approveResult(id, program, level) {
            bootbox.dialog({
                message: "<h4>Confirm you want to approve result for " + program + " " + level + " level ?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("approveResultForm" + id).submit();
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

<?php echo $__env->make('layouts.mini2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/rbac/programresultsbarchat.blade.php ENDPATH**/ ?>