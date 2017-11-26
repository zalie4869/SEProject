<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Salary;
use Auth;

class SalaryController extends Controller
{
    public function Index(Request $request, $year){

        if(!Auth::check()){
            return redirect('/home');
        }

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

        if(!Auth::check()){
            return redirect('/home');
        }

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
        return redirect('/salary/'.$Salary->Montyear[0].$Salary->Montyear[1].$Salary->Montyear[2].$Salary->Montyear[3].'?month='.$Salary->Montyear[5].$Salary->Montyear[6]);
    }

    public function Destroy(Request $request){

        if(!Auth::check()){
            return redirect('/home');
        }

        $salary = Salary::where('SalaryID','=',$request->ID)->first();
        $salary->delete();

        return response()->json(['success' => 'Record has been deleted successfully!']);
    }
    public function Edit(Request $request)
    {   

        if(!Auth::check()){
            return redirect('/home');
        }

        $Salary = Salary::where('EmpID','=',$request->EmpID1)->first();
        //$Salary->Montyear = $request->Montyear1;
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

        return redirect('/salary/'.$Salary->Montyear[0].$Salary->Montyear[1].$Salary->Montyear[2].$Salary->Montyear[3].'?month='.$Salary->Montyear[5].$Salary->Montyear[6]);
    }

}

// class SalaryController extends Controller
// {
//     public function Index(){
//      $Employees = Salary::get();
//      return view('index')->with('Employees',$Employees);
//     }
// }