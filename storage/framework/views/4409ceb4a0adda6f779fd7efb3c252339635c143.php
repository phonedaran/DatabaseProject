<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>SuccessProductlist</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/product/">
    <link rel="icon" type="image/png" href="<?php echo e(URL::asset('loginFrom\Login_v15\images\icons\favicon.ico')); ?>"/>

    <!-- Bootstrap core js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
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
                    
                    </div>
                    <div>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            
            <a class="py-2 d-none d-md-inline-block" href="<?php echo e(url('/main/addemployee')); ?>">
                <button type="button" class="btn btn-outline-success"><strong>+ ADD</strong></button>
            </a>
            <a class="py-2 d-none d-md-inline-block">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"  style="color:dark blue">
                   A 
            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Customer</a>
                    <a class="dropdown-item" href="<?php echo e(url('/main/employee')); ?>">Employee</a>
                    <a class="dropdown-item" href="#">Key Order</a>
                    <a class="dropdown-item" href="#">Order list</a>
                    <a class="dropdown-item" href="#">Promotion</a>
                    <a class="dropdown-item" href=" <?php echo e(url('/main/logout')); ?>">Log out</a>
                </div>
            </a>
        </div>
    </nav>



    <main role="main">
        
        <div class="album py-5 bg-light">
            <div class="container">
                <h4 class="display-5">EMPLOYEE</h4>
                <div>
                    <table class="table table-hover">
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <from action="productlist/view" method="post">
                            <tr class="table-secondary">                    
                                <th scope="row"><?php echo e($Emp->firstName); ?><input type="hidden" value=<?php echo e($Emp->firstName); ?> name="Fname"></th>
                                <th scope="row"><?php echo e($Emp->lastName); ?><input type="hidden" value=<?php echo e($Emp->lastName); ?> name="Lname"></th>
                                
                                <td><?php echo e($Emp->jobTitle); ?><input type="hidden" value=<?php echo e($Emp->jobTitle); ?> name="jobtype"></td>
                                <td>
                                    <input type="submit" class="btn btn-outline-primary" name="edit" value="EDIT"></button>
                                    <input type="submit" class="btn btn-outline-danger" name="fired" value="FIRED"></button>
                                </td>
                            </tr>
                        </from>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
                <br>
               
                
                
            </div>
        </div>

    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            
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
</body>

</html>
<?php /**PATH C:\xampp1\htdocs\DatabaseProject\resources\views/employees/employee.blade.php ENDPATH**/ ?>