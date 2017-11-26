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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('css/startmin.css')}}" rel="stylesheet">
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>


<!-- Page Content -->
<div id="page-wrapper" style="border-color: black">
    
    <div class = "row">
        <div class = "col-xs-7 col-ms-8 col-md-8">
            <h1 class="page-header" >คำนวณเงินเดือน</h1>
        </div>
        <!-- <div class="col-xs-2"></div> -->
        <div class = "col-xs-5 col-ms-3 col-md-3">
            <button class=" page-header button_1" data-toggle="modal" data-target="#insert" >คำนวณเงินเดือน</button>
        </div>
    </div>
    
    
    <div class="form-group">
        <div class = "row">
            <div class = "col-xs-12 col-sm-5" style = "margin-bottom : 15px;">
                <div class = "col-xs-4 col-sm-3" style = "text-align :center;">
                    <label for="sel1">ปี</label>
                </div>
                <div class = "col-xs-8 col-sm-9">
                    <select class="form-control" Id="Year" >
                        <!-- <option>โปรดเลือก</option> -->
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
            </div>
            <div class = "col-xs-12 col-sm-5">
                <div class = "col-xs-4 col-sm-4" style = "text-align : center;">
                    <label for="sel1">เดือน</label>
                </div>
                <div class = "col-xs-8 col-sm-8" >
                    <select class="form-control" id="Month">
                        <option value="1" >มกราคม</option>
                        <option value="2">กุมภาพันธ์</option>
                        <option value="3">มีนาคม</option>
                        <option value="4">เมษายน</option>
                        <option value="5">พฤษภาคม</option>
                        <option value="6">มิถุนายน</option>
                        <option value="7">กรกฎาคม</option>
                        <option value="8">สิงหาคม</option>
                        <option value="9">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11" value="พฤศจิกายน">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-1 ">
                <div class="col-xs-8"></div>
                <div class="col-xs-4 col-sm-4 ">
                    <a href=" " type="button" class="btn btn-primary" id="YearMonth" onclick="Year_Month(document.getElementById('Year').value,document.getElementById('Month').value)">ค้นหา</a>    
                </div>
                

            </div>
        </div>
        
    </div>

    <br><div  style="float: center; " >
        <div class="table-responsive" Id = 'msg'>
           <table id="mytable" class="table table-bordred table-striped table-hover">
             
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
           <tr id="{{$Employee->SalaryID}}">
            <td data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->EmpID}}</td>
            <td id="FirstName1" data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->FirstName}}</td>
            <td id="LastName1"  data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->LastName}}</td>
            <td  data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->Position}}</td>
            <td  data-toggle="modal" data-target="#show" Onclick="Show_Value({{$Employee}})">{{$Employee->Sum}}</td>
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
<div class = "modal" id = "insert" role = "dialog" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true"  >
    <div class = "modal-dialog">
        <div class="modal-content">
            <div class = "modal-header">
                <h3 class = "modal-title custom_align" style = "display : inline">เงินเดือนพนักงาน</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style = "display : inline"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            </div>
            <form method = "post" action="{{ route('salary.insert') }}" onsubmit="return Submit()">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class = "modal-body">


                    <div class = "row rowbottom" >
                        <div class = "col-xs-12 col-sm-6 marginbottom">
                            <div class = "col-xs-5" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0;">รหัสพนักงาน</p>
                            </div>
                            
                            <div class = "col-xs-7 paddingleft " >
                                <select class="form-control " name="EmpID" id="EmpID" onchange="On_TYPE()"  >
                                    <option selected hidden value>โปรดเลือก</option>
                                    @foreach($Employees1 as $Employee)
                                    <option value="{{$Employee->EmpID}}" >{{$Employee->EmpID}}</option>
                                    @endforeach
                                </select> 
                                <span style="color: red;" id="fo1"></span>
                            </div>
                        </div>


                        <div class = "col-xs-12 col-sm-6">
                            <div class = "col-xs-4" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0;">ตำแหน่ง</p>
                            </div>
                            <div class = "col-xs-8 paddingleft">
                                
                                <input class="form-control" type="text" id = "Position" readonly style = "text-align : center;">
                                
                                
                            </div>
                        </div>
                    </div>



                    <div class = "row rowbottom">
                        <div class = "col-xs-12" style = "line-height : 34px;">
                            <div class = "col-xs-4 paddingleft">
                                <input class="form-control " type="text" id = "NameTitle" readonly>
                            </div>
                            <div class = "col-xs-8" style = "padding-left : 0">
                                
                                <input class="form-control " type="text" id = "NameShow" readonly style = "text-align : center;">
                                
                            </div>
                        </div>
                    </div>

                    <div class = "row rowbottom">
                        <div class = "col-xs-12" style = "line-height : 34px;">
                            <div class = "col-xs-5">
                                <p class = "center" style = "margin : 0;">วัน/เดือน/ปี</p>
                            </div>
                            <div class = "col-xs-7" style = "padding-left : 0;">
                                <input class="form-control " type="date" name="Montyear" id = "Montyear">
                            </div>
                        </div>
                    </div>

                    <hr style = "border-top: 3px double #8c8b8b;">




                    <div class = "row rowbottom">
                        <div class = "col-xs-12 col-sm-6 marginbottom">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0;">เงินเดือนประจำ</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class=" form-control  "  type="number" id="Salary" name="Salary"  style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)'> 
                                <span style="color: red;" id="fo2"></span>
                            </div>
                        </div>


                        <div class = "col-xs-12 col-sm-6">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0; color : red;">ขาดงาน</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                
                                <input class="form-control " type="number" id = "Absence" name = "Absence" style = "text-align : center;" Onchange="On_Sum()"onkeypress='validate(event)'>
                                <span style="color: red;" id="fo3"></span>
                            </div>
                        </div>
                    </div>



                    <div class = "row rowbottom">
                        <div class = "col-xs-12 col-sm-6 marginbottom">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0; color : red;">มาสาย</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control "  type="number" id="Late" name="Late" style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)'>  
                                <span style="color: red;" id="fo4"></span> 
                            </div>
                        </div>


                        <div class = "col-xs-12 col-sm-6">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0;">OT</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control " type="number" id = "OT" name="OT" style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)'>
                                <span style="color: red;" id="fo5"></span> 
                            </div>

                        </div>
                    </div>


                    <div class = "row rowbottom">
                        <div class = "col-xs-12 col-sm-6 marginbottom">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0; color : red;">ประกันสังคม</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control "  type="number" id="SocialSecurity" name="SocialSecurity" style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)'>   
                                <span style="color: red;" id="fo6"></span> 
                            </div>
                        </div>


                        <div class = "col-xs-12 col-sm-6">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0;">โบนัสพิเศษ</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control " type="number" id = "Bonus" name = "Bonus" style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)' >
                                <span style="color: red;" id="fo7"></span> 
                            </div>
                        </div>
                    </div>


                    <div class = "row rowbottom">
                        <div class = "col-xs-12 col-sm-6 marginbottom">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0; color : red;">รายจ่ายอื่นๆ</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control "  type="number" id="CutWages" name="CutWages" style = "text-align : center;" Onchange="On_Sum()" onkeypress='validate(event)'>   
                                <span style="color: red;" id="fo8"></span> 
                            </div>
                        </div>


                        <div class = "col-xs-12 col-sm-6">
                            <div class = "col-xs-6" style = "line-height : 34px;">
                                <p class = "center" style = "margin : 0; border-bottom : 2px solid red;">รวมยอดเงินที่ได้</p>
                            </div>
                            <div class = "col-xs-6"  style = "padding-left : 0;">
                                <input class="form-control " type="number" id = "Sum" name = "Sum" style = "text-align : center;" readonly >
                            </div>
                        </div>
                    </div>
                    <div class = "row rowbottom">
                        <div class = "col-xs-12">
                            <button  type="submit" class="btn btn-warning btn-lg"  id="insertButton" style="width: 100%;" Onclick="setColor()"><span class="glyphicon glyphicon-ok-sign"></span>เสร็จสิ้น</button>   
                        </div>
                    </div>


                </div>
            </form>
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
    <div class = "modal" id = "edit" role = "dialog" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h3 class = "modal-title custom_align" style = "display : inline">เงินเดือนพนักงาน</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style = "display : inline"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                </div>
                <form method = "post" action="{{ route('salary.edit') }}" onsubmit="return Submit1()">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class = "modal-body">


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-5" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">รหัสพนักงาน</p>
                                </div>
                                
                                <div class = "col-xs-7 paddingleft">
                                    <input class="form-control " name="EmpID1" Id="EmpID1" type="text"  style="width: 100%;" readonly>  
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-4" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">ตำแหน่ง</p>
                                </div>
                                <div class = "col-xs-8 paddingleft">
                                    
                                    <input class="form-control " type="text" id = "Position1" readonly style = "text-align : center;">
                                    
                                </div>
                            </div>
                        </div>



                        <div class = "row rowbottom">
                            <div class = "col-xs-12" style = "line-height : 34px;">
                                <div class = "col-xs-4 paddingleft">
                                    <input class="form-control " type="text"  id="NameTitle1" id = "NameTitle" readonly>
                                </div>
                                <div class = "col-xs-8" style = "padding-left : 0">
                                    
                                    <input class="form-control " type="text" id = "NameShow2" readonly style = "text-align : center;">
                                    
                                </div>
                            </div>
                        </div>

                        <div class = "row rowbottom">
                            <div class = "col-xs-12" style = "line-height : 34px;">
                                <div class = "col-xs-5">
                                    <p class = "center" style = "margin : 0;">วัน/เดือน/ปี</p>
                                </div>
                                <div class = "col-xs-7" style = "padding-left : 0;">
                                    <input class="form-control" type="date"  name="Montyear1" Id="Montyear1" readonly >
                                </div>
                            </div>
                        </div>

                        <hr style = "border-top: 3px double #8c8b8b;">




                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">เงินเดือนประจำ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control "  type="number" id="Salary1" name="Salary1"  style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)'>   
                                    <span style="color: red;" id="fo_2"></span>
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">ขาดงาน</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    
                                    <input class="form-control " type="number" id = "Absence1" name = "Absence1" style = "text-align : center;" Onchange="On_Sum1()"onkeypress='validate(event)'>
                                    <span style="color: red;" id="fo_3"></span>    
                                </div>
                            </div>
                        </div>



                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">มาสาย</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control "  type="number" id="Late1" name="Late1" style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)'>   
                                    <span style="color: red;" id="fo_4"></span>
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">OT</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control " type="number" id = "OT1" name="OT1" style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)'>
                                    <span style="color: red;" id="fo_5"></span>
                                </div>
                            </div>
                        </div>


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">ประกันสังคม</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control "  type="number" id="SocialSecurity1" name="SocialSecurity1" style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)'>   
                                    <span style="color: red;" id="fo_6"></span>
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">โบนัสพิเศษ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control " type="number"  id = "Bonus1" name = "Bonus1" style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)' >
                                    <span style="color: red;" id="fo_7"></span>
                                </div>
                            </div>
                        </div>


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">รายจ่ายอื่นๆ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control "  type="number" id="CutWages1" name="CutWages1" style = "text-align : center;" Onchange="On_Sum1()" onkeypress='validate(event)'>   
                                    <span style="color: red;" id="fo_8"></span>
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; border-bottom : 2px solid red;">รวมยอดเงินที่ได้</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control " type="number"  id = "Sum1" name = "Sum1" style = "text-align : center;" readonly >
                                </div>
                            </div>
                        </div>
                        <div class = "row rowbottom">
                            <div class = "col-xs-12">
                                <button  type="submit" class="btn btn-warning btn-lg" id="editButton" style="width: 100%;" Onclick="setColor1()"><span class="glyphicon glyphicon-ok-sign"></span>เสร็จสิ้น</button>   
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- show -->

    <div class = "modal" id = "show" role = "dialog" tabindex="-1" role="dialog" ria-labelledby="modal" aria-hidden="true">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h3 class = "modal-title custom_align" style = "display : inline">เงินเดือนพนักงาน</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style = "display : inline"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                </div>
                <form method = "post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class = "modal-body">


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">รหัสพนักงาน</p>
                                </div>
                                <div class = "col-xs-6 paddingleft">
                                    
                                    <input class="form-control active"  type="text" id="EmpID2" readonly style = "text-align : center;">
                                    
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-4" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">ตำแหน่ง</p>
                                </div>
                                <div class = "col-xs-8 paddingleft">
                                    
                                    <input class="form-control active" type="text" id = "Position2" readonly style = "text-align : center;">
                                    
                                </div>
                            </div>
                        </div>



                        <div class = "row rowbottom">
                            <div class = "col-xs-12" style = "line-height : 34px;">
                                <div class = "col-xs-4 paddingleft">
                                    <input class="form-control active" type="text" id = "NameTitle2" readonly>
                                </div>
                                <div class = "col-xs-8" style = "padding-left : 0">
                                    
                                    <input class="form-control active" type="text" id = "NameShow1" readonly style = "text-align : center;">
                                    
                                </div>
                            </div>
                        </div>

                        <div class = "row rowbottom">
                            <div class = "col-xs-12" style = "line-height : 34px;">
                                <div class = "col-xs-5">
                                    <p class = "center" style = "margin : 0;">วัน/เดือน/ปี</p>
                                </div>
                                <div class = "col-xs-7" style = "padding-left : 0;">
                                    <input class="form-control active" type="date" id = "Montyear2" readonly>
                                </div>
                            </div>
                        </div>

                        <hr style = "border-top: 3px double #8c8b8b;">




                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">เงินเดือนประจำ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active"  type="text" id="Salary2" style = "text-align : center;" readonly>   
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">ขาดงาน</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    
                                    <input class="form-control active" type="text" id = "Absence2" style = "text-align : center;" readonly>
                                    
                                </div>
                            </div>
                        </div>



                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">มาสาย</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active"  type="text" id="Late2" style = "text-align : center;" readonly>   
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">OT</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active" type="text" id = "OT2" style = "text-align : center;" readonly>
                                </div>
                            </div>
                        </div>


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">ประกันสังคม</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active"  type="text" id="SocialSecurity2" style = "text-align : center;" readonly>   
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0;">โบนัสพิเศษ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active" type="text" id = "Bonus2" style = "text-align : center;" readonly>
                                </div>
                            </div>
                        </div>


                        <div class = "row rowbottom">
                            <div class = "col-xs-12 col-sm-6 marginbottom">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; color : red;">รายจ่ายอื่นๆ</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active"  type="text" id="CutWages2" style = "text-align : center;" readonly>   
                                </div>
                            </div>


                            <div class = "col-xs-12 col-sm-6">
                                <div class = "col-xs-6" style = "line-height : 34px;">
                                    <p class = "center" style = "margin : 0; border-bottom : 2px solid red;">รวมยอดเงินที่ได้</p>
                                </div>
                                <div class = "col-xs-6"  style = "padding-left : 0;">
                                    <input class="form-control active" type="text" id = "Sum2" style = "text-align : center;" readonly>
                                </div>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>

    <div>
    </div>



    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/startmin.js')}}"></script>
    <script src="{{asset('js/dmy.js')}}"></script>

    <script type="text/javascript">
        $emp = '';
        document.getElementById('Year').value = {{$year}};
        document.getElementById('Month').value = {{$month_Num}};
        function Year_Month(argument,argument1) {
            document.getElementById('YearMonth').href = "/salary/"+argument+"?month="+argument1;
            $year=argument;
            $month_Num = argument1;
        }

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

        function On_TYPE() {
           
            for(var j=0;j<array_code.length;j++){
                if(document.getElementById('EmpID').value == array_code[j].EmpID  ){
                    document.getElementById('NameTitle').value= array_code[j].NameTitle;
                //alert(array_code[j].Position);  
                document.getElementById('Position').value= array_code[j].Position;
                document.getElementById('NameShow').value = array_code[j].FirstName + " " + array_code[j].LastName;
                document.getElementById('Montyear').valueAsDate = new Date();

            }
        }    
        
    }
    
    function Edit_Value(argument) {
        
        document.getElementById('EmpID1').value = argument.EmpID 
        document.getElementById('NameTitle1').value= argument.NameTitle;
        document.getElementById('NameShow2').value = argument.FirstName + " " + argument.LastName;
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
                // document.getElementById('FirstName3').value= argument.FirstName;
                // document.getElementById('LastName3').value= argument.LastName;
                
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

                document.getElementById('NameShow1').value = argument.FirstName + " " + argument.LastName;



                
        // } 
    }
    function On_Sum() {
        var Sum = parseInt(document.getElementById('Salary').value)+parseInt(document.getElementById('OT').value)-parseInt(document.getElementById('SocialSecurity').value)-parseInt(document.getElementById('Late').value)-parseInt(document.getElementById('Absence').value)+parseInt(document.getElementById('Bonus').value)-parseInt(document.getElementById('CutWages').value);
        document.getElementById('Sum').value = Sum;
    }
    function On_Sum1(argument) {
        var Sum1 = parseInt(document.getElementById('Salary1').value)+parseInt(document.getElementById('OT1').value)+parseInt(document.getElementById('Bonus1').value)-parseInt(document.getElementById('SocialSecurity1').value)-parseInt(document.getElementById('Late1').value)-parseInt(document.getElementById('Absence1').value)-parseInt(document.getElementById('CutWages1').value);
        document.getElementById('Sum1').value = Sum1;
    }
    function Submit() {
        if(document.getElementById('EmpID').value=="" || document.getElementById('Salary').value=="" || document.getElementById('Absence').value=="" || document.getElementById('Late').value=="" || document.getElementById('OT').value=="" || document.getElementById('SocialSecurity').value=="" || document.getElementById('Bonus').value=="" || document.getElementById('CutWages').value=="" ){
            return false;
            
        }

        else{
            return true;
            
        }
    }
    function setColor() {
        if(document.getElementById('EmpID').value==""){
            document.getElementById('EmpID').style.border =  "3px red solid";
            document.getElementById('fo1').innerHTML = "กรุณาใส่ข้อมูล";
        }
        if(document.getElementById('Salary').value==""){
            document.getElementById('Salary').style.border =  "3px red solid";
            document.getElementById('fo2').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Absence').value==""){
            document.getElementById('Absence').style.border =  "3px red solid";
            document.getElementById('fo3').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Late').value==""){
            document.getElementById('Late').style.border =  "3px red solid";
            document.getElementById('fo4').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('OT').value==""){
            document.getElementById('OT').style.border =  "3px red solid";
            document.getElementById('fo5').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('SocialSecurity').value==""){
            document.getElementById('SocialSecurity').style.border =  "3px red solid";
            document.getElementById('fo6').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Bonus').value==""){
            document.getElementById('Bonus').style.border =  "3px red solid";
            document.getElementById('fo7').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('CutWages').value==""){
            document.getElementById('CutWages').style.border =  "3px red solid";
            document.getElementById('fo8').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('EmpID').value!="" || document.getElementById('Salary').value!="" || document.getElementById('Absence').value!="" || document.getElementById('Late').value!="" || document.getElementById('OT').value!="" || document.getElementById('SocialSecurity').value!="" || document.getElementById('Bonus').value!="" || document.getElementById('CutWages').value!="" ){

            if(document.getElementById('EmpID').value!=""){
                document.getElementById('EmpID').style.border =  "0px";
                document.getElementById('fo1').innerHTML = "";
            }
            if(document.getElementById('Salary').value!=""){
                document.getElementById('Salary').style.border =  "0px";
                document.getElementById('fo2').innerHTML = "";
            } 
            if(document.getElementById('Absence').value!=""){
                document.getElementById('Absence').style.border =  "0px";
                document.getElementById('fo3').innerHTML = "";
            } 
            if(document.getElementById('Late').value!=""){
                document.getElementById('Late').style.border =  "0px";
                document.getElementById('fo4').innerHTML = "";
            } 
            if(document.getElementById('OT').value!=""){
                document.getElementById('OT').style.border =  "0px";
                document.getElementById('fo5').innerHTML = "";
            } 
            if(document.getElementById('SocialSecurity').value!=""){
                document.getElementById('SocialSecurity').style.border =  "0px";
                document.getElementById('fo6').innerHTML = "";
            } 
            if(document.getElementById('Bonus').value!=""){
                document.getElementById('Bonus').style.border =  "0px";
                document.getElementById('fo7').innerHTML = "";
            } 
            if(document.getElementById('CutWages').value!=""){
                document.getElementById('CutWages').style.border =  "0px";
                document.getElementById('fo8').innerHTML = "";
            } 
        }
    }
    function Submit1() {
        if( document.getElementById('Salary1').value=="" || document.getElementById('Absence1').value=="" || document.getElementById('Late1').value=="" || document.getElementById('OT1').value=="" || document.getElementById('SocialSecurity1').value=="" || document.getElementById('Bonus1').value=="" || document.getElementById('CutWages1').value=="" ){
            return false;
        }
        else{
            return true;
        }
    }
    function setColor1() {
        if(document.getElementById('Salary1').value==""){
            document.getElementById('Salary1').style.border =  "3px red solid";
            document.getElementById('fo_2').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Absence1').value==""){
            document.getElementById('Absence1').style.border =  "3px red solid";
            document.getElementById('fo_3').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Late1').value==""){
            document.getElementById('Late1').style.border =  "3px red solid";
            document.getElementById('fo_4').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('OT1').value==""){
            document.getElementById('OT1').style.border =  "3px red solid";
            document.getElementById('fo_5').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('SocialSecurity1').value==""){
            document.getElementById('SocialSecurity1').style.border =  "3px red solid";
            document.getElementById('fo_6').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('Bonus1').value==""){
            document.getElementById('Bonus1').style.border =  "3px red solid";
            document.getElementById('fo_7').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if(document.getElementById('CutWages1').value==""){
            document.getElementById('CutWages1').style.border =  "3px red solid";
            document.getElementById('fo_8').innerHTML = "กรุณาใส่ข้อมูล";
        } 
        if( document.getElementById('Salary1').value!="" || document.getElementById('Absence1').value!="" || document.getElementById('Late1').value!="" || document.getElementById('OT1').value!="" || document.getElementById('SocialSecurity1').value!="" || document.getElementById('Bonus1').value!="" || document.getElementById('CutWages1').value!="" ){

            if(document.getElementById('Salary1').value!=""){
                document.getElementById('Salary1').style.border =  "0px";
                document.getElementById('fo_2').innerHTML = "";
            } 
            if(document.getElementById('Absence1').value!=""){
                document.getElementById('Absence1').style.border =  "0px";
                document.getElementById('fo_3').innerHTML = "";
            } 
            if(document.getElementById('Late1').value!=""){
                document.getElementById('Late1').style.border =  "0px";
                document.getElementById('fo_4').innerHTML = "";
            } 
            if(document.getElementById('OT1').value!=""){
                document.getElementById('OT1').style.border =  "0px";
                document.getElementById('fo_5').innerHTML = "";
            } 
            if(document.getElementById('SocialSecurity1').value!=""){
                document.getElementById('SocialSecurity1').style.border =  "0px";
                document.getElementById('fo_6').innerHTML = "";
            } 
            if(document.getElementById('Bonus1').value!=""){
                document.getElementById('Bonus1').style.border =  "0px";
                document.getElementById('fo_7').innerHTML = "";
            } 
            if(document.getElementById('CutWages1').value!=""){
                document.getElementById('CutWages1').style.border =  "0px";
                document.getElementById('fo_8').innerHTML = "";
            } 
        }
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
<script>
    function validate(evt) {
      var theEvent = evt || window.event;
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode( key );
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

</script>



@stop
