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
	<link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="text-white bg-dark">
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="display-4">K I K K O K</h1>
                    </div>
                </div>
			</header>
		</div>
    </div>
	<nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <!-- <a class="py-2" href="#" style="color:black">
                <img src="images/star-icon.png" width="35" height="35" alt="l">
            </a> -->
            
            <a class="py-2 d-none d-md-inline-block" style="color:black" href="<?php echo e(url('/')); ?>">Product</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">Features</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">Enterprise</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">Support</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">Pricing</a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">
                <!-- <li class="nav-item dropdown"> -->
                <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div> -->
                <!-- </li>  -->
            </a>
        </div>
    </nav>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1">
						Log-in
					</span>
				</div>

				<?php if(Session('warning')): ?>
				<div class="alert alert-danger alert-dismissable fade show" role="alert">
  					<!-- <?php echo e(Session::get('message')); ?> -->
					<strong>Please try again</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
 					</button>
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