<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Schedule;
use App\connectSchedule;
use DB;

class DashboardController extends Controller
{
    public function Index(){
        $Employees = Employee::where('WorkingStatus',"=",'Working')->get();
        // $Getnum = schedule::get();
           $linktable = DB::table("connectschedule")
                     ->join("schedule", "connectschedule.scheduleID", "=", "schedule.ScheduleID")
                     ->select("*")
                     ->get();
        // dd(count($linktable));
        return view('Dashboard.index')->with('Schedule',$linktable)->with('Employees',$Employees);
    
    }
}
