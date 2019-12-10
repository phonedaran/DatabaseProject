<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){

        $products = Product::paginate(15);

        return view('products.productlist',['products' => $products ]);

    }


    public function filter(){

        $products = Product::all();
        return view('products/filter', ['products' => $products ]);
    }


}
