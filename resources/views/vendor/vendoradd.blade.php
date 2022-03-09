@extends('layouts.master')
@section('title', 'Add Vendor')

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
	                <h5 class="m-0">Add Vendor</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddVendorFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										  <div class="form-group">
										    <label for="vendorname">Vendor Name</label>
										    <input type="text" name="vendorname" id="vendorname" class="form-control"   placeholder="Enter vendor name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="vendoraddress">Vendor Address</label>
										    <input type="text" name="vendoraddress" id="vendoraddress" class="form-control"  placeholder="Enter vendor address">
										  </div>

										  <div class="form-group pt-2">
										    <label for="vendorcontact">Vendor Contact Number</label>
										    <input type="text" name="vendorcontact" id="vendorcontact" class="form-control" placeholder="Enter vendor contact number">
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

			function fetchVendor(){
				$.ajax({
					type: "GET",
					url: "/vendor-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.vendor, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
							<td>'+item.vendor_name+'</td>\
							<td>'+item.vendor_address+'</td>\
							<td>'+item.vendor_contact+'</td>\
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
			

			$(document).on('submit', '#AddVendorFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddVendorFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/vendor-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/vendor-list');
						fetchVendor();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



