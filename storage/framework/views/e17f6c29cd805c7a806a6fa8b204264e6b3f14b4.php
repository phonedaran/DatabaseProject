<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo e(URL::asset('loginFrom\Login_v15\images\icons\favicon.ico')); ?>"/> 
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\bootstrap\css\._bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\fonts\font-awesome-4.7.0\css\._font-awesome.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\fonts\Linearicons-Free-v1.0.0\._icon-font.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\animate\animate.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\css-hamburgers\hamburgers.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\animsition\css\animsition.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\select2\select2.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\daterangepicker\daterangepicker.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\css\util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\css\main.css')); ?>">

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1">
						Log-in
					</span>
				</div>

				<!-- <?php if(isset(Auth::user()->name)): ?>
					<script>window.location="/main/successlogin";</script>
				<?php endif; ?>-->

				<!-- <?php if($massage = Session::get('error')): ?>
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong><?php echo e($massage); ?></strong>
					</div>
				<?php endif; ?> -->

				<?php if(count($errors) > 0): ?>
					<div class="alert alert-danger">
						<ul>
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				<?php endif; ?>	
				<!-- <?php echo e(csrf_field()); ?>  -->
				<form class="login100-form validate-form" method="POST" action="<?php echo e(URL::to('/main/checklogin')); ?>">
					<?php echo csrf_field(); ?>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Uername</span>
						<input class="input100" type="text" name="name" placeholder="Enter Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" value="Login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\jquery\jquery-3.2.1.min.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\animsition\js\animsition.min.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\bootstrap\js\popper.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\bootstrap\js\popper.min.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\select2\select2.min.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\daterangepicker\moment.min.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\daterangepicker\daterangepicker.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\vendor\countdowntime\countdowntime.js')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('loginFrom\Login_v15\js\main.js')); ?>">
	
</body>
</html><?php /**PATH C:\xampp1\htdocs\DatabaseProject\resources\views/login.blade.php ENDPATH**/ ?>