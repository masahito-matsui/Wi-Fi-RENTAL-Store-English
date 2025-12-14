$(function () {

    // ウィンドウスクロールイベント
    $(window).scroll(function () {
        menuScrollUpdate();
    });

    // ウィンドウがリサイズされた場合のイベント
    window.onresize = function () {
        menuScrollUpdate();
    };

    initialize();
});


// メニューが途中から上部にfixedする処理
var menuScrollUpdate = function () {
    var nav = $('.content-nav');
    var offset = $('#fix-header-navigation').offset();
    if ($(window).scrollTop() > offset.top) {
        var h = $('.content-nav').height();
        $('#fix-header-navigation').css('height', h + 'px');
        nav.addClass('fixed-top');
    } else {
        $('#fix-header-navigation').css('height', 'auto');
        nav.removeClass('fixed-top');
    }
};


/**
 * 初期化処理
 */
var initialize = function () {

    // 上部にメニューをfixさせる
    menuScrollUpdate();
};