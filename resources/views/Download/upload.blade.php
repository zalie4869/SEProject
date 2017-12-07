@extends('layouts.index')
@section('content')

<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
<link href="{{asset('css/timeline.css')}}" rel="stylesheet">
<link href="{{asset('css/startmin.css')}}" rel="stylesheet">
<link href="{{asset('css/morris.css')}}" rel="stylesheet">
<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/upload.css')}}" rel="stylesheet">
<!-- <link href="{{asset('jquery-ui-1.9.0.custom.css')}}" rel="stylesheet"> -->

<!-- Page Content -->
<div id="page-wrapper" style="border-color: #222;">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ข้อมูลเอกสาร</h1>
            </div>

            <div >
                <form action="{{ route('upload.file')}}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field()}}

                    <div class="form-group">
                        <div class="file-upload col-xs-9 col-lg-5">
                          <div class="file-select col-xs-12 col-lg-12" >
                            <div class="file-select-button " id="fileName" style="right: unset; "">Choose File</div>
                            <input class="file-select-name" name="filename" id="nameFile" placeholder="No file chosen..." 
                            style="border: unset; cursor: pointer;  " >

                            <input type="file" name="file" id="chooseFile" style="width: 84px;">
                        </div>
                    </div>

                    <input type="submit"  value="Upload" class="btn btn-primary" style="vertical-align: top;line-height: 25px;">


               </div>
           </form>
       </div>
   </div>

   <div class = "table-responsive">

    <table class="table table-hover">
        <thead>
            <tr>
                <th  style="display: none;" scope="col">#</th>
                <!--  <th scope="col">ตัวอย่างเอกสาร</th> -->
                <th scope="col">ชื่อ</th>
                <th scope="col">ขนาดไฟล์</th>
                <th scope="col">วันที่สร้าง</th>
                <th  scope="col"></th>


            </tr>
        </thead>

        <tbody>
            @foreach ($files as $file)
            <tr>
                    <td>{{$file->name}}</td>
                    <td>{{ceil($file->size/1000000)}} MB</td>
                    <td>{{$file->created_at}}</td>
                    <td>

                        <form action="{{ route('delete')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field()}}

                            <a href="/download{{substr($file->dir, 13)}}"><button   type="button" class="btn btn-success" "><i class="fa fa-download" aria-hidden="true"></i></button></a>
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input type="hidden" name="name" value="{{$file->id}}"/>
                            <button type="submit" class="btn btn-danger" onclick="Delete(event)" name="delete"/ ><i class="fa fa-trash-o" aria-hidden="true"></i></button>

                        </form>

                        <script type="text/javascript">
                            function Delete(event) {
                                var r = confirm('ต้องการลบไฟล์ใช่หรือไม่?');
                                if(r==false) { 
                                    event.preventDefault();
                                }
                            }
                        </script>

                    </td>
                </tr>
                @endforeach
            </table>

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
                        <li><a id="toLastPage" href="">&raquo;</a></li>
                    </ul>
                </center>
            </div>
</div>

</div>

<!-- File Problems -->
<div class="modal fade" id="fileModal" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #f2dede; border-radius: 4px; border-color: #ebccd1; color: #a94442;">
                <p><center id="filePB"></center></p>
            </div>
        </div>
    </div>
</div>

<!-- Success -->
<div class="modal fade" id="fileSuccess" role="dialog">
    <div class="modal-dialog modal-sm" style="top: 30%">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #ccffcc; border-radius: 4px; border-color: #009900; color: #008000;">
                <p><center  id="fileSuccessText"></center></p>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>


