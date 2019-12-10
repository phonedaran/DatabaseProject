<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Validator;
use Auth;

class MainController extends Controller
{



    function index()
    {
        return view('login');
    }

    function login(request $request)
    {

        $Enumber = $request->input('name');
        $password = $request->input('pass');
        $checkpass = md5($password);
        $data = DB::select('select employeeNumber from users where employeeNumber=? and password =?',[$Enumber,$checkpass]);
        $User = DB::table('employees')->where(['employeeNumber'=> $Enumber])->get();
        $products = Product::paginate(15);

        if (count($data))
        {
            session_start();
            $_SESSION['user']=$Enumber;
            return view('products.successlogin',['User' => $User, 'products' => $products]);
        }
        else
        {
            return  redirect()->back()->with('warning','Please try again');
        }
    }

    function logout()
    {
        session_start(); //logout
        session_destroy();
        return redirect('/');
    }
}
