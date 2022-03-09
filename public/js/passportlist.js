$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchPassport();
			function fetchPassport(){
				$.ajax({
					type: "GET",
					url: "/api/passport-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.passport, function(key, item) {
							$('tbody').append('<tr>\
							<td>'+item.client_name+'</td>\
							<td>'+item.passport_number+'</td>\
							<td>'+item.submission_date+'</td>\
							<td>'+item.withdraw_date+'</td>\
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

			//Edit Passport
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var passportId = $(this).val();
				//alert(passportId);
				$('#EDITPassportModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/passport-edit/"+passportId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_passportnumber').val(response.passport.passport_number);
							$('#edit_submissiondate').val(response.passport.submission_date);
							$('#edit_withdrawdate').val(response.passport.withdraw_date);
							$('#passportid').val(passportId);
						}
					}
				});
			});

			


			//Update Passport
			$(document).on('submit', '#UpdatePassportFORM', function (e)
			{
				e.preventDefault();

				var id = $('#passportid').val(); 

				let EditFormData = new FormData($('#UpdatePassportFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/passport-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITPassportModal').modal('hide');
							alert(response.message);
							fetchPassport();
						}
					}
				});
			});

			//Delete Passport
			$(document).ready( function () {
				$('#passport_table').on('click', '.delete_btn', function(){

					var passportId = $(this).data("value");

					$('#passportid').val(passportId);

					$('#DeletePassportFORM').attr('action', '/passport-delete/'+passportId);

					$('#DeletePassportModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#passport_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			