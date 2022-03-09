$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchSupport();
			function fetchSupport(){
				$.ajax({
					type: "GET",
					url: "/api/support-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.mails, function(key, item) {
							$('tbody').append('<tr>\
							<td>'+item.name+'</td>\
							<td>'+item.email+'</td>\
							<td>'+item.subject+'</td>\
							<td>'+item.message+'</td>\
							<td>\
		                    	<a href="javascript:void(0)" class="btn btn-outline-danger delete_btn" data-value="'+item.id+'"><i class="fas fa-trash"></i></a>\
		        			</td>\
		        		</tr>');
						})	
					}
				});
			}

			

			


			
			//Delete Support


			// $(document).on('click', '.delete_btn', function(e){

			// 		e.preventDefault();

			// 		var supportId = $(this).val();
			// 		alert(supportId);
			// 		var token = $("meta[name='csrf-token']").attr("content");

			// 		$.ajax(
			// 		{
			// 	        url: "support-delete/"+supportId,
			// 	        type: 'DELETE',
			// 	        data: {
			// 	            "supportId": supportId,
			// 	            "_token": token,
			// 	        },
			// 	        success: function (response){

			// 	            //console.log("it Works");
			// 	            alert(response.success);
			// 	            // $('#DeleteSupportModal').modal('hide');
			// 	            fetchSupport();
			// 	        }
			// 	    });
			// 	});

			$(document).ready( function () {
				$('#support_table').on('click', '.delete_btn', function(){

					var supportId = $(this).data("value");

					// var supportId = $tr.children("td").map(function(){
					// 	return $(this).text();
					// }).get();


					$('#supportid').val(supportId);

					$('#DeleteSupportFORM').attr('action', '/support-delete/'+supportId);

					$('#DeleteSupportModal').modal('show');

				});
			});

			$(document).ready( function () {
    			$('#support_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			