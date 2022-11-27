<?php $__env->startSection('pagetitle'); ?>
    List of Courses
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('courses-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('courses'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('list-roles'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        List of active Courses
                    </h1>

                    <div class="card">

                        <div class="table-responsive card-body">

                            <table class="table table-bordered table-striped" id="dataTable2" width="100%" cellspacing="0">
                                <thead>

                                    <th>#</th>
                                    <th>Course Code</th>
                                    <th>Course Title</th>
                                    <th>Course Unit</th>
                                    
                                    
                                    
                                    <th>Action</th>
                                    <th>Action</th>

                                </thead>


                                <tbody>

                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($course->course_code); ?></td>
                                            <td><?php echo e($course->course_title); ?></td>
                                            <td><?php echo e($course->credit_unit); ?></td>
                                            
                                            
                                            <td><a href="<?php echo e(route('course.edit', $course->id)); ?>" class="btn btn-default"> Edit </td>

                                            <td>
                                                <?php echo Form::open(['method' => 'Delete', 'route' => 'course.delete', 'id' => 'deleteCourseForm' . $course->id]); ?>

                                                <?php echo e(Form::hidden('id', $course->id)); ?>



                                                <button onclick="deleteCourse(<?php echo e($course->id); ?>)" type="button"
                                                    class="<?php echo e($course->id); ?> btn btn-danger"><span
                                                        class="icon-line2-trash"></span> Delete</button>
                                                <?php echo Form::close(); ?>


                                            </td>

                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>



                            </table>
                            <?php echo $courses->render(); ?>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>

    <script>
        function deleteCourse(id) {
            bootbox.dialog({
                message: "<h4>Confirm you want to delete this course</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success',
                        callback: function() {
                            document.getElementById("deleteCourseForm" + id).submit();
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

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views//courses/list.blade.php ENDPATH**/ ?>