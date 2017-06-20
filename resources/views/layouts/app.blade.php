<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href ="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    @yield('css')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="topNav">
            <div class="container">
                <div class="navbar-header alignR">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="parallax-div">
                            <h1 class="parallax-text">
                                {{ config('settings.app.name') }}
                            </h1>
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right topNav1">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="cart.html"><i class="fa fa-shopping-cart fa-fw"></i>2 Item(s) - <span class="badge badge-warning"> $448.42</span></a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i> Home</a></li>
                            <li><a href="cart.html"><i class="fa fa-shopping-cart fa-fw"></i>2 Item(s) - <span class="badge badge-warning"> $448.42</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle dropdown-custom" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user fa-fw"></i>
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
                        @endif
                    </ul>
                </div>
            </div>
            </div>
        </nav>


        {{--<div class="navbar navbar-inverse navbar-fixed-top">--}}
            {{--<div class="topNav">--}}
                {{--<div class="container">--}}
                    {{--<div class="alignR">--}}
                        {{--<div class="pull-left socialNw">--}}
                            {{--<a href="#"><span class="icon-twitter"></span></a>--}}
                            {{--<a href="#"><span class="icon-facebook"></span></a>--}}
                            {{--<a href="#"><span class="icon-youtube"></span></a>--}}
                            {{--<a href="#"><span class="icon-tumblr"></span></a>--}}
                        {{--</div>--}}
                        {{--<a href="index.html"> <span class="icon-home"></span> Home</a>--}}
                        {{--<a href="#"><span class="icon-user"></span> My Account</a>--}}
                        {{--<a href="register.html"><span class="icon-edit"></span> Free Register </a>--}}
                        {{--<a href="contact.html"><span class="icon-envelope"></span> Contact us</a>--}}
                        {{--<a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        @if (session('message'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>
