@extends('layouts.app')

@section('css')
    {{ Html::style('/css/order.css') }}
    {{ Html::style('/css/food-details.css') }}
@endsection
@section('content')
    <div class="order">
        @foreach($rows as $row)
            @include ('layouts.cart-item')
        @endforeach
        <h3 class="total">TOTAL: {{ Cart::subtotal() }} vnđ</h3>
        <table class="table table-user-information">
            <tbody>
            @if($phone == null)
                <tr class="edit-box">
                    <td>
                        <div class="ultra">Phone number:</div>
                    </td>
                    <td class="before" style="display:none">
                        <div class="lobster lobster-p">{{ $phone }}</div>
                    </td>
                    <td class="before" style="display:none">
                        <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                           class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                    <td class="after">
                        <div class="comment-content edit-review-content">
                            <textarea name="edit" placeholder="..."></textarea>
                            <button type="submit"
                                    class="btn btn-success btn-edit-review green" data-type=2>OK
                            </button>
                        </div>
                    </td>
                </tr>
            @else
                <tr class="edit-box">
                    <td>
                        <div class="ultra">Phone number:</div>
                    </td>
                    <td class="before">
                        <div class="lobster lobster-p">{{ $phone }}</div>
                    </td>
                    <td class="before">
                        <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                           class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                    <td class="after" style="display: none">
                        <div class="comment-content edit-review-content">
                            <textarea name="edit" placeholder="..."></textarea>
                            <button type="submit"
                                    class="btn btn-success btn-edit-review green" data-type=2>OK
                            </button>
                        </div>
                    </td>
                </tr>
            @endif

            @if($address ==null)
                <tr class="edit-box">
                    <td>
                        <div class="ultra">Address:</div>
                    </td>
                    <td class="before" style="display: none">
                        <div class="lobster lobster-a">{{ $address }}</div>
                    </td>
                    <td class="before" style="display: none">
                        <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                           class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                    <td class="after">
                        <div class="comment-content edit-review-content">
                            <textarea name="edit" placeholder="..."></textarea>
                            <button type="submit"
                                    class="btn btn-success btn-edit-review green" data-type=3>OK
                            </button>
                        </div>
                    </td>
                </tr>
            @else
                <tr class="edit-box">
                    <td>
                        <div class="ultra">Address:</div>
                    </td>
                    <td class="before">
                        <div class="lobster lobster-a">{{ $address }}</div>
                    </td>
                    <td class="before">
                        <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button"
                           class="btn btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                    </td>
                    <td class="after" style="display: none">
                        <div class="comment-content edit-review-content">
                            <textarea name="edit" placeholder="..."></textarea>
                            <button type="submit"
                                    class="btn btn-success btn-edit-review green" data-type=3>OK
                            </button>
                        </div>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
            <a href="#" style="width: 100px;margin: auto" class="btn btn-success order-product">ORDER</a>
    </div>
@endsection

@section('script')
    {{ Html::script('/js/order.js') }}
@endsection
