<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body >
    
</div>
<div id="app" >
    <nav class="navbar navbar-default navbar-static-top" style="background-color: #222" >
        <div class="container" >
            <div class="navbar-header" style="color: #9d9d9d" >
                <!-- Branding Image -->
                <a class="navbar-brand" style="color: #d9d9d9;">ร้านค้า</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse" >
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav"  >
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right"  >
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                    <li><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
