@extends('layouts.index')
@section('content')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>STORE</title>
    <link href="{{asset('css/DMY.css')}}" rel="stylesheet">
    <link href="{{asset('css/button.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('css/startmin.css')}}" rel="stylesheet">
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>


<!-- Page Content -->
<div id="page-wrapper" style="border-color: black">
    <h1 class="page-header" style="display: inline-block;">คำนวณเงินเดือน</h1>
    <button class="button_1" data-toggle="modal" data-target="#Modal">คำนวณเงินเดือน</button>
    <div class="pagination   btn-group btn-group-justified" >
            <a href="" class="btn btn-primary" Id="Year_Prev" style="padding:5px;font-size: 20px"><<</a>
            <a href="" class="btn btn-primary" Id="Year1" style="font-size: 20px"></a>
            <a href="" class="btn btn-primary" Id="Year2" style="font-size: 20px"></a>
            <a href="" class="btn btn-primary active" Id="Year3" style="font-size: 20px"></a>
            <a href="" class="btn btn-primary" Id="Year4" style="font-size: 20px"></a>
            <a href="" class="btn btn-primary" Id="Year5" style="font-size: 20px"></a>
            <a href="" class="btn btn-primary" Id="Year_Next">>></a> 
    </div> 
    <div class="btn-group-justified" >
          <div class="pagination   btn-group btn-group-justified"  >
                <a href="#" class="btn btn-primary " Id="Month1"  >มกราคม</a> 
                <a href="#" class="btn btn-primary" Id="Month2" >กุมภาพันธ์ </a>
                <a href="#" class="btn btn-primary" Id="Month3" >มีนาคม</a>
                <a href="#" class="btn btn-primary" Id="Month4" >เมษายน </a>
                <a href="#" class="btn btn-primary" Id="Month5" >พฤษภาคม </a>
                <a href="#" class="btn btn-primary" Id="Month6" >มิถุนายน </a>
                <a href="#" class="btn btn-primary" Id="Month7" >กรกฎาคม</a>
                <a href="#" class="btn btn-primary" Id="Month8" >สิงหาคม</a>
                <a href="#" class="btn btn-primary" Id="Month9" >กันยายน</a>
                <a href="#" class="btn btn-primary" Id="Month10" >ตุลาคม</a>
                <a href="#" class="btn btn-primary" Id="Month11" >พฤศจิกายน </a>
                <a href="#" class="btn btn-primary" Id="Month12" >ธันวาคม</a>
 
            </div>
        </div>
            <!-- <div class="row" > -->
            <!-- <div class="container" style="width: 100%">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            
                            <th style="width: 150px;"><center><a id="head1" href="1?sort=IDEmployee&d=ASC" style="color: #333;">รหัสพนักงาน</a></center></th>
                            <th style="width: 175px;"><center><a id="head2" href="1?sort=FirstName&d=ASC" style="color: #333;">ชื่อ</a></center></th>
                            <th style="width: 175px;"><center><a id="head3" href="1?sort=LastName&d=ASC" style="color: #333;">นามสกุล</a></center></th>
                            <th style="width: 200px;"><center><a id="head4" href="1?sort=Position&d=ASC" style="color: #333;">ตำแหน่ง</a></center></th>
                            <th style="width: 300px;"><center><a id="head5" href="1?sort=WorkingStatus&d=ASC" style="color: #333;">เงินเดือนที่ได้</a></center></th>
                            <th style="width: 50px;"><center>แก้ไข</center></th>
                            <th style="width: 50px;"><center>ลบ</center></th>
                        </thead>     -->
                
                <br><div  style="float: center; ">
                    <div class="table-responsive" Id = 'msg'>
                         <table id="mytable" class="table table-bordred table-striped btn-group-justified">
                                   
                                <thead>
                                   <th >รหัสพนักงาน</th>
                                    <th>ชื่อ</th>
                                     <th>นามสกุล</th>
                                     <th>ตำแหน่ง</th>
                                     <th>เงินเดือน</th>
                                     <th>แก้ไข</th>
                                     <th>ลบ</th>

                                </thead>

                    <tbody>
                    
                     @foreach($Employees as $Employee)                   
                    <tr id="{{$Employee->SalaryID}}" >
                        <td  data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->EmpID}}</td>
                        <td id="FirstName1">{{$Employee->FirstName}}</td>
                        <td id="LastName1">{{$Employee->LastName}}</td>
                        <td>{{$Employee->Position}}</td>
                        <td>{{$Employee->Sum}}</td>
                        <td>
                                <p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-primary btn-xs press-edit" data-title="Edit" data-toggle="modal" data-target="#edit" Onclick="Edit_Value({{$Employee}})" >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                   </button>
                                </p>
                        </td>
                        <td>
                                <p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" value="{{$Employee->SalaryID}}" onclick="On_Salary(value)">
                                        <span class="glyphicon glyphicon-trash"></span>
                                   </button>
                                </p>
                        </td>
                    </tr> 
                   @endforeach
                    </tbody>
        
            </table>
                    </div>
                </div>
            <!-- </div> -->


        </div>
