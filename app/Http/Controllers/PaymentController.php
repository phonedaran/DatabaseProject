<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(){
        session_start();
        if(isset($_SESSION['user'])){
            return view('payments.payment');
        }else{
            return redirect('/main');
        }

    }
    public function paymentDetail(request $request){

        session_start();
        if(isset($_SESSION['user'])){
            $customerNumber=$request->input('customerNumber');
            $chequeNumber=$request->input('chequeNumber');
            $paymentDate=$request->input('paymentDate');

            if($customerNumber===null or $chequeNumber===null or empty($paymentDate)){
                return redirect()->back()->with('null','Please fill all required field.');
            }

            $customer=DB::table('customers')->where(['customerNumber' => $customerNumber])->doesntExist();
            if($customer){
                return  redirect()->back()->with('noCustomer','Please try again. There is no this Customer Number.');
            }

            $order=DB::table('orders')->where(['customerNumber' => $customerNumber])->where(['status' => 'In process'])->get();
            if($order == '[]'){
                return redirect()->back()->with('noOrder','the customer has no any order for payment.');
            }

            $discounts=DB::table('discount')->get();
            return view('payments.paymentDetail', ['chequeNumber' => $chequeNumber , 'orders' => $order , 'discounts'=>$discounts, 'customerNumber'=>$customerNumber, 'paymentDate'=>$paymentDate]);

        }else{
            return redirect('/main');
        }

    }

    public function check(request $request){

        session_start();
        if(isset($_SESSION['user'])){
            $orderNumber = $_GET["order"];
            $discountCode = $_GET["discount"];
            $customerNumber = $_GET["customerNumber"];
            $chequeNumber = $_GET["chequeNumber"];
            $paymentDate = $_GET["paymentDate"];

            if($orderNumber == "0" or $discountCode == "0"){
                return redirect()->back()->with('null','Please fill all required field.');
            }

            //add amount of discount in a variable
            //decrease times of discount
            if($discountCode != "-"){ //if use discount
                $amountDiscount=DB::table('discount')->where(['discountCode' => $discountCode])->value('amount');
                $times=DB::table('discount')->where(['discountCode' => $discountCode])->value('times');
                if($times==1){
                    DB::DELETE('delete from discount where discountCode = ?',[$discountCode]);
                }elseif($times>1){
                    DB::update('UPDATE discount
                    SET times = (times - 1)
                    WHERE discountCode=?',[$discountCode]);
                }
            }elseif($discountCode == "-"){ //if not use discount
                $amountDiscount=0;
            }


            $amount = DB::table('orders')->where(['orderNumber' => $orderNumber])->value('totalAmount');
            $amount = $amount-$amountDiscount;

            //insert payment
            DB::table('payments')->insert(
                ['customerNumber' => $customerNumber,
                'checkNumber' => $chequeNumber,
                'paymentDate' =>$paymentDate,
                'amount'=> $amount]
            );

            //check ว่า stock พอมั้ย
            $overOrder = DB::select('SELECT * FROM orderdetails
            join products using (productCode)
            WHERE orderdetails.orderNumber = ?
            and orderdetails.quantityOrdered > products.quantityInStock',[$orderNumber]);

            if($overOrder != null){ //ถ้าไม่พอ
                DB::table('orders') //update status and comments
                    ->where(['customerNumber' => $customerNumber])
                    ->where(['orderNumber' => $orderNumber])
                    ->update(['status' => 'Waiting', 'comments' => 'The customer has completed the payment but the product that was orderd is out of stock']);
            }
            else{ //ถ้าพอ
                DB::table('orders') //update status and shippedDate
                    ->where(['customerNumber' => $customerNumber])
                    ->where(['orderNumber' => $orderNumber])
                    ->update(['status' => 'Shipped', 'shippedDate' => $paymentDate]);

                $orderdetails = DB::table('orderdetails')
                ->where(['orderNumber' => $orderNumber])->get();

                foreach ($orderdetails as $orderdetail){ //update quantityInStock
                    DB::update('UPDATE products
                    SET quantityInStock = (quantityInStock - (SELECT quantityOrdered
                        FROM orderdetails
                        WHERE  products.productCode = orderdetails.productCode and orderdetails.orderNumber=?))
                    WHERE products.productCode = ?', [$orderNumber,$orderdetail->productCode]);
                }
            }

            return redirect('/')->with('paymentComplete','The payment successfully');
        }else{
            return redirect('/main');
        }


    }
}
