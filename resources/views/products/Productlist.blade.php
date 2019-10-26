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
                        <a class="text-muted" href="#">
                    <!-- <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                        </a>
                        <a class="btn btn-sm btn-outline-danger" href="{{ url('/login') }}">Log in</a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#" style="color:black"></a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black">Product</a>
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
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Classic Plastic model SHOP</h1>
                <p class="lead my-3">A little shop but not a little things</p>
            </div>
        </div>
    </div>

    <main role="main">
        <div class="container">
            <div class="col-md-3 px-0">
                <!--Button-->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <form action="productlist/filter" method="get">
                            <h2>Product Filter</h2>
                            <!--Type-->
                            <div class="list-group">
                                <h3>Type</h3>
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

                            <!--Scale-->
                            <div class="list-group">
                                <h3>Scale</h3>
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

                            <!--Vendor-->
                            <div class="list-group">
                                <h3>vendor</h3>
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
                            <input type="submit" class="btn btn-sm btn-outline-secondary" name="view" value="Filter" >
                        </form>



                    </div>
                </div>
            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    @foreach ($products as $product )
                    <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <img src='images/product/<?php echo str_replace('/', '', str_replace(':', '', $product->productName)); ?>.jpg'
                                    onerror="this.src='images/not.png'" width="100%" height="100%"  />
                                <div class="card-body">
                                    <h3>{{$product->productName}}</h3>
                                    <tr>
                                        <td>Stock : {{$product->quantityInStock}}</td>
                                        <br>
                                        <td>Pirce : {{$product->buyPrice}}</td>
                                        <br>
                                        <td>producLine(type?) : {{$product->productLine}}</td>
                                        <br>
                                        <td>Scale : {{$product->productScale}}</td>
                                        <br>
                                        <td>Vendor : {{$product->productVendor}}</td>
                                    </tr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <form action="productlist/view" method="get">
                                                    <input type="hidden" value={{$product->productCode}} name="code">
                                                    <input type="submit" class="btn btn-sm btn-outline-secondary" name="view" value="View" >
                                            </form>

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
