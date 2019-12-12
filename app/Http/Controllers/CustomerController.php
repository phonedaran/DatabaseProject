<?php

namespace App\Http\Controllers;

 use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index()
    {
        session_start();
        if(isset($_SESSION['user'])){
            $customerpoint = DB::table('customers')
            ->update(['point' => DB::raw("(SELECT SUM(((payments.amount)/100)*3) FROM payments
                WHERE payments.customerNumber = customers.customerNumber)")
            ]);
            $customerpoint = DB::table('customers')
            ->where('point', null)
            ->update(['point' => 0]);
            $customers = Customer::paginate(25);
            return view('customers.customer',['customers' => $customers ]);
        }else{
            return redirect('/main');
        }
    }
    
    function detail()
    {
        session_start();
        if(isset($_SESSION['user'])){
            $customers = Customer::all();
            return view('customers.customerdetail', ['customers'=>$customers]);
        }else{
            return redirect('/main');
        }

    }
    function add()
    {
        session_start();
        if(isset($_SESSION['user'])){
            $customers = Customer::all();
            return view('customers.addcustomer', ['customers'=>$customers]);
        }else{
            return redirect('/main');
        }
    }
    public function addcheck(request $request)
    {
        session_start();
        $Enumber = $_SESSION['user'];
        if(isset($_SESSION['user'])){
            $customerName=$request->input('customerName');
            $conFName=$request->input('conFName');
            $conLName=$request->input('conLName');
            $addr=$request->input('addr');
            $postal=$request->input('postal');
            $country=$request->input('country');
            $state=$request->input('state');
            $city=$request->input('city');
            $phone=$request->input('phone');
            $customerNumber=Customer::max('customerNumber')+1;
        if($customerName === null or $conFName === null or $addr === null or $conLName === null or $country === null or $city === null or $phone === null) {
            return redirect()->back()->with('null','Please fill all required field.');
        }else{
            $customers = DB::table('customers')->insert(
                ['customerNumber' =>$customerNumber,
                'customerName' => $customerName,
                'contactLastName' => $conLName,
                'contactFirstName' => $conFName,
                'phone' => $phone,
                'addressLine1' => $addr,
                'city' => $city,
                'state' => $state,
                'postalCode' => $postal,
                'country' => $country,
                'point' => '0',
                'salesRepEmployeeNumber' => $Enumber
                ]
            );
            return  redirect('main/customer')->with('success','The customer has been stored in database');
        }
        }else{
            return redirect('/main');
        }
    }
}
