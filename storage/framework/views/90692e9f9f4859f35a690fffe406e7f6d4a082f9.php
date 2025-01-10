<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Veritas University Admissions Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script></head>
    <style>
        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
            }
        }


    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('fonts/material-icon/css/material-design-iconic-font.min.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
     <style>
    civ:hover{
  opacity: 1.0;
}"
  </style>
</head>

<body style="background-image: url('../img/signup-bg.jpg'); opacity: 0.9;" >
    <div class="">
        <div class="signup">

            <div class="error-page">
                <h2 class="headline text-yellow"> 419</h2>

                <div class="error-content">
                  <h3><i class="fa fa-warning text-yellow"></i> Sorry, your session has expired</h3>

                  <p>
                   Sorry, your session has expired. Please refresh and try again
                    Meanwhile, you may <a href="<?php echo e(url('/')); ?>">return to Login</a>
                  </p>


                </div>
                <!-- /.error-content -->
              </div>
        </div>

    </div>

</body>

</html>
<?php /**PATH C:\Users\CLINTON\Downloads\TASK\incla\resources\views/errors/419.blade.php ENDPATH**/ ?>