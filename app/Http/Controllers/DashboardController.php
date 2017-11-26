<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Schedule;
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

        return view('Dashboard.index')->with('Schedule',$linktable)->with('Employees',$Employees);
    }
}
