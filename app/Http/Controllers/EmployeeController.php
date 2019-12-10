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

    function addEmployee(request $request)
    {
        $Enumber = Employee::max('employeeNumber') + 1;
        $Fname = $request->input('FName');
        $Lname = $request->input('LName');
        $extension = $request->input('extension');
        $email = $request->input('email');
        $officeCode = $_GET['OfficeCode'];
        // $reportsTo = $request->input('reportsTo'); 
        $jobTitle = $request->input('jobTitle');

        $employee = DB::table('employees')->where(['employeeNumber'=> $reportsTo])->get();
        
        if ($Enumber===null or $Fname===null or $Lname===null or $extension===null or $email===null or $officeCode===null or $jobTitle===null){
            return redirect()->back()->with('nodata','Please try again');
        }else{
            if (count($employee)){
                DB::table('employees')->insert(
                    ['employeeNumber' => $Enumber,
                    'firstName' => $Fname,
                    'lastName' => $Lname,
                    'extension' => $extension,
                    'email' => $email,
                    'officeCode' => $officeCode,
                    'reportsTo' => $reportsTo,
                    'jobTitle' => $jobTitle
                ]);
                return redirect()->back()->with('success','complete!'); 
            }else{
                return redirect()->back()->with('warning','Please try again'); 
            }
        }
    }
}
