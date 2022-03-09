$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchVisaNews();
			function fetchVisaNews(){
				$.ajax({
					type: "GET",
					url: "/api/visa-news-list",
					dataType:"json",
					success: function(response){
						//console.log(response.visa);
						$('tbody').html("");
						$.each(response.visanews, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.job_name+'</td>\
		        			<td>'+item.visa_company_name+'</td>\
							<td>'+item.visa_company_address+'</td>\
							<td>'+item.number_of_visa+'</td>\
							<td>'+item.country+'</td>\
							<td>'+item.city+'</td>\
							<td>'+item.working_hour+'</td>\
							<td>'+item.salary+'</td>\
							<td>'+item.bonus+'</td>\
							<td>'+item.description+'</td>\
							<td>'+item.weekend_day+'</td>\
							<td>'+item.news_status+'</td>\
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

			//Edit Visa News
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var visanewsId = $(this).val(); 
				//alert(visanewsId);
				$('#EDITVisanewsModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/visa-news-edit/"+visanewsId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_jobname').val(response.visanews.job_name);
							$('#edit_visacompanyname').val(response.visanews.visa_company_name);
							$('#edit_visacompanyaddress').val(response.visanews.visa_company_address);
							$('#edit_numberofvisa').val(response.visanews.number_of_visa);
							$('#edit_country').val(response.visanews.country);
							$('#edit_city').val(response.visanews.city);
							$('#edit_workinghour').val(response.visanews.working_hour);
							$('#edit_salary').val(response.visanews.salary);
							$('#edit_bonus').val(response.visanews.bonus);
							$('#edit_description').val(response.visanews.description);
							$('#edit_weekendday').val(response.visanews.weekend_day);
							$('#edit_newsstatus').val(response.visanews.news_status);
							$('#visanewsid').val(visanewsId);
						}
					}
				});
			});

			


			//Update Visa News
			$(document).on('submit', '#UpdateVisanewsFORM', function (e)
			{
				e.preventDefault();

				var id = $('#visanewsid').val(); 

				let EditFormData = new FormData($('#UpdateVisanewsFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/visa-news-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITVisanewsModal').modal('hide');
							alert(response.message);
							fetchVisaNews();
						}
					}
				});
			});

			//Delete Visa News
			$(document).ready( function () {
				$('#visanews_table').on('click', '.delete_btn', function(){

					var visanewsId = $(this).data("value");

					$('#visanewsid').val(visanewsId);

					$('#DeleteVisanewsFORM').attr('action', '/visa-news-delete/'+visanewsId);

					$('#DeleteVisanewsModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#visanews_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});



			