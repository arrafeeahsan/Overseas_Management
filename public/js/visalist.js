$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVisa();
			function fetchVisa(){
				$.ajax({
					type: "GET",
					url: "/api/visa-list",
					dataType:"json",
					success: function(response){
						//console.log(response.visa);
						$('tbody').html("");
						$.each(response.visa, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.client_name+'</td>\
							<td>'+item.visa_number+'</td>\
							<td>'+item.company_name+'</td>\
							<td>'+item.visa_type+'</td>\
							<td>'+item.vendor_name+'</td>\
							<td>'+item.visa_status+'</td>\
							<td>'+item.ambassador_paid_date+'</td>\
							<td>'+item.visa_expiry_date+'</td>\
							<td>'+item.applied_person_name+'</td>\
							<td>'+item.reference_supplier+'</td>\
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

				var visaId = $(this).val();
				//alert(visaId);
				$('#EDITVisaModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/visa-edit/"+visaId,
					success: function(response){
						if (response.status == 200) {
							// $('#edit_clientid').val(response.visa.client_id);
							$('#edit_visanumber').val(response.visa.visa_number);
							$('#edit_companyname').val(response.visa.company_name);
							$('#edit_visatype').val(response.visa.visa_type);
							$('#edit_vendorname').val(response.visa.vendor_name);
							$('#edit_visastatus').val(response.visa.visa_status);
							$('#edit_ambassadorpaiddate').val(response.visa.ambassador_paid_date);
							$('#edit_visaexpirydate').val(response.visa.visa_expiry_date);
							$('#edit_appliedpersonname').val(response.visa.applied_person_name);
							$('#edit_referencesupplier').val(response.visa.reference_supplier);
							$('#visaid').val(visaId);
						}
					}
				});
			});

			


			//Update Visa
			$(document).on('submit', '#UpdateVisaFORM', function (e)
			{
				e.preventDefault();

				var id = $('#visaid').val(); 

				let EditFormData = new FormData($('#UpdateVisaFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/visa-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITVisaModal').modal('hide');
							alert(response.message);
							fetchVisa();
						}
					}
				});
			});

			//Delete Visa
			$(document).ready( function () {
				$('#visa_table').on('click', '.delete_btn', function(){

					var visaId = $(this).data("value");

					$('#visaid').val(visaId);

					$('#DeleteVisaFORM').attr('action', '/visa-delete/'+visaId);

					$('#DeleteVisaModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#visa_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});



			