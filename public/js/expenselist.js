$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchExpense();
			function fetchExpense(){
				$.ajax({
					type: "GET",
					url: "/api/expense-list",
					dataType:"json",
					success: function(response){
						//console.log(response.expense);
						$('tbody').html("");
						$.each(response.expense, function(key, item) {
							$('tbody').append('<tr>\
							<td>'+item.type+'</td>\
							<td>'+item.amount+'</td>\
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

			//Edit Expense
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var expenseId = $(this).val();
				//alert(expenseId);
				$('#EDITExpenseModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/expense-edit/"+expenseId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_type').val(response.expense.type);
							$('#edit_amount').val(response.expense.amount);
							$('#expenseid').val(expenseId);
						}
					}
				});
			});

			


			//Update Expense
			$(document).on('submit', '#UpdateExpenseFORM', function (e)
			{
				
				e.preventDefault();

				var id = $('#expenseid').val(); 

				let EditFormData = new FormData($('#UpdateExpenseFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/expense-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITExpenseModal').modal('hide');
							alert(response.message);
							fetchExpense();
						}
					}
				});
			});

			//Delete Passport
			$(document).ready( function () {
				$('#expense_table').on('click', '.delete_btn', function(){

					var expenseId = $(this).data("value");

					$('#expenseid').val(expenseId);

					$('#DeleteExpenseFORM').attr('action', '/expense-delete/'+expenseId);

					$('#DeleteExpenseModal').modal('show');

				});
			});


			$(document).ready( function () {
    			$('#expense_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			