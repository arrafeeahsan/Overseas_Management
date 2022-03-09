@extends('layouts.master')
@section('title', 'Clients')

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
	                <h5 class="m-0">Client List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/client-add"><button type="button" class="btn btn-primary">Add Client</button></a>
                	
                	
                    <div class="pt-2">
						<table id="client_table" class="display">
						    <thead>
						        <tr>
						            <th>Name</th>
						            <th>Father's name</th>
						            <th>Address</th>
						            <th>Phone No.</th>
						            <th>National ID</th>
						            <th>Date of Birth</th>
						            <th>Supplier Name</th>
						            <th>Profile Photo</th>
						            <th>Action</th>
						        </tr>
						    </thead>
						    <tbody>

						    </tbody>
					    </table>
					</div>

	              </div> <!-- Card-body -->
	            </div>	<!-- Card -->
            
	        </div>   <!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- content-wrapper -->


					<!-- Edit Client Modal -->
					<div class="modal fade" id="EDITClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>	        
					      </div>


					      <!-- CLient Form -->
					      <form id="UpdateClientFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="clientid" id="clientid">

					      		<div class="form-group mb-3">
					      			<label>Name</label>
					      			<input type="text" id="edit_clientname" name="clientname" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Father's Name</label>
					      			<input type="text" id="edit_clientfather" name="clientfather" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Address</label>
					      			<input type="text" id="edit_clientaddress" name="clientaddress" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Phone</label>
					      			<input type="text" id="edit_clientphone" name="clientphone" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>National ID</label>
					      			<input type="text" id="edit_clientnid" name="clientnid" class="form-control">
					      		</div>
					      		
					      		<div class="form-group mb-3">
					      			<label>Date of Birth(yy-mm-dd) </label>
					      			<input type="text" id="edit_clientdob" name="clientdob" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Client Supplier</label>
					      			<select class="form-select " aria-label="Default select example"  id="edit_suppliername" name="suppliername">
												<option value="option_select" disabled selected>Select Supplier Name</option>
												@foreach($suppliers as $supplier)
										    <option value="{{ $supplier->supplier_name }}">
										      {{ $supplier->supplier_name }}
										    </option>
										    @endforeach
											</select>
					      		</div>

										<div class="form-group mb-3">
					      			<label>Profile Picture</label>
					      			<input type="file" name="clientpp" class="form-control">
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
					<!-- End Edit Client Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteClientFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="clientid"> 
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
<script type="text/javascript" src="js/clientlist.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    	$('#client_table').DataTable();
	});

	$(document).on('click', '#close', function (e) {
		$('#EDITClientModal').modal('hide');
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteClientModal').modal('hide');
	});
</script>

@endsection


	