<!-- insert -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content" style="width: 650px;" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <center><h3 class="modal-title custom_align"  id="Heading">คำนวณเงินเดือนพนักงาน</h3></center>
      </div>
      <form method="post" action="{{ route('salary.insert') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="modal-body" style="max-height: 70vh; overflow:auto;">

        <div class="form-group">
                <center><label >โปรดเลือกวันที่ต้องการคำนวณเงิน</label></center>
                <input class="form-control" type="date" name="Montyear" style="width: 100%" Id="Montyear" >
        </div>

        <label>รหัสพนักงาน</label>
        <div class="form-group">
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0 " name="EmpID" id="EmpID" onchange="On_TYPE()">
                <option selected hidden value>โปรดเลือก</option>
                @foreach($Employees1 as $Employee)
                    <option value="{{$Employee->EmpID}}" >{{$Employee->EmpID}}</option>
                @endforeach
            </select>            
        </div>


        <label>คำนำหน้าชื่อ</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="NameTitle" id="NameTitle" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="Mr" >นาย</option>
        <option value="Ms">นาง</option>
        <option value="Miss">นางสาว</option>
        </select>
        </div>

        <label>ชื่อ</label>
        <div class="form-group">
        <input class="form-control " Id="FirstName" type="text"  style="width: 100%;" readonly="readonly">
        </div>

        <label>นามสกุล</label>
        <div class="form-group">
        <input class="form-control " type="text" style="width: 100%;" Id="LastName" readonly="readonly">
        </div>

        <label>ตำแหน่ง</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="NameTitle" id="Position" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="BranchManager">ผู้จัดการร้าน</option>
        <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
        <option value="StaffFull-Time">พนักงานประจำ</option>
        <option value="StaffPart-time">พนักงานPart-Time</option>
        </select>
        </div>
            
         <label>เงินเดือนประจำ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Salary" Id="Salary" style="width: 100%"  onchange="On_Sum()" >
        </div>

        <label>ขาดงาน</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Absence" Id="Absence" style="width: 100%" onchange="On_Sum()" >
        </div>

        <label>มาสาย</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Late" Id="Late" style="width: 100%" onchange="On_Sum()" >
        </div>

        <label>OT</label>
        <div class="form-group">
        <input class="form-control " type="number" name="OT" Id="OT" style="width: 100%" onchange="On_Sum()" >
        </div>

        <label>ประกันสังคม</label>
        <div class="form-group">
        <input class="form-control " type="number" name="SocialSecurity" Id="SocialSecurity" style="width: 100%" onchange="On_Sum()">
        </div>

        <label>โบนัสพิเศษ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Bonus" Id="Bonus" style="width: 100%" onchange="On_Sum()">
        </div>

        <label>หักเงินรายจ่ายอื่นๆ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="CutWages" Id="CutWages" style="width: 100%" onchange="On_Sum()">
        </div>

         <label>รวมยอดเงินที่ได้</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Sum" Id="Sum" style="width: 100%;"; disabled>
        </div>

    
      </div>
          <div class="modal-footer ">
        <button  type="submit" class="btn btn-warning btn-lg" id="insertButton" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>เสร็จสิ้น</button>
        </form> 
      </div>
        </div>
    </div>
