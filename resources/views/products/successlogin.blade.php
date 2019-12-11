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
                        <a class="text-muted" href="#"></a>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <nav class="site-header sticky-top py-1" style="background-color:white ;">

            <form action="productlist/loginfilter" method="POST">
                <div class="container d-flex flex-column flex-md-row justify-content-between">
                    <a class="py-2 d-none d-md-inline-block" href="{{url('/product/add')}}">
                        <button type="button" class="btn btn-outline-success"><strong>+ ADD</strong></button>
                    </a>
                    <div class="py-2 d-none d-md-inline-block">
                        <a>Product Filter</a>
                    </div>
                    <div class="list-group py-2 d-none d-md-inline-block">
                        <a>Type : </a>
                            <select name="type">
                                <option value="Any">Any</option>
                                <option value="Classic Cars">Classic Cars</option>
                                <option value="Motorcycles">Motorcycles </option>
                                <option value="Planes">Planes</option>
                                <option value="Ships">Ships</option>
                                <option value="Trains">Trains</option>
                                <option value="Trucks and Buses">Trucks and Buses</option>
                                <option value="Vintage Cars">Vintage Cars</option>
                            </select>
                    </div>
                    <div class="list-group py-2 d-none d-md-inline-block">
                        <a>Scale : </a>
                            <select name="scale">
                                <option value="Any">Any </option>
                                <option value="1:10">1:10</option>
                                <option value="1:12">1:12</option>
                                <option value="1:18">1:18</option>
                                <option value="1:24">1:24</option>
                                <option value="1:32">1:32</option>
                                <option value="1:50">1:50</option>
                                <option value="1:72">1:72</option>
                                <option value="1:700">1:700</option>
                            </select>
                    </div>
                    <div class="list-group py-2 d-none d-md-inline-block">
                        <a>Vendor : <a>
                            <select name="vendor">
                                <option value="Any">Any </option>
                                <option value="Autoart Studio Design">Autoart Studio Design </option>
                                <option value="Carousel DieCast Legends">Carousel DieCast Legends </option>
                                <option value="Classic Metal Creations">Classic Metal Creations </option>
                                <option value="Exoto Designs">Exoto Designs </option>
                                <option value="Gearbox Collectibles">Gearbox Collectibles </option>
                                <option value="Highway 66 Mini Classics">Highway 66 Mini Classics </option>
                                <option value="Min Lin Diecast">Min Lin Diecast </option>
                                <option value="Motor City Art Classics">Motor City Art Classics </option>
                                <option value="Red Start Diecast">Red Start Diecast </option>
                                <option value="Second Gear Diecast">Second Gear Diecast </option>
                                <option value="Studio M Art Models">Studio M Art Models </option>
                                <option value="Unimax Art Galleries">Unimax Art Galleries </option>
                                <option value="Welly Diecast Productions">Welly Diecast Productions </option>
                            </select>
                    </div>
                    <div class="list-group py-2 d-none d-md-inline-block">
                        <input type="submit" class="btn btn-sm btn-outline-secondary" name="view" value="Filter" >
                    </div>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"  style="color:dark blue">
                            @foreach ($User as $user )
                                <b>{{$user->firstName}} &nbsp {{$user->lastName}}</b>
                            @endforeach
                        </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach ($User as $user )
                        <a class="dropdown-item" href="{{url('/main/success')}}">Product</a>
                        <a class="dropdown-item" href="{{url('/main/customer')}}">Customer</a>
                        @if ($user->jobTitle != 'Sales Rep')
                            <a class="dropdown-item" href=" {{url('/main/employee')}}">Employee</a>
                        @endif
                        @if ($user->jobTitle == 'Sales Rep')

                            <a class="dropdown-item" href=" {{url('/keyOrder')}}">Key Order</a>
                            <a class="dropdown-item" href=" {{url('/payment')}}">Payment</a>
                        @endif
                        <a class="dropdown-item" href="{{url('/orderlist')}}">Order list</a>
                        @if ($user->jobTitle == 'VP Marketing')
                            <a class="dropdown-item" href="{{url('/promotion')}}">Promotion</a>
                        @endif
                        <a class="dropdown-item" href="{{ url('/main/logout') }}">Log out</a>
                    @endforeach
                    </div>
                </div>
            </form>
    </nav>
    <!-- alert -->
    @if (\Session::has('paymentComplete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Completed!</strong> The payment successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (\Session::has('product'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Completed!</strong> The product created.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (\Session::has('del'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Completed!</strong> The product deleted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <!-- alert -->

    <main role="main">
        <?php
            foreach ($User as $user ){
                $_SESSION['Fname'] = $user->firstName;
                $_SESSION['Lname'] = $user->lastName;
                $Enumber = $user->employeeNumber;
                $_SESSION['job'] = $user->jobTitle;
            }
        ?>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach ($products as $product )
                    <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                            <div class="scrollbar  scrollbar-gray ">
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
                                            <form action="{{ URL::to('/productlist/detail') }}" method="get">
                                                <input type="hidden" value="{{$Enumber}}" name="user">
                                                <input type="hidden" value={{$product->productCode}} name="code">
                                                <input type="button" class="btn btn-outline-secondary" value="View" onClick="this.form.action='{{ URL::to('/productlist/view') }}'; submit()">
                                                <input type="button" class="btn btn-outline-danger" value="Delete" onClick="this.form.action='{{ URL::to('/product/delete') }}'; submit()">
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

                <br>
                    {{ $products->links() }}
            </div>
        </div>

    </main>

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
</body>

</html>