<!-- <script src="https://github.com/pipwerks/PDFObject/blob/master/pdfobject.min.js"></script> -->
<script type="text/javascript">

    $( document ).ready(function() {
        @if(session('upload0'))
            $('#fileSuccessText').html('อัพโหลดไฟล์สำเร็จ');
            $('#fileSuccess').modal('show');
            setTimeout(function(){
                $('#fileSuccess').modal('hide');
            },1400);
        @elseif(session('upload1'))
            $('#filePB').html('กรุณาเลือกชนิดไฟล์ให้ถูกต้อง<br>(.JPG .JPEG .PDF .DOC .XLS .PPW)');
            $('#fileModal').modal('show');
            // setTimeout(function(){
            //     $('#fileModal').modal('hide');
            // },1400);
        @elseif(session('upload2'))
            $('#filePB').html('กรุณาเลือกไฟล์ที่ต้องการและกรอกข้อมูลให้ครบถ้วน');
            $('#fileModal').modal('show');
            // setTimeout(function(){
            //     $('#fileModal').modal('hide');
            // },1400);
        @elseif(session('upload3'))
            $('#filePB').html('ขนาดไฟล์ใหญ่เกินไป<br>(ขนาดต้องไม่เกิน 8 MB)');
            $('#fileModal').modal('show');
            // setTimeout(function(){
            //     $('#fileModal').modal('hide');
            // },1400);
        @elseif(session('DeleteSuccess'))
            $('#filePB').html('ลบข้อมูลเรียบร้อยแล้ว');
            $('#fileModal').modal('show');
            setTimeout(function(){
                $('#fileModal').modal('hide');
            },1000);
        @endif
    });

    var typeOfFile = [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'application/pdf',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation'

        ];

    

    $('#chooseFile').bind('change', function(e) {
        var data = e.originalEvent.target.files[0];
        //console.log("type of file : "+data.type);
        //console.log(data.size + " is my file's size");

        if(typeOfFile.indexOf(data.type) ===  -1){
            $('#chooseFile').val('');
            $('#filePB').html('กรุณาเลือกชนิดไฟล์ให้ถูกต้อง<br>(.JPG .JPEG .PDF .DOC .XLS .PPW)');
            $('#fileModal').modal('show');
            // setTimeout(function(){
            //     $('#fileModal').modal('hide');
            // },1000);
        }
        else{
            if(data.size < 8388608) {
                //console.log("OK");

            }
            else{
                $('#chooseFile').val('');
                $('#filePB').html('ขนาดไฟล์ใหญ่เกินไป<br>(ขนาดต้องไม่เกิน 8 MB)');
                $('#fileModal').modal('show');
                // setTimeout(function(){
                //     $('#fileModal').modal('hide');
                // },1000);
            }
        }
    });

    $('#chooseFile').change(function() {
        var filename = $('#chooseFile').val();
        $('#nameFile').val(filename);
        $('#nameFile').val(filename.split(/(\\|\/)/g).pop());
        $('#nameFile').focus();
        //alert(filename);
    });


    //control the pagination button 
    $("#toFirstPage").attr('href','{{1}}');
    $("#p5").attr('href','{{$lastPage}}');
    $("#toLastPage").attr('href','{{$lastPage}}');

    if({{$page}} != 1 || {{$page}} != {{$lastPage}}){
        $("#pagePrev").attr('href','{{$page-1}}');
        $("#pageNext").attr('href','{{$page+1}}');
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
        $("#p1").attr('href','{{1}}');
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}');
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
        $("#p1").attr('href','{{1}}');
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}');
        $("#p3").html("3");
        $("#p3").attr('href','{{3}}');
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
        $("#p1").attr('href','{{1}}');
        $("#p2").html("2");
        $("#p2").attr('href','{{2}}');
        $("#p3").html("3");
        $("#p3").attr('href','{{3}}');
        $("#p4").html("4");
        $("#p4").attr('href','{{4}}');
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
            $("#p2").attr('href','{{$lastPage-3}}');
            $("#p3").html("{{$lastPage-2}}");
            $("#p3").attr('href','{{$lastPage-2}}');
            $("#p4").html("{{$lastPage-1}}");
            $("#p4").attr('href','{{$lastPage-1}}');
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
            $("#p1").attr('href','{{$page-1}}');
            $("#p2").html("{{$page}}");
            $("#p2").attr('href','{{$page}}');
            $("#p3").html("{{$page+1}}");
            $("#p3").attr('href','{{$page+1}}');
            $("#p4").html("{{$page+2}}");
            $("#p4").attr('href','{{$page+2}}');
            $("#p5").removeAttr('href');
            $(".p2").addClass('active');
            $("#p2").removeAttr('href');
        }
        else{
            $("#p1").html("1");
            $("#p1").attr('href','{{1}}');
            $("#p2").html("2");
            $("#p2").attr('href','{{2}}');
            $("#p3").html("3");
            $("#p3").attr('href','{{3}}');
            $("#p4").html("4");
            $("#p4").attr('href','{{4}}');
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

</script>



@stop
