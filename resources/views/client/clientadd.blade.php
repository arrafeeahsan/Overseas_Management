@extends('layouts.master')
@section('title', 'Add Client')

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
	                <h5 class="m-0">Add Client</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">
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

						  <div class="form-group pt-2">
						    <label for="suppliername">Supplier Name</label>
						    <!-- <input type="text" name="suppliername" id="suppliername" class="form-control"> -->
						    <select class="form-control selectpicker" data-live-search="true" aria-label="Default select example"  id="suppliername" name="suppliername">
									<option value="option_select" disabled selected>Select Supplier Name</option>
									<option value="none">None</option>
									@foreach($suppliers as $supplier)
							    <option value="{{ $supplier->supplier_name }}">
							      {{ $supplier->supplier_name }}
							    </option>
							    @endforeach
								</select>

						  </div>

						  <div class="form-group py-2">
						    <label for="clientPp">Profile Picture</label>
						    <input type="file" name="clientpp" id="clientpp" class="form-control">
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

		



