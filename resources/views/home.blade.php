@extends('layouts.app')

@section('css')
    {{ Html::style('/css/profile.css') }}
    {{ Html::style('/css/food-details.css') }}
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ultra">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ribeye">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
@endsection
@section('content')
    <div class="col-lg-1 col-sm-1"></div>
    <div class="col-lg-10 col-sm-10">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt="" src="{{ Auth::user()->avatar }}">
                <!-- http://lorempixel.com/850/280/people/9/ -->
            </div>
            <div class="useravatar">
                <img alt="" src="{{ Auth::user()->avatar }}">
            </div>
            <div class="card-info"> <span class="card-title">{{ Auth::user()->name }}</span>

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
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 toppad" >


                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body" style="margin-top: 50px">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive"> </div>
                                            <div class=" col-md-9 col-lg-9 ">

                                                <table class="table table-user-information">
                                                    <tbody>
                                                    <tr class="edit-box">
                                                        <td><div class="ultra">Name:</div></td>
                                                        <td class="before"><div class="lobster">{{ Auth::user()->name }}</div></td>
                                                        <td class="before">
                                                        <a class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                                                        </td>
                                                        <td class="after" style="display: none">
                                                            <div class="comment-content edit-review-content">
                                                                <textarea name="edit" placeholder="..."></textarea>
                                                                <button type="submit"
                                                                        class="btn btn-success btn-edit-review green" data-type= 1>Edit</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div class="ultra">Email:</div></td>
                                                        <td><a href="{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></td>
                                                    </tr>
                                                    <tr class="edit-box">
                                                        <td><div class="ultra">Phone number:</div></td>
                                                        <td class="before"><div class="lobster">{{ Auth::user()->phone }}</div></td>
                                                        <td class="before">
                                                            <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                                                        </td>
                                                        <td class="after" style="display: none">
                                                            <div class="comment-content edit-review-content">
                                                                <textarea name="edit" placeholder="..."></textarea>
                                                                <button type="submit"
                                                                        class="btn btn-success btn-edit-review green" data-type= 2>Edit</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-box">
                                                        <td><div class="ultra">Address:</div></td>
                                                        <td class="before"><div class="lobster">{{ Auth::user()->address }}</div></td>
                                                        <td class="before">
                                                            <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                                                        </td>
                                                        <td class="after" style="display: none">
                                                            <div class="comment-content edit-review-content">
                                                                <textarea name="edit" placeholder="..."></textarea>
                                                                <button type="submit"
                                                                        class="btn btn-success btn-edit-review green" data-type= 3>Edit</button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                                <a href="#" class="btn btn-success">Upload Profile Image</a>
                                                <a href="#" class="btn btn-warning">Reset Password </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="panel-footer">--}}
                                        {{--<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>--}}
                                        {{--<span class="pull-right">--}}
                            {{--<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>--}}
                            {{--<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>--}}
                        {{--</span>--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="tab2">
                    <h3>This is tab 2</h3>
                </div>
                <div class="tab-pane fade in" id="tab3">
                    @foreach($user->likes as $like)
                            <div class="row-fluid">
                                <div class="span2">
                                    <img class="max-hi" src="{{ $like->food->image }}">
                                </div>
                                <div class="span6">
                                    <h5>{{ $like->food->name }} </h5>
                                    <p>{{ $like->food->content }}</p>
                                </div>
                                <div class="span4 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3>{{ $like->food->prime }} VNĐ</h3>
                                        <div class="btn-group">
                                            <a class="defaultBtn addToCart" data-product="{{$like->food->id}}" data-type = 1><i
                                                        class="fa fa-shopping-cart fa-fw"></i> Add to
                                                cart</a>
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
    {{ Html::script('/js/home.js') }}
@endsection
