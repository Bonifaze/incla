<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Veritas University</title>
    
    <link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>">
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

    <!-- Page level plugins -->
    <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">

    <!--Remita payment -->
    <script src="<?php echo e(asset('js/remi.js')); ?>"></script>

    <style>
        body {
            overflow-x: hidden;
            padding: 0.1rem;
        }

        main {
            overflow-x: hidden;
        }
    </style>

</head>

<body>

    <!-- Topbar -->
    <nav class="navbar navbar-expand-lg bg-light shadow mb-1">

        <a class="navbar-brand" href="">
            <img src="<?php echo e(asset('img/veritasin.png')); ?>" alt="" width="170" height="60" class="px-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto px-5">

                <li class="nav-item">
                    <a class="nav-link text-success"
                        href="https://www.veritas.edu.ng/index.php"><?php echo e(__('Veritas Home Page')); ?></a>
                </li>

                <li class="nav-item">
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo22"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-user text-success"></i>
                        <span class="text-dark font-weight-bold">
                            <?php echo e(session('usersFirstName')); ?>

                            <?php echo e(session('usersmiddleName')); ?>

                            <?php echo e(session('userssurname')); ?>

                            

                        </span>
                    </a>
                    <div id="collapseTwo22" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSidebar">
                        
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a href="/logoutUser" class="nav-link text-danger"><i
                                    class="fas fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/logoutUser" class="nav-link text-danger"><i class="fas fa-power-off"></i>Logout</a>
                </li>


            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php /**PATH C:\Users\Lawrence Chris\Desktop\laraproject\resources\views/layouts/userapp.blade.php ENDPATH**/ ?>