$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchTask();
			function fetchTask(){
				$.ajax({
					type: "GET",
					url: "/api/task-list",
					dataType:"json",
					success: function(response){
						//console.log(response.task);
						$('tbody').html("");
						$.each(response.task, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.client_name+'</td>\
							<td>'+item.interview_date+'</td>\
							<td>'+item.interview_status+'</td>\
							<td>'+item.medical_date+'</td>\
							<td>'+item.medical_status+'</td>\
							<td>'+item.medical_expire_date+'</td>\
							<td>'+item.training_start_date+'</td>\
							<td>'+item.training_card_status+'</td>\
							<td>'+item.training_card_paid_status+'</td>\
							<td>'+item.finger_date+'</td>\
							<td>'+item.finger_status+'</td>\
							<td>'+item.first_vaccine_status+'</td>\
							<td>'+item.second_vaccine_status+'</td>\
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

			//Edit Task
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var taskId = $(this).val();
				//alert(taskId);
				$('#EDITTaskModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/task-edit/"+taskId,
					success: function(response){
						if (response.status == 200) {
							// $('#edit_clientid').val(response.task.client_id);
							$('#edit_interviewdate').val(response.task.interview_date);
							$('#edit_interviewstatus').val(response.task.interview_status);
							$('#edit_medicaldate').val(response.task.medical_date);
							$('#edit_medicalstatus').val(response.task.medical_status);
							$('#edit_medicalexpiredate').val(response.task.medical_expire_date);
							$('#edit_trainingstartdate').val(response.task.training_start_date);
							$('#edit_trainingcardstatus').val(response.task.training_card_status);
							$('#edit_trainingcardpaidstatus').val(response.task.training_card_paid_status);
							$('#edit_fingerdate').val(response.task.finger_date);
							$('#edit_fingerstatus').val(response.task.finger_status);
							$('#edit_firstvaccinestatus').val(response.task.first_vaccine_status);
							$('#edit_secondvaccinestatus').val(response.task.second_vaccine_status);

							$('#taskid').val(taskId);
						}
					}
				});
			});

			


			//Update Task
			$(document).on('submit', '#UpdateTaskFORM', function (e)
			{
				e.preventDefault();

				var id = $('#taskid').val(); 

				let EditFormData = new FormData($('#UpdateTaskFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/task-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITTaskModal').modal('hide');
							alert(response.message);
							fetchTask();
						}
					}
				});
			});

			//Delete Task
			$(document).ready( function () {
				$('#task_table').on('click', '.delete_btn', function(){

					var taskId = $(this).data("value");

					$('#taskid').val(taskId);

					$('#DeleteTaskFORM').attr('action', '/task-delete/'+taskId);

					$('#DeleteTaskModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#task_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});



			