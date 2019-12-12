<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ViewController extends Controller
{
    function index(){
        session_start();
        $products = Product::all();
        return view('products.productdetail', ['products'=>$products]);
    }

}
