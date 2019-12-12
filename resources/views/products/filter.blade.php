<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Productlist</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/product/">

    <script src="../resources/js/jquery-3.4.1.js"></script>


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

        .scrollbar {
            margin-left: 0px;
            float: left;
            height: 400px;
            background: #fff;
            overflow-y: scroll;
            margin-bottom: 0px;
        }
        .force-overflow {
            min-height: 300px;
        }

        .scrollbar-gray::-webkit-scrollbar {
            width: 5px;
            background-color: #F5F5F5;
        }

        .scrollbar-gray::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #A9A9A9;
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

                        @if(!isset($_SESSION['user']))
                            <a class="btn btn-sm btn-outline-danger" href="{{ url('/login') }}">Log in</a>

                        @endif
                    </div>
                </div>
            </div>
        </header>
    </div>

    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        @if(isset($_SESSION['user']))
            <div class="container d-flex flex-column flex-md-row justify-content-between">
                <a class="py-2 d-none d-md-inline-block"></a>
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"  style="color:dark blue">
                    <?php
                        $Fname = $_SESSION['Fname'];
                        $Lname = $_SESSION['Lname'];
                        $jobTitle = $_SESSION['job'];
                    ?>
                        <b>{{$Fname}} &nbsp {{$Lname}}</b>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('/main/success')}}">Product</a>
                    <a class="dropdown-item" href="{{url('main/customer')}}">Customer</a>
                    @if ($jobTitle != 'Sales Rep')
                        <a class="dropdown-item" href=" {{url('/main/employee')}}">Employee</a>
                    @endif
                    @if ($jobTitle == 'Sales Rep')
                        <a class="dropdown-item" href=" {{url('/keyOrder')}}">Key Order</a>
                        <a class="dropdown-item" href=" {{url('/payment')}}">Payment</a>
                    @endif
                    <a class="dropdown-item" href="{{url('/orderlist')}}">Order list</a>
                    @if ($jobTitle == 'VP Marketing')
                        <a class="dropdown-item" href="{{url('/promotion')}}">Promotion</a>
                    @endif
                    <a class="dropdown-item" href="{{ url('/main/logout') }}">Log out</a>
                </div>
            </div>
        @endif
    </nav>

    <main role="main">

        <div class="album py-5 bg-light">
            <div class="container">
            @if ($type != 'Any')
                <h3>Type : {{$type}}</h3>
            @endif
            @if ($scale != 'Any')
                <h3>Scale : {{$scale}}</h3>
            @endif
            @if ($vendor != 'Any')
                <h3>Vendor : {{$vendor}}</h3>
            @endif
            @if( $count > 0)
                <h3>Result have {{$count}} result</h3>
            @else
                <h3>Don't have any result</h3>
            @endif
                <button type="button" class="btn btn-sm btn-outline-secondary" >
                        <a href="{{ url('/') }}">Clear</a>
                    </button>
                <div class="row">
                        @foreach ($products as $product )
                        <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                <div class="scrollbar  scrollbar-gray">
                                <div class="force-overflow">
                                    <img src='../images/product/<?php echo str_replace('/', '', str_replace(':', '', $product->productName)); ?>.jpg'
                                        onerror="this.src='../images/not.png'" width="100%" height="100%"  />
                                    <div class="card-body">
                                        <h3>{{$product->productName}}</h3>
                                        <tr>
                                            <td>Stock : {{$product->quantityInStock}}</td>
                                            <br>
                                            <td>Pirce : {{$product->buyPrice}}</td>
                                            <br>
                                            <td>producLine : {{$product->productLine}}</td>
                                            <br>
                                            <td>Scale : {{$product->productScale}}</td>
                                            <br>
                                            <td>Vendor : {{$product->productVendor}}</td>
                                        </tr>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form action="../productlist/view" method="get">
                                                    <input type="hidden" value={{$product->productCode}} name="code">
                                                    <input type="submit" class="btn btn-outline-secondary" name="view" value="View" >
                                                </form>
                                                    <form method="get">
                                                        <input type="hidden" value={{$product->productCode}} name="code">
                                                        @if (isset($_SESSION['user']))
                                                            @if($_SESSION['job'] == 'VP Sales' or $_SESSION['job'] == 'Sales Rep')
                                                                <input type="button" class="btn btn-outline-danger" value="Delete" onClick="this.form.action='{{ URL::to('/product/delete') }}'; submit()">
                                                                <input type="button" class="btn btn-outline-primary" value="Update" onClick="this.form.action='{{ URL::to('/UpdatePd') }}'; submit()">
                                                            @endif
                                                        @endif
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
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
</body>

</html>
