@extends('layouts.app')

@section('css')
    {{ Html::style('/css/food-details.css') }}
@endsection

@section('content')
    <div class="row border">
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
    <div class="well well-small">
        <div class="row-fluid">
            <div class="span5">
                <div id="myCarousel" class="carousel slide cntr">
                    <div class="carousel-inner">
                        {{--<div class="item active">--}}
                            {{--<a href="#"> <img src="{{ $food->image }}" alt="" style="width:100%"></a>--}}
                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<a href="#"> <img src="http://media.foody.vn/res/g15/142863/s/foody-albumimg_0345-jpg-323-636137923498151920.jpg" alt="" style="width:100%"></a>--}}
                        {{--</div>--}}
                        {{--<div class="item">--}}
                            {{--<a href="#"> <img src="{{ $food->image }}" alt="" style="width:100%"></a>--}}
                        {{--</div>--}}
                        <a href="#"> <img src="{{ $food->image }}" alt="" style="width:100%"></a>
                    </div>
                    {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>--}}
                    {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>--}}
                </div>
            </div>
            <div class="span7">
                <h3 class="blue">{{ $food->name }} [{{ $food->prime }} VNĐ]</h3>
                <hr class="soft"/>

                <form class="form-horizontal qtyFrm">
                    <div class="control-group">
                        <label class="control-label"><span>$140.00</span></label>
                        <div class="controls">
                            <input type="number" class="span6" placeholder="Qty.">
                        </div>
                    </div>

                    {{--<div class="control-group">--}}
                        {{--<label class="control-label"><span>Color</span></label>--}}
                        {{--<div class="controls">--}}
                            {{--<select class="span11">--}}
                                {{--<option>Red</option>--}}
                                {{--<option>Purple</option>--}}
                                {{--<option>Pink</option>--}}
                                {{--<option>Red</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="control-group">--}}
                        {{--<label class="control-label"><span>Materials</span></label>--}}
                        {{--<div class="controls">--}}
                            {{--<select class="span11">--}}
                                {{--<option>Material 1</option>--}}
                                {{--<option>Material 2</option>--}}
                                {{--<option>Material 3</option>--}}
                                {{--<option>Material 4</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<h4>100 items in stock</h4>--}}
                    {{--<p>Nowadays the lingerie industry is one of the most successful business spheres.--}}
                        {{--Nowadays the lingerie industry is one of ...--}}
                    {{--<p>--}}
                        <button type="submit" class="shopBtn"><i class="fa fa-shopping-cart fa-fw"></i> Add to cart</button>
                </form>
            </div>
        </div>
        <hr class="softn clr"/>


        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>
        </ul>
        <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
                <h4>Product Information</h4>
                <table class="table table-condensed">
                    <tr class="info">
                        <td>Name</td>
                        <td>{{ $food->name }}</td>
                    </tr>
                    <tr class="active">
                        <td>Prime</td>
                        <td>{{ $food->prime }} VNĐ</td>
                    </tr>
                    <tr class="info">
                        <td>City</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr class="active">
                        <td>Quantity</td>
                        <td>{{ $food->quantity }}</td>
                    </tr>
                    {{--<tr class="info">--}}
                        {{--<td>@lang('detail.category')</td>--}}
                        {{--<td>{{ $category->name }}</td>--}}
                    {{--</tr>--}}
                </table>
                <p>{{ $food->content }}</p>
               </div>
            <div class="tab-pane fade" id="profile">
                @foreach($sames as $same)
                    @if( $same->id != $food->id)
                    <div class="row-fluid">
                        <div class="span2">
                            <img src="{{ $same->image }}">
                        </div>
                        <div class="span6">
                            <h5>{{ $same->name }} </h5>
                            <p>{{ $same->content }}</p>
                        </div>
                        <div class="span4 alignR">
                            <form class="form-horizontal qtyFrm">
                                <h3>{{ $same->prime }} VNĐ</h3>
                                <div class="btn-group">
                                    <a href="product_details.html" class="defaultBtn"><i
                                                class="fa fa-shopping-cart fa-fw"></i> Add to cart</a>
                                    <a href="product_details.html" class="shopBtn">VIEW</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="soft">
                    @endif
                @endforeach

            </div>
        </div>
    </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <div class="polaroid-right">
                {{--<div class="saishou margin-top">--}}
                    {{--<a href="">--}}
                        {{--<img name="image" class="sidebar-right" src="{{ $food->image }}"--}}
                             {{--title="{{ $food->name }}"/></a>--}}
                {{--</div>--}}
                {{--<h2>{{ $food->prime }} {{ trans('home.vnd') }}</h2>--}}
                {{--<h4 class="margin-bottom">{{ $food->name }}</h4>--}}
                {{--<div class="lead">--}}
                    {{--<div id="stars-existing" class="starrr" data-rating=4></div>--}}
                {{--</div>--}}
                @foreach($latest as $item)
                    @if( $item->id != $food->id)
                <div class="thumbnail">
                    <a class="zoomTool" href="{{ route('food.show', $item->id) }}"><i class="fa fa-eye fa-fw"></i> QUICK VIEW</a>
                    <a href="#" class="tag"></a>
                    <a href="#"><img src="{{ $item->image }}" alt="bootstrap-ring"></a>
                    <h4 class="oneline">{{ $item->name }}</h4>
                </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@stop

@section('script')
    {{ Html::script('/js/home.js') }}
    {{ Html::script('/js/book-details.js') }}
@endsection
