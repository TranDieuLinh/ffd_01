/**
 * Created by laptop88 on 5/19/2017.
 */
$(document).on('mouseenter', '.saishou', function () {
    var $box = $(this).closest('.product-image-wrapper');
    $box.find('.saishou').hide();
    var $image = $box.find('.saishou').find('img').attr('src');
    $box.find('.saigo').css('background-image', 'linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(' + $image + ')');
    $box.find('.saigo').show();
}).on('mouseleave', '.saigo', function () {
    var $box = $(this).closest('.product-image-wrapper');
    $box.find('.saigo').hide();
    $box.find('.saishou').show();
});

$(document).on('keyup', '#searchFood', function (){
    var url = '/search/food';
    var key = $(this).val();

    $.get(url, { search: key }, function (data) {
        $('#book_content').html(data);
    });
});

$(document).on('click', '#addToCart', function (){
    var url = '/addToCart/food';
    var key = $(this).val();

    $.get(url, { search: key }, function (data) {
        $('#book_content').html(data);
    });
});

$(document).ready(function() {
    //edit profile
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            type: type,
            edit_content: edit_content
        };

        $.ajax({
            url: 'home/editProfile',
            method: 'POST',
            data: data,
            success: function (response) {
                var $edit_box = $(self).closest('.edit-box');
                $edit_box.find('.lobster').text(edit_content);
                $edit_box.find('.after').hide();
                $edit_box.find('.before').show();
            },
            error: function () {
            }
        });
    });
});



