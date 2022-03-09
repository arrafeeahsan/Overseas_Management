$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchPayment();
			function fetchPayment(){
				$.ajax({
					type: "GET",
					url: "/api/payment-list",
					dataType:"json",
					success: function(response){
						//console.log(response.payment);
						$('tbody').html("");
						$.each(response.payment, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.client_name+'</td>\
							<td>'+item.visa_number+'</td>\
							<td>'+item.amount+'</td>\
							<td>'+item.payment_date+'</td>\
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

			//Edit Payment
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var paymentId = $(this).val();
				//alert(paymentId);
				$('#EDITPaymentModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/payment-edit/"+paymentId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_visarateid').val(response.payment.visa_id);
							$('#edit_visanumber').val(response.payment.visa_number);
							$('#edit_amount').val(response.payment.amount);
							$('#edit_paymentdate').val(response.payment.payment_date);
							$('#paymentid').val(paymentId);
						}
					}
				});
			});

			


			//Update Payment
			$(document).on('submit', '#UpdatePaymentFORM', function (e)
			{
				e.preventDefault();

				var id = $('#paymentid').val(); 

				let EditFormData = new FormData($('#UpdatePaymentFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/payment-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITPaymentModal').modal('hide');
							alert(response.message);
							fetchPayment();
						}
					}
				});
			});

			//Delete Passport
			$(document).ready( function () {
				$('#payment_table').on('click', '.delete_btn', function(){

					var paymentId = $(this).data("value");

					$('#paymentid').val(paymentId);

					$('#DeletePaymentFORM').attr('action', '/payment-delete/'+paymentId);

					$('#DeletePaymentModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#payment_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			