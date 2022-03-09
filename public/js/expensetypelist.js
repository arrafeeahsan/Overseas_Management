$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchExpenseType();
			function fetchExpenseType(){
				$.ajax({
					type: "GET",
					url: "/api/expensetype-list",
					dataType:"json",
					success: function(response){
						//console.log(response.expensetype);
						$('tbody').html("");
						$.each(response.expensetype, function(key, item) {
							$('tbody').append('<tr>\
									<td>'+item.expense_type_name+'</td>\
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

			//Edit ExpenseType
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var expensetypeId = $(this).val();
				//alert(expensetypeId);
				$('#EDITExpenseTypeModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/expensetype-edit/"+expensetypeId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_expensetypename').val(response.expensetype.expense_type_name);
							$('#expensetypeid').val(expensetypeId);
						}
					}
				});
			});

			


			//Update ExpenseType
			$(document).on('submit', '#UpdateExpenseTypeFORM', function (e)
			{
				e.preventDefault();

				var id = $('#expensetypeid').val(); 

				let EditFormData = new FormData($('#UpdateExpenseTypeFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/expensetype-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITExpenseTypeModal').modal('hide');
							alert(response.message);
							fetchExpenseType();
						}
					}
				});
			});

			//Delete Passport
			$(document).ready( function () {
				$('#expensetype_table').on('click', '.delete_btn', function(){

					var expensetypeId = $(this).data("value");

					$('#expensetypeid').val(expensetypeId);

					$('#DeleteExpensetypeFORM').attr('action', '/expensetype-delete/'+expensetypeId);

					$('#DeleteExpensetypeModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#expensetype_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				})	
			});



