@extends('layouts.index')
@section('content')

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
                <tr>
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

<div class="row" style="">
    <div class="col-sm-6" ></div>
    <div class="col-sm-6 " style= "position=absolute;" text-center">
        <div id="area-chart" ></div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>

<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js')}}"></script>
<script src="{{asset('js/g.js')}}"></script>

@stop
