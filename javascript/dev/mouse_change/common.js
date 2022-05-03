$(function(){

    // CURSOR
    var cursor = $(".cursor"),
    follower = $(".cursor-follower"),
    cursor_img = $(".cursor_img");

    var posX = 0,
        posY = 0;
    var mouseX = 0,
        mouseY = 0;

    TweenMax.to({}, 0.016, { // 값을 올릴수록 cursor-follower 영역이 늦게 따라옴
        repeat: -1,
        onRepeat: function() {
            posX += (mouseX - posX) / 9;
            posY += (mouseY - posY) / 9;

            TweenMax.set(follower, {
                css: {
                left: posX - 12,
                top: posY - 12
                }
            });

            TweenMax.set(cursor, {
                css: {
                left: mouseX,
                top: mouseY
                }
            });

            TweenMax.set(cursor_img, {
                css: {
                left: mouseX - 24,
                top: mouseY - 24
                }
            });
        }
    });

    // cursor active area
    $("body").on("mousemove", function(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    }).on("mouseenter", function(e) {
        $(".cursor, .cursor-follower").css('opacity', 1);
        $(".cursor_img").css('opacity', 0);
    }).on("mouseleave", function(e) {
        $(".cursor, .cursor-follower, .cursor_img").css('opacity', 0);
    });

    // cursor active area (style_2)
    $(".cursor_style_2").on("mousemove", function(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
    }).on("mouseenter", function(e) {
        $(".cursor_img").css('opacity', 1);
        $(".cursor, .cursor-follower").css('opacity', 0);
    }).on("mouseleave", function(e) {
        $(".cursor_img").css('opacity', 0);
        $(".cursor, .cursor-follower").css('opacity', 1);
    });

    // link area css 
    $(".link").on("mouseenter", function() {
        cursor.addClass("active");
        follower.addClass("active");
    }).on("mouseleave", function() {
        cursor.removeClass("active");
        follower.removeClass("active");
    })

});




;