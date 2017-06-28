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