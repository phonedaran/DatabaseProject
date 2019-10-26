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

       // $productName = 'Coke';

        //return view('products.index',['productName' => $productName ]);  //ส่งตัวแปรไปที่ view
    }

    public function pdlogin(){

        $products = Product::paginate(15);

        return view('products.successlogin',['products' => $products ]);

       // $productName = 'Coke';

        //return view('products.index',['productName' => $productName ]);  //ส่งตัวแปรไปที่ view
    }

    // public function showName(){

    //     $employee = DB::table('employees')->select('firstName')->get();

    //     return view('products.successlogin',['employee' => $employee ]);
    // }

}
