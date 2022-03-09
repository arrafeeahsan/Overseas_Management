@extends('layouts.master')
@section('title', 'Clients')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                	<!-- Table -->
                	
                	<a href="/client-add"><button type="button" class="btn btn-primary">Add Client</button></a>
                	
                	
                    <div class="pt-3">
						<table id="client_table" class="display">
						    <thead>
						        <tr>
						            <th>ID</th>
						            <th>Name</th>
						            <th>Father's name</th>
						            <th>Address</th>
						            <th>Phone No.</th>
						            <th>National ID</th>
						            <th>Passport</th>
						            <th>Date of Birth</th>
						            <th>Profile Photo</th>
						            <th>Action</th>
						        </tr>
						    </thead>
						    <tbody>

						    </tbody>
					    </table>
					</div>
				</div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
</div><!-- /.content-wrapper -->

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
					      			<label>Passport No.</label>
					      			<input type="text" id="edit_clientpassport" name="passport_number" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Date of Birth(yy-mm-dd) </label>
					      			<input type="text" id="edit_clientdob" name="clientdob" class="form-control">
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

					<!--  Passport Modal -->
					<div class="modal fade" id="ADDPassportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"> Passport Details</h5>	        
					      </div>


					      <!-- Passport Form -->
					      <form id="AddPassportFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		

					      		<div class="form-group mb-3">
								    <label for="client_id">Client ID</label>
								    <input type="id" name="client_id" id="client_id" class="form-control">
								</div>

								<div class="form-group mb-3">
								    <label for="passport_number">Passport Number</label>
								    <input type="text" name="passport_number" id="passport_number" class="form-control"  placeholder="Enter passport number">
								</div>

								<div class="form-group mb-3">
								    <label for="submission_date">Submission Date</label>
								    <input type="date" name="submission_date" id="submission_date" class="form-control">
								</div>

								<div class="form-group mb-3">
								    <label for="withdraw_date">Withdraw Date</label>
								    <input type="date" name="withdraw_date" id="withdraw_date" class="form-control">
								</div>
						
						    	<div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							        <button type="submit" class="btn btn-primary">Save</button>
						    	</div>
						    </div>
					      </form>
					    </div>
					  </div>
					</div>


					<!-- Passport Number Modal -->
					<div class="modal fade" id="PassportNumberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Passport Number</h5>	        
					      </div> 

					      <!-- Passport Number Form -->
					      <form id="PassportNumberFORM" enctype="multipart/form-data">
					      	<div class="modal-body">
					      		<div class="form-group mb-3">
								    <label for="passport_num">Passport Number</label>
								    <input type="text" name="passport_num" id="passport_num" class="form-control">
								</div>	
							</div>
						   </form>
					    </div>
					  </div>
					</div>
@endsection

@section('script')

<script type="text/javascript">
	$(document).ready( function () {
    	$('#client_table').DataTable();
	} );
</script>

@endsection


	
