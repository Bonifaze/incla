<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>AdminLTE 2 | Lockscreen</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport')?>" media='screen' />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo asset('bower_components/bootstrap/dist/css/bootstrap.min.css')?>" media='screen' />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo asset('bower_components/font-awesome/css/font-awesome.min.css')?>" media='screen' />
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo asset('bower_components/Ionicons/css/ionicons.min.css')?>" media='screen' />
  
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo asset('dist/css/AdminLTE.min.css')?>" media='screen' />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 	



 	
 </head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">John Doe</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo asset('dist/img/user1-128x128.jpg')?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password">

        <div class="input-group-btn">
          <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="{{ url('examples/login') }}">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    <strong>Copyright &copy; 2018 <a href="http://lstarter.softpalms.com">Softpalms Systems</a>.</strong> All rights
    reserved.
  </div>
</div>
<!-- /.center -->


<!-- jQuery 3 -->
<script src="<?php echo asset('bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo asset('bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

</body>
</html>
