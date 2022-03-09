@extends('layouts.master')
@section('title', 'Visa List')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

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
	                <h5 class="m-0">Visa List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/visa-add"><button type="button" class="btn btn-primary">Add Visa</button></a>
                	
                	
                    <div class="pt-2">
											<table id="visa_table" class="display">
											    <thead>
											        <tr>
											            <th>Client Name</th>
											            <th>Visa Number</th>
											            <th>Company Name</th>
											            <th>Visa Type</th>
											            <th>Vendor Name</th>
											            <th>Visa Status</th>
											            <th>Ambassador Paid Date</th>
											            <th>Visa Expiry Date</th>
											            <th>Applied Person Name</th>
											            <th>Reference Supplier</th>
											            <th>Action</th>
											        </tr>
											    </thead>
											    <tbody>

											    </tbody>
										  </table>
										</div>

	              </div>
	            </div>
            
	        </div>   <!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- content-wrapper -->


					<!-- Edit Visa Modal -->
					<div class="modal fade" id="EDITVisaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Visa</h5>	        
					      </div>


					      <!-- Visa Update Form -->
					      <form id="UpdateVisaFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="visaid" id="visaid">

					      		<!-- <div class="row">
										  <div class="form-group mb-3 col-4">
							      		<div class="form-group mb-3">
							      			<label>Client ID</label>
							      			<input type="id" id="edit_clientid" name="clientid" class="form-control">
							      		</div>
					      		  </div>
										</div> -->

					      		<div class="form-group mb-3">
					      			<label>Visa Number</label>
					      			<input type="text" id="edit_visanumber" name="visanumber" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Company Name</label>
					      			<input type="text" id="edit_companyname" name="companyname" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Visa Type</label>
					      			<select class="form-select" aria-label="Default select example" name="visatype" id="edit_visatype">
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
					      		<div class="form-group mb-3">
					      			<label>Vendor Name</label>
					      			<!-- <input type="text" id="edit_vendorname" name="vendorname" class="form-control"> -->
					      			<select class="form-select " aria-label="Default select example"  id="edit_vendorname" name="vendorname">
														<option value="option_select" disabled selected>Select Vendor</option>
													  @foreach($vendors as $vendor)
							            	<option value="{{ $vendor->vendor_name }}">
							            		{{ $vendor->vendor_name }}
							            	</option>
							        			@endforeach
													</select>
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Visa Status</label>
					      			<select class="form-select" aria-label="Default select example" name="visastatus" id="edit_visastatus">
													  <option disabled selected>Set Status</option>
													  <option value="Has gone">Has gone</option>
													  <option value="Visa stampling done">Visa stampling done</option>
													  <option value="Visa in progress">Visa in progress</option>
													  <option value="Return">Return</option>
											</select>
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Ambassador Paid Date</label>
					      			<input type="date" name="ambassadorpaiddate" id="edit_ambassadorpaiddate" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Visa Expiry Date</label>
					      			<input type="date" name="visaexpirydate" id="edit_visaexpirydate" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Applied Person Name</label>
					      			<input type="text" id="edit_appliedpersonname" name="appliedpersonname" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Reference Supplier</label>
					      			<input type="text" id="edit_referencesupplier" name="referencesupplier" class="form-control">
					      		</div>
				
					      	</div>
							    <div class="modal-footer">
							        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Update</button>
							    </div>
					      </form>
					    </div>
					  </div>
					</div>
					<!-- End Edit Visa Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteVisaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteVisaFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="visaid"> 
									      <h5 class="text-center">Are you sure you want to delete?</h5>
									    </div>

									    <div class="modal-footer justify-content-center">
									        <button type="button" class="cancel btn btn-secondary cancel_btn" data-dismiss="modal">Cancel</button>
									        <button type="submit" class="delete btn btn-danger">Yes</button>
									    </div>

									</form>
								</div>
							</div>
					</div>

					<!-- END Delete Modal -->
				
@endsection

@section('script')
<script type="text/javascript" src="js/visalist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#visa_table').DataTable();
	} );

	$(document).on('click', '#close', function (e) {
		$('#EDITVisaModal').modal('hide');
	});
	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteVisaModal').modal('hide');
	});
</script>

@endsection


	
