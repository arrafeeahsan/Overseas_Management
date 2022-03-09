@extends('layouts.master')
@section('title', 'Expense Type List')

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
	                <h5 class="m-0">Expense Type List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                
	                <!-- Table -->
                	<a href="/expensetype-add"><button type="button" class="btn btn-primary">Add Expense Type</button></a>
                	
                	
                    <div class="pt-2">
											<table id="expensetype_table" class="display">
											    <thead>
											        <tr>
											            <th>Expense Type</th>
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


					<!-- Edit Expense Type Modal -->
					<div class="modal fade" id="EDITExpenseTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Expense Type</h5>	        
					      </div>


					      <!-- Expense Type Update Form -->
					      <form id="UpdateExpenseTypeFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="expensetypeid" id="expensetypeid">

					      		<div class="form-group mb-3">
					      			<label>Expense Type</label>
					      			<input type="text" id="edit_expensetypename" name="expensetypename" class="form-control">
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
					<!-- End Edit Expense Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteExpensetypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteExpensetypeFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="expensetypeid"> 
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
<script type="text/javascript" src="js/expensetypelist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#expensetype_table').DataTable();
	} );

	$(document).on('click', '#close', function (e) {
		$('#EDITExpenseTypeModal').modal('hide');
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteExpensetypeModal').modal('hide');
	});
</script>

@endsection


	
