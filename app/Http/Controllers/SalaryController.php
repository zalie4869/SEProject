<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salary;

class SalaryController extends Controller
{
    public function Index(Request $request, $year){
       // dd($request);
        $yearmin = 2000;
        $month_Num = $request->month;
        if($year<$yearmin){
            $year=$yearmin;
        }

        $Employees1 = Employee::get();
        //$Salarys = Salary::whereYear('Montyear','=',$year)->get();
        $Employees = Salary::join('Employee', 'Employee.EmpID', '=', 'Salary.EmpID')
                    ->whereYear('Montyear','=',$year)
                    ->whereMonth('Montyear','=',$request->month)
                    ->get();
    	return view('Salary.index')->with('Employees',$Employees)->with('year',$year)->with('month_Num',$month_Num)->with('Employees1',$Employees1);
    }
    // public function Index1()
    // {
    //     $Salarys = Salary::get();
    //     return view('index')->with('Salarys',$Salarys);
    // }
    public function Insert(Request $request){
    	// dd($request);
    	

            $Salary = new Salary;
        	$Salary->EmpID = $request->EmpID;
        	// $Employee = Employee::where('EmpID','=',$SS)->get();;
        	// $Employee->FirstName = $request->input('FirstName');
        	// $Employee->LastName = $request->input('LastName');
            $Salary->Montyear = $request->Montyear;
        	// $Employee->Position = $request->input('Position');
        	$Salary->Salary = $request->Salary;
        	$Salary->Absence = $request->Absence;
        	$Salary->Late = $request->Late;
        	$Salary->OT = $request->OT;
        	$Salary->SocialSecurity = $request->SocialSecurity;
        	$Salary->Bonus = $request->Bonus;
        	$Salary->CutWages = $request->CutWages;
        	$Salary->Sum = $request->Sum;

        	$Salary->save();
          	return redirect('/salary/2017?month=10');
	}
    public function Destroy(Request $request){
      $salary = Salary::where('SalaryID','=',$request->ID)->first();

      
      $salary->delete();
      
      return response()->json(['success' => 'Record has been deleted successfully!']);
    }
    public function Edit(Request $request)
    {
        $Salary = Salary::where('EmpID','=',$request->EmpID)->first();
        //$Salary->Montyear1 = $request->Montyear;
        // $Employee->Position = $request->input('Position');
        $Salary->Salary = $request->Salary1;
        $Salary->Absence = $request->Absence1;
        $Salary->Late = $request->Late1;
        $Salary->OT = $request->OT1;
        $Salary->SocialSecurity = $request->SocialSecurity1;
        $Salary->Bonus = $request->Bonus1;
        $Salary->CutWages = $request->CutWages1;
        $Salary->Sum = $request->Sum1;
        $Salary->save();

        return redirect('/salary/2017?month=10');
    }

}

// class SalaryController extends Controller
// {
//     public function Index(){
//     	$Employees = Salary::get();
//     	return view('index')->with('Employees',$Employees);
//     }
// }