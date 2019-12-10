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
                        <a class="btn btn-sm btn-outline-danger" href="{{ url('/login') }}">Log in</a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <main role="main">
        <!--Filter-->

        <?php
            $type = $_GET['type'];
            $scale = $_GET['scale'];
            $vendor = $_GET['vendor'];
            $filterType = true;
            $filterScale = true;
            $filterVendor = true;
            $resultFilter = array();
            $count = 0;
            $jsonDecode= json_Decode($products,true);
            foreach ($jsonDecode as $result) {
                //type check
                if($result['productLine'] == $type){
                    $filterType = true;
                }elseif($type == 'Any') {
                    $filterType = true;
                }else{
                    $filterType = false;
                }
                //scale check
                if($result['productScale'] == $scale){
                    $filterScale = true;
                }elseif($scale == 'Any') {
                    $filterScale = true;
                }else{
                    $filterScale = false;
                }
                //vendor check
                if($result['productVendor'] == $vendor){
                    $filterVendor = true;
                }elseif ($vendor == 'Any') {
                    $filterVendor = true;
                }else{
                    $filterVendor = false;
                }
                //result
                if($filterType=='1' && $filterScale=='1' && $filterVendor=='1'){
                    array_push($resultFilter, $result['productCode']);
                    $count++; //count number result
                }
            }
        ?>

        <div class="container">
            <div class="col-md-6 px-0">
                <!--Button-->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <form action="productlist/filter" method="get">
                        <br>
                            <!--Type-->
                            <div class="list-group">
                                <?php
                                    if($type !== 'Any'){
                                        echo "<h3>Type : ".$type."</h3>";
                                    }
                                ?>
                            </div>

                            <!--Scale-->
                            <div class="list-group">
                                <?php
                                    if($scale !== 'Any'){
                                        echo "<h3>Scale : ".$scale."</h3>";
                                    }
                                ?>
                            </div>

                            <!--Vendor-->
                            <div class="list-group">
                                <?php
                                    if($vendor !== 'Any'){
                                        echo "<h3>Vendor : ".$vendor."</h3>";
                                    }
                                ?>
                            </div>
                            <h2>Result have <?php echo $count ?> products. </h2>

                            <button type="button" class="btn btn-sm btn-outline-secondary" >
                                <a href="{{ url('/') }}">Clear</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    @foreach ( $resultFilter as $key)
                        @foreach ($products as $product )
                            @if ($product->productCode == $key)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm">
                                    <div class="scrollbar  scrollbar-gray ">
                                    <div class="force-overflow">
                                        <img src="../images/product/<?php echo str_replace('/', '',str_replace(':', '', str_replace("'", '', $product->productName))); ?>.jpg"
                                            onerror="this.src='../images/not.png'" width="100%" height="100%"  />
                                        <div class="card-body">
                                            <h3>{{$product->productName}}</h3>
                                            <tr>
                                                <td>Stock : {{$product->quantityInStock}}</td>
                                                <br>
                                                <td>Pirce : {{$product->buyPrice}}</td>
                                                <br>
                                                <td>Type : {{$product->productLine}}</td>
                                                <br>
                                                <td>Scale : {{$product->productScale}}</td>
                                                <br>
                                                <td>Vendor : {{$product->productVendor}}</td>
                                            </tr>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <form action="../productlist/view" method="get">
                                                            <input type="hidden" value={{$product->productCode}} name="code">
                                                            <input type="submit" class="btn btn-sm btn-outline-secondary" name="view" value="View" >
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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
