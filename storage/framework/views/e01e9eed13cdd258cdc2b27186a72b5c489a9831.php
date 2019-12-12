<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <title>Create Promotion</title>

    <style>
        .error {color: #FF0000;}
        fieldset {
            display: none;
            overflow: hidden;
        }
        fieldset:target {
            display: block;
        }
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
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
              <a class="py-2 d-none d-md-inline-block"></a>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color:dark blue">
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
              </a>
            </a>
          </div>
        </nav>
    <!-- header -->

    <!-- alert  -->
    <?php if(\Session::has('null')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Try again!</strong> Please complete all required fields.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(\Session::has('warning')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Try again!</strong> The discount code is already in use.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(\Session::has('discount')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Discount promotion created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(\Session::has('used')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Try again!</strong> The product code is already in promotion.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(\Session::has('buy1get1')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Buy1Get1 promotion created.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- alert  -->

    <!-- create promotion -->
    <div class="container">
        <strong><h2>CREATE PROMOTION</h2></strong>
        <form method="get">
        <div class="alert alert-primary">Choose types of promotion &nbsp;
            <a class="btn btn-primary" href="#one" role="button" >Discount</a>
            <a class="btn btn-primary" href="#two" role="button" >Buy1Get1</a></div>
            <p><span class="error">* required field</span></p>
                <fieldset id="one">
                    <div class="form-group">
                        <label>Discount Code</label> <span class="error">*</span>
                        <input type="text" maxlength="6" id="discountCode" name="discountCode" class="form-control" placeholder="Enter Discount Code">
                    </div>
                    <div class="form-group">
                        <label>Amount</label> <span class="error">*</span>
                        <input type="number" id="damount" name="damount" class="form-control" min=0>
                    </div>
                    <div class="form-group">
                        <label>Times</label> <span class="error">*</span>
                        <input type="number" id="dtimes" name="dtimes" class="form-control" min=0>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label> <span class="error">*</span>
                        <input type="date" id="dstartDate" name="dstartDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Expiry date</label> <span class="error">*</span>
                        <input type="date" id="dexp" name="dexp" class="form-control">
                    </div>
                    <input type="button" class="btn btn-outline-success" value="Save" onClick="this.form.action='<?php echo e(URL::to('/promotion/checkDiscount')); ?>'; submit()">
                </fieldset>

                <fieldset id="two">
                    <div class="form-group">
                        <label>Product</label> <span class="error">*</span>
                            <select class="form-control" id="productCode" name="productCode">
                                <option selected>Choose ...</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->productCode); ?>">Code : <?php echo e($product->productCode); ?> , Name : <?php echo e($product->productName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label> <span class="error">*</span>
                        <input type="date" name="startDate" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Expiry date</label> <span class="error">*</span>
                        <input type="date" name="exp" class="form-control">
                    </div>
                    <input type="button" class="btn btn-outline-success" value="Save" onClick="this.form.action='<?php echo e(URL::to('/promotion/checkBuy1Get1')); ?>'; submit()">
                </fieldset>

        </form>
    </div>
    <!-- create promotion -->

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
<?php /**PATH C:\xampp\htdocs\DatabaseProject\resources\views/promotion.blade.php ENDPATH**/ ?>