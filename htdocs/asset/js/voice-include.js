
$(function(){
	$.ajax({
		type: 'GET',
		url: 'voice.html',
		cache: false,
		dataType:'html',
	})
	.then(function( response ) {
		var voice_count = 6;
		response        = response.replace( /<img src=/gi, '<img data-src=' );
		
		for ( var i = 1; i < voice_count + 1; i++ ) {
			
			var contents = $( response ).find( '.voice_set:nth-child(' + i + ') .update' );
			for ( var j = 0; j < contents.length; j++ ) {
				$( '<p />' )
					.addClass( 'update' )
					.text( contents.eq( 0 ).text() )
					.appendTo( '#new_voice0' + i + '_update' );
			}
			
			var contents = $( response ).find( '.voice_set:nth-child(' + i + ') .name' );
			for ( var j = 0; j < contents.length; j++ ) {
				$( '<p />' )
					.addClass( 'name' )
					.text( contents.eq( j ).text() )
					.appendTo( '#new_voice0' + i + '_name' );
			}
			
			var contents = $( response ).find( '.voice_set:nth-child(' + i + ') .about' );
			for ( var j = 0; j < contents.length; j++ ) {
				$( '<p />' )
					.addClass( 'about' )
					.text( contents.eq( 0 ).text() )
					.appendTo( '#new_voice0' + i + '_about' );
			}
			
			var contents       = $( response ).find( '.voice_set:nth-child(' + i + ') .star' );
			for ( var j = 0; j < contents.length; j++ ) {
				$( '<p />' )
					.addClass( contents.attr( 'class' ) )
					.text( contents.eq( 0 ).text() )
					.appendTo( '#new_voice0' + i + '_star' );
			}
			
			var contents = $( response ).find( '.voice_set:nth-child(' + i + ') .caption' );
			for ( var j = 0; j < contents.length; j++ ) {
				$( '<p />' )
					.addClass( 'caption' )
					.text( contents.eq( 0 ).text() )
					.appendTo( '#new_voice0' + i + '_caption' );
			}
			
			var contents = $( response ).find( '.voice_set:nth-child(' + i + ') .thumb img' );
			$( '<img />' )
				.attr( 'src', contents.eq( 0 ).attr( 'data-src' ) )
				.attr( 'width', contents.eq( 0 ).attr( 'width' ) )
				.attr( 'loading', 'lazy' )
				.appendTo( '#new_voice0' + i + '_image' );
			
		}
		
		return 'load_ok';
		
	}, function( response ) {
		//error
	})
	.then(function( response ) {
		if ( response === 'load_ok' ) {
			if ( matchMedia( '( max-width: 767px )' ).matches ) {
				$( '.voice_sec .slider' ).slick({
					dots: true,
					infinite: true,
					centerMode: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: false
				});
			} else if ( matchMedia( '( max-width: 1280px )' ).matches ) {
				$( '.voice_sec .slider' ).slick({
					dots: true,
					infinite: true,
					centerMode: true,
					slidesToShow: 2,
					slidesToScroll: 1,
					autoplay: false
				});
			} else if ( matchMedia( '( max-width: 1680px )' ).matches ) {
				$( '.voice_sec .slider' ).slick({
					dots: true,
					infinite: true,
					centerMode: true,
					slidesToShow: 3,
					slidesToScroll: 1,
					autoplay: true
				});
			} else {
				$( '.voice_sec .slider' ).slick({
					dots: true,
					infinite: true,
					centerMode: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					autoplay: true
				});
			}
		}
	});
});
