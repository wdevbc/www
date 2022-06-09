$browserHeight = $(window).height();
$(document).ready(function () {
    $height = $(document).height() - $browserHeight;
    $(window).scroll(function () {
        $scroll = $(window).scrollTop();
        $percent = $scroll / $height * 100;
        $('.scroll_progress').css({
            width: $percent + '%'
        });
    });

});