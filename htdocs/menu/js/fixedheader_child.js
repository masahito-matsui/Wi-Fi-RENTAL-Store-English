if (window.matchMedia('screen and (min-width:940px)').matches) {
    //800px以上のデスクトップでの処理

$(window).on('scroll', function() {
    $('#top_fix').toggleClass('fixed', $(this).scrollTop() > 160);
});

}else{
        //スクリーンサイズが800pxより小さい時の処理
$(window).on('scroll', function() {
    $('#top_fix').toggleClass('fixed', $(this).scrollTop() = 0);
});

    }