$(window).ready(function(){
    /** To make Message hide in 3 seconds **/
    $(".Massage").fadeOut(3000);


    $("#user_edit_comment").on("click",function () {
        $("#edit_comment_div").slideToggle(2000);
    });
    var divToggle = false;
    $('.more_info').on('click',function () {
        $('.video_info').slideToggle(1500);

        if( !divToggle) {
            $(this).text('See Less');
            divToggle = true;
        }else {
            $(this).text('See More');
            divToggle = false;
        }

    });

    var comments = false;
    $('.see_comments').on('click',function () {
        $('.comments').slideToggle(1500);

        if( !comments) {
            $(this).text('hide Comments');
            comments = true;
        }else {
            $(this).text('See Comments');
            comments = false;
        }

    });

    $('.user_update_btn').on('click',function () {
        $('.user_update').slideToggle(1500);
    });


});


