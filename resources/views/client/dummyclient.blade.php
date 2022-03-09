@extends('layouts.master')
@section('title', 'Add Client')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page Header) -->
    <div class="content-header ml-4">
    	<h2>Add Client</h2>
    </div><!-- /.content-header -->
    	<div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">

					<div class="container pt-2">
						<form id="AddClientFORM" method="POST" enctype="multipart/form-data">
						<!-- @csrf -->
						  <div class="form-group">
						    <label for="clientName">Name</label>
						    <input type="text" name="clientname" id="clientname" class="form-control"   placeholder="Enter your name">
						  </div>

						  <div class="form-group pt-2">
						    <label for="clientFatherName">Father's Name</label>
						    <input type="text" name="clientfather" id="clientfather" class="form-control"  placeholder="Enter your father's name">
						  </div>

						  <div class="form-group pt-2">
						    <label for="clientAddress">Address</label>
						    <input type="text" name="clientaddress" id="clientaddress" class="form-control"  placeholder="Enter your address">
						  </div>

						  <div class="form-group pt-2">
						    <label for="clientPhone">Phone Number</label>
						    <input type="text" name="clientphone" id="clientphone" class="form-control" placeholder="Enter your phone number">
						  </div>

						  <div class="form-group pt-2">
						    <label for="ClientNationalID">National ID</label>
						    <input type="text" name="clientnid" id="clientnid" class="form-control"  placeholder="Enter your national ID number">
						  </div>

						  <div class="form-group pt-2">
						    <label for="clientDob">Birth Date</label>
						    <input type="date" name="clientdob" id="clientdob" class="form-control">
						  </div>

						  <div class="form-group py-2">
						    <label for="clientPp">Profile Picture</label>
						    <input type="file" name="clientpp" id="clientpp" class="form-control">
						  </div>

						  <button type="submit" class="btn btn-outline-primary">Save</button>
						  <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						</form>
					</div>	
				</div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
	
</div><!-- /.content-wrapper -->
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function () {

			function fetchClient(){
				$.ajax({
					type: "GET",
					url: "/client-list",
					dataType:"json",
					success: function(response){
						//console.log(response.client);
						$('tbody').html("");
						$.each(response.client, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.client_name+'</td>\
							<td>'+item.client_father+'</td>\
							<td>'+item.client_address+'</td>\
							<td>'+item.client_phone+'</td>\
							<td>'+item.client_nid+'</td>\
							<td>'+item.client_dob+'</td>\
							<td><img src="uploads/client/'+item.client_pp+'" width="50px" height="50px" alt="image"></td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="btn btn-outline-warning btn-sm">Edit\
		                    	</button>\
		                    	<button type="button" value="'+item.id+'" class="btn btn-outline-danger btn-sm">Update\
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
			

			$(document).on('submit', '#AddClientFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddClientFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/client-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/client-list');
						fetchClient();
					}
				});

			});
		});
	</script>

@endsection

		



