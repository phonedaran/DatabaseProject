<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class FilterController extends Controller
{
    //
    public function filter(){

        $products = Product::all();
        return view('products/filter', ['products' => $products ]);
    }
}
