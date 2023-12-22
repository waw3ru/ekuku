/*function validateEmail(sEmail){
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}*/

$(document).ready(function(){

	/*var email=$('.email').val();*/

	$('#index-registration-form').submit(function(){
/*		
		if($.trim(email).length == 0){

			$(".registration-handle").text("");
			$(".registration-handle").append("Please fill in the correct email");
			$('.email').css({"border":"1px red solid"});
			$(".registration-handle").css('color', 'red');
			return false;
		}

		if (validateEmail(email)){*/
			$(".registration-handle").text("");
	        var url = $(this).attr('action');
	        var data = $(this).serialize();

	        $.post(url, data, function(o){
	            //alert (o.id);
	            $(".registration-handle").append(o.message);
	            $(".registration-handle").css('color', 'red');

	        }, 'json');
	        return false;
/*
		}else{

			$(".registration-handle").text("");
			$(".registration-handle").append("Please fill in the correct email");
			$('.email').css({"border":"1px red solid"});
			$(".registration-handle").css('color', 'red');
			return false;
		}
*/
	});

});