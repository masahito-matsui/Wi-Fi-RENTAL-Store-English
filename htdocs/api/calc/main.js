$(function(){
	var flg17;
  $.ajax({
		type: "post",
		url: "https://en.wifi-rental-store.jp/api/calc/calc_date2.php",
		cache: false,
		async: false
	}).done(function(data){
		//console.log(data);
		var obj = $.parseJSON(data.replace(/(\r\n)/g, '\\n'));
		flg17 = obj.flg17;
	}).fail(function(data){
	});
	var start_minDate = 0;
	var end_minDate = 1;
	if(flg17 == 1) {
		start_minDate = 1;
		end_minDate = 2;
	}
  $('#start_date').datepicker({
	showOtherMonths: true,
	minDate: start_minDate,
	maxDate: '+730',
	dateFormat:'yy-mm-dd',
	dayNamesMin:['S','M','T','W','T','F','S'],
	onSelect: function(dateText, inst) {
		//$('#s_date').val(dateText);
		$('#s_date02').val(dateText);
		$('#start_date').removeClass('disp_100');
	}
  });

$('#end_date').datepicker({
	showOtherMonths: true,
	minDate: end_minDate,
	maxDate: '+732',
	dateFormat:'yy-mm-dd',
	dayNamesMin:['S','M','T','W','T','F','S'],
	onSelect: function(dateText, inst) {
	    $('#e_date').val(dateText);
		$('#e_date02').val(dateText);
		$('#end_date').removeClass('disp_100');
	}
  });

	$('.select_place').change(function(){
    if($("[id=deli_01]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate+1);
      $('#end_date').datepicker('option', 'minDate', end_minDate+1);
    } else if($("[id=deli_02]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate+2);
      $('#end_date').datepicker('option', 'minDate', end_minDate+2);
    } else if($("[id=deli_03]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate+1);
      $('#end_date').datepicker('option', 'minDate', end_minDate+1);
    } else if($("[id=deli_04]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate+2);
      $('#end_date').datepicker('option', 'minDate', end_minDate+2);
    } else if($("[id=deli_05]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate+3);
      $('#end_date').datepicker('option', 'minDate', end_minDate+3);
    } else if($("[id=deli_06]").prop('checked')) {
      $('#start_date').datepicker('option', 'minDate', start_minDate);
      $('#end_date').datepicker('option', 'minDate', end_minDate);
    }
	});



	$('#calc_btn').click(function(){
		if($('#result').hasClass('no_disp')){
			$('#result').removeClass('no_disp');
		}
		var kishu_name = $("#kishu :selected").text();
		var kishu = $('#kishu').val();
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();

    $.ajax({
			type: "post",
			url: "https://en.wifi-rental-store.jp/api/calc/calc_date2.php",
			data: {
					kishu:kishu,
					start_date:start_date,
					end_date:end_date
					},
			cache: false,
			async: false
		}).done(function(data){
			//console.log(data);
			var obj = $.parseJSON(data.replace(/(\r\n)/g, '\\n'));
			var your_plan = array[kishu][obj.term];
			if(your_plan == null) {
				$('#your_plan').html('<p class="title">条件が正しくありません！！</p><p class="btn_retry non_margin" style="margin: 0 auto !important;width: 73%;max-width: 275px;"><a href="javascript:location.reload()"><img src="https://littlecoela.com/rental-store_jp/img/common/btn_retry.png" width="100%" /></a></p>');
			} else {
				//$('#your_plan').html('<p class="title">'+kishu_name+'</p>'+your_plan+'<p class="comment">※ご利用期間で最もお得なプランが表示されます</p>');
				$('#your_plan').html(your_plan);
			}
		}).fail(function(data){
		//	alert(data);
			flg = 1;
		});
	});
});

function clickBtn1(){
	let str = "";
	const haiso = document.place.haiso;

	for (let i = 0; i < haiso.length; i++){
		if(haiso[i].checked){ //(haiso[i].checked === true)と同じ
			str = haiso[i].value;
			break;
		}
	}
	document.getElementById("span1").textContent = str;
}

$(document).ready(function(){
  $('#kishu').click(function () {
	$("#kishu").css("background-color", "#ffffff");
  });
});

$(document).ready(function(){
  $('#e_date02').click(function () {
    $('#end_date').addClass('disp_100');
	$("#e_date02").css("background-color", "#ffffff");
  });
});

$(document).ready(function(){
  $('#s_date02').click(function () {
    $('#start_date').addClass('disp_100');
	$(".haiso_selector").css("pointer-events", "none");
	$("#e_date02").prop("disabled", false);
	$("#s_date02").css("background-color", "#ffffff");
  });
});

$(document).ready(function(){
  $('.select_place').click(function () {
    $('.haiso_box').removeClass('disp_100');
	$("#s_date02").prop("disabled", false);
	$(".haiso_selector").css("background-color", "#ffffff");
  });
});

$(document).ready(function(){
  $('.haiso_selector').click(function () {
    $('.haiso_box').addClass('disp_100');
  });
});
