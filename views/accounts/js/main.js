$(document).ready(function(){

	//code for board information on the dashboard....
	$.get('dashboard/ajaxSysGetBoardPost', function(info){

			for (var i =0; i<=info.length; i++){
				$('.board-update-post').append('<div class="the-post"><h2>'+info[i].firstname+" "+info[i].lastname+'</h2><small>'+info[i].boarddate+'</small><p>'+info[i].status+'</p></div>');	
			}

		}, 'json');
	
	$('.form-board').submit(function(){
		var url = $(this).attr('action');
	    var data = $(this).serialize();
		$.post(url, data, function(info){			
		//location.reload();
			$('.form-txtarea').val("");
			$('.board-update-post').empty();
			for (var i =0; i<=info.length; i++){
				$('.board-update-post').append('<div class="the-post"><h2>'+info[i].firstname+" "+info[i].lastname+'</h2><small>'+info[i].boarddate+'</small><p>'+info[i].status+'</p></div>');	
			}
			//$('.board-update-post').append('<div class="the-post"><h2>'+info[i].firstname+" "+info[i].lastname+'</h2><small>'+info[i].boarddate+'</small><p>'+info[i].status+'</p></div>');	

		}, 'json');

		return false;
	});

	//code for news updates for the dashboard

	$.get('dashboard/ajaxSysGetNewsUpdates', function(info){

			for (var i =0; i<=info.length; i++){
				if (info[i].newstype == "farming"){
					$('#farming').append('<div class="news-content"><h4>'+info[i].subject+'</h4><small>'+info[i].newsdate+'</small><p>'+info[i].detail+'</p></div>');

				}
				else if(info[i].newstype == "market"){
					//$('#market').append(info[i].newstype);
					$('#market').append('<div class="news-content"><h4>'+info[i].subject+'</h4><small>'+info[i].newsdate+'</small><p>'+info[i].detail+'</p></div>');
				}
				else{
					//$('#other').append(info[i].newstype);
					$('#other').append('<div class="news-content"><h4>'+info[i].subject+'</h4><small>'+info[i].newsdate+'</small><p>'+info[i].detail+'</p></div>');
				}
					//$('.new-board').append('<div class="news-post"><h4>'+info[i].subject+'</h4><p>'+info[i].detail+'</p><small>'+info[i].newsdate+'</small></div>');
			}

		}, 'json');

	//code for getting the product listing
	$.get('dashboard/ajaxProductListing', function(info){

			for (var i =0; i<=info.length; i++){
				$('#products').append('<div class="products"><h4>'+info[i].firstname+" "+info[i].lastname+'</h4><small>'+info[i].phone+'</small><p>'+info[i].updates+'</p></div>');
			}

	}, 'json');

	//code for inserting user products
	$('#product-insert').submit(function(){
		var url = $(this).attr('action');
	    var data = $(this).serialize();
		$.post(url, data, function(info){
			$(".txtarea").val("");
			$('#products').empty();
			$('#products').append('<div class="products"><h4>'+info[0].firstname+" "+info[0].lastname+'</h4><small>'+info[0].phone+'</small><p>'+info[0].updates+'</p></div>');

			//$('.new-board').prepend('<div class="news-post"><h4>'+info.subject+'</h4><p>'+info.detail+'</p><small>'+info.newsdate+'</small></div>');
		}, 'json');

		return false;
	});

});
