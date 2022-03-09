@extends('layouts.master')
@section('title', 'Add Payment')

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
	                <h5 class="m-0">Add Payment</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddPaymentFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->

										<div class="row">
										  <div class="form-group pt-2 col-6">
										    <label for="visarateid">Client Name</label>
										    
												<select class="form-control selectpicker" data-live-search="true" aria-label="Default select example" name="visarateid" id="visarateid">
												  <option value="option_select" disabled selected>Select Client</option>
												  @foreach($clients as $client)
						            	<option value="{{ $client->id }}">
						            		{{ $client->client_name }} 
						            	</option>
						        			@endforeach
												</select>
										  </div>
										</div>

										<div class="form-row pt-2">
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
											    <label for="pastdue">Previous Due</label>
											    <input type="number" name="pastdue" id="pastdue" class="form-control" placeholder="Select Client to see due amount">
											  </div>
										  </div>
										</div>

										<div class="form-row">
											<div class="col-6">
											  <div class="form-group pt-2">
											    <label for="amount">Amount</label>
											    <input type="number" name="amount" id="amount" class="form-control"   placeholder="Enter amount">
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
			

			$(document).on('submit', '#AddPaymentFORM', function (e) {
				e.preventDefault();

				var id = $('#visarateid').val();
				// console.log(id);

				let formData = new FormData($('#AddPaymentFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/payment-add/"+id,
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/payment-list');
						//fetchPayment();
						//console.log(response.message);
					}
				});
			});

			$(document).on('change', '#visarateid', function (e) {
				e.preventDefault();

				// alert($('#visarateid').val());

				var visarateId = $(this).val();
				//alert(visarateId);
						
							$.ajax({
							type: "GET",
							url: "/payment-add/"+visarateId,
							success: function(response){
								if (response.status == 200) {
									$('#pastdue').val(response.data.due_amount);
									$('#visanumber').val(response.data.visa_number);
								}
									// $('#paymentid').val(visarateId);
								
							}
						});
				});
		});
	</script>

@endsection

		



