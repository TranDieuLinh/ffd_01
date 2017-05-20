@if(count($foods )== config('settings.food.not-found'))
    <div class="productinfo text-center">
        <h2>{{ trans('home.not-found') }}</h2>
    </div>
@endif
@foreach ($foods as $food)
    @include ('layouts.book-item')
@endforeach
