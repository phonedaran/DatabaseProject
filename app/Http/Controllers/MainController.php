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

        $name=$request->input('name');
        $password=$request->input('pass');
        $token=DB::select('select remember_token from users where employeeNumber=?',[$name]);
        // $data=DB::select('select employeeNumber from users where employeeNumber=? and password =DES_DECRYPY(?,?)',
        // [$name,$password,$token]);
        $data=DB::select('select employeeNumber from users where employeeNumber=? and password =?',[$name,$password]);
        if (count($data))
        {
            return redirect('main/successlogin')->with('success','welcome to KIKKOK !');
        }
        else 
        {
        //print_r($data);
        // print_r($request->input());
        
        // $this->validate($request, [
        //     'name'      =>  'requred|name',
        //     'pass'      =>  'requred|alphanNum|min:3'
        // ]);

        // $user_data = array(
        //     'emnumber'      =>  $request->get('name'),
        //     'password'      =>  $request->get('password')
        // );

        // if(Auth::attempt($user_data))
        // {
        //     return redirect('main/successlogin');
        // }
        // else
        // {
            return  redirect()->back()->with('warning','Please try again');
        }
    }

    function successlogin()
    {
        return view('successlogin');
    }

    function logout()
    {
        //Auth::logout();
        return redirect('/');
    }
}
