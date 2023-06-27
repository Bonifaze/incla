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
    #background-image {
  background-image: url('../css/default-day.jpg');
  opacity: 0.9;
  transition: background-image 0.5s;
}
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
<?php $__env->startSection('content'); ?>

<body id="background-image" style="background-image: url('../css/default.jpg'); opacity: 0.9;" >

    <div class="">
        <div class="signup">

            <div class="container">
                <div class="signup-content" >


                    <div class="login-logo">
                      <center> <p class="h1"><strong> We’ll be back soon! </strong></p> </center>
                    </div>
                    <p class="h4">
                        Sorry for the inconvenience. We’re performing some maintenance at the moment. we’ll be back up shortly!


                  </p>

                  <p class="h2" id="demo"></p>

<br>
<br>
<p>Powerd by: ICT Veritas University Abuja
                </div>

            </div>
        </div>

    </div>
<script>
// Set the date we're counting down to
var countDownDate = new Date("june 25, 2023 23:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);


// Function to set the background image based on the current time
function setBackground() {
  var now = new Date();
  var hour = now.getHours();

  // Check if it's daytime or nighttime
  if (hour >= 6 && hour < 16) {
    document.getElementById("background-image").style.backgroundImage = "url('../css/default-day.jpg')";
  } else {
    document.getElementById("background-image").style.backgroundImage = "url('../css/default-night.jpg')";
  }
}

// Call the function initially to set the background
setBackground();

// Set an interval to update the background image every minute
setInterval(setBackground, 60000);
</script>
</body>
<?php $__env->stopSection(); ?>

</html>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/layouts/Maintance.blade.php ENDPATH**/ ?>