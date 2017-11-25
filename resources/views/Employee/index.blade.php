@extends('layouts.index')
@section('content')
@include('employee.insert')
@include('employee.edit')
@include('employee.delete')

<!-- Page Content -->
<div id="page-wrapper" style="border-color: #222;">
    <div>
        <h1 class="page-header">ข้อมูลพนักงาน
            <button type="button" class="btn btn-success press-insert" data-title="Insert" data-toggle="modal" data-target="#insert" style="float: right;"><i class="fa fa-plus-square"></i>&nbsp;เพิ่ม</button>
        </h1>
        <form method="get" action="{{ url('employee/1') }}" enctype="multipart/form-data">
            <div id="searchContainer" style="width: 250px; float: right; padding-right: 15px;">
                <div class="input-group">
                    <div class="form-group has-feedback has-clear">
                        <input type="text" class="form-control" id="" placeholder="ค้นหาพนักงาน" value="{{$search}}" name="search" required>
                        <span class="form-control-clear glyphicon glyphicon-remove form-control-feedback hidden"></span>
                    </div>
                    <span class="input-group-btn">
                        <!-- <button type="submit" class="btn btn-primary" id="">ค้นหา</button> -->
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </div><br>
        </form>
    </div><br>
    <div class="container" style="width: 100%">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <!-- <th><input type="checkbox" id="checkall" /></th> -->
                            <th style="width: 150px;"><center><a id="head1" href="1?sort=IDEmployee&d=ASC" style="color: #333;">หมายเลข</a></center></th>
                            <th style="width: 175px;"><center><a id="head2" href="1?sort=FirstName&d=ASC" style="color: #333;">ชื่อ</a></center></th>
                            <th style="width: 175px;"><center><a id="head3" href="1?sort=LastName&d=ASC" style="color: #333;">นามสกุล</a></center></th>
                            <th style="width: 200px;"><center><a id="head4" href="1?sort=Position&d=ASC" style="color: #333;">ตำแหน่ง</a></center></th>
                            <th style="width: 250px;"><center>E-mail</center></th>
                            <th style="width: 150px;"><center>เบอร์ติดต่อ</center></th>
                            <th style="width: 300px;"><center><a id="head5" href="1?sort=WorkingStatus&d=ASC" style="color: #333;">สถานะการทำงาน</a></center></th>
                            <th style="width: 50px;"><center>แก้ไข</center></th>
                            <th style="width: 50px;"><center>ลบ</center></th>
                        </thead>
                        <tbody id="contentBody">
                            @foreach($Employees as $Employee)
                            <tr id="{{ $Employee->IDEmployee }}">
                                <!-- <td><input type="checkbox" class="checkthis" /></td> -->
                                <td><center>{{ $Employee->IDEmployee }}</center></td>
                                <td><center id="FirstName">{{ $Employee->FirstName }}</center></td>
                                <td><center id="LastName">{{ $Employee->LastName }}</center></td>
                                @if($Employee->Position === 'BranchManager')
                                    <td><center>ผู้จัดการ</center></td>
                                @elseif($Employee->Position === 'AssistantManager')
                                    <td><center>ผู้ช่วยผู้จัดการ</center></td>
                                @elseif($Employee->Position === 'StaffFull-Time')
                                    <td><center>พนักงานประจำ</center></td>
                                @elseif($Employee->Position === 'StaffPart-time')
                                    <td><center>พนักงานชั่วคราว</center></td>
                                @else
                                    <td><center></center></td>
                                @endif
                                <td><center>{{ $Employee->Email }}</center></td>
                                <td><center>{{ $Employee->Phone }}</center></td>
                                @if($Employee->WorkingStatus === 'Working')
                                    <td><center><div class="sphere green"></div>ทำงานอยู่</center></td>
                                @elseif($Employee->WorkingStatus === 'Suspended')
                                    <td><center><div class="sphere blue"></div>พักงาน</center></td>
                                @elseif($Employee->WorkingStatus === 'NotWorking')
                                    <td><center><div class="sphere orange"></div>ลาออก</center></td>
                                @elseif($Employee->WorkingStatus === 'InviteOut')
                                    <td><center><div class="sphere red"></div>เชิญออก</center></td>
                                @else
                                    <td><center></center></td>
                                @endif
                                <td>
                                    <center>
                                        <p data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-primary btn-xs press-edit clickEdit" data-title="Edit" data-toggle="modal" data-target="#edit" value="{{ $Employee->IDEmployee }}" onclick="clickEdit(value)"">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </p>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" value="{{ $Employee->IDEmployee }}" onclick="clickDelete(value)">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div id="page" style="display: none;">
        <center>
            <ul class="pagination pagination">
                <li><a id="toFirstPage" href="{{1}}">&laquo;</a></li>
                <li><a id="pagePrev" href="">&lsaquo;</a></li>
                <li class="p1"><a id="p1" href=""></a></li>
                <li class="p2"><a id="p2" href=""></a></li>
                <li class="p3"><a id="p3" href=""></a></li>
                <li class="p4"><a id="p4" href=""></a></li>
                <li class="p5"><a id="p5">...</a></li>
                <li><a id="pageNext" href="">&rsaquo;</a></li>
                <li><a id="toLastPage" href="{{$lastPage}}">&raquo;</a></li>
            </ul>
        </center>
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script type="text/javascript">

    $emp = '';
    $sort = '';
    $srt = '';
    $d = '';
    $sch = '{{$search}}';
    $search = '';

    @if($search){
        $search = "search={{$search}}&";
        //if()
        $("#head1").attr('href','1?'+$search+'sort=IDEmployee&d=ASC');
        $("#head2").attr('href','1?'+$search+'sort=FirstName&d=ASC');
        $("#head3").attr('href','1?'+$search+'sort=LastName&d=ASC');
        $("#head4").attr('href','1?'+$search+'sort=Position&d=ASC');
        $("#head5").attr('href','1?'+$search+'sort=WorkingStatus&d=ASC');
    }
    @else{
        $search = "";
    }
    @endif
    
    //control the url of sort
    @if(Request::input('sort') === 'IDEmployee')
        $srt = 'IDEmployee';
        @if(Request::input('d') === 'ASC')
            $d = 'ASC';
            $sort = '?sort=IDEmployee&d=ASC';
            $("#head1").html("หมายเลข&#9662;");
            $("#head1").attr('href','1?'+$search+'sort=IDEmployee&d=DESC');
        @elseif(Request::input('d') === 'DESC')
            $d = 'DESC';
            $sort = '?sort=IDEmployee&d=DESC';
            $("#head1").html("หมายเลข&#9652;");
            $("#head1").attr('href','1?'+$search+'sort=IDEmployee&d=ASC');
        @endif

    @elseif(Request::input('sort') === 'FirstName')
        $srt = 'FirstName';
        @if(Request::input('d') === 'ASC')
            $d = 'ASC';
            $sort = '?sort=FirstName&d=ASC';
            $("#head2").html("ชื่อ&#9662;");
            $("#head2").attr('href','1?'+$search+'sort=FirstName&d=DESC');
        @elseif(Request::input('d') === 'DESC')
            $d = 'DESC';
            $sort = '?sort=FirstName&d=DESC';
            $("#head2").html("ชื่อ&#9652;");
            $("#head2").attr('href','1?'+$search+'sort=FirstName&d=ASC');
        @endif
    @elseif(Request::input('sort') === 'LastName')
        $srt = 'LastName';
        @if(Request::input('d') === 'ASC')
            $d = 'ASC';
            $sort = '?sort=LastName&d=ASC';
            $("#head3").html("นามสกุล&#9662;");
            $("#head3").attr('href','1?'+$search+'sort=LastName&d=DESC');
        @elseif(Request::input('d') === 'DESC')
            $d = 'DESC';
            $sort = '?sort=LastName&d=DESC';
            $("#head3").html("นามสกุล&#9652;");
            $("#head3").attr('href','1?'+$search+'sort=LastName&d=ASC');
        @endif
    @elseif(Request::input('sort') === 'Position')
        $srt = 'Position';
        @if(Request::input('d') === 'ASC')
            $d = 'ASC';
            $sort = '?sort=Position&d=ASC';
            $("#head4").html("ตำแหน่ง&#9662;");
            $("#head4").attr('href','1?'+$search+'sort=Position&d=DESC');
        @elseif(Request::input('d') === 'DESC')
            $d = 'DESC';
            $sort = '?sort=Position&d=DESC';
            $("#head4").html("ตำแหน่ง&#9652;");
            $("#head4").attr('href','1?'+$search+'sort=Position&d=ASC');
        @endif
    @elseif(Request::input('sort') === 'WorkingStatus')
        $srt = 'WorkingStatus';
        @if(Request::input('d') === 'ASC')
            $d = 'ASC';
            $sort = '?sort=WorkingStatus&d=ASC';
            $("#head5").html("สถานะการทำงาน&#9662;");
            $("#head5").attr('href','1?'+$search+'sort=WorkingStatus&d=DESC');
        @elseif(Request::input('d') === 'DESC')
            $d = 'DESC';
            $sort = '?sort=WorkingStatus&d=DESC';
            $("#head5").html("สถานะการทำงาน&#9652;");
            $("#head5").attr('href','1?'+$search+'sort=WorkingStatus&d=ASC');
        @endif
    @endif

    if($search){
        $sort = $sort.slice(1);
        $search = '?'+$search;
        //alert($sort);
    }
    if(!$sort){
        $search = $search.slice(0,-1);
    }
    

    //control the pagination button 
    $("#toFirstPage").attr('href','{{1}}'+$search+$sort);
    $("#p5").attr('href','{{$lastPage}}'+$search+$sort);
    $("#toLastPage").attr('href','{{$lastPage}}'+$search+$sort);

    if({{$page}} != 1 || {{$page}} != {{$lastPage}}){
        $("#pagePrev").attr('href','{{$page-1}}'+$search+$sort);
        $("#pageNext").attr('href','{{$page+1}}'+$search+$sort);
        if({{$page}} == 1){
            $("#toFirstPage").removeAttr('href');
            $("#toFirstPage").css('background-color','#eee');
            $("#pagePrev").removeAttr('href');
            $("#pagePrev").css('background-color','#eee');
        }
        else if({{$page}} == {{$lastPage}}){
            $("#toLastPage").removeAttr('href');
            $("#toLastPage").css('background-color','#eee');
            $("#pageNext").removeAttr('href');
            $("#pageNext").css('background-color','#eee');
        }
    }

    if({{$lastPage}} > 1){
        $("#page").css('display','block');
    }

    if({{$lastPage}} == 2){
        $("#p1").html("1");
        $("#p1").attr('href','{{1}}'+$search+$sort);
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}'+$search+$sort);
        $(".p3").remove();
        $(".p4").remove();
        $(".p5").remove();
        if({{$page}} == 1){
            $(".p1").addClass('active');
            $("#p1").removeAttr('href');
        }
        else{
            $(".p2").addClass('active');
            $("#p2").removeAttr('href');
        }
    }
    else if({{$lastPage}} == 3){
        $("#p1").html("1");
        $("#p1").attr('href','{{1}}'+$search+$sort);
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}'+$search+$sort);
        $("#p3").html("3");
        $("#p3").attr('href','{{3}}'+$search+$sort);
        $("#p4").remove();
        $("#p5").remove();
        if({{$page}} == 1){
            $(".p1").addClass('active');
            $("#p1").removeAttr('href');
        }
        else if({{$page}} == 2){
            $(".p2").addClass('active');
            $("#p2").removeAttr('href');
        }
        else{
            $(".p3").addClass('active');
            $("#p3").removeAttr('href');
        }
    }
    else if({{$lastPage}} == 4){
        $("#p1").html("1");
        $("#p1").attr('href','{{1}}'+$search+$sort);
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}'+$search+$sort);
        $("#p3").html("3");
        $("#p3").attr('href','{{3}}'+$search+$sort);
        $("#p4").html("4");
        $("#p4").attr('href','{{4}}'+$search+$sort);
        $("#p5").remove();
        if({{$page}} == 1){
            $(".p1").addClass('active');
            $("#p1").removeAttr('href');
        }
        else if({{$page}} == 2){
            $(".p2").addClass('active');
            $("#p2").removeAttr('href');
        }
        else if({{$page}} == 3){
            $(".p3").addClass('active');
            $("#p3").removeAttr('href');
        }
        else{
            $(".p4").addClass('active');
            $("#p4").removeAttr('href');
        }
    }
    else if({{$lastPage}} >= 5){
        if({{$lastPage-$page}} <= 2){
            $("#p1").html("...");
            $("#p1").removeAttr('href');
            $("#p2").html("{{$lastPage-3}}");
            $("#p2").attr('href','{{$lastPage-3}}'+$search+$sort);
            $("#p3").html("{{$lastPage-2}}");
            $("#p3").attr('href','{{$lastPage-2}}'+$search+$sort);
            $("#p4").html("{{$lastPage-1}}");
            $("#p4").attr('href','{{$lastPage-1}}'+$search+$sort);
            $("#p5").html("{{$lastPage}}");
            if({{$page}} == {{$lastPage}}){
                $(".p5").addClass('active');
                $("#p5").removeAttr('href');
            }
            else if({{$page}} == {{$lastPage-1}}){
                $(".p4").addClass('active');
                $("#p4").removeAttr('href');
            }
            else if({{$page}} == {{$lastPage-2}}){
                $(".p3").addClass('active');
                $("#p3").removeAttr('href');
            }
        }
        else if({{$page}} >= 3){
            $("#p1").html("{{$page-1}}");
            $("#p1").attr('href','{{$page-1}}'+$search+$sort);
            $("#p2").html("{{$page}}");
            $("#p2").attr('href','{{$page}}'+$search+$sort);
            $("#p3").html("{{$page+1}}");
            $("#p3").attr('href','{{$page+1}}'+$search+$sort);
            $("#p4").html("{{$page+2}}");
            $("#p4").attr('href','{{$page+2}}'+$search+$sort);
            $("#p5").removeAttr('href');
            $(".p2").addClass('active');
            $("#p2").removeAttr('href');
        }
        else{
            $("#p1").html("1");
            $("#p1").attr('href','{{1}}'+$search+$sort);
            $("#p2").html("2");
            $("#p2").attr('href','{{2}}'+$search+$sort);
            $("#p3").html("3");
            $("#p3").attr('href','{{3}}'+$search+$sort);
            $("#p4").html("4");
            $("#p4").attr('href','{{4}}'+$search+$sort);
            $("#p5").removeAttr('href');
            if({{$page}} == 1){
            $(".p1").addClass('active');
            $("#p1").removeAttr('href');
            }
            else if({{$page}} == 2){
                $(".p2").addClass('active');
                $("#p2").removeAttr('href');
            }
        }
    }

    function clickEdit(argument){
        //alert(argument);
        $emp = argument;
    }

    function clickDelete(argument){
        $emp = argument;
        document.getElementById("DelSure").innerHTML = "<span class=\"glyphicon glyphicon-warning-sign\"></span>&nbsp;&nbsp;&nbsp;คุณต้องการจะลบข้อมูลของ&nbsp;\""+
        $("#"+$emp+" #FirstName").html()+"&nbsp;"+$("#"+$emp+" #LastName").html()+
        "\"&nbsp;ใช่หรือไม่ ?";
    }

    $(document).ready(function(){

        $(".clickEdit").click(function(){
            $("#loadingEdit").show();
            $.ajax({
                type: 'POST',
                url: '/employee/getdata',
                data: {
                    '_token'    : $('meta[name="csrf-token"]').attr('content'),
                    'ID'        : $emp
                },
                dataType: 'JSON'
            }).done(function(data){
                //console.log(data);
                $("#loadingEdit").hide();
                $('#IDEmployee2').val(data.Employee[0].IDEmployee);
                $('#NameTitle2').val(data.Employee[0].NameTitle);
                $('#FirstName2').val(data.Employee[0].FirstName);
                $('#LastName2').val(data.Employee[0].LastName);
                $('#NickName2').val(data.Employee[0].NickName);
                $('#Gender2').val(data.Employee[0].Gender);

                if(data.Employee[0].BloodType === null){
                    $('#BloodType2').val(null);
                    $('#OtherBloodType2').hide();
                }
                else if(data.Employee[0].BloodType === 'A' ||
                    data.Employee[0].BloodType === 'AB' ||
                    data.Employee[0].BloodType === 'B' ||
                    data.Employee[0].BloodType === 'O'){
                    $('#OtherBloodType2').hide();
                    $('#BloodType2').val(data.Employee[0].BloodType);
                }
                else{
                    $('#BloodType2').val('Other');
                    $('#OtherBloodType2').show();
                    $('#OtherBloodType2').val(data.Employee[0].BloodType);
                }

                $('#BirthDate2').val(data.Employee[0].BirthDate);
                $('#Height2').val(data.Employee[0].Height);
                $('#Weight2').val(data.Employee[0].Weight);
                $('#Disease2').val(data.Employee[0].Disease);
                $('#Position2').val(data.Employee[0].Position);
                $('#WorkingStatus2').val(data.Employee[0].WorkingStatus);
                $('#PresentAddress2').val(data.Employee[0].PresentAddress);

                if(data.Employee[0].Residence === null){
                    $('#Residence2').val(null);
                    $('#OtherResidenceBox2').hide();
                }
                else if(data.Employee[0].Residence === 'OwnHouse' ||
                    data.Employee[0].Residence === 'RentHouse' ||
                    data.Employee[0].Residence === 'BoardingHouse' ||
                    data.Employee[0].Residence === 'StudentHousing'){
                    $('#OtherResidenceBox2').hide();
                    $('#Residence2').val(data.Employee[0].Residence);
                }
                else{
                    $('#Residence2').val('Other');
                    $('#OtherResidenceBox2').show();
                    $('#OtherResidenceBox2').val(data.Employee[0].Residence);
                }

                $('#Phone2').val(data.Employee[0].Phone);
                $('#E-mail2').val(data.Employee[0].Email);
                $('#IDCardNo2').val(data.Employee[0].IDCardNo);
                $('#IssueDATE2').val(data.Employee[0].IssueDATE);
                $('#ExpireDATE2').val(data.Employee[0].ExpireDATE);
                $('#Nationality2').val(data.Employee[0].Nationality);
                $('#Race2').val(data.Employee[0].Race);
                $('#IDCardAddress2').val(data.Employee[0].IDCardAddress);

                $('#NamePrimary2').val(data.Employee[0].NamePrimary);
                $('#LocatPrimary2').val(data.Employee[0].LocatPrimary);
                $('#GPA_Primary2').val(data.Employee[0].GPA_Primary);

                $('#NamSecondary2').val(data.Employee[0].NamSecondary);
                $('#LocatSecondary2').val(data.Employee[0].LocatSecondary);
                $('#GPA_Secondary2').val(data.Employee[0].GPA_Secondary);

                $('#NamHigh2').val(data.Employee[0].NamHigh);
                $('#LocatHigh2').val(data.Employee[0].LocatHigh);
                $('#Major_High2').val(data.Employee[0].Major_High);
                $('#GPA_High2').val(data.Employee[0].GPA_High);

                $('#NamVocational2').val(data.Employee[0].NamVocational);
                $('#LocatVocational2').val(data.Employee[0].LocatVocational);
                $('#Major_Vocational2').val(data.Employee[0].Major_Vocational);
                $('#GPA_Vocational2').val(data.Employee[0].GPA_Vocational);

                $('#NamUniversity2').val(data.Employee[0].NamUniversity);
                $('#LocatUniversity2').val(data.Employee[0].LocatUniversity);
                $('#Major_University2').val(data.Employee[0].Major_University);
                $('#GPA_University2').val(data.Employee[0].GPA_University);

                $('#NamOther2').val(data.Employee[0].NamOther);
                $('#LocatOther2').val(data.Employee[0].LocatOther);
                $('#Major_Other2').val(data.Employee[0].Major_Other);
                $('#GPA_Other2').val(data.Employee[0].GPA_Other);

                $('#FatherFirstName2').val(data.Employee[0].FatherFirstName);
                $('#FatherLastName2').val(data.Employee[0].FatherLastName);
                $('#FatherAddress2').val(data.Employee[0].FatherAddress);
                $('#FatherPhone2').val(data.Employee[0].FatherPhone);

                $('#MotherFirstName2').val(data.Employee[0].MotherFirstName);
                $('#MotherLastName2').val(data.Employee[0].MotherLastName);
                $('#MotherAddress2').val(data.Employee[0].MotherAddress);
                $('#MotherPhone2').val(data.Employee[0].MotherPhone);

                $('#MaritalStatus2').val(data.Employee[0].MaritalStatus);
                if(data.Employee[0].MaritalStatus === 'Single'){
                    changeMaritalStatus2();
                }

                $('#SpouseFirstName2').val(data.Employee[0].SpouseFirstName);
                $('#SpouseLastName2').val(data.Employee[0].SpouseLastName);
                $('#SpouseAddress2').val(data.Employee[0].SpouseAddress);
                $('#SpousePhone2').val(data.Employee[0].SpousePhone);
                
                $('#PersonFirstName2').val(data.Employee[0].PersonFirstName);
                $('#PersonLastName2').val(data.Employee[0].PersonLastName);
                $('#PersonAddress2').val(data.Employee[0].PersonAddress);
                $('#PersonPhone2').val(data.Employee[0].PersonPhone);

                $('#GuarantorFirstName2').val(data.Employee[0].GuarantorFirstName);
                $('#GuarantorLastName2').val(data.Employee[0].GuarantorLastName);
                $('#GuarantorAddress2').val(data.Employee[0].GuarantorAddress);
                $('#GuarantorPhone2').val(data.Employee[0].GuarantorPhone);

                $('#CompanyName2').val(data.Employee[0].CompanyName);
                $('#WorkingExAddress2').val(data.Employee[0].WorkingExAddress);
                $('#WorkingExPosition2').val(data.Employee[0].WorkingExPosition);
                $('#WorkingExPhone2').val(data.Employee[0].WorkingExPhone);
                $('#ReasonForLearing2').val(data.Employee[0].ReasonForLearing);

            }).fail(function(e){
                console.log("Error");
                //alert("ไม่สามารถเปิดข้อมูลได้");
            });
        });

        $("#editForm").submit(function(e){
            var jsonObj = {};
            jQuery.map( $("#editForm").serializeArray(), function( n, i ) {
                jsonObj[n.name] = n.value;
            });
            $.ajax({
                type: 'POST',
                url: '/employee/edit',
                data: {
                    '_token'    : $('meta[name="csrf-token"]').attr('content'),
                    'ID'        : $emp,
                    'data'      : jsonObj
                },
                dataType: 'JSON'
            }).done(function(data){
                //console.log(data.error);

                if(data.error === 'IDEmployee'){
                    $('#dupTextEdit').html('รหัสพนักงานซ้ำซ้อน');
                    $('#EditDup').modal('show');
                    return;
                }
                else if(data.error === 'IDCardNo'){
                    $('#dupTextEdit').html('หมายเลขบัตรประชาชนซ้ำซ้อน');
                    $('#EditDup').modal('show');
                    return;
                }
                
                $('#edit').modal('hide');
                $('#EditSuccess').modal('show');
                setTimeout(function(){
                    location.reload();
                },550);
                
            }).fail(function(e){
                console.log("Error");
            });
            e.preventDefault();
        });

        $("#insertForm").submit(function(e){
            var jsonObj = {};
            jQuery.map( $("#insertForm").serializeArray(), function( n, i ) {
                jsonObj[n.name] = n.value;
            });
            $.ajax({
                type: 'POST',
                url: '/employee/insert',
                data: {
                    '_token'    : $('meta[name="csrf-token"]').attr('content'),
                    'data'      : jsonObj
                },
                dataType: 'JSON'
            }).done(function(data){
                //console.log(data.error);

                if(data.error === 'IDEmployee'){
                    $('#dupTextInsert').html('รหัสพนักงานซ้ำซ้อน');
                    $('#InsertDup').modal('show');
                    return;
                }
                else if(data.error === 'IDCardNo'){
                    $('#dupTextInsert').html('หมายเลขบัตรประชาชนซ้ำซ้อน');
                    $('#InsertDup').modal('show');
                    return;
                }
                
                $('#insert').modal('hide');
                $('#InsertSuccess').modal('show');
                setTimeout(function(){
                    location.reload();
                },550);
                
            }).fail(function(e){
                console.log("Error");
            });
            e.preventDefault();
        });

        $("#delete").on('hidden.bs.modal', function(){
            $('#clickYes').removeClass('disabled');
            $('#loadingDelete').hide();
            $('#loadingEdit').hide();
        });

        $('#clickYes').click(function(){
            $('#clickYes').addClass('disabled');
            $('#loadingDelete').show();
            $.ajax({
                type: 'POST',
                url: '/employee/delete',
                data: {
                    '_token'    : $('meta[name="csrf-token"]').attr('content'),
                    'ID'        : $emp,
                    'sort'      : $srt,
                    'd'         : $d,
                    'search'    : $sch,
                    'page'      : {{$page}},
                    'lastPage'  : {{$lastPage}}
                },
                dataType: 'JSON'
            }).done(function(data){
                //console.log(data);
                $("#"+$emp).fadeOut();
                setTimeout(function(){
                    $("#"+$emp).remove();
                },1500);
                $("#closeModal").click();
                $('#DelSuccess').modal('show');
                setTimeout(function(){
                    $('#DelSuccess').modal("hide");
                },1500);

                // if(data.content === 1){
                //     var $tr = $("<tr>", {id: data.Employees[0].IDEmployee});
                //     var $td1 = $("<td>");
                //     var $center1 = $("<center>",{text:data.Employees[0].IDEmployee});
                //     var $td2 = $("<td>");
                //     var $center2 = $("<center>",{id:"FirstName",text:data.Employees[0].FirstName});
                //     var $td3 = $("<td>");
                //     var $center3 = $("<center>",{id:"LastName",text:data.Employees[0].LastName});

                //     var $td4 = $("<td>");
                //     if(data.Employees[0].Position === 'BranchManager'){
                //         var $center4 = $("<center>",{text:'ผู้จัดการ'});
                //     }
                //     else if(data.Employees[0].Position === 'AssistantManager'){
                //         var $center4 = $("<center>",{text:'ผู้ช่วยผู้จัดการ'});
                //     }
                //     else if(data.Employees[0].Position === 'StaffFull-Time'){
                //         var $center4 = $("<center>",{text:'พนักงานประจำ'});      
                //     }
                //     else if(data.Employees[0].Position === 'StaffPart-time'){
                //         var $center4 = $("<center>",{text:'พนักงานชั่วคราว'});        
                //     }
                //     else{
                //         var $center4 = $("<center>",{text:''});
                //     }  

                //     var $td5 = $("<td>");
                //     var $center5 = $("<center>",{text:data.Employees[0].Email});
                //     var $td6 = $("<td>");
                //     var $center6 = $("<center>",{text:data.Employees[0].Phone});

                //     var $td7 = $("<td>");
                //     if(data.Employees[0].WorkingStatus === 'Working'){
                //         var $center7 = $("<center>",{text: 'ทำงานอยู่'});
                //         $center7.prepend($("<div>").addClass('sphere green'));
                //     }
                //     else if(data.Employees[0].WorkingStatus === 'Suspended'){
                //         var $center7 = $("<center>",{text: 'พักงาน'});
                //         $center7.prepend($("<div>").addClass('sphere blue'));
                //     }
                //     else if(data.Employees[0].WorkingStatus === 'NotWorking'){
                //         var $center7 = $("<center>",{text: 'ลาออก'});
                //         $center7.prepend($("<div>").addClass('sphere orange'));
                //     }
                //     else if(data.Employees[0].WorkingStatus === 'InviteOut'){
                //         var $center7 = $("<center>",{text: 'เชิญออก'});
                //         $center7.prepend($("<div>").addClass('sphere red'));
                //     }
                //     else{
                //         var $center7 = $("<center>",{text: ''});
                //     }
                    
                //     var $td8 = $("<td>");
                //     var $center8 = $("<center>");
                //     var $p1 = $("<p>").attr({"data-placement":"top","data-toggle":"tooltip","title":"Edit"});
                //     var $button1 = $("<button>").attr({"class":"btn btn-primary btn-xs press-edit","data-title":"Edit","data-toggle":"modal","data-target":"#edit"});
                //     var $span1 = $("<span>",{class:"glyphicon glyphicon-pencil"})
                //     $button1.append($span1);
                //     $p1.append($button1)
                //     $center8.append($p1);

                //     var $td9 = $("<td>");
                //     var $center9 = $("<center>");
                //     var $p2 = $("<p>").attr({"data-placement":"top","data-toggle":"tooltip","title":"Delete"});
                //     var $button2 = $("<button>").attr({"class":"btn btn-danger btn-xs","data-title":"Delete","data-toggle":"modal","data-target":"#delete","value":data.Employees[0].IDEmployee,"onclick":"clickDelete(value)"});
                //     var $span2 = $("<span>",{class:"glyphicon glyphicon-trash"})
                //     $button2.append($span2);
                //     $p2.append($button2)
                //     $center9.append($p2);

                //     $td1.append($center1);
                //     $td2.append($center2);
                //     $td3.append($center3);
                //     $td4.append($center4);
                //     $td5.append($center5);
                //     $td6.append($center6);
                //     $td7.append($center7);
                //     $td8.append($center8);
                //     $td9.append($center9);

                //     $tr.append($td1);
                //     $tr.append($td2);
                //     $tr.append($td3);
                //     $tr.append($td4);
                //     $tr.append($td5);
                //     $tr.append($td6);
                //     $tr.append($td7);
                //     $tr.append($td8);
                //     $tr.append($td9);

                //     $('#contentBody').append($tr);
                // }

                setTimeout(function(){
                    location.reload();
                },550);
            }).fail(function(e){
                console.log("Error");
            });
        });
    });
</script>

@stop
