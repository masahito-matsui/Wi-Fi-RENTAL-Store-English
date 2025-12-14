$(document).ready(function(){

	var j = 2;

	if(j > 0) {
		for(var i=0; i<j; i++) {
			$('#deliv_date0 option:selected').remove();
			$('#deliv_date1 option:selected').remove();
		}
	}
});
