<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Schedule;
use App\connectSchedule;
use DB;
use Auth;

class ScheduleController extends Controller
{
    public function Index(){

        if(!Auth::check()){
            return redirect('/home');
        }

        $Employees = Employee::where('WorkingStatus',"=",'Working')->get();
        // $Getnum = schedule::get();
        $linktable = DB::table("connectschedule")
                    ->join("schedule", "connectschedule.scheduleID", "=", "schedule.ScheduleID")
                    ->select("*")
                    ->get();
        // dd(count($linktable));
        return view('Schedule.index')->with('Schedule',$linktable)->with('Employees',$Employees);

    }

    public function insert(Request $request){

        if(!Auth::check()){
            return redirect('/home');
        }

        $link = connectSchedule::where('EmpID',$request->EmpID)->first();
        // dd($num);
        if($link==null) {
            $num = new schedule;

        //$num->scheduleID = $request->scheduleID;

            $num->Mon = $request->Mon!=null ?  $request->Mon  : null;
            $num->Tue = $request->Tue!=null ?  $request->Tue  : null;
            $num->Wed = $request->Wed!=null ?  $request->Wed  : null;
            $num->Thu = $request->Thu!=null ?  $request->Thu  : null;
            $num->Fri = $request->Fri!=null ?  $request->Fri  : null;
            $num->Sat = $request->Sat!=null ?  $request->Sat  : null;
            $num->Sun = $request->Sun!=null ?  $request->Sun  : null;
            $num->save();
            $link = new connectSchedule;
            $link->EmpID = $request->EmpID;
            $link->scheduleID = $num->scheduleID;
            $link->save();

        }
        else {

            $num = DB::update('update schedule set  Mon = ? ,Tue= ? , Wed= ? , Thu = ? ,Fri= ? , Sun= ? ,Sat= ? where ScheduleID = ?', [
                $request->Mon!=null ?  $request->Mon  : null,
                $request->Tue!=null ?  $request->Tue  : null,
                $request->Wed!=null ?  $request->Wed  : null,
                $request->Thu!=null ?  $request->Thu  : null,
                $request->Fri!=null ?  $request->Fri  : null,
                $request->Sat!=null ?  $request->Sat  : null,
                $request->Sun!=null ?  $request->Sun  : null,
                $link->scheduleID
            ]); 

        }

        //return redirect('/schedule');

        $Employees = Employee::where('WorkingStatus',"=",'Working')->get();
        $linktable = DB::table("connectschedule")
                    ->join("schedule", "connectschedule.scheduleID", "=", "schedule.ScheduleID")
                    ->select("*")
                    ->get();
        return back()->with('Schedule',$linktable)->with('Employees',$Employees)->with('Success','Insert success');
    }

    public function getnum(){

        if(!Auth::check()){
            return redirect('/home');
        }

        $Getnum = schedule::get();
        //dd($Getnum);
        return view('Schedule.index')->with('Schedule',$Getnum);
    }
}
