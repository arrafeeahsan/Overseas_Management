@extends('layouts.master')
@section('title', 'Visa Rate List')

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
	                <h5 class="m-0">Visa Rate List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/visarate-add"><button type="button" class="btn btn-primary">Add Visa Rate</button></a>
                	
                	
                    <div class="pt-2">
											<table id="visarate_table" class="display">
											    <thead>
											        <tr>
											            <th>Client Name</th>
											            <th>Visa Number</th>
											            <th>Vendor Rate</th>
											            <th>Agent Rate</th>
											            <th>Passenger Rate</th>
											            <th>Paid Amount</th>
											            <th>Due Amount</th>
											            <th>Payment Date</th>
											            <th>Payment Status</th>
											            <th>Benefit/Loss</th>
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
					<div class="modal fade" id="EDITVisarateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Visa Rate</h5>	        
					      </div>


					      <!-- Visa Rate Update Form -->
					      <form id="UpdateVisarateFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="visarateid" id="visarateid">
					      		
							      <!-- <div class="form-group mb-3">
							      	<label>Visa ID</label>
							      	<input type="id" id="edit_visaid" name="visaid" class="form-control">
							      </div> -->		      		

					      		<div class="form-group mb-3">
					      			<label>Visa Number</label>
					      			<input type="text" id="edit_visanumber" name="visanumber" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Vendor Rate</label>
					      			<input type="number" id="edit_vendorrate" name="vendorrate" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Agent Rate</label>
					      			<input type="number" id="edit_agentrate" name="agentrate" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Passenger Rate</label>
					      			<input type="number" id="edit_passengerrate" name="passengerrate" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Paid Amount</label>
					      			<input type="number" id="edit_paidamount" name="paidamount" class="form-control">
					      		</div>

					      		<!-- <div class="form-group mb-3">
					      			<label>Due Amount</label>
					      			<input type="number" id="edit_dueamount" name="dueamount" class="form-control">
					      		</div> -->

					      		<div class="form-group mb-3">
					      			<label>Payment Date</label>
					      			<input type="date" id="edit_paymentdate" name="paymentdate" class="form-control">
					      		</div>
					      		
					      		<div class="form-group mb-3">
					      			<label>Payment Status</label>
					      			<select class="form-select" aria-label="Default select example"  id="edit_paymentstatus" name="paymentstatus">
													  <option disabled selected>Set Status</option>
													  <option value="Flight Done">Flight Done</option>
													  <option value="Paid">Paid</option>
													  <option value="Due">Due</option>
											</select>
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
					<!-- End Edit Visarate Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteVisarateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteVisarateFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="visarateid"> 
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
<script type="text/javascript" src="js/visaratelist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#visarate_table').DataTable();
	} );

	$(document).on('click', '#close', function (e) {
		$('#EDITVisarateModal').modal('hide');
	});
	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteVisarateModal').modal('hide');
	});
</script>

@endsection


	
