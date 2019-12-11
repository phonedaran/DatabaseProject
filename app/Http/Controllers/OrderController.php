<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Orderdetails;
Use \Carbon\Carbon;
class OrderController extends Controller
{
    public function keyOrder(){
        session_start();
        if(isset($_SESSION['user'])){
            $Enumber = $_SESSION['user'];
            $customers = DB::select('select * from customers where salesRepEmployeeNumber = ?',[$Enumber]);
            return view('orders.keyOrder',['customers' => $customers]);
        }else{
            return redirect('/main');
        }

    }
    public function check(request $request){
        session_start();
        if(isset($_SESSION['user'])){
            $customerNumber=$_GET['customerNumber'];
            $orderNumber = Order::max('orderNumber') + 1;
            $orderDate=$request->input('orderDate');
            $requiredDate=$request->input('requiredDate');
            $comment=$request->input('comment');

            if(empty($orderDate) or empty($requiredDate)) {
                return redirect()->back()->with('null','Please fill all required field.');
            }

            if($customerNumber == 'Choose ...') {
                return redirect()->back()->with('null','Please fill all required field.');
            }
            DB::table('orders')->insert(
                ['customerNumber' => $customerNumber,
                'orderNumber' => $orderNumber,
                'orderDate' => $orderDate,
                'requiredDate' => $requiredDate,
                'comments' => $comment,
                'status' => 'In Process']
            );
            return redirect('keyOrder/orderDetail')->with('success','Fill order detail');
        }else{
            return redirect('/main');
        }

    }

    public function orderDetail(){
        session_start();
        if(isset($_SESSION['user'])){
            $orderNumber = Order::max('orderNumber');
            $products=DB::select('select * from products');
            return view('orders.orderDetail',['orderNumber' => $orderNumber,'products'=>$products]);
        }else{
            return redirect('/main');
        }
    }

    public function checkDetail(request $request){

        session_start();
        if(isset($_SESSION['user'])){
            $orderNumber=$_GET['orderNumber'];
            $productCode=$_GET['productCode'];
            $quantity=$request->input('quantity');
            if($quantity == null or $productCode == "Choose ..."){
                return redirect()->back()->with('null','Please fill all required field.');
            }
            $priceEach = DB::table('products') //หา price each ของสินค้าชิ้นที่สั่ง
                ->where(['productCode' => $productCode])
                ->value('buyPrice');
            $amount = $quantity*$priceEach;
            $amountPromo = $amount;

            $orderLineNumber =(DB::table('orderdetails') //หา orderLineNumber ของออเดอร์นี้
                ->where(['orderNumber' => $orderNumber])
                ->max('orderLineNumber'))+1;

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
                    $amountPromo = $quantity*$priceEach;
                }
            }
            DB::table('orderdetails')->insert(
                ['orderNumber' => $orderNumber,
                'productCode' => $productCode,
                'quantityOrdered' =>$quantity,
                'priceEach'=> $priceEach,
                'orderLineNumber' => $orderLineNumber,
                'amount' => $amount]
            );
            return redirect()->back()->with('complete','The order updated');
        }else{
            return redirect('/main');
        }
    }

    public function index(){
        session_start();
        if(isset($_SESSION['user'])){
            $orders = Order::all();
            $status = array("In Process","Waiting","Disputed","On Hold","Resolved","Shipped","Cancelled");

            //orders ที่จ่ายแล้วแต่ของไม่พอ
            $orderOutOfStocks = DB::table('orders')
            ->where(['status' => 'Waiting'])->get();

            //check stock สำหรับ orderนี้
            foreach ($orderOutOfStocks as $orderOutOfStock){
                $enough = DB::select('SELECT * FROM orderdetails
                join products using (productCode)
                WHERE orderdetails.orderNumber = ?
                and orderdetails.quantityOrdered < products.quantityInStock',[$orderOutOfStock->orderNumber]);
                if(count($enough)!=0){ //ถ้าของใน stock พอ
                    $date = Carbon::now();
                    DB::table('orders') //update status , shippedDate and comments
                    ->where(['orderNumber' => $orderOutOfStock->orderNumber])
                    ->update(['status' => 'Shipped', 'shippedDate' => $date, 'comments' => '']);

                    $orderdetails = DB::table('orderdetails')
                    ->where(['orderNumber' => ($orderOutOfStock->orderNumber)])->get();
                    foreach ($orderdetails as $orderdetail){ //update quantityInStock
                        DB::update('UPDATE products
                        SET quantityInStock = (quantityInStock - (SELECT quantityOrdered
                            FROM orderdetails
                            WHERE  products.productCode = orderdetails.productCode and orderdetails.orderNumber=?))
                        WHERE products.productCode = ?', [$orderOutOfStock->orderNumber,$orderdetail->productCode]);
                    }
                }
            }

            $jobTitle = $_SESSION['job'];
            //update totalAmount
            DB::table('orders')->update(['totalAmount'=> DB::raw("
                (SELECT SUM(orderdetails.amount)
                FROM orderdetails
                WHERE orderdetails.orderNumber = orders.orderNumber)
                ")]);

        // session_start();
        $jobTitle = $_SESSION['job'];


        return view('orders.orderlist',['orders' => $orders, 'status' => $status , 'jobTitle' => $jobTitle]);
    }
}
    public function updateOrder(){
        session_start();
        if(isset($_SESSION['user'])){
            $orders = Order::all();
            DB::table('orders')
                ->where(['orderNumber' => $_GET["orderNumber"]])
                ->update(['comments' => $_GET["comment"],'status' => $_GET["status"]]);
            return redirect('orderlist')->with('success','The order updated');
        }else{
            return redirect('/main');
        }

    }

    public function detail(){
        session_start();
        if(isset($_SESSION['user'])){
            $orderNumber = $_GET["orderNumber"];
            $total = DB::table('orders')->where(['orderNumber' => $orderNumber])->value('totalAmount');
            $point = intval(($total/100)*3);
            $orderdetails = DB::table('orderdetails')->where(['orderNumber' => $orderNumber]) ->get();
            return view('orders.detail',['orderdetails' => $orderdetails , 'orderNumber' => $orderNumber, 'total'=>$total , 'point'=>$point]);
        }else{
            return redirect('/main');
        }
    }

}
?>
