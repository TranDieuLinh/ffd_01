/**
 * Created by laptop88 on 6/29/2017.
 */
$(document).ready(function() {

    // add to cart
    $('.addToCart').on('click', function (event, value, caption) {
        var product = $(this).data("product");
        var type = $(this).data("type");
        var quantity = 1;
        var self = $(this);
        if (type != 1) {
            quantity = $(this).closest('.quantity-js').find('input[name="quantity"]').val();
        }
        console.log(quantity);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        var data = {
            productId: product,
            quantity: quantity
        };
        $.ajax({
            url: '/addToCart',
            method: 'POST',
            data: data,
            success: function (response) {
                //Update rate
                console.log(response.money);
                $('.cart-count').text('' + response.count + 'Item(s) -');
                $('.money').text(response.money);
            },
            error: function () {
            }
        });
    });

    // Delete cart
    $(document).on('click', '.btn-danger', function () {
        if (!confirm("Bạn có chắc chắn xóa sản phẩm khỏi giỏ hàng?")) return;
        var rowIdDelete = $(this).data("rowid");
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            row_id: rowIdDelete
        };
        $.ajax({
            url: '/deleteRow',
            method: 'POST',
            data: data,
            success: function (response) {
                console.log(response);
                //Delete view
                $(self).closest('.row-cart').remove(); //Find parent view
                $('.cart-count').text('' + response.count + 'Item(s) -');
                $('.money').text(response.money);
            },
            error: function () {
            }
        });
    });


    // Edit cart
    $(document).on('click', '.btn-warning', function () {
        var $row_cart = $(this).closest('.row-cart');
        console.log($row_cart);
        $row_cart.find('.qua-before').hide();
        $row_cart.find('.qua-after').show();
    });

    $(document).on('click', '.btn-edit', function () {
        var rowIdUpdate = $(this).data("rowid");
        quantity = $(this).closest('.qua-after').find('input[name="quantity"]').val();
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            row_id: rowIdUpdate,
            quantity: quantity
        };
        $.ajax({
            url: '/updateRow',
            method: 'POST',
            data: data,
            success: function (response) {
                console.log(response);
                $(self).closest('.row-cart').find('.qua-before').text('Quantity: '+ response.quantity);
                $(self).closest('.row-cart').find('.qua-after').hide()
                $(self).closest('.row-cart').find('.qua-before').show();
                $('.cart-count').text('' + response.count + 'Item(s) -');
                $('.money').text(response.money);
            },
            error: function () {
            }
        });
    });


    $(document).on('click', '.item-cart', function (){
        var url = '/item/food';

        $.get(url, function (data) {
            $('#cart_content').html(data);
        });
    });
});