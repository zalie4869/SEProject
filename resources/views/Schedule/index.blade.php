@extends('layouts.index')
@section('content')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>STORE</title>

  
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">


    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">


    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">


    <link href="{{asset('css/startmin.css')}}" rel="stylesheet">

    <link href="{{asset('css/morris.css')}}" rel="stylesheet">

    
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <meta name="viewport" content="{{asset('width=device-width, initial-scale=1.0')}}">
    <meta charset="UTF-8">
    <script src = "{{asset('js/index.js')}}"></script>

    <script
    src="{{asset('https://code.jquery.com/jquery-3.2.1.js')}}"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>

    <script src = "{{asset('js/custom.js')}}"></script>
    <style>
        @media print{
            @page {size: landscape}  
            .no-print, .no-print *{
                display: none !important;
            }
            #page-wrapper{
               
                margin : 0;
            }
            
        }
    </style>

</head>
<!-- Page Content -->
<div id="page-wrapper" style="border-color: #222;">
        <h1 class="page-header ">ตารางการทำงาน</h1>
    <div class = "table-responsive">
            <table class = "table table-hover table-condensed" id = "mytable">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>Name-Surname</th>
                        <th>ตำแหน่ง</th>
                        <th>Phone Number</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Employees as $Employee)
                        <tr onclick = "editfunction(this)">
                            <td style="display: none;">{{$Employee->EmpID}}</td>
                            <td>{{$Employee->FirstName}} {{$Employee->LastName}}</td>
                            <td>{{$Employee->Position}}</td>
                            <td>{{$Employee->Phone}}</td>
                        @if(count($Schedule)!=0)
                            <?php $check = true; ?>
                            @foreach($Schedule as $getnum) 
                                @if($getnum->EmpID==$Employee->EmpID)
                                    <td >{{$getnum->Mon}}</td>
                                    <td>{{$getnum->Tue}}</td>
                                    <td>{{$getnum->Wed}}</td>
                                    <td>{{$getnum->Thu}}</td>
                                    <td>{{$getnum->Fri}}</td>
                                    <td>{{$getnum->Sat}}</td>
                                    <td>{{$getnum->Sun}}</td>
                                    <?php $check = false; ?>
                                 
                                @endif
                            @endforeach
                            @if($check)
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                            @endif
                        @else
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                        @endif
                    @endforeach
                        </tr>
                </tbody>
            </table>
         </div>

        <div class = "no-print row" style = "margin-bottom : 10px;">
            
            <!-- <div class = " col-md-3 col-xs-4">
                <button class = "btn btn-primary btn-block" onclick = "showinfoinsert()">
                    <span class="glyphicon glyphicon-plus"></span> Insert</button>
            </div> -->
            <div class = "col-md-3 col-xs-4">
                <button class = "btn btn-warning btn-block" onclick = "showinfoedit()">
                    <span class="glyphicon glyphicon-pencil"></span> Edit</button>
            </div>
            <div class = "col-md-3 col-xs-4">
                <button class = "btn btn-warning btn-block" onclick = "window.print()">
                    <span class="glyphicon glyphicon-print"></span> Print</button>
            </div>
            <!-- <div class = "col-md-3 col-xs-4">
                <button class = "btn btn-danger btn-block" onclick = "delrow()">
                    <span class="glyphicon glyphicon-trash"></span> Delete</button>
            </div> -->
            
        </div>      
        
        <div style = "display : none;" id = "disapp">
            <div class = "no-print row">
                <div class = " col-md-4 col-xs-12">
                    <label>Name-Surname</label>
                    <input type="text" class = "form-control" id = "name" disabled>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <label>ตำแหน่ง</label>
                    <input type="text" class = "form-control" id = "pos" disabled>
                </div>
                <div class = "col-md-4 col-xs-12">
                    <label>Phone-Number</label>
                    <input type="text" class = "form-control" id = "phone" disabled>
                </div>
            </div>

            <form method="post" action="{{ route('schedule.insert') }}" enctype="multipart/form-data" id="form1">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden"  class = "form-control" id="EmpID" name="EmpID" value="">
                <div class = "no-print row" style = "margin-bottom : 10px;">
                    <div class = "col-md-1 col-xs-6">
                        <label>Monday</label>
                        <input type="text" class = "form-control"  id="mon" name="Mon" value="">
                    </div>
                    <div class = "col-md-2 col-xs-6">
                        <label>Tuesday</label>
                        <input type="text" class = "form-control"  id="tues" name="Tue" value="">
                    </div>
                    <div class = "col-md-2 col-xs-6">
                        <label>Wednesday</label>
                        <input type="text" class = "form-control"  id="wed" name="Wed" value="">
                    </div>
                    <div class = "col-md-2 col-xs-6">
                        <label>Thursday</label>
                        <input type="text" class = "form-control"  id="thurs" name="Thu" value="">
                    </div>
                    <div class = "col-md-2 col-xs-6">
                        <label>Friday</label>
                        <input type="text" class = "form-control"  id="fri" name="Fri" value="">
                    </div>
                    <div class = "col-md-2 col-xs-6">
                        <label>Saturday</label>
                        <input type="text" class = "form-control"  id="satur" name="Sun" value="">
                    </div>
                    <div class = "col-md-1 col-xs-12">
                        <label>Sunday</label>
                        <input type="text" class = "form-control" id="sun" name="Sat" value="">
                    </div>
                    
                </div>
             </div>
        
            <div   class=" no-print col-md-3 col-xs-4" style = "display : none; margin-left:-15px; margin-top:10px;              margin-bottom :     15px" id = "btn-edit">
                 <button type="submit" onclick = "addedit()" class = "btn btn-warning btn-block">Edit <span class="glyphicon glyphicon-user"></span></button>
        </div>
        </form>

    </div>
   </div>



<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>



@stop
