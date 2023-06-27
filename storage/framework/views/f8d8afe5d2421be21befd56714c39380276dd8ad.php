


<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>Veritas University | Student Login</title>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<!-- <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>"> -->

<style>



  .day-background {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url("<?php echo e(asset('/css/default-day.jpg')); ?>") center center no-repeat;
    background-size: cover;
      padding-top: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .night-background {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url("<?php echo e(asset('/css/default-night.jpg')); ?>") center center no-repeat;
    background-size: cover;
         padding-top: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .form-horizontal {
    background: #1a11117a;
    color: white;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
    padding-bottom: 40px;
    border-radius: 15px;
    text-align: center;
  }

  .form-horizontal .heading {
    display: block;
    font-size: 35px;
    font-weight: 700;
    padding: 35px 0;
    border-bottom: 2px solid #218c74;
    margin-bottom: 30px;
  }

  .form-horizontal .form-group {
    padding: 0 40px;
    margin: 0 0 25px 0;
    position: relative;
  }

  .form-horizontal .form-control {
    background: #f0f0f0;
    border: none;
    border-radius: 20px;
    box-shadow: none;
    padding: 0 20px 0 45px;
    height: 40px;
    transition: all 0.3s ease 0s;
  }

  .form-horizontal .form-control:focus {
    background: #e0e0e0;
    box-shadow: none;
    outline: 0 none;
  }

  .form-horizontal .form-group i {
    position: absolute;
    top: 12px;
    left: 60px;
    font-size: 17px;
    color: #c8c8c8;
    transition: all 0.5s ease 0s;
  }

  .form-horizontal .form-control:focus+i {
    color: #218c74;
  }

  .form-horizontal .fa-question-circle {
    display: inline-block;
    position: absolute;
    top: 12px;
    right: 60px;
    font-size: 20px;
    color: #218c74;
    transition: all 0.5s ease 0s;
  }

  .form-horizontal .fa-question-circle:hover {
    color: #000;
  }

  .form-horizontal .main-checkbox {
    float: left;
    width: 20px;
    height: 20px;
    background: #218c74;
    border-radius: 50%;
    position: relative;
    margin: 5px 0 0 5px;
    border: 1px solid #218c74;
  }

  .form-horizontal .main-checkbox label {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
  }

  .form-horizontal .main-checkbox label:after {
    content: "";
    width: 10px;
    height: 5px;
    position: absolute;
    top: 5px;
    left: 4px;
    border: 3px solid #fff;
    border-top: none;
    border-right: none;
    background: transparent;
    opacity: 0;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }

  .form-horizontal .main-checkbox input[type=checkbox] {
    visibility: hidden;
  }

  .form-horizontal .main-checkbox input[type=checkbox]:checked+label:after {
    opacity: 1;
  }

  .form-horizontal .text {
    float: left;
    margin-left: 7px;
    line-height: 20px;
    padding-top: 5px;
    text-transform: capitalize;
  }

  .form-horizontal .btn {
    float: right;
    font-size: 14px;
    color: #fff;
    background: #218c74;
    border-radius: 30px;
    padding: 10px 25px;
    border: none;
    text-transform: capitalize;
    transition: all 0.5s ease 0s;
  }

  @media only screen and (max-width: 479px) {

    .form-horizontal .form-horizontal .form-horizontal .form-group {
      padding: 0 25px;
    }

    .form-horizontal .form-group i {
      left: 45px;
    }

    .form-horizontal .btn {
      padding: 10px 20px;
    }

  }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body onload="setBackground()" class="<?php echo e((date('H') >= 6 && date('H') < 12) ? 'day-background' : 'night-background'); ?>">

    <div class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">
          <form class="form-horizontal" method="POST" action="<?php echo e(route('student.login.submit')); ?>">
            <?php echo csrf_field(); ?>
            <span class="heading">Students Login</span>
            <div class="form-group">
              <label for="text-start">Username</label>
              <input id="email" type="email" placeholder="Username" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
              <span class="invalid-feedback"> <strong><?php echo e($errors->first('email')); ?></strong> </span>
              <?php endif; ?>
              <!-- <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input id="password" type="password" placeholder="Password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
              <?php if($errors->has('password')): ?>
              <span class="invalid-feedback"><strong><?php echo e($errors->first('password')); ?></strong></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <div class="main-checkbox">
                <input type="checkbox" value="None" id="checkbox1" name="check">
                <label for="checkbox1"></label>
              </div>
              <span class="text">Remember me</span>
              <button type="submit" class="btn btn-primary"> <?php echo e(__('Login')); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>

</body>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
<!-- iCheck -->
<!-- <script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script> -->

<script>
function setBackground() {
    var now = new Date();
    var hour = now.getHours();

    var body = document.querySelector('body');
    if (hour >= 6 && hour < 16) {
        body.classList.add('day-background');
        body.classList.remove('night-background');
    } else {
        body.classList.add('night-background');
        body.classList.remove('day-background');
    }
}
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/students/auth/login.blade.php ENDPATH**/ ?>