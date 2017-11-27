@extends('layouts.index')
@section('content')
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/timeline.css')}}" rel="stylesheet">
    <link href="{{asset('css/startmin.css')}}" rel="stylesheet">
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/upload.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('jquery-ui-1.9.0.custom.css')}}" rel="stylesheet"> -->

</head>
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
                            <div class="file-select-button" id="fileName">Choose File</div>
                            <input class="file-select-name" name="filename" id="nameFile" placeholder="No file chosen..." 
                            style="border: unset; cursor: pointer;" readonly>

                            <input type="file" name="file" id="chooseFile" style="width: 84px;">
                        </div>
                    </div>

                    <input type="submit"  value="Upload" class="btn btn-primary" style="vertical-align: top;line-height: 25px;">

                    @if(session('upload0')) 
                        <div class="alert alert-success" style="margin-top: 10px;">
                           <center>อัพโหลดไฟล์สำเร็จ<strong>!!</strong></center>
                        </div>

                    @elseif(session('upload1')) 
                        <div class="alert alert-danger" style="margin-top: 10px;">
                           <center>กรุณาเลือกชนิดไฟล์ให้ถูกต้อง<strong>!!</strong></center>
                        </div>

                    @elseif(session('upload2')) 
                        <div class="alert alert-danger" style="margin-top: 10px;">
                            <center>กรุณาเลือกไฟล์ที่ต้องการและกรอกข้อมูลให้ครบถ้วน<strong>!!</strong></center>
                        </div>
                    @elseif(session('upload3')) 
                        <div class="alert alert-danger" style="margin-top: 10px;">
                            <center>ขนาดไฟล์ใหญ่เกินไป<strong>!!</strong></center>
                        </div>
                    @endif
               </div>
           </form>
       </div>
   </div>

   <div class = "table-responsive">

    <table class="table">
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
                <!-- 
                    <?php $src = "public/upload".substr($file->dir, 13); ?>
                    <td><a class="example-image-link" href="{{asset($src)}}" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image"  width="100" height="100" src="{{asset($src)}}" alt=""/></a></td> -->

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


<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/startmin.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
<!-- <script src="https://github.com/pipwerks/PDFObject/blob/master/pdfobject.min.js"></script> -->
<script type="text/javascript">
    $('#chooseFile').change(function() {
        var filename = $('#chooseFile').val();
        $('#nameFile').val(filename);
        $('#nameFile').val(filename.split(/(\\|\/)/g).pop());
        //$('#nameFile').focus();
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
