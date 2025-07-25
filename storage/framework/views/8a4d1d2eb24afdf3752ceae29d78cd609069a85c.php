<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Institute of Consecrated Life in Africa (InCLA) Admissions Portal</title>

    <!-- External CSS for material icons and custom styles -->
    <link rel="stylesheet" href="<?php echo e(asset('fonts/material-icon/css/material-design-iconic-font.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/errors.css')); ?>">

    <!-- Bootstrap and Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<?php $__env->startSection('content'); ?>
<body>
    <!-- Moon and Stars Background -->
    <div class="moon"></div>
    <div class="moon__crater moon__crater1"></div>
    <div class="moon__crater moon__crater2"></div>
    <div class="moon__crater moon__crater3"></div>
    <div class="star star1"></div>
    <div class="star star2"></div>
    <div class="star star3"></div>
    <div class="star star4"></div>
    <div class="star star5"></div>

    <!-- Error Message -->
    <div class="error">
        <div class="error__title">404</div>
        <div class="error__subtitle">Ohhh!</div>
        <div class="error__description"> We can't find the page you are looking for.<br> This page may no longer exist.</div>
        <button class="error__button error__button--active">Contact Admin</button>
        <div class="error__description"> If this continues, contact <br> Institute of Consecrated Life in Africa (InCLA) Admin Unit</div>

    </div>

    <!-- Astronaut Graphic -->
    <div class="astronaut">
        <div class="astronaut__backpack"></div>
        <div class="astronaut__body"></div>
        <div class="astronaut__body__chest"></div>
        <div class="astronaut__arm-left1"></div>
        <div class="astronaut__arm-left2"></div>
        <div class="astronaut__arm-right1"></div>
        <div class="astronaut__arm-right2"></div>
        <div class="astronaut__arm-thumb-left"></div>
        <div class="astronaut__arm-thumb-right"></div>
        <div class="astronaut__leg-left"></div>
        <div class="astronaut__leg-right"></div>
        <div class="astronaut__foot-left"></div>
        <div class="astronaut__foot-right"></div>
        <div class="astronaut__wrist-left"></div>
        <div class="astronaut__wrist-right"></div>

        <div class="astronaut__cord">
            <canvas id="cord" height="500px" width="500px"></canvas>
        </div>

        <div class="astronaut__head">
            <canvas id="visor" width="60px" height="60px"></canvas>
            <div class="astronaut__head-visor-flare1"></div>
            <div class="astronaut__head-visor-flare2"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Function to draw visor of the astronaut
        function drawVisor() {
            const canvas = document.getElementById('visor');
            const ctx = canvas.getContext('2d');

            ctx.beginPath();
            ctx.moveTo(5, 45);
            ctx.bezierCurveTo(15, 64, 45, 64, 55, 45);

            ctx.lineTo(55, 20);
            ctx.bezierCurveTo(55, 15, 50, 10, 45, 10);

            ctx.lineTo(15, 10);
            ctx.bezierCurveTo(15, 10, 5, 10, 5, 20);
            ctx.lineTo(5, 45);

            ctx.fillStyle = '#2f3640';
            ctx.strokeStyle = '#f5f6fa';
            ctx.fill();
            ctx.stroke();
        }

        // Function for animated cord
        const cordCanvas = document.getElementById('cord');
        const ctx = cordCanvas.getContext('2d');
        let y1 = 160;
        let y2 = 100;
        let y3 = 100;
        let y1Forward = true;
        let y2Forward = false;
        let y3Forward = true;

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, innerWidth, innerHeight);

            ctx.beginPath();
            ctx.moveTo(130, 170);
            ctx.bezierCurveTo(250, y1, 345, y2, 400, y3);
            ctx.strokeStyle = 'white';
            ctx.lineWidth = 8;
            ctx.stroke();

            // Logic for moving the curve points
            if (y1 === 100) y1Forward = true;
            if (y1 === 300) y1Forward = false;
            if (y2 === 100) y2Forward = true;
            if (y2 === 310) y2Forward = false;
            if (y3 === 100) y3Forward = true;
            if (y3 === 317) y3Forward = false;

            y1Forward ? y1 += 1 : y1 -= 1;
            y2Forward ? y2 += 1 : y2 -= 1;
            y3Forward ? y3 += 1 : y3 -= 1;
        }

        // Initialize animations
        drawVisor();
        animate();
    </script>
</body>
<?php $__env->stopSection(); ?>
</html>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Downloads/PROJECTCODE/inclaproject/incla/resources/views/errors/404.blade.php ENDPATH**/ ?>