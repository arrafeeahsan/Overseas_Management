$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			// fetchClient();
			// function fetchClient(){

			// 	// $.ajax({
			// 	// 	type: "GET",
			// 	// 	url: "/home",
			// 	// 	dataType:"json",
			// 	// 	success: function(response){
			// 	// 			if(response.payment.payment_status == "Paid"){
			// 	// 				console.log(response.payment.payment_status);
			// 	// 			}
			// 	// 		}
					
			// 	// });
				

			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/home",
			// 		dataType:"json",
			// 		success: function(response){
			// 			//console.log(response.client);

			// 			$('tbody').html("");
			// 			$.each(response.client, function(key, item) {
							
			// 				$('tbody').append('<tr>\
			// 						<td>\
			// 							<a class="" href="client-details/'+item.id+'">'+item.client_name+'</a>\
			// 						</td>\
			// 						<td>'+item.client_father+'</td>\
			// 						<td>'+item.client_address+'</td>\
			// 						<td>'+item.client_phone+'</td>\
			// 						<td>'+item.client_nid+'</td>\
			// 						<td>'+item.client_dob+'</td>\
			// 						<td>'+item.client_supplier+'</td>\
			// 						<td><img src="uploads/client/'+item.client_pp+'" width="50px" height="50px" alt="image" class="rounded-circle"></td>\
		 //        		</tr>');
			// 			})	
			// 		}
			// 	});
			// }

			


			$(document).ready( function () {
    			$('#homeclient_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				     scrollY:        380,
				     scrollCollapse: true,
				     scroller:       true
				 });
			});

			



			