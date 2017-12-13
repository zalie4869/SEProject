<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Schedule;
use App\Salary;
use App\connectSchedule;
use DB;
use Auth;
use Carbon;

class DashboardController extends Controller
{
    public function Index(){

        if(!Auth::check()){
            return redirect('/home');
        }

        $Employees = Employee::where('WorkingStatus',"=",'Working')->get();
        $linktable = DB::table("connectschedule")
        ->join("schedule", "connectschedule.scheduleID", "=", "schedule.ScheduleID")
        ->select("*")
        ->get();

        $M1 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',1)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M2 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',2)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M3 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',3)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M4 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',4)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M5 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',5)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M6 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',6)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M7 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',7)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M8 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',8)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M9 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',9)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M10 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',10)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M11 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',11)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');
        $M12 = Salary::whereYear('Montyear','=',date("Y"))
            ->whereMonth('Montyear','=',12)
            ->where("Sum",">",0)
            ->sum('Salary.Sum');

        $eachMonth = [$M1,$M2,$M3,$M4,$M5,$M6,$M7,$M8,$M9,$M10,$M11,$M12];

        $Y1 = Salary::whereYear('Montyear','=','2007')->where('Sum','>',0)->sum('Salary.Sum');
        $Y2 = Salary::whereYear('Montyear','=','2008')->where('Sum','>',0)->sum('Salary.Sum');
        $Y3 = Salary::whereYear('Montyear','=','2009')->where('Sum','>',0)->sum('Salary.Sum');
        $Y4 = Salary::whereYear('Montyear','=','2010')->where('Sum','>',0)->sum('Salary.Sum');
        $Y5 = Salary::whereYear('Montyear','=','2011')->where('Sum','>',0)->sum('Salary.Sum');
        $Y6 = Salary::whereYear('Montyear','=','2012')->where('Sum','>',0)->sum('Salary.Sum');
        $Y7 = Salary::whereYear('Montyear','=','2013')->where('Sum','>',0)->sum('Salary.Sum');
        $Y8 = Salary::whereYear('Montyear','=','2014')->where('Sum','>',0)->sum('Salary.Sum');
        $Y9 = Salary::whereYear('Montyear','=','2015')->where('Sum','>',0)->sum('Salary.Sum');
        $Y10 = Salary::whereYear('Montyear','=','2016')->where('Sum','>',0)->sum('Salary.Sum');
        $Y11 = Salary::whereYear('Montyear','=','2017')->where('Sum','>',0)->sum('Salary.Sum');
        $Y12 = Salary::whereYear('Montyear','=','2018')->where('Sum','>',0)->sum('Salary.Sum');
        $Y13 = Salary::whereYear('Montyear','=','2019')->where('Sum','>',0)->sum('Salary.Sum');
        $Y14 = Salary::whereYear('Montyear','=','2020')->where('Sum','>',0)->sum('Salary.Sum');
        $Y15 = Salary::whereYear('Montyear','=','2021')->where('Sum','>',0)->sum('Salary.Sum');
        $Y16 = Salary::whereYear('Montyear','=','2022')->where('Sum','>',0)->sum('Salary.Sum');

        $eachYear = [$Y1,$Y2,$Y3,$Y4,$Y5,$Y6,$Y7,$Y8,$Y9,$Y10,$Y11,$Y12,$Y13,$Y14,$Y15,$Y16];

        /*$allYear = DB::select(DB::raw("SELECT DISTINCT YEAR(Montyear) FROM Salary"));
        //dd($allYear);
        $eachYear = $allYear;

        $j = [];
        for($i=0;$i<sizeof($allYear);$i++){
            $Obj->elapsed = $allYear[$i];
            //$Obj->value = 1234;
            $j[$i] = json_encode($Obj);
        }
        dd($j);*/


        return view('Dashboard.index')->with('Schedule',$linktable)
                                    ->with('Employees',$Employees)
                                    ->with('eachMonth',$eachMonth)
                                    ->with('eachYear',$eachYear);
  }
}
