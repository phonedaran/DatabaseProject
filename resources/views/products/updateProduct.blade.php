<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>updateProduct</title>
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
            </div>
        </header>
    </div>



    @if (\Session::has('null'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Try again!</strong> Please complete all fields.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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

<!-- action="{{ URL::to('/employee/edit/check') }}" -->
    <div class="container col-md-9">
    <form method="get" >
    <h3>Add Stock</h3>
    <div class="col-md-4 mb-5">
        <input class="form-control" type="text" name=add ><br>
    </div>
    <label for="name"><h3>Update Product</h3></label>
    <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Code</th>
      <td><input type="hidden"  name="code" value="{{$code}}">{{$code}}</td>
    </tr>

    <tr>
      <th scope="row">Name</th>
      <td><textarea rows="1" style="width:100%"  name=name value={{$name}}>{{$name}}</textarea></td>
    </tr>

    <tr>
      <th scope="row">Product Line</th>
      <td><input type="hidden"  name="line" value="{{$line}}">{{$line}}</td>
    </tr>

    <tr>
      <th scope="row">Scale</th>
      <td>
      <select class="custom-select" name=scale value={{$scale}} >
              <option selected>{{$scale}}</option>
              <option value="1:10">1:10</option>
              <option value="1:12">1:12</option>
              <option value="1:18">1:18</option>
              <option value="1:24">1:24</option>
              <option value="1:32">1:32</option>
              <option value="1:50">1:50</option>
              <option value="1:72">1:72</option>
              <option value="1:100">1:100</option>
            </select>
      </td>
    </tr>

    <tr>
      <th scope="row">Vendor</th>
      <td><textarea rows="1" style="width:100%" name=vendor value={{$vendor}}>{{$vendor}}</textarea></td>
    </tr>

    <tr>
      <th scope="row">Description</th>
      <td><textarea rows="3" style="width:100%"  name=des value={{$des}}>{{$des}}</textarea>
    </tr>

    <tr>
      <th scope="row">Quantity In Stock</th>
      <td><input type="hidden"  name="instock" value="{{$stock}}">{{$stock}}</td>
    </tr>

    <tr>
      <th scope="row">Buy Prise</th>
      <td><input type="text"  name="price" value="{{$price}}"></td>
    </tr>

    <tr>
    <td></td>
    <td schop="row" style="text-align : right;">
    <input type="hidden"  name="code" value="{{$code}}" ><button class="btn btn-outline-primary" onClick="this.form.action='{{ URL::to('/UpdatePd/check') }}'; submit()" > Save </button>
    <input type="button" class="btn btn-outline-danger" value="Cancle" onClick="this.form.action='{{ URL::to('/UpdatePd') }}'; submit()">
    </td>
    </tr>

  </tbody>
</table>

</form>
</div>


    </main>
<br>
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
