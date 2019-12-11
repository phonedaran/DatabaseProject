<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        if(isset($_SESSION['user'])){
            return redirect('/main/successs');
        }else{
            $products = Product::paginate(15);
            return view('products.productlist',['products' => $products ]);
        }
    }


    public function filter(){

        $products = Product::all();
        return view('products/filter', ['products' => $products ]);
    }



    public function add(){
        session_start();
        return view('products.addproduct');
    }

    public function addCheck(){

        //
        //
    }


}
