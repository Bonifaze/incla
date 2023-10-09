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

    <?php $__env->startSection('content'); ?>
        <div class="content-wrapper bg-white">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <!-- left column -->
                    <div class="col_full">
                        <h1
                            class="app-page-title text-uppercase h5 font-weight-bold p-2 mb-2 shadow-sm text-center text-success border">
                            APPROVED STUDENTS PAYMENT
                        </h1>
            <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card shadow border border-success">
                            <div class="row">
                                <!-- Area Chart -->
                                <div class="col-xl-12 col-lg-12">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">

                                        </div>
                                        <div class="card-body">



                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>RRR</th>
                                                            <th>Student Name</th>
                                                            <th>Matric No.</th>
                                                            <th>Email</th>
                                                            <th colspan="2">Applicant Name</th>
                                                            
                                                            <th>Amount(₦)</th>
                                                            <th>Payment Description</th>
                                                            <th>Approved Date</th>
                                                            
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $paidRRRs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($payment->rrr); ?></td>
                                                                <td class="text-uppercase">
                                                                    <?php echo e($payment->student->fullname ?? ''); ?></td>
                                                                <td><?php echo e($payment->student->academic->mat_no ?? ' '); ?></td>
                                                                <td><?php echo e($payment->FeeType->percentage ?? ''); ?></td>
                                                                <td colspan="2" class="text-uppercase">
                                                                    <?php echo e($payment->users->surname ?? ' '); ?>

                                                                    <?php echo e($payment->users->first_name ?? ' '); ?></td>
                                                                
                                                                
                                                                <td> &#8358;<?php echo e(number_format($payment->amount)); ?></td>
                                                                <td><?php echo e($payment->fee_type); ?></td>
                                                                <td><?php echo e($payment->updated_at); ?></td>
                                                                 
                                                                                                                           </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                <div class="align-items-center align-content-center">
                                                    <?php echo e($paidRRRs->links()); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Payment Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>


</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<script>
    <?php if(isset($message)): ?>
        $(document).ready(function() {
            $('#modalMessage').text("<?php echo e($message); ?>");
            $('#myModal').modal('show');
        });
    <?php endif; ?>

    // Add this script to handle the button click
    $(document).on('click', '#approveButton', function(e) {
        e.preventDefault(); // Prevent the form from submitting
        var form = $(this).closest('form'); // Find the parent form
        var action = form.attr('action'); // Get the form's action attribute

        // Perform an AJAX request to approve the payment
        $.ajax({
            type: 'POST',
            url: action,
            data: form.serialize(),
            success: function(response) {
                // Update the modal message with the response
                $('#modalMessage').text(response.message);
                $('#myModal').modal('show');
            },
            error: function(error) {
                // Handle any errors here
                console.error(error);
            }
        });
    });
</script>
<script src="<?php echo e(asset('dist/js/bootbox.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/staff/paymentConfirmlists.blade.php ENDPATH**/ ?>