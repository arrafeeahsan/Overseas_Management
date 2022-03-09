@extends('layouts.master')
@section('title', 'Add Visa Rate')

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
	                <h5 class="m-0">Add Visa Rate</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddVisarateFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->

										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="visaid">Client Name</label>

												<select class="form-control selectpicker" data-live-search="true" aria-label="Default select example" name="visaid" id="visaid">
												  <option value="option_select" disabled selected>Select Client Name</option>
												  @foreach($clients as $client)
						            	<option value="{{ $client->id }}">
						            		{{ $client->client_name }}
						            	</option>
						        			@endforeach
												</select>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group">
											    <label for="visanumber">Visa Number</label>
											    <input type="text" name="visanumber" id="visanumber" class="form-control"   placeholder="Enter Visa number">
											    
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group pt-2">
											    <label for="vendorrate">Vendor Rate</label>
											    <input type="number" name="vendorrate" id="vendorrate" class="form-control"   placeholder="Enter Vendor Rate">
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group pt-2">
											    <label for="agentrate">Agent Rate</label>
											    <input type="number" name="agentrate" id="agentrate" class="form-control"   placeholder="Enter agent rate">
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group pt-2">
											    <label for="passengerrate">Passenger Rate</label>
											    <input type="number" name="passengerrate" id="passengerrate" class="form-control"   placeholder="Enter passenger rate">
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group pt-2">
											    <label for="paidamount">Paid Amount</label>
											    <input type="number" name="paidamount" id="paidamount" class="form-control"   placeholder="Enter paid amount">
											  </div>
										  </div>
										</div>


										<div class="form-row">
											<div class="col-4">
											  <div class="form-group pt-2">
											    <label for="paymentdate">Payment Date</label>
											    <input type="date" name="paymentdate" id="paymentdate" class="form-control">
											  </div>
										  </div>
										</div>

										<div class="row">
											<div class="col-4">
												<div class="form-group pt-2">
											    <label for="paymentstatus">Payment Status</label>
											    <select class="form-select" aria-label="Default select example" name="paymentstatus" id="paymentstatus">
													  <option disabled selected>Set Status</option>
													  <option value="Flight done">Flight done</option>
													  <option value="Paid">Paid</option>
													  <option value="Due">Due</option>
													</select>
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
			

			

			$(document).on('change', '#visaid', function (e) {
				e.preventDefault();

				var visaId = $('#visaid').val();
				// alert(visaId);
						
							$.ajax({
							type: "GET",
							url: "/visarate-add/"+visaId,
							success: function(response){
								if (response.status == 200) {
									$('#visanumber').val(response.data.visa_number);
								}
									// $('#paymentid').val(visarateId);
								
							}
						});
				});



			$(document).on('submit', '#AddVisarateFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddVisarateFORM')[0]);

				

				$.ajax({
					type: "POST",
					url: "/visarate-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/visarate-list');
						// fetchVisarate();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



