@extends('layouts.app')

@section('css')
    {{ Html::style('/css/home.css') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($advertiseFoods as $food)
                                @if($count == config('settings.app.default-slide-show'))
                                    <li data-target="#carousel-example-generic" data-slide-to={{ $count }}
                                            class="active"></li>
                                    @php($count++)
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to={{ $count }}></li>
                                    @php($count++)
                                @endif
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        @php($count = config('settings.app.default-slide-show'))
                        <div class="carousel-inner" role="listbox">
                            @foreach ($advertiseFoods as $food)
                                @if($count == config('settings.app.default-slide-show'))
                                    <div class="item active">
                                        <div class="text-center">
                                            <a href="{{ route('food.show', $food->id) }}">
                                                <img class="slide" name="image" src="{{ $food->advertise }}" title="{{ $food->name }}"/>
                                            </a>
                                        </div>
                                    </div>
                                    @php($count++)
                                @else
                                    <div class="item">
                                        <div class="text-center">
                                            <a href="{{ route('food.show', $food->id) }}">
                                                <img class="slide" name="image" src="{{ $food->advertise }}" title="{{ $food->name }}"/>
                                            </a>
                                        </div>
                                    </div>
                                    @php($count++)
                                @endif
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </a>
                    </div>
                    <br/>
                </div>

                <div class="panel-body">
                    <div class="container row content-custom">
                        <div class="col-md-1 col-xs-1 col-sm-1 back-gr">

                        </div>
                        <div class="col-md-10 col-xs-10 col-sm-10 back-gr">
                            <div class="row">
                                <div class="col-md-8 col-xs-12 col-sm-8 margin-top">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6 col-sm-6 dropdown filter-custom">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1"
                                                    data-toggle="dropdown">{{ trans('home.all') }}
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                @foreach ($categories as $category)
                                                    <li role="presentation">
                                                        <a role="menuitem" tabindex="-1" href="#">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-sm-6 dropdown filter-custom">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1"
                                                    data-toggle="dropdown">{{ trans('home.filter') }}
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#">{{ trans('home.filter-price') }}</a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" tabindex="-1" href="#">{{ trans('home.filter-date') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{--search box--}}
                                <div class="col-md-4 col-xs-12 col-sm-4 margin-top">
                                    <div class="input-group">
                                        <input type="search" class="form-control" name="search" placeholder="{{ trans('home.search') }}" id="searchFood">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="book_content">
                                @foreach ($foods as $food)
                                    @include ('layouts.food-item')
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-1 col-xs-1 col-sm-1 back-gr">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{ Html::script('/js/home.js') }}
@endsection
