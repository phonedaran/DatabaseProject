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

            switch($jobTitle){
                case "President":
                    $type = 1;
                break;

                case "VP Sales":
                    $type = 2;
                break;

                case "Sales Manager (APAC)":
                    $type = 3;
                break;

                case "Sale Manager (EMEA)":
                    $type = 3;
                break;

                case "Sale Manager (NA)":
                    $type = 3;
                break;

                case "Sales Rep":
                    $type = 4;
                break;

                default:
                    $type = 5;

            }
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

    function addEmployee(request $request)
    {
        $Enumber = Employee::max('employeeNumber') + 1;
        $Fname = $request->input('FName');
        $Lname = $request->input('LName');
        $extension = $request->input('extension');
        $email = $request->input('email');
        $officeCode = $_GET['OfficeCode'];
        $jobTitle = $request->input('jobTitle');

        session_start();
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
            return redirect()->back()->with('success','complete!'); 
        }
        
    }
}
