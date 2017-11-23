<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{{ asset('shop.png') }}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ระบบจัดตารางงาน</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
    <link href="{{ asset('css/startmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/circle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search_input.css') }}">

</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">STORE</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> รวิพล <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> ข้อมูลส่วนตัว</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" style="max-height: none;">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{route('dashboard.index')}}" class="active"><img src = "{{ asset('image/dashboard.PNG') }}">หน้าแรก</a>
                        </li>
                        <li>
                            <a href="{{route('employee.page')}}" class="active"><img src="{{ asset('image/people.PNG') }}">ข้อมูลพนักงาน</a>
                        </li>
                        <li>
                            <a href="{{route('schedule.index')}}" class="active"><img src="{{ asset('image/Employee.PNG') }}">ตารางทำงาน</a>
                        </li>
                        <li>
                            <a href="{{route('salary.page')}}" class="active"><img src="{{ asset('image/money.PNG') }}">คำนวณเงินเดือน</a>
                        </li>
                        <li>
                            <a href="{{route('Download.page')}}" class="active"><img src="{{ asset('image/document.PNG') }}">อัพโหลดเอกสาร</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/startmin.js') }}"></script>
<script  src="{{ asset('js/search_input.js') }}"></script>

</body>
</html>
