
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Detail</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/product/">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
</head>

<body>
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
                            <?php if(!isset($_SESSION['user'])): ?>
                                <a class="btn btn-sm btn-outline-danger" href="<?php echo e(url('/login')); ?>">Log in</a>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </header>
    </div>
    <nav>
        <?php if(isset($_SESSION['user'])): ?>
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
                    <a class="dropdown-item" href="<?php echo e(url('/main/success')); ?>">Product</a>
                    <a class="dropdown-item" href="<?php echo e(url('main/customer')); ?>">Customer</a>
                    <?php if($jobTitle != 'Sales Rep'): ?>
                        <a class="dropdown-item" href=" <?php echo e(url('/main/employee')); ?>">Employee</a>
                    <?php endif; ?>
                    <?php if($jobTitle == 'Sales Rep'): ?>
                        <a class="dropdown-item" href=" <?php echo e(url('/keyOrder')); ?>">Key Order</a>
                        <a class="dropdown-item" href=" <?php echo e(url('/payment')); ?>">Payment</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo e(url('/orderlist')); ?>">Order list</a>
                    <?php if($jobTitle == 'VP Marketing'): ?>
                        <a class="dropdown-item" href="<?php echo e(url('/promotion')); ?>">Promotion</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo e(url('/main/logout')); ?>">Log out</a>
                </div>
            </div>
        <?php endif; ?>

    </nav>


    <main role="main">
        <?php
            $code = $_GET['code'];
            $jsonDecode = json_Decode($products,true);
            foreach ($jsonDecode as $result) {
                if($result['productCode'] == $code){
                    $name = $result['productName'];
                    $line = $result['productLine'];
                    $scale = $result['productScale'];
                    $vendor = $result['productVendor'];
                    $des = $result['productDescription'];
                    $stock = $result['quantityInStock'];
                    $price = $result['buyPrice'];
                }
            }
        ?>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-6 shadow-sm">
                            

                            <img src='../images/product/<?php echo str_replace('/', '', str_replace(':', '', $name)); ?>.jpg'
                            onerror="this.src='../images/not.png'" width="100%" height="100%"  />

                            <div class="card-body">
                            <h4 class="card-text"><?php echo e($name); ?><h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="card-body">
                                <p class="card-text"><?php echo e($des); ?>

                                </p>
                                <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button class="w3-button w3-red" input type='button' onclick="del('qtyTotal',<?php echo e($price); ?>)" value='-'>-</button>
                                    <input id="qtyTotal" type='text' value="1"/>
                                    <button class="w3-button w3-black" input type='button' onclick="add('qtyTotal',<?php echo e($price); ?>)" value='+'>+</button>
                                </div>
                            </div>
                            <br>
                            <h4>price :
                                    <input id="priceTotal" type='text' value="<?php echo e($price); ?>" size="9" readonly/>
                            </h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a href="#">Back to top</a>
                </p>
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

    <script>
        function add(id,p) {
            let x = Number(document.getElementById('qtyTotal').value);
            let result = x + 1;
            let price = result*p
            document.getElementById('qtyTotal').value = result;
            document.getElementById('priceTotal').value = price.toFixed(2);
        }
        function del(id, p) {
            let x = Number(document.getElementById('qtyTotal').value);
            let result = x - 1;
            let price = result*p
            if(result < 0){
                document.getElementById('qtyTotal').value = 0;
                document.getElementById('priceTotal').value = 0;
            }else{
                document.getElementById('qtyTotal').value = result;
                document.getElementById('priceTotal').value = price.toFixed(2);
            }
        }
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\DatabaseProject\resources\views/products/productdetail.blade.php ENDPATH**/ ?>