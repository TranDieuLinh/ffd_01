<div class="col-md-3 col-xs-12 col-sm-6">
    <div class="product-image-wrapper polaroid">
        <div class="productinfo text-center margin-top">
            <div class="saishou">
                <a href="">
                    <img name="image" src="{{ $food->image }}"
                         title="{{ $food->name }}"/></a>
            </div>
            <div class="saigo" style="display: none">
                <a href="" class="margin btn btn-custom btn-success green"><i
                            class="fa fa-book fa-fw"></i>{{ trans('home.show') }}
                </a>
                <a href="" class="btn btn-custom btn-success green"><i
                            class="fa fa-pencil fa-fw"></i>{{ trans('home.add') }}
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
