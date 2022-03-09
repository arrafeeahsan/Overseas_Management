@extends('layouts.master')
@section('title', 'Vendors')

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
	                <h5 class="m-0">Vendor List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/vendor-add"><button type="button" class="btn btn-primary">Add Vendor</button></a>
                	
                	
                    <div class="pt-2">
											<table id="vendor_table" class="display">
											    <thead>
											        <tr>
											            <th>Name</th>
											            <th>Address</th>
											            <th>Contact</th>
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


					<!-- Edit Vendor Modal -->
					<div class="modal fade" id="EDITVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Vendor</h5>	        
					      </div>


					      <!-- Vendor Update Form -->
					      <form id="UpdateVendorFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="vendorid" id="vendorid">

					      		<div class="form-group mb-3">
					      			<label>Vendor Name</label>
					      			<input type="text" id="edit_vendorname" name="vendorname" class="form-control">
					      		</div>

					      		<div class="form-group mb-3">
					      			<label>Vendor Address</label>
					      			<input type="text" id="edit_vendoraddress" name="vendoraddress" class="form-control">
					      		</div>
					      		<div class="form-group mb-3">
					      			<label>Vendor Contact</label>
					      			<input type="text" id="edit_vendorcontact" name="vendorcontact" class="form-control">
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

			    <div class="modal fade" id="DeleteVendorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteVendorFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="vendorid"> 
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
<script type="text/javascript" src="js/vendorlist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#vendor_table').DataTable();
	} );

	$(document).on('click', '#close', function (e) {
		$('#EDITVendorModal').modal('hide');
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteVendorModal').modal('hide');
	});
</script>

@endsection


	
