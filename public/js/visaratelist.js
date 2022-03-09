$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVisarate();
			function fetchVisarate(){
				$.ajax({
					type: "GET",
					url: "/api/visarate-list",
					dataType:"json",
					success: function(response){
						//console.log(response.visarate);
						$('tbody').html("");
						$.each(response.visarate, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.client_name+'</td>\
							<td>'+item.visa_number+'</td>\
							<td>'+item.vendor_rate+'</td>\
							<td>'+item.agent_rate+'</td>\
							<td>'+item.passenger_rate+'</td>\
							<td>'+item.paid_amount+'</td>\
							<td>'+item.due_amount+'</td>\
							<td>'+item.payment_date+'</td>\
							<td>'+item.payment_status+'</td>\
							<td>'+item.benefit_loss+'</td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>\
		                    	</button>\
		                    	<a href="javascript:void(0)" class="btn btn-outline-danger btn-sm delete_btn" data-value="'+item.id+'"><i class="fas fa-trash"></i></a>\
		        			</td>\
		        		</tr>');
						})	
					}
				});
			}

			//Edit Visa
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var visarateId = $(this).val();
				//alert(visarateId);
				$('#EDITVisarateModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/visarate-edit/"+visarateId,
					success: function(response){
						if (response.status == 200) {
							// $('#edit_visaid').val(response.visarate.visa_id);
							$('#edit_visanumber').val(response.visarate.visa_number);
							$('#edit_vendorrate').val(response.visarate.vendor_rate);
							$('#edit_agentrate').val(response.visarate.agent_rate);
							$('#edit_passengerrate').val(response.visarate.passenger_rate);
							$('#edit_paidamount').val(response.visarate.paid_amount);
							// $('#edit_dueamount').val(response.visarate.due_amount);
							$('#edit_paymentdate').val(response.visarate.payment_date);
							$('#edit_paymentstatus').val(response.visarate.payment_status);
							$('#visarateid').val(visarateId);
						}
					}
				});
			});

			


			//Update Visa
			$(document).on('submit', '#UpdateVisarateFORM', function (e)
			{
				e.preventDefault();

				var id = $('#visarateid').val(); 

				let EditFormData = new FormData($('#UpdateVisarateFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/visarate-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITVisarateModal').modal('hide');
							alert(response.message);
							fetchVisarate();
						}
					}
				});
			});

			//Delete Visarate
			$(document).ready( function () {
				$('#visarate_table').on('click', '.delete_btn', function(){

					var visarateId = $(this).data("value");

					$('#visarateid').val(visarateId);

					$('#DeleteVisarateFORM').attr('action', '/visarate-delete/'+visarateId);

					$('#DeleteVisarateModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#visarate_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			