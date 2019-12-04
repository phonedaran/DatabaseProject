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

    function login(request $request)
    {
        $Enumber = $request->input('name');
        $password = $request->input('pass');
        $checkpass = md5($password);
        $data = DB::select('select employeeNumber from users where employeeNumber=? and password =?',[$Enumber,$checkpass]);
        $User = DB::table('employees')->where(['employeeNumber'=> $Enumber])->get();
        // switch($jobtype) {
        //         case "President" :
        //             $type = 1;
        //         break;
        //         case "VP Sales" :
        //             $type = 2;
        //         break;
        //         case "VP Marketing" :
        //             $type = 2;
        //         break;
        //         case "Sales Manager(APAC)" :
        //             $type = 3;
        //         break;
        //         case "Sales Manager(EMEA)" :
        //             $type = 3;
        //         break;
        //         case "Sales Manager(NA)" :
        //             $type = 3;
        //         break;
        //         case "Sales Rep" :
        //             $type = 4;
        //         break;
        //         }

        if (count($data))
        {
            return view('products.successlogin',['User' => $User]);
            //return redirect('main/success',['data'=>$data]);
        }
        else
        {
            return  redirect()->back()->with('warning','Please try again');
        }
    }

    // function successlogin(request $request)
    // {
    //     return view('products.successlogin',['type' => $type ]);
    // }

    function logout()
    {
        return redirect('/');
    }
}
