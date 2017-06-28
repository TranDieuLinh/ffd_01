/**
 * Created by laptop88 on 6/21/2017.
 */
$('.thumbnail').mouseenter(function() {
    $(this).children('.zoomTool').fadeIn();
});

$('.thumbnail').mouseleave(function() {
    $(this).children('.zoomTool').fadeOut();
});

$(document).ready(function() {

    // Delete rep-comment
    $(document).on('click', '.delete-comment', function () {
        if (!confirm("Bạn có chắc chắn muốn xóa bình luận này không?")) return;
        var commentIdDelete = $(this).data("commentid");
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            rep_comment_id: commentIdDelete
        };
        $.ajax({
            url: './deleteRepComment',
            method: 'POST',
            data: data,
            success: function (response) {
                console.log(response);
                //Delete view
                $(self).closest('.comment-item').remove(); //Find parent view
            },
            error: function () {
            }
        });
    });

    // Delete comment
    $(document).on('click', '.delete-review',function () {
        if (!confirm("Bạn có chắc chắn muốn xóa bình luận này không?")) return;
        var reviewIdDelete = $(this).data('reviewid');
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            comment_id: reviewIdDelete
        };
        $.ajax({
            url : './deleteComment',
            method: 'POST',
            data: data,
            success: function (response) {
                console.log(response);
                //Delete view
                $(self).closest('.review-item').remove();
            },
            error: function () {
            }
        });

    });

    // Write rep-comment
    $(document).on('click', '.btn-comment', function() {
        var comment_id = $(this).closest('.comments-list').data('reviewid');
        var food_id = $(this).closest('.comment-content').find('input[name="food-id-comment"]').val();
        var content = $(this).closest('.comment-content').find('textarea[name="comment"]').val();
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            comment_id: comment_id,
            food_id: food_id,
            rep_comment_content: content
        };
        $.ajax({
            url: './repComment',
            method: 'POST',
            data: data,
            success: function (response) {
                //insert view to list comment
                var user = response.user;
                var repComment = response.rep_comment;
                var $html = $($('.comment-template').html());
                $html.find('.comment-avatar img').prop('src', user.avatar);
                $html.find('.comment-created-at').html(repComment.created_at);
                $html.find('.comment-name a').html(user.name);
                $html.find('.edit-comment').attr('data-commentid', repComment.id);
                $html.find('.delete-comment').attr('data-commentid', repComment.id);
                $html.find('.comment-content').html(repComment.content);

                $(self).closest('.comment-form').before($html);
                //Reset input form
                $(self).closest('.comment-content').find('textarea[name="comment"]').val("");
            },
            error: function () {

            }
        });
    });

    // Write comment
    $('.btn-review').on('click', function() {
        var food_id = $(this).closest('.comment-content').find('input[name="food-id"]').val();
        var content = $(this).closest('.comment-content').find('textarea[name="review"]').val();
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            food_id: food_id,
            comment_content: content
        };
        $.ajax({
            url: './comment',
            method: 'POST',
            data: data,
            success: function (response) {
                //insert view to list comment
                var user = response.user;
                var comment = response.comment;
                var $html = $($('.review-template').html());
                $html.find('.comment-avatar img').prop('src', user.avatar);
                $html.find('.comment-created-at').html(comment.created_at);
                $html.find('.comment-name a').html(user.name);
                $html.find('.reply-review').attr('data-reviewid', comment.id);
                $html.find('.edit-review').attr('data-reviewid', comment.id);
                $html.find('.delete-review').attr('data-reviewid', comment.id);
                $html.find('.review-content').html(comment.content);
                $html.find('input[name="food_id"]').val(food_id);
                $html.find('.reply-list').attr('id',"comment-" + comment.id);
                $html.find('.comments-list').attr('data-reviewid', comment.id);
                $html.find('.comment-ava img').prop('src', user.avatar);
                $html.find('.comment-comment-name a').html(user.name);
                $html.find('input[name="status"]').val(comment.id);
                $html.find('input[name="food-id-comment"]').val(food_id);

                $(self).closest('.review-form').before($html);
                //Reset input form
                $(self).closest('.comment-content').find('textarea[name="review"]').val('');
            },
            error: function () {

            }
        });
    });

    // Edit comment UI
    $(document).on('click', '.edit-review', function() {
        var $comment_box = $(this).closest('.comment-box');
        var review_text = $comment_box.find('.review-content').text();
        $comment_box.find('textarea[name="review"]').val(review_text);
        $comment_box.find('.review-content').hide();
        $comment_box.find('.edit-review-content').show();
    });

    $(document).on('click', '.btn-edit-review', function() {
        var comment_id = $(this).closest('.comment-box').find('.edit-review').data('reviewid');
        var comment_content = $(this).closest('.edit-review-content').find('textarea[name="review"]').val();
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            comment_id: comment_id,
            comment_content: comment_content
        };

        $.ajax({
            url: './editComment',
            method: 'POST',
            data: data,
            success: function (response) {
                var $comment_box = $(self).closest('.comment-box');
                $comment_box.find('.review-content').text(comment_content);
                $comment_box.find('.edit-review-content').hide();
                $comment_box.find('.review-content').show();
            },
            error: function () {
            }
        });
    });

    //Edit rep-comment
    $(document).on('click', '.edit-comment', function() {
        var $comment_box = $(this).closest('.comment-box');
        var comment_text = $comment_box.find('.com-content').text();
        // console.log(comment_text);
        $comment_box.find('textarea[name="comment"]').val(comment_text);
        $comment_box.find('.com-content').hide();
        $comment_box.find('.edit-comment-content').show();
    });

    $(document).on('click', '.btn-edit-comment', function() {
        var rep_comment_id = $(this).closest('.comment-box').find('.edit-comment').data('commentid');
        var rep_comment_content = $(this).closest('.edit-comment-content').find('textarea[name="comment"]').val();
        var self = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });
        var data = {
            rep_comment_id: rep_comment_id,
            rep_comment_content: rep_comment_content
        };

        $.ajax({
            url: './editRepComment',
            method: 'POST',
            data: data,
            success: function (response) {
                var $comment_box = $(self).closest('.comment-box');
                $comment_box.find('.com-content').text(rep_comment_content);
                $comment_box.find('.edit-comment-content').hide();
                $comment_box.find('.com-content').show();
            },
            error: function () {
            }
        });
    });

    //
    $(document).on('click','.reply-review', function ($response) {
        console.log($(this).data('reviewid'));
        var id = $(this).data('reviewid');
        $("#comment-" + id).toggleClass('hidden');
    });

});