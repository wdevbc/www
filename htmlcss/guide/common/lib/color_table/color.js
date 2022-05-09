$(document).ready(function(){
    $('.color-box > div > span').click(function(){
        var bgColor = $(this).css('background-color')
        $('.color-preview__box').css('background-color', bgColor)
        $('.color-preview__text').css('background-color', bgColor)
        $('.color-preview__text > span').eq(1).css('color', '#fff')
    })
})
