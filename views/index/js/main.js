$(document).ready(function(){

	// get product listing for client viewers
	$.get('index/ajaxSysGetProductListing', function(info){
		alert("info");
		// for (var i=0; i<=info.length; i++){
		// 	$('#product-update-start').append('<div class="products"><h2>'+info[i].firstname+" "+info[i].lastname+'</h2><small>'+info[i].phone+'</small><p>'+info[i].updates+'</p></div>');

		// }

	}, 'json');

	// for login purposes
	$('#index-login-form').submit(function(){
		$(".registration-handle").text("");
	    var url = $(this).attr('action');
	    var data = $(this).serialize();

	    $.post(url, data, function(o){
	        //alert (o.id);
	   if (o.message.length > 0){
	        $(".registration-handle").append(o.message);
	        $(".registration-handle").css('color', 'red');
	    }else{
	    	window.location.replace("http://localhost/ekuku/dashboard");
	    }

	    }, 'json');

	    return false;
	});

	$('#index-registration-form').submit(function(){
			$(".registration-handle").text("");
	        var url = $(this).attr('action');
	        var data = $(this).serialize();

	        $.post(url, data, function(o){
	            //alert (o.id);
	            $(".registration-handle").append(o.message);
	            $(".registration-handle").css('color', 'red');

	        }, 'json');
	        return false;
	});

});