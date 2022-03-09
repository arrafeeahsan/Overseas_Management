$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVisa();
			function fetchVisa(){

				// var visa_status = $(".p").text();
		        //alert(visa_status);
		            
				$.ajax({
					type: "GET",
		            url: "/visastatus-moreinfo/"+visa_status,
					dataType:"json",
					success: function(response){
						//console.log(response.visa);
						$('tbody').html("");
						$.each(response.visa, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
		        			<td>'+item.client_id+'</td>\
							<td>'+item.visa_number+'</td>\
							<td>'+item.company_name+'</td>\
							<td>'+item.visa_type+'</td>\
							<td>'+item.vendor_name+'</td>\
							<td>'+item.visa_status+'</td>\
							<td>'+item.ambassador_paid_date+'</td>\
							<td>'+item.visa_expiry_date+'</td>\
							<td>'+item.applied_person_name+'</td>\
							<td>'+item.reference_supplier+'</td>\
		        		</tr>');
						})	
					}
				});
			}

			


			$(document).ready( function () {
    			$('#visa_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});



			