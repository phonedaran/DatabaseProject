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
        $employees = Employee::all();
        return view('employees.employee', ['employees' => $employees ]);
    }
    function addEmployee()
    {
        return view('employees.addemployee');
    }
}
