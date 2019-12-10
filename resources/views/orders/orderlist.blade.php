<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order List</title>

    <style>
        .error {color: #FF0000;}
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {background-color:#f5f5f5;}

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

        .scrollbar-default::-webkit-scrollbar {
            width: 5px;
            background-color: #F5F5F5; 
        }

        .scrollbar-default::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #2BBBAD; 
        }

    </style>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                        <a class="text-muted" href="#"></a>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block"></a>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"  style="color:dark blue">
                <?php 
                    session_start();
                        $Fname = $_SESSION['Fname'];
                        $Lname = $_SESSION['Lname']; 
                ?>
                    <b>{{$Fname}} &nbsp {{$Lname}}</b>
                        
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/main/logout') }}">Log out</a>
            <!-- <a class="dropdown-item" href="{{ url('/main/logout') }}">Log out</a> -->
        </div>
        </div>
    </nav>
    <!-- header -->


    <!-- alert  -->
    @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> The order updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- alert  -->


    <!-- show order list -->
    <div class="container">
        <h2>ORDER LISTS</h2>
        
        <table class="table table-striped" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" >Order Number</th>
                    <th scope="col" >Customer Number</th>
                    <th scope="col" >Order Date</th>
                    <th scope="col" >Required Date</th>
                    <th scope="col" >Shipped Date</th>
                    <th scope="col" >Status</th>
                    <th scope="col" >Comments</th>
                    <th scope="col" ></th>
                    <th scope="col" ></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td schop="row">{{$order->orderNumber}}</td>
                    <td schop="row">{{$order->customerNumber}}</td>
                    <td schop="row">{{$order->orderDate}}</td>
                    <td schop="row">{{$order->requiredDate}}</td>
                    
                        <form method="get">
                            <div class="form-group">
                                <input type="hidden" id="orderNumber" name="orderNumber" value="{{$order->orderNumber}}">
                                <td schop="row"><input type="date" id="shippedDate" name="shippedDate" value="{{$order->shippedDate}}"></td>
                                <td schop="row">
                                    <select class="form-control" id="status" name="status">
                                        <option>{{$order->status}}</option>
                                        @foreach ($status as $value)
                                            @if($value != $order->status)
                                                <option>{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td> 
                                <td schop="row"><textarea rows="3"  id="comment" name="comment">{{$order->comments}}</textarea></td>
                                <td schop="row"><input type="button" class="btn btn-outline-success" value="Save" onClick="this.form.action='{{ URL::to('/orderlist/updateOrder') }}'; submit()">
                                <td schop="row"><input type="button" class="btn btn-outline-primary" value="More" onClick="this.form.action='{{ URL::to('/orderlist/detail') }}'; submit()"> 
                            </div>
                        </form>
                </tr>
                @endforeach  
            </tbody>
        </table>        
    </div>
    <br>
    <!-- show order list -->

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
