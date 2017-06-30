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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/default.css') }}
{{--<link href="{{ asset('css/food-details.css') }}" rel="stylesheet">--}}
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
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
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
                            <li><a class="item-cart" data-toggle="modal" data-target="#squarespaceModal"><i
                                            class="fa fa-shopping-cart fa-fw"></i><span class="cart-count">{{ Cart::count() }}
                                        Item(s) - </span><span
                                            class="badge badge-warning money"> {{ Cart::subtotal() }}</span></a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>

                        @else
                            <li><a href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i> Home</a></li>
                            <li><a class="item-cart" data-toggle="modal" data-target="#squarespaceModal"><i
                                            class="fa fa-shopping-cart fa-fw"></i><span class="cart-count">{{ Cart::count() }}
                                        Item(s) - </span><span
                                            class="badge badge-warning money"> {{ Cart::subtotal() }}</span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle dropdown-custom" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
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

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
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
    @if (session('message'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
@endif
@yield('content')


<!-- line modal -->
    <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="lineModalLabel">Products in the cart</h3>
                </div>
                @php($rows = \Gloudemans\Shoppingcart\Facades\Cart::content())
                @if($rows)
                    <div id="cart_content">
                        @foreach($rows as $row)
                            @include ('layouts.cart-item')
                        @endforeach
                    </div>
                    <a href="{{ route('order') }}" style="margin-left: 20px" class="btn btn-success">By Now</a>
                @endif
                <div class="modal-footer">
                    <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close
                            </button>
                        </div>
                        <div class="btn-group btn-delete hidden" role="group">
                            <button type="button" id="delImage" class="btn btn-default btn-hover-red"
                                    data-dismiss="modal" role="button">Delete
                            </button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" id="saveImage" class="btn btn-default btn-hover-green"
                                    data-action="save" role="button">Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Scripts -->
<script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/default.js') }}"></script>
@yield('script')
</body>
</html>
