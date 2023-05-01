<?php $__env->startSection('pagetitle'); ?>
    Staff Assigned Roles
<?php $__env->stopSection(); ?>



<!-- Sidebar Links -->

<!-- Treeview -->
<?php $__env->startSection('staff-open'); ?>
    menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('staff'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- Page -->
<?php $__env->startSection('staff-home'); ?>
    active
<?php $__env->stopSection(); ?>

<!-- End Sidebar links -->



<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>OTP Authentication</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style>
		body {
			background-color: #000;
			color: #fff;
			font-family: 'Arial', sans-serif;
		}

		.container {
			padding-top: 50px;
			max-width: 600px;
			margin: auto;
		}

		h1 {
			font-size: 48px;
			margin-bottom: 30px;
		}

		form {
			border: 2px solid #fff;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
		}

		label {
			font-size: 24px;
			margin-bottom: 20px;
		}

		input[type="text"] {
			padding: 10px;
			font-size: 24px;
			background-color: transparent;
			border: none;
			border-bottom: 2px solid #fff;
			color: #fff;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			padding: 10px 20px;
			background-color: #fff;
			border: none;
			font-size: 24px;
			border-radius: 10px;
			color: #000;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>OTP Authentication</h1>
		<form action="/verify" method="post">
			<?php echo csrf_field(); ?>
			<label for="otp">Enter your OTP:</label>
			<input type="text" id="otp" name="otp" maxlength="6" autocomplete="off">
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pagescript'); ?>
    <script src="<?php echo asset('dist/js/bootbox.min.js'); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/lifeofrence/Documents/laraproject/resources/views//rbac/otp.blade.php ENDPATH**/ ?>