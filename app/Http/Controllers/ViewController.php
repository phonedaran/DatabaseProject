<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ViewController extends Controller
{
    function index(){

        $products = Product::all();
        return view('products.productdetail', ['products'=>$products]);
    }

}
