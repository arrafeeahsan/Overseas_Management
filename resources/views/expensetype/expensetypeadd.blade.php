@extends('layouts.master')
@section('title', 'Add Expense Type')

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
	                <h5 class="m-0">Add Expense Type</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddExpenseTypeFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										
										<div class="row">
										    <div class="form-group col-6">
											    <label for="expensetypename">Expense Type Name</label>
											    <input type="text" name="expensetypename" id="expensetypename" class="form-control"  placeholder="Enter expense type">
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

			function fetchExpenseType(){
				$.ajax({
					type: "GET",
					url: "/expensetype-list",
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
			

			$(document).on('submit', '#AddExpenseTypeFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddExpenseTypeFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/expensetype-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/expensetype-list');
						fetchExpenseType();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



