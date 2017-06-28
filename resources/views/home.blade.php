@extends('layouts.app')

@section('css')
    {{ Html::style('/css/profile.css') }}
    {{ Html::style('/css/food-details.css') }}
@endsection
@section('content')
    <div class="col-lg-1 col-sm-1"></div>
    <div class="col-lg-10 col-sm-10">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
                <!-- http://lorempixel.com/850/280/people/9/ -->
            </div>
            <div class="useravatar">
                <img alt="" src="http://lorempixel.com/100/100/people/9/">
            </div>
            <div class="card-info"> <span class="card-title">Pamela Anderson</span>

            </div>
        </div>
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <div class="hidden-xs">Profile</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    <div class="hidden-xs">Order History</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <div class="hidden-xs">Like foods</div>
                </button>
            </div>
        </div>

        <div class="well">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <h3>This is tab 1</h3>
                </div>
                <div class="tab-pane fade in" id="tab2">
                    <h3>This is tab 2</h3>
                </div>
                <div class="tab-pane fade in" id="tab3">
                    @foreach($user->likes as $like)
                            <div class="row-fluid">
                                <div class="span2">
                                    <img src="{{ $like->food->image }}">
                                </div>
                                <div class="span6">
                                    <h5>{{ $like->food->name }} </h5>
                                    <p>{{ $like->food->content }}</p>
                                </div>
                                <div class="span4 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3>{{ $like->food->prime }} VNĐ</h3>
                                        <div class="btn-group">
                                            <a href="{{ route('food.show', $like->food->id) }}" class="defaultBtn"><i
                                                        class="fa fa-shopping-cart fa-fw"></i> Add to cart</a>
                                            <a href="{{ route('food.show', $like->food->id) }}" class="shopBtn">VIEW</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soft">
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-1 col-sm-1"></div>

@endsection

@section('script')
    {{ Html::script('/js/profile.js') }}
@endsection
