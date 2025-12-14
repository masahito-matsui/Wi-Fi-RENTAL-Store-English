// JavaScript Document

//トップページお客様の声カルーセル
  jQuery(document).ready(function($) {
  if (matchMedia('(max-width: 767px)').matches) {
        $(".slider").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay:false
        });
   } else if (matchMedia('(max-width: 1280px)').matches) {
        $(".slider").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          autoplay:false
        });
   } else if (matchMedia('(max-width: 1680px)').matches) {
        $(".slider").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay:true
        });
  } else {
        $(".slider").slick({
          dots: true,
          infinite: true,
          centerMode: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay:true
        });
  }
  });
//トップページお客様の声取得
$(function(){
		$(".new_voice01_update").load("/voice.html .voice_set:nth-child(1) .update");
		$(".new_voice01_name").load("/voice.html .voice_set:nth-child(1) .name");
		$(".new_voice01_about").load("/voice.html .voice_set:nth-child(1) .about");
		$(".new_voice01_star").load("/voice.html .voice_set:nth-child(1) .star");
		$(".new_voice01_caption").load("/voice.html .voice_set:nth-child(1) .caption");
		$(".new_voice01_image").load("/voice.html .voice_set:nth-child(1) .thumb img");
		
		$(".new_voice02_update").load("/voice.html .voice_set:nth-child(2) .update");
		$(".new_voice02_name").load("/voice.html .voice_set:nth-child(2) .name");
		$(".new_voice02_about").load("/voice.html .voice_set:nth-child(2) .about");
		$(".new_voice02_star").load("/voice.html .voice_set:nth-child(2) .star");
		$(".new_voice02_caption").load("/voice.html .voice_set:nth-child(2) .caption");
		$(".new_voice02_image").load("/voice.html .voice_set:nth-child(2) .thumb img");
		
		$(".new_voice03_update").load("/voice.html .voice_set:nth-child(3) .update");
		$(".new_voice03_name").load("/voice.html .voice_set:nth-child(3) .name");
		$(".new_voice03_about").load("/voice.html .voice_set:nth-child(3) .about");
		$(".new_voice03_star").load("/voice.html .voice_set:nth-child(3) .star");
		$(".new_voice03_caption").load("/voice.html .voice_set:nth-child(3) .caption");
		$(".new_voice03_image").load("/voice.html .voice_set:nth-child(3) .thumb img");
		
		$(".new_voice04_update").load("/voice.html .voice_set:nth-child(4) .update");
		$(".new_voice04_name").load("/voice.html .voice_set:nth-child(4) .name");
		$(".new_voice04_about").load("/voice.html .voice_set:nth-child(4) .about");
		$(".new_voice04_star").load("/voice.html .voice_set:nth-child(4) .star");
		$(".new_voice04_caption").load("/voice.html .voice_set:nth-child(4) .caption");
		$(".new_voice04_image").load("/voice.html .voice_set:nth-child(4) .thumb img");
		
		$(".new_voice05_update").load("/voice.html .voice_set:nth-child(5) .update");
		$(".new_voice05_name").load("/voice.html .voice_set:nth-child(5) .name");
		$(".new_voice05_about").load("/voice.html .voice_set:nth-child(5) .about");
		$(".new_voice05_star").load("/voice.html .voice_set:nth-child(5) .star");
		$(".new_voice05_caption").load("/voice.html .voice_set:nth-child(5) .caption");
		$(".new_voice05_image").load("/voice.html .voice_set:nth-child(5) .thumb img");
		
		$(".new_voice06_update").load("/voice.html .voice_set:nth-child(6) .update");
		$(".new_voice06_name").load("/voice.html .voice_set:nth-child(6) .name");
		$(".new_voice06_about").load("/voice.html .voice_set:nth-child(6) .about");
		$(".new_voice06_star").load("/voice.html .voice_set:nth-child(6) .star");
		$(".new_voice06_caption").load("/voice.html .voice_set:nth-child(6) .caption");
		$(".new_voice06_image").load("/voice.html .voice_set:nth-child(6) .thumb img");
});