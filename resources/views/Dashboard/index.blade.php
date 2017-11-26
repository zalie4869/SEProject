@extends('layouts.index')
@section('content')

<!-- <link rel="stylesheet" href="{{asset('css/example.css')}}"> -->
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
<link rel="stylesheet" href="{{asset('css/morris.css')}}">

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
    <div class="row">
        <div class = "col-xs-12">
            <h3>กราฟแสดงเงินเดือนพนักงานในปี <?php echo date("Y")?></h3>
        </div>
        <div class="col-xs-12" style="width: 100%; margin-bottom : 20px !important;">
            <div id="graph1"></div>
        </div>
        <div class = "col-xs-12">
            <h3>กราฟแสดงเงินเดือนพนักงานรายปี</h3>
        </div>
        <div class="col-xs-12" style="width: 100%;">
            <div id="graph2"></div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/morris.js')}}"></script>
<script src="{{asset('js/example.js')}}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<!-- <script src="{{asset('js/g.js')}}"></script> -->

<script type="text/javascript">
    <?php 
        $M1 = $eachMonth[0];
        $M2 = $eachMonth[1];
        $M3 = $eachMonth[2];
        $M4 = $eachMonth[3];
        $M5 = $eachMonth[4];
        $M6 = $eachMonth[5];
        $M7 = $eachMonth[6];
        $M8 = $eachMonth[7];
        $M9 = $eachMonth[8];
        $M10 = $eachMonth[9];
        $M11 = $eachMonth[10];
        $M12 = $eachMonth[11];

        $Y1 = $eachYear[0];
        $Y2 = $eachYear[1];
        $Y3 = $eachYear[2];
        $Y4 = $eachYear[3];
        $Y5 = $eachYear[4];
        $Y6 = $eachYear[5];
        $Y7 = $eachYear[6];
        $Y8 = $eachYear[7];
        $Y9 = $eachYear[8];
        $Y10 = $eachYear[9];
        $Y11 = $eachYear[10];
        $Y12 = $eachYear[11];
        $Y13 = $eachYear[12];
        $Y14 = $eachYear[13];
        $Y15 = $eachYear[14];
        $Y16 = $eachYear[15];
    ?>
    var month_data = [
        {"elapsed": "มกราคม", "value": {{$M1}} },
        {"elapsed": "กุมภาพันธ์", "value": {{$M2}} },
        {"elapsed": "มีนาคม", "value": {{$M3}} },
        {"elapsed": "เมษายน", "value": {{$M4}} },
        {"elapsed": "พฤษภาคม", "value": {{$M5}} },
        {"elapsed": "มิถุนายน", "value": {{$M6}} },
        {"elapsed": "กรกฎาคม", "value": {{$M7}} },
        {"elapsed": "สิงหาคม", "value": {{$M8}} },
        {"elapsed": "กันยายน", "value": {{$M9}} },
        {"elapsed": "ตุลาคม", "value": {{$M10}} },
        {"elapsed": "พฤศจิกายน", "value": {{$M11}} },
        {"elapsed": "ธันวาคม", "value": {{$M12}} }
    ];

    var year_data = [
        {"elapsed": "2007", "value": {{$Y1}} },
        {"elapsed": "2008", "value": {{$Y2}} },
        {"elapsed": "2009", "value": {{$Y3}} },
        {"elapsed": "2010", "value": {{$Y4}} },
        {"elapsed": "2011", "value": {{$Y5}} },
        {"elapsed": "2012", "value": {{$Y6}} },
        {"elapsed": "2013", "value": {{$Y7}} },
        {"elapsed": "2014", "value": {{$Y8}} },
        {"elapsed": "2015", "value": {{$Y9}} },
        {"elapsed": "2016", "value": {{$Y10}} },
        {"elapsed": "2017", "value": {{$Y11}} },
        {"elapsed": "2018", "value": {{$Y12}} },
        {"elapsed": "2019", "value": {{$Y13}} },
        {"elapsed": "2020", "value": {{$Y14}} },
        {"elapsed": "2021", "value": {{$Y15}} },
        {"elapsed": "2022", "value": {{$Y16}} },
    ];

    Morris.Line({
        element: 'graph1',
        data: month_data,
        xkey: 'elapsed',
        ykeys: ['value'],
        labels: ['value'],
        parseTime: false
    });

    Morris.Line({
        element: 'graph2',
        data: year_data,
        xkey: 'elapsed',
        ykeys: ['value'],
        labels: ['value'],
        parseTime: false
    });
</script>

@stop