</div>     
</div> 


<!-- Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title custom_align" id="Heading">ลบข้อมูลพนักงาน</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="DelSure"></div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" id="clickYes">
                    <span class="glyphicon glyphicon-ok-sign"></span>ใช่
                </button>
                <button type="button" class="btn btn-default" id="closeModal" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove">
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success -->
<div class="modal fade" id="DelSuccess" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #f2dede; border-radius: 10px; border-color: #ebccd1; color: #a94442;">
                <p><center>ลบข้อมูลเรียบร้อยแล้ว</center></p>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content" style="width: 650px;" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <center><h3 class="modal-title custom_align"  id="Heading">แก้ไขเงินเดือนพนักงาน</h3></center>
      </div>
      <form method="post" action="{{ route('salary.edit') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body" style="max-height: 70vh; overflow:auto;">

        <center><div class="form-group">
                <label >วันที่คำนวณเงินเดือน</label>
                <input class="form-control" type="date" name="Montyear1"  Id="Montyear1" >
        </div></center>

        <label>รหัสพนักงาน</label>
        <div class="form-group">
            <input class="form-control " name="EmpID1" Id="EmpID1" type="text"  style="width: 100%;" readonly="readonly">       
        </div>

<!--         <label>รหัสพนักงาน</label>
        <div class="form-group">
       <input class="form-control" name="EmpID" Id="EmpID" type="text" style="width: 200px;" onchange="On_TYPE()" >
        </div>
 -->
        <label>คำนำหน้าชื่อ</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="NameTitle" id="NameTitle1" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="Mr" >นาย</option>
        <option value="Ms">นาง</option>
        <option value="Miss">นางสาว</option>
        </select>
        </div>

        <label>ชื่อ</label>
        <div class="form-group">
        <input class="form-control " Id="FirstName2" type="text"  style="width: 100%;" readonly="readonly">
        </div>

        <label>นามสกุล</label>
        <div class="form-group">
        <input class="form-control " type="text" style="width: 100%;" Id="LastName2" readonly="readonly">
        </div>

        <label>ตำแหน่ง</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="Position" id="Position1" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="BranchManager">ผู้จัดการร้าน</option>
        <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
        <option value="StaffFull-Time">พนักงานประจำ</option>
        <option value="StaffPart-time">พนักงานPart-Time</option>
        </select>
        </div>
        
         <label>เงินเดือนประจำ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Salary1" Id="Salary1" style="width: 100%;"  Onchange="On_Sum1()" >
        </div>

        <label>ขาดงาน</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Absence1" Id="Absence1" style="width: 100%;" Onchange="On_Sum1()" >
        </div>

        <label>มาสาย</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Late1" Id="Late1" style="width: 300px;" Onchange="On_Sum1()" >
        </div>

        <label>OT</label>
        <div class="form-group">
        <input class="form-control " type="number" name="OT1" Id="OT1" style="width: 100%;" Onchange="On_Sum1()" >
        </div>

        <label>ประกันสังคม</label>
        <div class="form-group">
        <input class="form-control " type="number" name="SocialSecurity1" Id="SocialSecurity1" style="width: 100%;" Onchange="On_Sum1()">
        </div>

        <label>โบนัสพิเศษ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Bonus1" Id="Bonus1" style="width: 100%;" Onchange="On_Sum1()">
        </div>

        <label>หักเงินรายจ่ายอื่นๆ</label>
        <div class="form-group">
        <input class="form-control " type="number" name="CutWages1" Id="CutWages1" style="width: 100%;" Onchange="On_Sum1()">
        </div>

         <label>รวมยอดเงินที่ได้</label>
        <div class="form-group">
        <input class="form-control " type="number" name="Sum1" Id="Sum1" style="width: 100%;" >
        </div>

    
      </div>
          <div class="modal-footer ">
        <button  type="submit" class="btn btn-warning btn-lg" id="editButton" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>เสร็จสิ้น</button>
        </form> 
      </div>
        </div>
    </div>
