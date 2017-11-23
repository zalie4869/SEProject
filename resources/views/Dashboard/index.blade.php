@extends('layouts.index')
@section('content')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="{{asset('css/dash.css')}}">

    <meta name="viewport" content="{{asset('width=device-width, initial-scale=1.0')}}">
    <meta charset="UTF-8">
    <script src = "{{asset('js/index.js')}}"></script>
    <script
    src="{{asset('https://code.jquery.com/jquery-3.2.1.js')}}"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>

    <script src = "{{asset('js/custom.js')}}"></script>

    <link href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://cdn.oesmith.co.uk/morris-0.5.1.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/g.css')}}" rel="stylesheet" type="text/css">

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

    </div>

   </div>


   <div class="row">
    <div class="col-sm-6" ></div>
    <div class="col-sm-6 " style= "position=absolute;" text-center">
      <div id="area-chart" ></div>
    </div>
  </div>

  


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js')}}"></script>
<script src="{{asset('js/g.js')}}"></script>


@stop
