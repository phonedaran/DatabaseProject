<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <title>Order Details</title>

    <style>
        .error {color: #FF0000;}
    </style>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/product/">
    <script src="../resources/js/jquery-3.4.1.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>


<body>
    <!-- header -->
        <div class="text-white bg-dark">
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a class="text-muted" href="#"></a>
                    </div>
                    <div class="col-4 text-center">
                        <h1 class="display-4">K I K K O K</h1>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                        </a>
                        <a class="btn btn-sm btn-outline-danger" href="<?php echo e(url('/login')); ?>">Log in</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2 d-none d-md-inline-block"></a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"  style="color:dark blue">
                <?php
                    $Fname = $_SESSION['Fname'];
                    $Lname = $_SESSION['Lname'];
                    $jobTitle = $_SESSION['job'];
                ?>
                    <b><?php echo e($Fname); ?> &nbsp <?php echo e($Lname); ?></b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo e(url('main/customer')); ?>">Customer</a>
                <?php if($jobTitle != 'Sales Rep'): ?>
                    <a class="dropdown-item" href=" <?php echo e(url('/main/employee')); ?>">Employee</a>
                <?php endif; ?>
                <?php if($jobTitle == 'Sales Rep'): ?>
                    <a class="dropdown-item" href=" <?php echo e(url('/keyOrder')); ?>">Key Order</a>
                <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo e(url('/orderlist')); ?>">Order list</a>
                <?php if($jobTitle == 'VP Marketing'): ?>
                    <a class="dropdown-item" href="<?php echo e(url('/promotion')); ?>">Promotion</a>
                <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo e(url('/main/logout')); ?>">Log out</a>
            </div>
        </div>
    </nav>
    <!-- header -->


    <!-- show order detail -->
    <div class="container">
        <strong><h3>ORDER NUMBER : <?php echo e($orderNumber); ?> </h3></strong>
        <h5>Total Amount : <?php echo e($total); ?></h5>
        <h5>Total Points : <?php echo e($point); ?></h5>

        <table class="table" width="100%">
            <thead>
                <tr>
                    <th scope="col" >ProductCode</th>
                    <th scope="col" >Quantity</th>
                    <th scope="col" >PriceEach</th>
                    <th scope="col" >Asmount</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td schop="row"><?php echo e($orderdetail->productCode); ?></td>
                        <td schop="row"><?php echo e($orderdetail->quantityOrdered); ?></td>
                        <td schop="row"><?php echo e($orderdetail->priceEach); ?></td>
                        <td schop="row"><?php echo e($orderdetail->amount); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- show order detail -->


<!-- end -->
    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap?
                <a href="https://getbootstrap.com/">Visit the homepage</a> or read our
                <a href="/docs/4.3/getting-started/introduction/">getting started guide</a>.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- end -->
</body>
</html>
<?php /**PATH C:\xampp\htdocs\DatabaseProject\resources\views/orders/detail.blade.php ENDPATH**/ ?>