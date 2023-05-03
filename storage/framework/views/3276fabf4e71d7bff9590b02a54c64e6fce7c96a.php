<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veritas University|Home</title>
  <style>
    .hero-full-screen {
      height: 100vh;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-flex-direction: column;
      -ms-flex-direction: column;
      flex-direction: column;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-justify-content: center;
      -ms-flex-pack: justify;
      justify-content: center;
      background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url("<?php echo e(asset('/css/default.jpg')); ?>") center center no-repeat;
      background-size: cover;
    }

    .hero-full-screen .middle-content-section {
      text-align: center;
      color: #fefefe;
    }

    .hero-full-screen .top-bar {
      background: transparent;
    }

    .hero-full-screen .top-bar .menu {
      background: transparent;
    }

    .hero-full-screen .top-bar .menu-text {
      color: #fefefe;
    }

    .hero-full-screen .top-bar .menu li {
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-align-items: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .hero-full-screen .top-bar .menu a {
      color: #fefefe;
      font-weight: bold;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
      text-transform: uppercase;
    }

    h1 {
      font-size: 3.5em;
    }

  </style>

</head>

<body>

  <div class="hero-full-screen">

    <div class="middle-content-section">
      <h4 class="m-4 ">Welcome to</h4>
      <h1 class="m-4 fw-bold">Veritas University Portal</h1>
      <a href="<?php echo e(route('student.login')); ?>" class="btn btn-success px-4 m-2 fs-5">STUDENT</a>
      <a href="<?php echo e(route('staff.login')); ?>" class="btn btn-success px-4 m-2 fs-5">STAFF</a>
      <a href="/admissions/login" class="btn btn-success px-4 m-2 fs-5">APPLICANT</a>
      <!-- <button class="button large">Button</button> -->
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6450ecca4247f20fefeee449/1gve1ptr1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>

</html>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/default.blade.php ENDPATH**/ ?>