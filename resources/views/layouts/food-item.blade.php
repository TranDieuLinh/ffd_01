<div class="col-md-3 col-xs-12 col-sm-6">
    <div class="product-image-wrapper polaroid">
        <div class="productinfo text-center margin-top">
            <div class="saishou">
                <a href="">
                    <img name="image" src="{{ $food->image }}"
                         title="{{ $food->name }}"/></a>
            </div>
            <div class="saigo" style="display: none">
                <a href="{{ route('food.show', $food->id) }}" class="margin btn btn-custom green"><i
                            class="fa fa-eye fa-fw"></i>VIEW MORE
                </a>
                <a class="btn btn-custom green addToCart" data-product="{{$food->id}}" data-type = 1><i
                            class="fa fa-shopping-cart fa-fw"></i>ADD TO CART
                </a>
            </div>
            <h2>{{ $food->prime }} {{ trans('home.vnd') }}</h2>
            <h4 class="oneline">{{ $food->name }}</h4>
            <div class="lead">
                <div id="stars-existing" class="starrr" data-rating=4></div>
            </div>
        </div>
    </div>
</div>
