<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class DashboardController extends Controller
{
    public function Dashboard(){
      $Employees = Employee::orderBy('FirstName') -> get();
      return view('Dashboard.dashboard') -> with('Employees',$Employees);
    }
}
