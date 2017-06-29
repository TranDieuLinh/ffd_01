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
                                <a href="#"> <img src="{{ $food->image }}" alt="" style="width:100%"></a>
                            </div>
                        </div>
                    </div>
                    <div class="span7">
                        <h3 class="blue">{{ $food->name }} [{{ $food->prime }} VNĐ]</h3>
                        <hr class="soft"/>

                        <form class="form-horizontal qtyFrm">
                            <div class="quantity-js">
                            <div class="row lead evaluation">
                                <div id="stars-existing" class="starrr colorstar" data-rating="{{ $value }}"
                                     data-userid="{{Auth::guest()? 0 : Auth::user()->id }}" data-foodid="{{ $food->id }}"></div>
                                <span class="badge badge-warning score">Vote Point:  {{ $score }}</span>
                                {{--<span id="meaning"> </span>--}}
                            </div>

                                @if(count($like)!= 0)
                                    <a class="btn btn-app unlike like-two marg-left25" data-like="0">
                                        <span class="badge bg-red">{{ count($food->likes()->get()) }}</span>
                                        <i class="fa fa-heart like-red"></i>Like
                                    </a>
                                    @else
                                    <a class="btn btn-app like marg-left25" data-like="1">
                                        <span class="badge bg-red">{{ count($food->likes()->get()) }}</span>
                                        <i class="fa fa-heart"></i>Like
                                    </a>
                                @endif
                                <a class="btn btn-app unlike like-one marg-left25" data-like="0" style="display: none">
                                    <span class="badge bg-red" id="span-unlike">{{ count($food->likes()->get()) }}</span>
                                    <i class="fa fa-heart like-red"></i>Like
                                </a>
                                <a class="btn btn-app like unlike-one marg-left25" data-like="1" type="" style="display: none">
                                    <span class="badge bg-red" id="span-like">{{ count($food->likes()->get()) }}</span>
                                    <i class="fa fa-heart"></i>Like
                                </a>

                                <a class="btn btn-app">
                                    <span class="badge bg-teal">{{ $food->share_count }}</span>
                                    <i class="fa fa-share-alt"></i>Share
                                </a>
                            <div class="control-group">

                                <div class="controls">
                                    <label style="margin-left: 20px" class="control-label label-custom"><span>SỐ LƯỢNG:  </span></label>
                                    <input type="number" min="1" max="{{ $food->quantity }}" value = "{{ $food->quantity }}" name="quantity">
                                </div>
                            </div>
                            <a type="submit" class="shopBtn addToCart" data-product="{{$food->id}}" data-type = 2 ><i class="fa fa-shopping-cart fa-fw"></i> Add to cart
                            </a>
                        </div>
                        </form>
                    </div>
                </div>
                <hr class="softn clr"/>


                <ul id="productDetail" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Food Details</a></li>
                    <li class=""><a href="#profile" data-toggle="tab">Foods in the same place </a></li>
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
                        </table>
                        <p>{{ $food->content }}</p>

                        {{--comment--}}
                        @include('template.template-comment')
                        <div class="comments-container">
                            <h1>Comment</h1>
                            <ul class="comments-list">
                                @if (count($comments)!= 0)
                                    @foreach ($comments as $comment)
                                        <li class="review-item">
                                            <div class="comment-main-level">
                                                <!-- Avatar -->
                                                <div class="comment-avatar">
                                                    <img src={{ $comment->user->avatar }}></div>
                                                <!-- Contenedor del Comentario -->
                                                <div class="comment-box">
                                                    <div class="comment-head">
                                                        <h6 class="comment-name">
                                                            <a href="#">{{ $comment->user->name }}</a>
                                                        </h6>
                                                        <span>{{ $comment->created_at }}</span>
                                                        <i class="fa fa-reply reply-review" id="reply" data-reviewid="{{ $comment->id }}"></i>
                                                        <i class="fa fa-heart"></i>
                                                        @if((!Auth::guest()) && ($comment->user_id) == (Auth::user()->id))
                                                            <i class="edit-review fa fa-edit" data-reviewid="{{ $comment->id }}"></i>
                                                            <i class="delete-review fa fa-trash" data-reviewid="{{ $comment->id }}"></i>
                                                        @endif
                                                    </div>
                                                    <div class="comment-content review-content">{{ $comment->content }}</div>
                                                    <div class="comment-content edit-review-content" style="display: none">
                                                        <input type="hidden" name="food-id" value="{{ $food->id }}">
                                                        <textarea name="review" class="edit-text" placeholder="Binh luan ve mon an..."></textarea>
                                                        <button type="submit"
                                                                class="btn btn-success btn-edit-review green">Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Respuestas de los comentarios -->
                                            <ul class="comments-list reply-list hidden" id="comment-{{ $comment->id }}" data-reviewid="{{ $comment->id }}">
                                                @if(count($reps = $comment->repComments) != 0)
                                                    @foreach($reps as $rep)
                                                        <li class="comment-item">
                                                            <!-- Avatar -->
                                                            <div class="comment-avatar"><img src={{ $rep->user->avatar }}>
                                                            </div>
                                                            <!-- Contenedor del Comentario -->
                                                            <div class="comment-box">
                                                                <div class="comment-head">
                                                                    <h6 class="comment-name">
                                                                        <a href="#">{{ $rep->user->name }}</a>
                                                                    </h6>
                                                                    <span>{{ $rep->created_at }}</span>
                                                                    @if((!Auth::guest()) && ($rep->user_id) == (Auth::user()->id))
                                                                        <i class="edit-comment fa fa-edit" data-commentid="{{ $rep->id }}"></i>
                                                                        <i class="delete-comment fa fa-trash" data-commentid="{{ $rep->id }}"></i>
                                                                    @endif
                                                                </div>
                                                                <div class="comment-content com-content">{{ $rep->content }}</div>
                                                                <div class="comment-content edit-comment-content" style="display: none">
                                                                    <input type="hidden" name="food-id" value="{{ $food->id }}">
                                                                    <textarea name="comment" class="edit-text" placeholder=""></textarea>
                                                                    <button type="submit"
                                                                            class="btn btn-success btn-edit-comment green">Edit</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                @if( !Auth::guest() )
                                                    <li class="comment-form">
                                                        <!-- Avatar -->
                                                        <div class="comment-avatar comment-ava"><img src={{ Auth::user()->avatar }}></div>
                                                        <!-- Contenedor del Comentario -->
                                                        <div class="comment-box">
                                                            <div class="comment-head">
                                                                <h6 class="comment-name comment-comment-name">
                                                                    <a href="#">{{ Auth::user()->name }}</a>
                                                                </h6>
                                                            </div>
                                                            <div class="comment-content">
                                                                <input name="status" type="hidden" value="{{ $comment->id }}">
                                                                <input type="hidden" name="food-id-comment" value="{{ $food->id }}">
                                                                <textarea name="comment" class="edit-text"
                                                                          placeholder="Viết bình luận?"></textarea>
                                                                <button type="button"
                                                                        class="btn btn-comment green">Comment
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                                @if(!Auth::guest())
                                    <li class="review-form">
                                        <div class="comment-main-level">
                                            <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <img src={{ Auth::user()->avatar }}></div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h6>
                                                </div>
                                                <div class="comment-content">
                                                    <input type="hidden" name="food-id" value="{{ $food->id }}">
                                                    <textarea name="review" class="edit-text" placeholder="Cảm nhận về món ăn..."></textarea>
                                                    <button type="submit"
                                                            class="btn btn-success btn-review green">Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        @foreach($sames as $same)
                            @if( $same->id != $food->id)
                                <div class="row-fluid">
                                    <div class="span2">
                                        <img class="max-hi" src="{{ $same->image }}">
                                    </div>
                                    <div class="span6">
                                        <h5>{{ $same->name }} </h5>
                                        <p>{{ $same->content }}</p>
                                    </div>
                                    <div class="span4 alignR">
                                        <form class="form-horizontal qtyFrm">
                                            <h3>{{ $same->prime }} VNĐ</h3>
                                            <div class="btn-group">
                                                <a class="defaultBtn addToCart" data-product="{{$same->id}}" data-type = 1><i
                                                            class="fa fa-shopping-cart fa-fw"></i> Add to
                                                    cart</a>
                                                <a href="{{ route('food.show', $same->id) }}" class="shopBtn">VIEW</a>
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
                @foreach($latest as $item)
                    @if( $item->id != $food->id)
                        <div class="thumbnail">
                            <a class="zoomTool" href="{{ route('food.show', $item->id) }}"><i
                                        class="fa fa-eye fa-fw"></i> QUICK VIEW</a>
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
    {{ Html::script('/js/star-rating.js') }}
@endsection
