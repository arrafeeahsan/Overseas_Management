@extends('layouts.master')
@section('title', 'Add Passport')


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
	                <h5 class="m-0">Add Passport</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddPassportFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										  <div class="form-group">
										    <label for="clientid">Client Name</label>

										    <select class="form-control selectpicker" data-live-search="true" aria-label="Default select example" name="clientid">
												  <option value="option_select" disabled selected>Select Client</option>
												  @foreach($clients as $client)
						            	<option value="{{ $client->id }}">
						            		{{ $client->client_name }}
						            	</option>
						        			@endforeach
												</select>

												

												<!-- Create Post Form -->

												<!-- <input class="form-control" list="datalistOptions" id="clientid" name="clientid" placeholder="Type client name to get id...">
												<datalist id="datalistOptions">
													@foreach($clients as $client)
												  
												  <option value="{{ $client->id }}">
						            		{{ $client->client_name }} 
						            	</option>
						            	@endforeach
												</datalist> -->

										  </div>

										  <div class="form-group pt-2">
										    <label for="passportnumber">Passport Number</label>
										    <input type="text" name="passportnumber" id="passportnumber" class="form-control"  placeholder="Enter Passport Number">
										  </div>

										  <div class="form-group pt-2">
										    <label for="submissiondate">Submission Date</label>
										    <input type="date" name="submissiondate" id="submissiondate" class="form-control">
										  </div>

										  <div class="form-group pt-2">
										    <label for="withdrawdate">Withdraw Date</label>
										    <input type="date" name="withdrawdate" id="withdrawdate" class="form-control">
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


			// function fetchPassport(){
			// 	$.ajax({
			// 		type: "GET",
			// 		url: "/passport-list",
			// 		dataType:"json",
			// 		success: function(response){
			// 			//console.log(response.passport);
			// 			$('tbody').html("");
			// 			$.each(response.passport, function(key, item) {
			// 				$('tbody').append('<tr>\
		 //        			<td>'+item.id+'</td>\
			// 				<td>'+item.client_id+'</td>\
			// 				<td>'+item.passport_number+'</td>\
			// 				<td>'+item.submission_date+'</td>\
			// 				<td>'+item.withdarw_date+'</td>\
		 //        			<td>\
		 //        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary btn-sm">Edit</i>\
		 //                    	</button>\
		 //                    	<button type="button" value="'+item.id+'" class="delete_btn btn btn-outline-danger btn-sm">Delete\
		 //                    	</button>\
		 //        			</td>\
		 //        		</tr>');
			// 			})	
			// 		}
			// 	});
			// }


			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			
			

			$(document).on('submit', '#AddPassportFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddPassportFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/passport-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/passport-list');
						// fetchPassport();
					}
				});

			});
		});
	</script>

@endsection

		



