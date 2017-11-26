<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Schedule;
use App\Salary;
use App\connectSchedule;
use DB;
use Auth;

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

        $M1 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',1)->sum('Salary.Salary');
        $M2 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',2)->sum('Salary.Salary');
        $M3 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',3)->sum('Salary.Salary');
        $M4 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',4)->sum('Salary.Salary');
        $M5 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',5)->sum('Salary.Salary');
        $M6 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',6)->sum('Salary.Salary');
        $M7 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',7)->sum('Salary.Salary');
        $M8 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',8)->sum('Salary.Salary');
        $M9 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',9)->sum('Salary.Salary');
        $M10 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',10)->sum('Salary.Salary');
        $M11 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',11)->sum('Salary.Salary');
        $M12 = Salary::whereYear('Montyear','=',date("Y"))->whereMonth('Montyear','=',12)->sum('Salary.Salary');

        $eachMonth = [$M1,$M2,$M3,$M4,$M5,$M6,$M7,$M8,$M9,$M10,$M11,$M12];

        $Y1 = Salary::whereYear('Montyear','=','2007')->sum('Salary.Salary');
        $Y2 = Salary::whereYear('Montyear','=','2008')->sum('Salary.Salary');
        $Y3 = Salary::whereYear('Montyear','=','2009')->sum('Salary.Salary');
        $Y4 = Salary::whereYear('Montyear','=','2010')->sum('Salary.Salary');
        $Y5 = Salary::whereYear('Montyear','=','2011')->sum('Salary.Salary');
        $Y6 = Salary::whereYear('Montyear','=','2012')->sum('Salary.Salary');
        $Y7 = Salary::whereYear('Montyear','=','2013')->sum('Salary.Salary');
        $Y8 = Salary::whereYear('Montyear','=','2014')->sum('Salary.Salary');
        $Y9 = Salary::whereYear('Montyear','=','2015')->sum('Salary.Salary');
        $Y10 = Salary::whereYear('Montyear','=','2016')->sum('Salary.Salary');
        $Y11 = Salary::whereYear('Montyear','=','2017')->sum('Salary.Salary');
        $Y12 = Salary::whereYear('Montyear','=','2018')->sum('Salary.Salary');
        $Y13 = Salary::whereYear('Montyear','=','2019')->sum('Salary.Salary');
        $Y14 = Salary::whereYear('Montyear','=','2020')->sum('Salary.Salary');
        $Y15 = Salary::whereYear('Montyear','=','2021')->sum('Salary.Salary');
        $Y16 = Salary::whereYear('Montyear','=','2022')->sum('Salary.Salary');

        $eachYear = [$Y1,$Y2,$Y3,$Y4,$Y5,$Y6,$Y7,$Y8,$Y9,$Y10,$Y11,$Y12,$Y13,$Y14,$Y15,$Y16];

        //dd($Y1);

        return view('Dashboard.index')->with('Schedule',$linktable)
                                    ->with('Employees',$Employees)
                                    ->with('eachMonth',$eachMonth)
                                    ->with('eachYear',$eachYear);
  }
}
