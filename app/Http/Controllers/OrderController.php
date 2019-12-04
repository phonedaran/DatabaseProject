<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
class OrderController extends Controller
{

    public function keyOrder(){
        $orders = Order::all();
        return view('orders.keyOrder',['orders' => $orders ]);
    }
    public function check(request $request){
        $customerNumber=$request->input('customerNumber');
        $orderNumber=$request->input('orderNumber');
        $orderDate=$request->input('orderDate');
        $requiredDate=$request->input('requiredDate');
        $comment=$request->input('comment');
        if($orderNumber === null or $customerNumber === null or empty($orderDate) or empty($requiredDate)) {
            return redirect()->back()->with('null','Please fill all required field.');
        }
        $data=DB::table('orders')->where(['orderNumber' => $orderNumber])->exists();
        $customer=DB::table('customers')->where(['customerNumber' => $customerNumber])->doesntExist();
        if($customer == 1){
            return  redirect()->back()->with('noCustomer','Please try again. There is no this Customer Number.');
        }
        else{
            if($data == 0){
                DB::table('orders')->insert(
                    ['customerNumber' => $customerNumber,
                    'orderNumber' => $orderNumber,
                    'orderDate' => $orderDate,
                    'requiredDate' => $requiredDate,
                    'comments' => $comment,
                    'status' => 'In Process']
                );
                return redirect('keyOrder/orderDetail')->with('success','Fill order detail');
            }
            else{
                return  redirect()->back()->with('warning','Please try again. Order Number is already in use');
            }
        }
    }
    public function orderDetail(){
        $orders = Order::all();
        return view('orders.orderDetail',['orders' => $orders ]);
    }
    public function checkDetail(request $request){
        $orderNumber=$request->input('orderNumber');
        $productCode=$request->input('productCode');
        $quantity=$request->input('quantity');

        $data=DB::table('orders')->where(['orderNumber' => $orderNumber])->exists();
        $code=DB::table('products')->where(['productCode' => $productCode])->exists();
        if($data and $code){ //input ข้อมูลถูกต้อง
            $promo=DB::table('buy1get1')->where(['productCode' => $productCode])->exists();
            if($promo){ //สินค้าที่ input เข้ามามี promotion get1buy1
                $used=DB::table('orderdetails')->join('orders','orderdetails.orderNumber', '=', 'orders.orderNumber')
                    ->join('buy1get1', 'buy1get1.productCode', '=', 'orderdetails.productCode')
                    ->where('orders.orderDate', '>=', 'buy1get1.startDate')
                    ->where(['orderdetails.productCode' => $productCode])
                    ->where(['orders.orderNumber' => $orderNumber])
                    ->get();
                if(count($used) === 0){ //ลูกค้าที่ซื้ออยู่นี้ไม่เคยได้รับ promotion
                    $quantity=$quantity*2;
                    //echo $quantity;
                }

            }
            $priceEach = DB::table('products') //หา price each ของสินค้าชิ้นที่สั่ง
                ->where(['productCode' => $productCode])
                ->select('buyPrice')
                ->get();
            //echo $priceEach;
            $orderLineNumber =(DB::table('orderdetails') //หา orderLineNumber ของออเดอร์นี้
            ->where(['orderNumber' => $orderNumber])
            ->max('orderLineNumber'))+1;
            //echo $orderLineNumber;
            DB::table('orderdetails')->insert(
                ['orderNumber' => $orderNumber,
                'productCode' => $orderNumber,
                'quantity' =>$quantity,
                'priceEach'=> $priceEach,
                'orderLineNumber' => $orderLineNumber]
            );
            return redirect('orderlist')->with('success','The order has been stored in database');
        }
        else{
            if($orderNumber == null or $productCode == null or $quantity == null){
                return redirect()->back()->with('null','Please fill all required field.');
            }
            elseif($data == 0){
                echo "no order";
                print('no order');
                return  redirect()->back()->with('warning','Please try again. There is no this order number.');
            }
            elseif($code == 0){
                echo "no code";
                print('no code');
                return  redirect()->back()->with('code','Please try again. There is no this product code.');
            }
        }
    }
    public function index(){
        $orders = Order::all();
        return view('orders.orderlist',['orders' => $orders ]);
    }
}
?>
