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

        $products = Product::all();
        return view('products/filter', ['products' => $products ]);
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
