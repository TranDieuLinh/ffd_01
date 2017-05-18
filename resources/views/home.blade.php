@extends('layouts.app')

@section('css')
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="title text-center">{{ $title }}</h2>
                        <div>
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @foreach ($latestFoods as $food)
                                        @if($count == 0)
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
                                @php($count = 0)
                                <div class="carousel-inner" role="listbox">
                                    @foreach ($latestFoods as $food)
                                        @if($count == 0)
                                            <div class="item active">
                                                <div class="text-center">
                                                    <a href="">
                                                        <img name="image" src="{{ $food->image }}"
                                                             title="{{ $food->name }}"/></a>
                                                </div>
                                            </div>
                                            @php($count++)
                                        @else
                                            <div class="item">
                                                <div class="text-center">
                                                    <a href="">
                                                        <img name="image" src="{{ $food->image }}"
                                                             title="{{ $food->name }}"/></a>
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
                    </div>

                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