สิ้นสุดการสนทนาผ่านแชท
พิมพ์ข้อความ...
    </div>     


</div> 

<!-- show -->
    <div class="modal fade" id="show" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content" style="width: 750px;" >
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <center><h3 class="modal-title custom_align"  id="Heading">เงินเดือนพนักงาน</h3></center>
      </div>
      <form method="post" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="modal-body" >
        <label>รหัสพนักงาน</label>
        <div class="form-group">
            <input class="form-control active"  Id="EmpID2" type="text"  style="width: 300px;" readonly="readonly">       
        </div>

<!--         <label>รหัสพนักงาน</label>
        <div class="form-group">
       <input class="form-control" name="EmpID" Id="EmpID" type="text" style="width: 200px;" onchange="On_TYPE()" >
        </div>
 -->
        <label>คำนำหน้าชื่อ</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 active" id="NameTitle2" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="Mr" >นาย</option>
        <option value="Ms">นาง</option>
        <option value="Miss">นางสาว</option>
        </select>
        </div>

        <label>ชื่อ</label>
        <div class="form-group">
        <input class="form-control active" Id="FirstName3" type="text"  style="width: 300px;" readonly="readonly">
        </div>

        <label>นามสกุล</label>
        <div class="form-group">
        <input class="form-control active" type="text" style="width: 300px;" Id="LastName3" readonly="readonly">
        </div>

        <label>ตำแหน่ง</label>
        <div class="form-group">
        <select class="custom-select mb-2 mr-sm-2 mb-sm-0 active"  id="Position2" disabled="true">
        <option selected hidden value>โปรดเลือก</option>
        <option value="BranchManager">ผู้จัดการร้าน</option>
        <option value="AssistantManager">ผู้ช่วยผู้จัดการ</option>
        <option value="StaffFull-Time">พนักงานประจำ</option>
        <option value="StaffPart-time">พนักงาน Part-Time</option>
        </select>
        </div>
            <div class="form-group ">
                <label >วัน/เดือน/ปี</label>
                <input class="form-control " type="date"  Id="Montyear2" disabled>
            </div>
         <label>เงินเดือนประจำ</label>
        <div class="form-group ">
        <input class="form-control  " type="number" Id="Salary2" style="width: 300px;" disabled >
        </div>

        <label>ขาดงาน</label>
        <div class="form-group">
        <input class="form-control " type="number" Id="Absence2" style="width: 300px;"  disabled>
        </div>

        <label>มาสาย</label>
        <div class="form-group">
        <input class="form-control " type="number" Id="Late2" style="width: 300px;"  disabled>
        </div>

        <label>OT</label>
        <div class="form-group">
        <input class="form-control" type="number" Id="OT2" style="width: 300px;"  disabled>
        </div>

        <label>ประกันสังคม</label>
        <div class="form-group">
        <input class="form-control " type="number"  Id="SocialSecurity2" style="width: 300px;" disabled>
        </div>

        <label>โบนัสพิเศษ</label>
        <div class="form-group">
        <input class="form-control " type="number" Id="Bonus2" style="width: 300px;" disabled>
        </div>

        <label>หักเงินรายจ่ายอื่นๆ</label>
        <div class="form-group">
        <input class="form-control " type="number" Id="CutWages2" style="width: 300px;" disabled >
        </div>

         <label>รวมยอดเงินที่ได้</label>
        <div class="form-group">
            <input class="form-control " type="number" Id="Sum2" style="width: 300px"; disabled>
        </div>
    </div>
    </div>     


