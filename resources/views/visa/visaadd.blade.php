@extends('layouts.master')
@section('title', 'Add Visa')

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
	                <h5 class="m-0">Add Visa</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddVisaFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->

										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="clientid">Client Name</label>
										    <select class="form-control selectpicker" data-live-search="true" aria-label="Default select example" name="clientid" id="clientid">
												  <option value="option_select" disabled selected>Clients</option>
												  @foreach($clients as $client)
						            	<option value="{{ $client->id }}">
						            		{{ $client->client_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-4">
											  <div class="form-group">
											    <label for="visanumber">Visa Number</label>
											    <input type="text" name="visanumber" id="visanumber" class="form-control"   placeholder="Enter Visa number">
											  </div>
										  </div>
										
											<div class="col-4">
											  <div class="form-group">
											    <label for="companyname">Company Name</label>
											    <input type="text" name="companyname" id="companyname" class="form-control"   placeholder="Enter company name">
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-4">  
											  <div class="form-group pt-2">
											    <label for="visatype">Visa Type</label>
											    <select class="form-select" aria-label="Default select example" name="visatype" id="visatype">
													  <option disabled selected>Set Type</option>
													  <option value="Employment Visa">Employment Visa</option>
													  <option value="Business Visa">Business Visa</option>
													  <option value="Project Visa">Project Visa</option>
													  <option value="Entry visa">Entry Visa</option>
													  <option value="Tourist Visa">Tourist Visa</option>
													  <option value="Research Visa">Research Visa</option>
													  <option value="Transit Visa">Transit Visa</option>
													  <option value="Conference Visa">Conference Visa</option>
													  <option value="Medical Visa">Medical Visa</option>
													</select>
											  </div>
										  </div>

										  <div class="col-4">
											  <div class="form-group pt-2">
											    <label for="visastatus">Visa Status</label>
											    <select class="form-select" aria-label="Default select example" name="visastatus" id="visastatus">
													  <option disabled selected>Set Status</option>
													  <option value="Has gone">Has gone</option>
													  <option value="Visa stampling done">Visa stampling done</option>
													  <option value="Visa in progress">Visa in progress</option>
													  <option value="Return">Return</option>
													</select>
											  </div>
										  </div>

										  <div class="col-4">
											  <div class="form-group pt-2">
											    <label for="visaexpirydate">Visa Expiry Date</label>
											    <input type="date" name="visaexpirydate" id="visaexpirydate" class="form-control">
											  </div>
										  </div>
										</div>


										<div class="form-row">
											<div class="col-6">
										  <div class="form-group pt-2">
										    <label for="vendorname">Vendor Name</label>
										    <!-- <input type="text" name="vendorname" id="vendorname" class="form-control" placeholder="Enter vendor name"> -->
										    <select class="form-select " aria-label="Default select example"  id="vendorname" name="vendorname">
														<option value="option_select" disabled selected>Select Vendor</option>
													  @foreach($vendors as $vendor)
							            	<option value="{{ $vendor->vendor_name }}">
							            		{{ $vendor->vendor_name }}
							            	</option>
							        			@endforeach
													</select>
										  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
										  <div class="form-group pt-2">
										    <label for="ambassadorpaiddate">Ambassador Paid Date</label>
										    <input type="date" name="ambassadorpaiddate" id="ambassadorpaiddate" class="form-control">
										  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
										  <div class="form-group pt-2">
										    <label for="appliedpersonname">Applied Person Name</label>
										    <input type="text" name="appliedpersonname" id="appliedpersonname" class="form-control" placeholder="Enter applied person name">
										  </div>
										  </div>
										</div>


										<div class="form-row">
											<div class="col-6">
										  <div class="form-group pt-2">
										    <label for="referencesupplier">Reference Supplier</label>
										    <input type="text" name="referencesupplier" id="referencesupplier" class="form-control" placeholder="Enter reference supplier">
										  </div>
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

			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			

			$(document).on('submit', '#AddVisaFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddVisaFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/visa-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/visa-list');
						fetchVisa();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



