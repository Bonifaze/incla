<?php $__env->startSection('pagetitle'); ?>
<!-- CSRF Token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>Veritas University | Applicant Login</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/square/blue.css')); ?>"> -->

<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("<?php echo e(asset('/css/default.jpg')); ?>") center center no-repeat;
        background-size: cover;
        padding-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-form {
        background: rgba(219, 219, 219, 0.6);
        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px 0px inset;
        padding: 70px;
        border-radius: 20px;
        color: white;
    }

    .login-heading {
        text-align: center;
        margin: 20px;
        color: #fff;
        font-size: 2.5em;
        text-transform: uppercase;
        font-weight: 600;
    }

    .link-text {
        margin-bottom: 10px;
        color: #fff;
        font-size: 1.2em;
        font-weight: 400;
    }

    .active-link {
        font-weight: 500;
        text-decoration: underline;
    }

    label {
        font-weight: 500;
    }

    @media only screen and (max-width: 480px) {
        body {
            font-size: 20px;
            padding-top: 90px;
        }

    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<body>
    <div class="container">
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Thank you for applying veritas
                            University Abuja.</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-danger"><strong> Accomodation into Pa-Etos hostel, Male HOTEL L and
                                Male HOSTEL K are currently unavaliable </strong></div> <br>
                        <p>
                            For inquiries kindly contact the listed numbers below:<br>

                            Rev. Fr. Dr. Richard Gokum
                            Ag. Chairman, Admissions
                            08069536843<br>

                            Iliya cephas barde
                            Admissions officer
                            07086858143<br>

                            Adidi, Timothy Dokpesi
                            Marketing officer
                            08138605055<br>

                            Ezimmuo, Martha
                            Bursary officer
                            09021727363<br>
                            <br>

                            Thanks
                        </p>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 offset-md-2 d-flex aligns-items-center justify-content-center">
                <div class="login-form">
                    <div class="login-heading">
                        <p>APPLICANT Login</p>
                    </div>
                    <form method="POST" action="/login">
                        <?php if(session('signUpMsg')): ?>
                        <?php echo session('signUpMsg'); ?>

                        <?php endif; ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input id="email" type="email" placeholder="Email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback"> <strong><?php echo e($errors->first('email')); ?></strong> </span>
                            <?php endif; ?>
                            <!-- <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" placeholder="Password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required>
                            <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback"><strong><?php echo e($errors->first('password')); ?></strong></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label" for="exampleCheck1">
                                <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <?php echo e(__('Remember Me')); ?>

                            </label>
                        </div>

                        <?php if(session('loginMsg')): ?>
                        <?php echo session('loginMsg'); ?>

                        <?php endif; ?>
                        <button type="submit" class="btn btn-success"> <?php echo e(__('Login')); ?></button>
                        <br>
                        <br>

                        <p class="link-text"><a href="/register" class="text-success active-link">Click Here </a> if you do not have an account</p>
                        <p class="link-text"> Forgot password ?<a href="/forgotpassword" class="text-danger active-link"> Click here</a> to reset </p>
                        <p class="link-text"> <a href="https://tawk.to/chat/6452e8b94247f20fefef3648/1gvhtq6f7" class=" active-link text-success">Chat with us</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('pagescript'); ?>
    <!-- iCheck -->
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        myModal.show()
    </script>

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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/admissions/login.blade.php ENDPATH**/ ?>