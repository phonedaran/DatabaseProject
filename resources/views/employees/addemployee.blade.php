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
                        <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                        </a>
                        <!-- <a><span class="fas fa-user" style=" color: aliceblue"></span></a> -->
                    </div>
                </div>
            </header>
        </div>
    </div>

    <nav class="site-header sticky-top py-1" style="background-color:white ; border-top-color:black;">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
            <a class="py-2 d-none d-md-inline-block" href="#" style="color:black"></a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"  style="color:black">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('main/customer') }}">Customer</a>
                    <a class="dropdown-item" href="#">Employee</a>
                    <a class="dropdown-item" href="#">Key Order</a>
                    <a class="dropdown-item" href="#">Order list</a>
                    <a class="dropdown-item" href="#">Promotion</a>
                    <a class="dropdown-item" href="{{ url('/main/logout') }}">Log out</a>
                </div>
        </div>
    </nav>
        <!-- after field -->

    <main role="main" style="background-color:SlateGray;"><br>
    <div class="container col-md-8 bg-white " >
    <br>
    <div class="col-md-12 ">
      <h4 class="mb-5" style="text-align:center;">Add Employee</h4>

      <form class="needs-validation" novalidate action="{{ URL::to('/employee/add/check') }} ">

          <div class="mb-3">
            <input type="text" name=Enumber class="form-control" id="Enumber" placeholder="Employee Number" required>
            <div class="invalid-feedback">
              Please enter Employee Number.
            </div>
          </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <input type="text" name=FName class="form-control" id="firstName" placeholder="First Name" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <input type="text" name=LName class="form-control" id="lastName" placeholder="Last Name" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <input type="text" name=mail class="form-control" id="mail" placeholder="E-mail" required>
          <div class="invalid-feedback">
            Please enter E-mail.
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <input type="text" name=extension class="form-control" id="extension" placeholder="Extension" value="" required>
            <div class="invalid-feedback">
            Please enter Extension.
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <input type="phone" name=officeCode class="form-control" id="officeCode" placeholder="OfficeCode" value="" required>
            <div class="invalid-feedback">
            Please enter OfficeCode.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <input type="text" name=reportsTo class="form-control" id="reportsTo" placeholder="Reports To" required>
            <div class="invalid-feedback">
              Reports To required.
            </div>
          </div>
        </div>

        <div class="mb-3">
            <input type="text" name=jobTitle class="form-control" id="jobTitle" placeholder="Job Title" required>
            <div class="invalid-feedback">
              Please enter Job Title.
            </div>
          </div>
        </div>

        <hr class="mb-5" >
        <button class="btn btn-outline-success btn-lg btn-block" type="submit">Submit</button>
        <br>
      </form>
    </div>
  </div>

    </div>

       <br>
    </main>

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
