$(document).ready(function(){


	$.get('ajaxSysGetNewsUpdates', function(info){

			for (var i =0; i<=info.length; i++){
				$('.new-board').append('<div class="news-post"><h4>'+info[i].subject+'</h4><p>'+info[i].detail+'</p><small>'+info[i].newsdate+'</small></div>');
			}

		}, 'json');

	$('#news-insert').submit(function(){
		var url = $(this).attr('action');
	    var data = $(this).serialize();
		$.post(url, data, function(info){
			$('.new-board').prepend('<div class="news-post"><h4>'+info.subject+'</h4><p>'+info.detail+'</p><small>'+info.newsdate+'</small></div>');
		}, 'json');

		return false;
	});

	$('#product-insert').submit(function(){
		var url = $(this).attr('action');
	    var data = $(this).serialize();
		$.post(url, data, function(){
			$(".textarea").val("")
			//$('.new-board').prepend('<div class="news-post"><h4>'+info.subject+'</h4><p>'+info.detail+'</p><small>'+info.newsdate+'</small></div>');
		}, 'json');

		return false;
	});

		$('#index-registration-form').submit(function(){
			//$(".registration-handle").text("");
	        var url = $(this).attr('action');
	        var data = $(this).serialize();

	        $.post(url, data, function(o){
	            //alert (o.id);
	             alert(o.message);

	        }, 'json');
	        return false;
	});

});
