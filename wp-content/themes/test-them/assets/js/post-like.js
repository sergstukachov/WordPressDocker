jQuery(document).ready(function($){
    $(".like_ico").click(function(event){
        heart = $(this);
        post_id = heart.data("post_id");
        $.ajax({
            type: "post",
            url: ajax_var.url,
            data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
            success: function(count){
                if(count != "already"){
                    heart.addClass("is-active-like");
                    heart.parent().next(".likecount").text(count);
                }
            }
        });
        return false;
    });
    $(".dislike_ico").click(function(event){
        heart = $(this);
        post_id = heart.data("post_id");
        $.ajax({
            type: "post",
            url: ajax_var.url,
            data: "action=post-like&nonce="+ajax_var.nonce+"&post_dislike=&post_id="+post_id,
            success: function(count){
                if(count != "already"){
                    heart.addClass("is-active-dislike");
                    heart.parent().next(".dislikecount").text(count);
                }
            }
        });
        return false;
    });
});