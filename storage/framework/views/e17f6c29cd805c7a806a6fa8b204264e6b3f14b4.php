<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo e(URL::asset('loginFrom\Login_v15\images\icons\favicon.ico')); ?>"/> 
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\bootstrap\css\._bootstrap.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\fonts\font-awesome-4.7.0\css\._font-awesome.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\fonts\Linearicons-Free-v1.0.0\._icon-font.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\animate\animate.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\css-hamburgers\hamburgers.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\animsition\css\animsition.min.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\select2\select2.min.css')); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\vendor\daterangepicker\daterangepicker.css')); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\css\util.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('loginFrom\Login_v15\css\main.css')); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Log-in
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\jquery\jquery-3.2.1.min.js"></script> 
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\animsition\js\animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\bootstrap\js\popper.js"></script>
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\bootstrap\js\popper.min.js"></script>
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\select2\select2.min.js"></script>
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\daterangepicker\moment.min.js"></script>
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\daterangepicker\daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\vendor\countdowntime\countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="C:\xampp\htdocs\DatabaseProject\public\loginFrom\Login_v15\js\main.js"></script>

</body>
</html><?php /**PATH C:\xampp1\htdocs\DatabaseProject\resources\views/login.blade.php ENDPATH**/ ?>