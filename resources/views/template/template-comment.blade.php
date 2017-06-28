<div class="comment-template" style="display: none">
    <li class="comment-item">
        <!-- Avatar -->
        <div class="comment-avatar"><img src="">
        </div>
        <!-- Contenedor del Comentario -->
        <div class="comment-box">
            <div class="comment-head">
                <h6 class="comment-name">
                    <a href="http://creaticode.com/blog"></a>
                </h6>
                <span class="comment-created-at"></span>
                <i class="edit-comment fa fa-edit" data-commentid=""></i>
                <i class="delete-comment fa fa-trash" data-commentid=""></i>
            </div>
            <div class="comment-content com-content"></div>
            <div class="comment-content edit-comment-content" style="display: none">
                <input type="hidden" name="food-id" value="">
                <textarea name="comment" placeholder=""></textarea>
                <button type="submit"
                        class="btn btn-success btn-edit-comment green">Edit</button>
            </div>
        </div>
    </li>
</div>
<div class="review-template" style="display: none">
    <li class="review-item">
        <div class="comment-main-level">
            <!-- Avatar -->
            <div class="comment-avatar"><img src=""></div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                    <h6 class="comment-name">
                        <a href="http://creaticode.com/blog"></a>
                    </h6>
                    <span class="created_at"></span>
                    <i class="fa fa-reply reply-review" id="reply" data="comment_id"></i>
                    <i class="fa fa-heart"></i>
                    <i class="edit-review fa fa-edit" data-reviewid=""></i>
                    <i class="delete-review fa fa-trash" data-reviewid=""></i>
                </div>
                <div class="comment-content review-content"></div>
                <div class="comment-content edit-review-content" style="display: none">
                    <input type="hidden" name="food-id" value="food_id">
                    <textarea name="review" placeholder="Viết nhận xét về sách?"></textarea>
                    <button type="submit"
                            class="btn btn-success btn-edit-review green">Comment</button>
                </div>
            </div>
        </div>
        <ul class="comments-list reply-list hidden" id="" data-reviewid="">
            <li class="comment-form">
                <!-- Avatar -->
                <div class="comment-avatar"><img src=""></div>
                <!-- Contenedor del Comentario -->
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name">
                            <a href="http://creaticode.com/blog"></a>
                        </h6>
                    </div>
                    <div class="comment-content com-content">
                        <input name="status" type="hidden" value="">
                        <input type="hidden" name="-id-comment" value="">
                        <textarea name="comment"
                                  placeholder="Viết bình luận?"></textarea>
                        <button type="button"
                                class="btn btn-comment green">Comment
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </li>
</div>