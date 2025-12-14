// JavaScript Document

$(window).on('load',function(){
  // URLの取得
  var url = location.href
  // パスの取得
  var path = location.pathname
  // パラメーターの取得
  var param = location.search
  // ページ内アンカーの取得
  var anc = location.hash
  if (path == "/"){
    $('#gnav-ul .menu_home').addClass('active');
  }
  if (path == "/index.html"){
    $('#gnav-ul .menu_home').addClass('active');
  }
  if (path == "/system.html"){
    $('#gnav-ul .menu_system').addClass('active');
  }
  if (path == "/price.html"){
    $('#gnav-ul .menu_price').addClass('active');
  }
  if (path == "/receive.html"){
    $('#gnav-ul .menu_receive').addClass('active');
  }
  if (path == "/features.html"){
    $('#gnav-ul .menu_features').addClass('active');
  }
  if (path == "/firsttime.html"){
    $('#gnav-ul .menu_firsttime').addClass('active');
  }
  if (path == "/qa.html"){
    $('#gnav-ul .menu_qa').addClass('active');
  }
  if (path == "/extension.html"){
    $('#gnav-ul .menu_extension').addClass('active');
  }
  if (path == "/order.html"){
    $('#gnav-ul .menu_order').addClass('active');
  }
  if (path == "/shop/mypage/login.php"){
    $('#gnav-ul .menu_login').addClass('active');
  }
  if (path == "/shop/cart"){
    $('#gnav-ul .menu_cart').addClass('active');
  }
  if (path == "/access.html"){
    $('#gnav-ul .menu_access').addClass('active');
  }
});
