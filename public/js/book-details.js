/**
 * Created by laptop88 on 6/21/2017.
 */
$('.thumbnail').mouseenter(function() {
    $(this).children('.zoomTool').fadeIn();
});

$('.thumbnail').mouseleave(function() {
    $(this).children('.zoomTool').fadeOut();
});