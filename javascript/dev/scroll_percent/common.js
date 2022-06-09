$(document).ready(function(){
    function scroll_progress(){
        $browserHeight = $(window).height();
        $height = $(document).height() - $browserHeight;
        $(window).scroll(function(){
            $scroll = $(window).scrollTop();
            $percent = $scroll / $height * 100;
            $('.scroll_progress').css({width: $percent + '%'});
        });
    }
    scroll_progress();
    $(window).resize(function(){
        scroll_progress();
    })
});