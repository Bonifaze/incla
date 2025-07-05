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

<style>
    /* Hover effect for cards */
    .hover-card:hover {
        transform: scale(1.05);
        /* Slightly enlarge the card */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        /* Smooth transition */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Add a shadow effect on hover */
    }
    td, th {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #D3D3D3;
    }
</style>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper bg-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- left column -->
                <div class="col_full">


                    <h1
                        class="app-page-title text-uppercase h6 font-weight-bold p-3 mb-3 shadow-sm text-center text-white bg-success border rounded">
                        Welcome to InCLA Student Dashboard
                    </h1>
                    <?php echo $__env->make('partialsv3.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a href="<?php echo e(route('students.results')); ?>" class=" <?php echo $__env->yieldContent('/'); ?>">
                                <div class="card card-stats card-round">
                                    <div class="card-body hover-card shadow-sm">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col col-stats ms-3 ms-sm-0">
                                                <div class="numbers">
                                                    
                                                    <h4 class="card-title"> View Result</h4>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-list fa-3x text-success "></i>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <?php $__currentLoopData = $courseReg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 col-md-4">
                                <a href="<?php echo e($session->route); ?>" class=" <?php echo $__env->yieldContent('registration'); ?>">
                                    <div class="card card-stats card-round hover-card shadow-sm">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                                        <i class="fas fa-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ms-3 ms-sm-0">
                                                    <div class="numbers">
                                                        
                                                        <h4 class="card-title">Register Course</h4>

                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fa fa-cog fa-spin fa-2x text-success "></i>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-sm-6 col-md-4">
                            <a href="" class=" <?php echo $__env->yieldContent('/'); ?>">
                                <div class="card card-stats card-round">
                                    <div class="card-body hover-card shadow-sm">
                                        <div class="row align-items-center">
                                            <div class="col-icon">
                                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                                    <i class="fas fa-luggage-cart"></i>
                                                </div>
                                            </div>

                                            <!-- Your existing content -->

                                            <div class="col col-stats ms-3 ms-sm-0" onclick="showComingSoonModal()">
                                                <div class="numbers">
                                                    
                                                    <h4 class="card-title">Complain</h4>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-comments fa-3x text-success"></i>
                                            </div>



                                            <!-- Modal Structure -->
                                            <div class="modal fade" id="comingSoonModal" tabindex="-1"
                                                aria-labelledby="comingSoonModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="comingSoonModalLabel">Feature Coming
                                                                Soon</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>This feature is coming soon. Stay tuned for updates!</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Bootstrap JS CDN -->
                                            

                                            <script>
                                                function showComingSoonModal() {
                                                    var modalElement = document.getElementById('comingSoonModal');
                                                    var myModal = new bootstrap.Modal(modalElement);
                                                    myModal.show();
                                                }
                                            </script>


                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="row row-card-no-pd">
                        <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                            <!-- Wrap the card with anchor tag to make it clickable -->
                            
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Courses Offered</b></h6>
                                            </div>
                                            <h4 class="text-info fw-bold"><?php echo e($totalCourses); ?></h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info w-100" role="progressbar" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                            <!-- Wrap the card with anchor tag to make it clickable -->
                            
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Passed</b></h6>
                                            </div>
                                            <h4 class="text-danger fw-bold"><?php echo e($passedCourses); ?></h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger w-50" role="progressbar" aria-valuenow="50"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>

                        <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                            <!-- Wrap the card with anchor tag to make it clickable -->
                            
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6><b>Failed</b></h6>
                                            </div>
                                            <h4 class="text-secondary fw-bold"><?php echo e($failedCourses); ?></h4>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>






                </div>


            </div>
        </section>
    </div>



    <!-- Modal -->
    <!-- <div class="modal fade" id="reloadModal" tabindex="-1" role="dialog" aria-labelledby="reloadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger text-center font-weight-bold" id="reloadModalLabel">Important Notice</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>
                                    Dear Students,<br>
                                    We'll be back soon!

            We apologise for any inconvenience caused. We are currently upgrading our system to serve you better. During this period, the generation of RRR code for tuition fees payment via Remita will be temporarily unavailable.

            Do bear with us as we work diligently to minimize any disruption.

            For urgent inquiries, please reach out to the Veritas ICT support team at ictsupport@veritas.edu.ng and we will respond to you promptly.
                                </h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END OF THE Modal -->
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

<?php echo $__env->make('layouts.student', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/students/home.blade.php ENDPATH**/ ?>