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
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">

                    <h1
                        class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                        Student Report
                    </h1>
                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Display counts -->
<div>
    <h3>Numbers of </h3>
    <p>Graduated Students : <?php echo e($graduatedCount); ?></p>

    <hr>
    <h3>Numbers of Undergrauate :</h3>
    <p>Male Students: <?php echo e($maleCount); ?></p>
    <p>Female Students: <?php echo e($femaleCount); ?></p>
    <hr>




    </div>



                </div>
            </div>
        </section>
    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


    <script>
        // Function to show the modal on page load
        // function showModalOnLoad() {
        //     $('#reloadModal').modal('show');
        //   }

        // Call the function when the page is ready
        // $(document).ready(function () {
        //      showModalOnLoad();
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/students/admin/report.blade.php ENDPATH**/ ?>