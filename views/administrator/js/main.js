$(document).ready(function(){

	$.get('administrator/adminGetNonApproved', function(users){

		for(var i=0; i<users.length; i++){

			$('.notApproved').append('<tr><td>'+users[i].uid+'</td><td>'+users[i].firstname+'</td><td>'+users[i].lastname+'</td><td>'+users[i].phone+'</td><td>'+users[i].email+'</td><td>'+users[i].gender+'</td><td>'+users[i].business+'</td><td>'+users[i].creation_date+'</td><td><a class="approve-USR" href="#" rel="'+users[i].uid+'">'+users[i].approved+'</a></td></tr>');
		}


		$('.approve-USR').live('click', function(){

			approveUser=$(this); var uid = $(this).attr('rel');

			$.post('administrator/adminApprove', {'uid': uid}, function(o){
            //$('#listInserts').append('<div>'+o.text+'<a class="del" rel="'+o.id+'" href=#>X</a></div>');
            	approveUser.parents('tr').remove();
            	location.reload();
           
        	}, 'json');

        	return false;
		});

	}, 'json');

	$.get('administrator/adminGetApproved', function(users){

		for(var i=0; i<users.length; i++){

			$('.table-approved').append('<tr><td>'+users[i].uid+'</td><td>'+users[i].firstname+'</td><td>'+users[i].lastname+'</td><td>'+users[i].phone+'</td><td>'+users[i].email+'</td><td>'+users[i].gender+'</td><td>'+users[i].business+'</td><td>'+users[i].creation_date+'</td><td><a class="disapprove" href=# rel="'+users[i].uid+'">'+users[i].approved+'</a></td></tr>');
		}

		$('.disapprove').live('click', function(){

			disapproveUser=$(this); var uid = $(this).attr('rel');

			$.post('administrator/adminDisapprove', {'uid': uid}, function(o){
            //$('#listInserts').append('<div>'+o.text+'<a class="del" rel="'+o.id+'" href=#>X</a></div>');
            	disapproveUser.parents('tr').remove();
            	location.reload();
           
        	}, 'json');

        	return false;
		});

	}, 'json');
});