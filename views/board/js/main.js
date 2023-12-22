$(document).ready(function(){


	$.get('ajaxSysGetBoardPost', function(info){

			for (var i =0; i<=info.length; i++){
				$('.theboards').append('<div class="thepost"><h2>'+info[i].firstname+" "+info[i].lastname+'</h2><p>'+info[i].status+'</p><small>'+info[i].boarddate+'</small></div>');	
			}

		}, 'json');
	

	$('#board-inserts').submit(function(){
		var url = $(this).attr('action');
	    var data = $(this).serialize();
		$.post(url, data, function(info){
			location.reload();
		}, 'json');

		return false;
	});

});
