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
        $customerpoint = DB::table('customers')
        ->update(['point' => DB::raw("(SELECT SUM(((payments.amount)/100)*3) FROM payments
         WHERE payments.customerNumber = customers.customerNumber)")
        ]);
        $customerpoint = DB::table('customers')
        ->where('point', null)
        ->update(['point' => 0]);
        $customers = Customer::paginate(25);
        return view('customers.customer',['customers' => $customers ]);
    }
    function detail()
    {
        $customers = Customer::all();
        return view('customers.customerdetail', ['customers'=>$customers]);
    }
    function add()
    {
        $customers = Customer::all();
        return view('customers.addcustomer', ['customers'=>$customers]);
    }
    public function addcheck(request $request)
    {
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
            'salesRepEmployeeNumber' => '1702'
            ]
        );
         $customers = Customer::all();
         return redirect('keyOrder/orderDetail')->with('success','Fill order detail');
    }
}
