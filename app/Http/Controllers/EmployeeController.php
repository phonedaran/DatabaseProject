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
            $jobTitle = $_SESSION['job'];
            $employees = Employee::all();
            $Enumber = $_SESSION['user'];
            if($jobTitle != "President" and $jobTitle != "VP Marketing"){
                $firedEmp = DB::table('employees')->where(['reportsTo'=> $Enumber])->get();
                return view('employees.employee', [ 'firedEmp' => $firedEmp, 'employees' => $employees ,'jobTitle' => $jobTitle]);
            }else{
                return view('employees.employee', ['employees' => $employees ,'jobTitle' => $jobTitle ]);
            }
        }else{
            return redirect('/main');
        }

    }

    function fireEmployee(){
        $Fname = $_GET['Fname'];
        $Lname = $_GET['Lname'];
        DB::table('employees')->where(['firstName' => $Fname])->where(['lastName' => $Lname])->delete();
        return redirect('/main/employee');
    }

    function addEmployee(request $request)
    {
        session_start();
        $Enumber = Employee::max('employeeNumber') + 1;
        $Fname = $request->input('FName');
        $Lname = $request->input('LName');
        $extension = $request->input('extension');
        $email = $request->input('email');
        $officeCode = $_GET['OfficeCode'];
        $pass = $request->input('password');
        $encodePass = md5($pass);
        
        $jobTitle = $request->input('jobTitle');
        $ReportTo = $_SESSION['user'];


        if ($Enumber===null or $Fname===null or $Lname===null or $extension===null or $email===null or $officeCode===null or $jobTitle===null){
            return redirect()->back()->with('nodata','Please try again');
        }else{
            DB::table('employees')->insert(
                ['employeeNumber' => $Enumber,
                'firstName' => $Fname,
                'lastName' => $Lname,
                'extension' => $extension,
                'email' => $email,
                'officeCode' => $officeCode,
                'reportsTo' => $ReportTo,
                'jobTitle' => $jobTitle
            ]);

            DB::table('users')->insert(
                ['employeeNumber' => $Enumber,
                'firstName' => $Fname,
                'lastName' => $Lname,
                'password' => $encodePass
            ]);
            return redirect()->back()->with('success','complete!');
        }
    }
}
