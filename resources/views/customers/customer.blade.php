<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Customer</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/product/">


    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <link href="forcreate.css" rel="stylesheet">

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
                        <a class="text-muted" href="#"></a>
                    </div>
                </div>
            </header>
        </div>
    </div>
  
    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
        <?php
            $jobTitle = $_SESSION['job'];
        ?>
            @if($jobTitle == 'Sales Rep')
                <a class="py-2 d-none d-md-inline-block" href="{{ url('main/customer/add') }}">
                    <button type="button" class="btn btn-outline-success"><strong>+ ADD</strong></button>
                </a>
            @else
                <a class="py-2 d-none d-md-inline-block" href="#"></a>
            @endif
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"  style="color:dark blue">
                <?php
                    $Fname = $_SESSION['Fname'];
                    $Lname = $_SESSION['Lname'];
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
    </nav>


    <main role="main">
        <div class="container col-md-9">
            <div class="container col-md-9">
                <div style="text-align :center;">
                    <h2>CUSTOMER LISTS</h2>
                </div>
                <br>

                @foreach ($customers as $cus)
                    <form action="customer/view" method="get">
                        <input type="hidden" value={{$cus->customerNumber}} name="number">
                        <button class="btn btn-lg btn-secondary btn-block col-md-14" type="submit">
                            <div class="row"><div class="col-md-10" style="text-align :left;">
                                <h3> {{$cus->customerName}}</h3>
                            </div>
                            <div class="col" style="text-align :right;">
                                <h3>{{$cus->point}}</h3>
                            </div>
                        </button>
                    </form>
                <div class="mb-2" ></div>

                @endforeach
                <br>
                {{ $customers->links() }}
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