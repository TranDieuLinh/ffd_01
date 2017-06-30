/**
 * Created by laptop88 on 6/30/2017.
 */
$(document).ready(function() {
    //edit order
    $(document).on('click', '.btn-sm', function() {
        var $edit_box = $(this).closest('.edit-box');
        var edit_text = $edit_box.find('.lobster').text();
        console.log(edit_text);
        $edit_box.find('textarea[name="edit"]').val(edit_text);
        $edit_box.find('.before').hide();
        $edit_box.find('.after').show();
    });

    $(document).on('click', '.btn-edit-review', function() {
        var type = $(this).closest('.edit-box').find('.btn-edit-review').data('type');
        console.log(type);
        var edit_content = $(this).closest('.edit-review-content').find('textarea[name="edit"]').val();
        var self = $(this);
        var $edit_box = $(self).closest('.edit-box');
        $edit_box.find('.lobster').text(edit_content);
        $edit_box.find('.after').hide();
        $edit_box.find('.before').show();

    });

    //order
    $(document).on('click', '.order-product', function() {
        address = $(this).closest('.order').find('.lobster-a').text();
        phone = $(this).closest('.order').find('.lobster-p').text();
        total = $(this).closest('.order').find('.total').text();
        console.log(total);
        if (address!='' && phone!='' )
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });
            var data = {
                address: address,
                phone: phone
            };

            $.ajax({
                url: 'order/addOrder',
                method: 'POST',
                data: data,
                success: function (response) {

                    $('.row-cart').remove();
                    $('.cart-count').text('' + response.count + 'Item(s) -');
                    $('.money').text(response.money);
                    $('.total').text('TOTAL: 0.00 vnđ');
                    (!alert("Order successfully!"));
                },
                error: function () {
                }
            });
        }else if (total == "TOTAL: 0.00 vnđ"){
            (!alert("No products to order!"));
        }
        else{
            (!alert("Phone and address fields must not be empty!"));
        }
    });
});
