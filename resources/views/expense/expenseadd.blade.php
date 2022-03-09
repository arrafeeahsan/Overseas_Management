@extends('layouts.master')
@section('title', 'Add Expense')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        	
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          	<div class="col-lg-12">
            
	          	<div class="card card-primary card-outline">
	              <div class="card-header">
	                <h5 class="m-0">Add Expense</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddExpenseFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->

										<div class="row">
										    <div class="form-group col-6">
							      			<label for="type">Expense Type</label>
							      			<select class="form-select " aria-label="Default select example"  id="type" name="type">
														<option value="option_select" disabled selected>Expense Type</option>
													  @foreach($expensetypes as $expensetype)
							            	<option value="{{ $expensetype->expense_type_name }}">
							            		{{ $expensetype->expense_type_name }}
							            	</option>
							        			@endforeach
													</select>
										  	</div>
										  </div>
										  <div class="row">
										    <div class="form-group col-6 pt-2">
											    <label for="amount">Expense Amount</label>
											    <input type="number" name="amount" id="amount" class="form-control"  placeholder="Enter Amount">
											  </div>
											</div>	  

										  <button type="submit" class="btn btn-outline-primary">Save</button>
										  <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
										</form>
									</div>	
 
	              </div> <!-- /.card-body -->
	            </div> <!-- /.card -->
            
	        </div>   <!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function () {

			function fetchExpense(){
				$.ajax({
					type: "GET",
					url: "/expense-list",
					dataType:"json",
					success: function(response){
						//console.log(response.expense);
						$('tbody').html("");
						$.each(response.expense, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.type+'</td>\
							<td>'+item.amount+'</td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>\
		                    	</button>\
		                    	<button type="button" value="'+item.id+'" class="delete_btn btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i>\
		                    	</button>\
		        			</td>\
		        		</tr>');
						})	
					}
				});
			}


			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			

			$(document).on('submit', '#AddExpenseFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddExpenseFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/expense-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/expense-list');
						fetchExpense();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