</div> 

</div> 



<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/startmin.js')}}"></script>

<script src="{{asset('js/dmy.js')}}"></script>

<script type="text/javascript">
    $emp = ' ';
    @if($month_Num == 1){
        document.getElementById("Month1").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 2){
        document.getElementById("Month2").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 3){
        document.getElementById("Month3").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 4){
        document.getElementById("Month4").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 5){
        document.getElementById("Month5").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 6){
        document.getElementById("Month6").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 7){
        document.getElementById("Month7").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 8){
        document.getElementById("Month8").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 9){
        document.getElementById("Month9").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 10){
        document.getElementById("Month10").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 11){
        document.getElementById("Month11").className = 'btn btn-primary active'
    }
    @elseif($month_Num == 12){
        document.getElementById("Month12").className = 'btn btn-primary active'
    }

    @endif


    function On_Salary(argument) {
        $emp = argument;
        document.getElementById("DelSure").innerHTML = "<span class=\"glyphicon glyphicon-warning-sign\"></span>&nbsp;&nbsp;&nbsp;คุณต้องการจะลบข้อมูลของ&nbsp;\""+
        $("#"+$emp+" #FirstName1").html()+"&nbsp;"+$("#"+$emp+" #LastName1").html()+
        "\"&nbsp;ใช่หรือไม่ ?";
    }
    <?php
        $js_array = json_encode($Employees1);
        echo "var array_code =".$js_array.";\n";
    ?>

    document.getElementById('Year1').innerHTML = {{$year-2}};
    document.getElementById('Year2').innerHTML = {{$year-1}};
    document.getElementById('Year3').innerHTML = {{$year}};
    document.getElementById('Year4').innerHTML = {{$year+1}};
    document.getElementById('Year5').innerHTML = {{$year+2}};

    document.getElementById('Year1').href = {{$year-2}};
    document.getElementById('Year2').href = {{$year-1}};
    document.getElementById('Year3').href = {{$year}};
    document.getElementById('Year4').href = {{$year+1}};
    document.getElementById('Year5').href = {{$year+2}};

    document.getElementById('Year_Prev').href = {{$year-1}};
    document.getElementById('Year_Next').href = {{$year+1}};

    document.getElementById('Month1').href = {{$year}}+"?month=1";  
    document.getElementById('Month2').href = {{$year}}+"?month=2"; 
    document.getElementById('Month3').href = {{$year}}+"?month=3"; 
    document.getElementById('Month4').href = {{$year}}+"?month=4"; 
    document.getElementById('Month5').href = {{$year}}+"?month=5"; 
    document.getElementById('Month6').href = {{$year}}+"?month=6"; 
    document.getElementById('Month7').href = {{$year}}+"?month=7"; 
    document.getElementById('Month8').href = {{$year}}+"?month=8"; 
    document.getElementById('Month9').href = {{$year}}+"?month=9"; 
    document.getElementById('Month10').href = {{$year}}+"?month=10"; 
    document.getElementById('Month11').href = {{$year}}+"?month=11"; 
    document.getElementById('Month12').href = {{$year}}+"?month=12"; 

    function On_TYPE() {

        for(var j=0;j<array_code.length;j++){
            if(document.getElementById('EmpID').value == array_code[j].EmpID  ){
                document.getElementById('NameTitle').value= array_code[j].NameTitle;
                //alert(array_code[j].NameTitle);  
                document.getElementById('FirstName').value= array_code[j].FirstName;
                document.getElementById('LastName').value= array_code[j].LastName;
                document.getElementById('Position').value= array_code[j].Position;
                document.getElementById('Montyear').valueAsDate = new Date();


            }
        }    
          
    }
    // function On_TYPE1() {

    //     for(var j=0;j<array_code.length;j++){
    //         if(document.getElementById('EmpID1').value == array_code[j].EmpID  ){
    //             document.getElementById('NameTitle1').value= array_code[j].NameTitle;
    //             //alert(array_code[j].NameTitle);  
    //             document.getElementById('FirstName2').value= array_code[j].FirstName;
    //             document.getElementById('LastName2').value= array_code[j].LastName;
    //             document.getElementById('Position1').value= array_code[j].Position;
    //             document.getElementById('Montyear1').valueAsDate = new Date();


    //         }
    //     }    
          
    // }
    function Edit_Value(argument) {


        // for(var j=0;j<array_code.length;j++){
            document.getElementById('EmpID1').value = argument.EmpID 
                document.getElementById('NameTitle1').value= argument.NameTitle;
                //alert(array_code[j].NameTitle);  
                document.getElementById('FirstName2').value= argument.FirstName;
                document.getElementById('LastName2').value= argument.LastName;
                document.getElementById('Position1').value= argument.Position;
                document.getElementById('Montyear1').value =argument.Montyear;
                document.getElementById('Salary1').value =argument.Salary;
                document.getElementById('Absence1').value =argument.Absence;
                document.getElementById('Late1').value =argument.Late;
                document.getElementById('OT1').value =argument.OT;
                document.getElementById('SocialSecurity1').value =argument.SocialSecurity;
                document.getElementById('Bonus1').value =argument.Bonus;
                document.getElementById('CutWages1').value =argument.CutWages;
                document.getElementById('Sum1').value =argument.Sum;





            
        // } 
    }
    function Show_Value(argument) {


        // for(var j=0;j<array_code.length;j++){
            document.getElementById('EmpID2').value = argument.EmpID 
                document.getElementById('NameTitle2').value= argument.NameTitle;
                //alert(array_code[j].NameTitle);  
                document.getElementById('FirstName3').value= argument.FirstName;
                document.getElementById('LastName3').value= argument.LastName;
                document.getElementById('Position2').value= argument.Position;
                document.getElementById('Montyear2').value =argument.Montyear;
                document.getElementById('Salary2').value =argument.Salary;
                document.getElementById('Absence2').value =argument.Absence;
                document.getElementById('Late2').value =argument.Late;
                document.getElementById('OT2').value =argument.OT;
                document.getElementById('SocialSecurity2').value =argument.SocialSecurity;
                document.getElementById('Bonus2').value =argument.Bonus;
                document.getElementById('CutWages2').value =argument.CutWages;
                document.getElementById('Sum2').value =argument.Sum;





            
        // } 
    }
    function On_Sum() {
        var Sum = parseInt(document.getElementById('Salary').value)+parseInt(document.getElementById('OT').value)-parseInt(document.getElementById('SocialSecurity').value)-parseInt(document.getElementById('Late').value)-parseInt(document.getElementById('Absence').value)+parseInt(document.getElementById('Bonus').value)-parseInt(document.getElementById('CutWages').value);
        document.getElementById('Sum').value = Sum;
    }
    function On_Sum1() {
        var Sum1 = parseInt(document.getElementById('Salary1').value)+parseInt(document.getElementById('OT1').value)-parseInt(document.getElementById('SocialSecurity1').value)-parseInt(document.getElementById('Late1').value)-parseInt(document.getElementById('Absence1').value)+parseInt(document.getElementById('Bonus1').value)-parseInt(document.getElementById('CutWages1').value);
        document.getElementById('Sum1').value = Sum1;
    }



    $(document).ready(function(){
        $('#clickYes').click(function(){
            $.ajax({
                type: 'POST',
                url: '/salary/delete',
                data: {
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'ID' : $emp
                },
                dataType: 'JSON'
            }).done(function(data){
                console.log(data);
                $("#"+$emp).fadeOut();
                $("#closeModal").click();
                //$('#DelSuccess').attr('data-target','#DelSuccess');
                $('#DelSuccess').modal('show');
                setTimeout(function(){
                    $('#DelSuccess').modal("hide");
                },2000);

            }).fail(function(){
                console.log("Error");
            });
        });
    });
</script>



@stop
