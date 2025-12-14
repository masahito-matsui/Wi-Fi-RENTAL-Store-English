$(function () {

    // ウィンドウスクロールイベント
    $(window).scroll(function () {
        menuScrollUpdate();
    });

    // ウィンドウがリサイズされた場合のイベント
    window.onresize = function () {
        menuScrollUpdate();
    };


    // ページ内リンクのスムーススクロール
    $('a[href^="#"]').click(function () {

        // scrollignoreが付いている場合は無視する
        if ($(this)[0].hasAttribute('scrollignore')) {
            return;
        }

        var speed = 400;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top - 100;
        $('body,html').animate({scrollTop: position}, speed, 'swing');
        return false;
    });

    initialize();
});


// メニューが途中から上部にfixedする処理
var menuScrollUpdate = function () {
    var nav = $('.content-nav');
    if( $('#fix-header-navigation').length > 0 ) {
        var offset = $('#fix-header-navigation').offset();
        if ($(window).scrollTop() > offset.top) {
            var h = $('.content-nav').height();
            $('#fix-header-navigation').css('height', h + 'px');
            nav.addClass('fixed-top');
        } else {
            $('#fix-header-navigation').css('height', 'auto');
            nav.removeClass('fixed-top');
        }
    }
};


/**
 * 初期化処理
 */
var initialize = function () {

    // 上部にメニューをfixさせる
    menuScrollUpdate();
};