<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>" >

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Institute of Consecrated Life in Africa (InCLA) Admissions Portal</title>

    <style>
        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
            }
        }

        @media (min-width:961px) {
            body {
                margin-bottom: 14rem;
            }
        }
    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('fonts/material-icon/css/material-design-iconic-font.min.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body style="background-image: url('img/incla-block.jpg');opacity: 0.9;">
    <div class="main">
        <div class="signup">


            <div class="container">
                <div class="signup-content">
  <?php if(session('signUpMsg')): ?>
            <?php echo session('signUpMsg'); ?>

            <?php endif; ?>
                    <form method="POST" action="/forgotpassword" id="signup-form">
                        <?php echo csrf_field(); ?>
                        <h2 class="form-title text-warning">Password Reset</h2>
                        <div class="form-group">

                            <div class="form-group">
                                <input id="email" type="email" class="form-input form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" required autocomplete="email" placeholder="Email Address" autofocus>


                            </div>
                        </div>




                        <div class="form-group">
                            <div class="form-group">


                                <button type="submit" class=" btn text-white fw-bold bg-warning bg-gradient mb-3 px-5">
                                    <?php echo e(__('Send Password Reset Link')); ?>

                                </button>





                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
<?php /**PATH /Users/lifeofrence/Downloads/inclaproject/incla/resources/views/admissions/forgotpassword.blade.php ENDPATH**/ ?>