<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;

class MainController extends Controller
{



    function index()
    {
        return view('login');
    }

    function checklogin(request $request)
    {

        $name = $request->input('name');
        $password = $request->input('pass');
        $checkpass = md5($password);
        $data = DB::select('select employeeNumber from users where employeeNumber=? and password =?',[$name,$checkpass]);
        // $employeeName = DB::select('select firstName from employees where employeeNumber=?',[$name]);

        if (count($data))
        {
            return redirect('main/success')->with('success','welcome to KIKKOK !');
        }
        else
        {
            return  redirect()->back()->with('warning','Please try again');
        }
    }



    function successlogin()
    {
        return view('products.successlogin');
    }

    function logout()
    {
        return redirect('/');
    }
}
