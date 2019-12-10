<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    function showEmployees()
    {
        //block url if no user
        session_start();
        if(isset($_SESSION['user'])){
            $employees = Employee::all();
            return view('employees.employee', ['employees' => $employees ]);
        }else{
            return redirect('/main');
        }

    }
    function addEmployee()
    {
        return view('employees.addemployee');
    }
}
