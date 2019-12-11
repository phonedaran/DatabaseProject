<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        session_start();
        if(isset($_SESSION['user'])){
            return redirect('/main/success');
        }else{
            $products = Product::paginate(15);
            return view('products.productlist',['products' => $products ]);
        }
    }


    public function filter(){
        session_start();
        $type = $_GET['type'];
        $scale = $_GET['scale'];
        $vendor = $_GET['vendor'];
        if($type == 'Any'){
            if($scale == 'Any'){
                if($vendor == 'Any'){
                    $products = $products= DB::table('products')->get(); // - - -
                }else{
                    $products= DB::table('products')->where('productVendor','=',$vendor)->get(); //- - V
                }
            }else{
                if($vendor == 'Any'){
                    $products= DB::table('products')->where('productScale','=',$scale)->get();  //- S -
                }else{
                    $products= DB::table('products')->where('productScale','=',$scale)
                    ->where('productVendor','=',$vendor)->get();                                //- S V
                }
            }
        }else{
            if($scale == 'Any'){
                if($vendor == 'Any'){
                    $products= DB::table('products')->where('productLine','=',$type)->get();    //T - -
                }else{
                    $products= DB::table('products')->where('productLine','=',$type)
                    ->where('productVendor','=',$vendor)->get();                                //T - V
                }
            }else{
                if($vendor == 'Any'){
                    $products= DB::table('products')->where('productLine','=',$type)
                    ->where('productScale','=',$scale)->get();                                  //T S -
                }else{
                    $products= DB::table('products')->where('productLine','=',$type)
                    ->where('productScale','=',$scale)->where('productVendor','=',$vendor)->get();   //T S V
                }
            }
        }

        $count = $products->count();

        return view('products.filter',['products' => $products, 'count' => $count]);
    }

    public function update(){
        session_start();
        if(isset($_SESSION['user'])){
            $products = Product::all();
            return view('products.updateProduct', ['products' => $products ]);
        }else{
             return redirect('/main');
        }

    }

    public function checkupdate(){
        session_start();
        if(isset($_SESSION['user'])){
            if($_GET["name"] === "" or $_GET["scale"] === "" or $_GET["vendor"] === "" or $_GET["des"] === "" or $_GET["price"] === "" )
            {
                return redirect()->back()->with('null','Please fill all required field.');
            }else{
                if($_GET["add"] != ""){
                    DB::table('products')
                    ->where(['productCode' => $_GET["code"]])
                    ->update(['quantityInStock' => $_GET["instock"]+$_GET["add"],
                    'DateAddStock' => today()->format('j F Y ')
                    ]);
                }
                DB::table('products')
                    ->where(['productCode' => $_GET["code"]])
                    ->update(['productName' => $_GET["name"],
                    'productScale' => $_GET["scale"],
                    'productVendor' => $_GET["vendor"],
                    'productDescription' => $_GET["des"],
                    'buyPrice' => $_GET["price"]
                    ]);

                    $products = Product::all();
                    return view('products.updateProduct', ['products' => $products ]);
            }
        }else{
            return redirect('/main');
        }
    }


    public function add(){
        session_start();
        if(isset($_SESSION['user'])){
            return view('products.addproduct');
        }else{
            return redirect('/main');
        }

    }

    public function addCheck(request $request)
    {
        session_start();
        if(isset($_SESSION['user'])){
            //define productCode
            $scale = $request->input('scale');
            list($scale1, $scale2) = explode(":", $scale);
            $Pcode = "S" . $scale2 . "_" . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $haveCode = DB::table('products')->where(['productCode' => $Pcode])->exists();
            if ($haveCode) {
                $Pcode = "S" . $scale2 . "_" . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            }

            $Pname = $request->input('Pname');
            //ถ้าชื่อซ้ำ
            $haveName = DB::table('products')->where(['productName' => $Pname])->exists();
            if ($haveName) {
                return redirect()->back()->with('haveName', 'The product name has already in use.');
            }
            $vendor = $request->input('vendor');
            $type = $request->input('type');
            $Pdes = $request->input('Pdes');
            $qty = $request->input('qty');
            $price = $request->input('price');
            DB::table('products')->insert(
                ['productCode' => $Pcode,
                'productName' => $Pname,
                'productLine' =>$type,
                'productScale'=> $scale,
                'productDescription' => $Pdes,
                'buyPrice' => $price,
                'quantityInStock' => $qty,
                'productVendor' => $vendor]
            );
            return redirect('/main/success')->with('product','The product created');
        }else{
            return redirect('/main');
        }

    }

    public function delete(request $request)
    {
        session_start();
        if(isset($_SESSION['user'])){
            $Pcode = $_GET['code'];
            DB::table('products')->where(['productCode' => $Pcode])->delete();
            return redirect()->back()->with('del', 'The product deleted.');
        }else{
            return redirect('/main');
        }

    }
}
