<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class promotionController extends Controller
{
    public function index(){
        session_start();
        if(isset($_SESSION['user'])){
            $products=DB::select('select * from products');
            return view('promotion',['products'=>$products]);
        }else{
            return redirect('/main');
        }
    }
    public function checkDiscount(request $request){

        session_start();
        if(isset($_SESSION['user'])){
            $discountCode=$request->input('discountCode');
            $damount=$request->input('damount');
            $dtimes=$request->input('dtimes');
            $dstartDate=$request->input('dstartDate');
            $dexp=$request->input('dexp');

            if($discountCode===null or $damount===null or $dtimes===null or empty($dstartDate) or empty($dexp)){
                return redirect()->back()->with('null','Please fill all required field.');
            }
            $data=DB::table('discount')->where(['discountCode' => $discountCode])->exists();
            if($data){
                return redirect()->back()->with('warning','Please try again. The discount code is already in use');
            }
            else{
                DB::table('discount')->insert(
                    ['discountCode' => $discountCode,
                    'amount' => $damount,
                    'times' => $dtimes,
                    'startDate' => $dstartDate,
                    'exp' => $dexp]
                );
                return redirect()->back()->with('discount','Discount promotion created');
            }
        }else{
            return redirect('/main');
        }
    }

    public function checkBuy1Get1(request $request){


        session_start();
        if(isset($_SESSION['user'])){
            $productCode=$request->input('productCode');
            $startDate=$request->input('startDate');
            $exp=$request->input('exp');
            if($productCode===null or empty($startDate) or empty($exp)){
                return redirect()->back()->with('null','Please fill all required field.');
            }
            $used=DB::table('buy1get1')->where(['productCode' => $productCode])->exists();
            if($used){
                return redirect()->back()->with('used','Please try again. The product code is already in promotion');
            }
            else{
                DB::table('buy1get1')->insert(
                    ['productCode' => $productCode,
                    'startDate' => $startDate,
                    'exp' => $exp]
                );
                return redirect()->back()->with('buy1get1','Buy1Get1 promotion created');
            }
        }else{
            return redirect('/main');
        }

    }
}
