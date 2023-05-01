<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link rel="shortcut icon" href="<?php echo e(asset('img/letter_logo.png')); ?>" >

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Veritas University Admissions Portal</title>

    <style>
        @media (min-width:320px) {
            body {
                height: 100vh;
                padding: 1rem;
                margin-bottom: 4rem;
            }
        }


        @media (min-width:961px) {
            body {
                margin-bottom: 29rem;
            }
        }
    </style>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo e(asset('fonts/material-icon/css/material-design-iconic-font.min.css')); ?>">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>

<body style="background-image: url('https://securitybrief.com.au/uploads/story/2022/06/01/GettyImages-1313285963.webp'); background-size: cover; background-position: center;">
    <div class="main">
        <div class=" signup">
            <div class="container">

                <div class="signup-content">
                    <form method="POST" action="/rbac/otpresetpin">
                        <?php echo csrf_field(); ?>
                        <h2 class="form-title text-success">Reset Pin</h2>
                        <?php if(session('signUpMsg')): ?>
                        <?php echo session('signUpMsg'); ?>

                        <?php endif; ?>

  <input type="hidden" name="staff_id" value="<?php echo e(auth()->user()->id); ?>"></input>
                        <div class="form-group">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="pin" required placeholder="New Password" autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="pin_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                        </div>
                 <button type="submit" class=" btn text-white fw-bold bg-success bg-gradient mb-3 px-5">
                                    <?php echo e(__('Reset')); ?>

                                </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views/rbac/forgotpasswordSetNew.blade.php ENDPATH**/ ?>