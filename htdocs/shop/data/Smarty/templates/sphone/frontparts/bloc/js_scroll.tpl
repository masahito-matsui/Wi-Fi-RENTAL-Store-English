<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load("jquery", "1.4");</script>
<script type="text/javascript">
$(function() {

	//ページ内スクロール
	$("#foot_menu").click(function () {
		var i = $("#sp_menu_box").index(this)
		var p = $("#sp_menu_box").eq(i).offset().top;
		$('html,body').animate({ scrollTop: p-10 }, 'slow');
		return false;
	});
});

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>