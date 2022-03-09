@extends('layouts.master')
@section('title', 'Add Supplier')

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
	                <h5 class="m-0">Add Supplier</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddSupplierFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->
										  <div class="form-group">
										    <label for="suppliername">Supplier Name</label>
										    <input type="text" name="suppliername" id="suppliername" class="form-control"   placeholder="Enter supplier name">
										  </div>

										  <div class="form-group pt-2">
										    <label for="supplieraddress">Supplier Address</label>
										    <input type="text" name="supplieraddress" id="supplieraddress" class="form-control"  placeholder="Enter supplier address">
										  </div>

										  <div class="form-group pt-2">
										    <label for="suppliercontact">Supplier Contact Number</label>
										    <input type="text" name="suppliercontact" id="suppliercontact" class="form-control" placeholder="Enter supplier contact number">
										  </div>

										  <div class="form-group pt-2">
										    <label for="suppliernid">Supplier NID Number</label>
										    <input type="text" name="suppliernid" id="suppliernid" class="form-control" placeholder="Enter supplier NID number">
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
			

			$(document).on('submit', '#AddSupplierFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddSupplierFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/supplier-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/supplier-list');
						// fetchSupplier();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



