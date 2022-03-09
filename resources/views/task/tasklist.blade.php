@extends('layouts.master')
@section('title', 'Necessary Task List')

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
	                <h5 class="m-0">Necessary Task List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/task-add"><button type="button" class="btn btn-primary">Add Task</button></a>
                	
                	
                    <div class="pt-2">
											<table id="task_table" class="display">
											    <thead>
											        <tr>
											            
											            <th>Client Name</th>
											            <th>Interview Date</th>
											            <th>Interview Status</th>
											            <th>Medical Date</th>
											            <th>Medical Status</th>
											            <th>Medical Expire Date</th>
											            <th>Training Start Date</th>
											            <th>Training Card Status</th>
											            <th>Training Card Paid Status</th>
											            <th>Finger Date</th>
											            <th>Finger Status</th>
											            <th>First Vaccine Status</th>
											            <th>Second Vaccine Status</th>
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


					<!-- Edit Task Modal -->
					<div class="modal fade" id="EDITTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>	        
					      </div>


					      <!-- Task Update Form -->
					      <form id="UpdateTaskFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="taskid" id="taskid">

					      		<!-- <div class="row">
										  <div class="form-group mb-3 col-4">
							      		<div class="form-group mb-3">
							      			<label>Client ID</label>
							      			<input type="id" id="edit_clientid" name="clientid" class="form-control">
							      		</div>
					      		  </div>
										</div> -->
										
					      		<!-- Interview -->
										<div class="row">
										  <div class="form-group mb-3 col-4">
										    <label for="interviewdate">Interview Date</label>
										    <input type="date" name="interviewdate" id="edit_interviewdate" class="form-control">
										  </div>
										  <div class="form-group mb-3 col-4">
										    <label for="interviewstatus">Interview Status</label>
										    <select class="form-select" aria-label="Default select example" name="interviewstatus" id="edit_interviewstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Selected">Selected</option>
												  <option value="Return">Return</option>
												</select>
										  </div>
										</div>

										<!-- Medical -->
										<div class="row">
										  <div class="form-group mb-3 col-4">
										    <label for="medicaldate">Medical Date</label>
										    <input type="date" name="medicaldate" id="edit_medicaldate" class="form-control">
										  </div>
										  <div class="form-group mb-3 col-4">
										    <label for="medicalstatus">Medical Status</label>
										    <select class="form-select" aria-label="Default select example" name="medicalstatus" id="edit_medicalstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="FIT">FIT</option>
												  <option value="Return">Return</option>
												</select>
										  </div>
										  
										</div>

										<div class="row">
											<div class="form-group mb-3 col-8">
										    <label for="medicalexpiredate">Medical Expire Date</label>
										    <input type="date" name="medicalexpiredate" id="edit_medicalexpiredate" class="form-control">
										  </div>
										</div>

										<!-- Training -->
										<div class="row">
										  <div class="form-group mb-3 col-4">
										    <label for="trainingstartdate">Training Start Date</label>
										    <input type="date" name="trainingstartdate" id="edit_trainingstartdate" class="form-control">
										  </div>
										  <div class="form-group mb-3 col-4">
										    <label for="trainingcardstatus">Training Card Status</label>
										    <select class="form-select" aria-label="Default select example" name="trainingcardstatus" id="edit_trainingcardstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Valid">Valid</option>
												  <option value="Invalid">Invalid</option>
												</select>
										  </div>
										  
										</div>
										<div class="row">
										  <div class="form-group mb-3 col-8">
										  	
											    <label for="trainingcardpaidstatus">Training Card Paid Status</label>
											    <select class="form-select" aria-label="Default select example" name="trainingcardpaidstatus" id="edit_trainingcardpaidstatus">
													  <option disabled selected>Set Status</option>
													  <option value="Flight done">Flight done</option>
													  <option value="Paid">Paid</option>
													  <option value="Not paid">Not paid</option>
													</select>
											  
											</div>
										</div>
										

										<!-- Finger -->
										<div class="row">
										  <div class="form-group mb-3 col-4">
										    <label for="fingerdate">Finger Date</label>
										    <input type="date" name="fingerdate" id="edit_fingerdate" class="form-control">
										  </div>
										  <div class="form-group mb-3 col-4">
										    <label for="fingerstatus">Finger Status</label>
										    <select class="form-select" aria-label="Default select example" name="fingerstatus" id="edit_fingerstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
										  </div>
										</div>

										<!-- Vaccine -->
										<div class="row">
										  <div class="form-group mb-3 col-4">
										    <label for="firstvaccinestatus">First Vaccine Status</label>
										    <select class="form-select" aria-label="Default select example" name="firstvaccinestatus" id="edit_firstvaccinestatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
										  </div>
										  <div class="form-group mb-3 col-6">
										    <label for="secondvaccinestatus">Second Vaccine Status</label>
										    <select class="form-select" aria-label="Default select example" name="secondvaccinestatus" id="edit_secondvaccinestatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
										  </div>
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
					<!-- End Edit Task Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteTaskFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="taskid"> 
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
<script type="text/javascript" src="js/tasklist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#task_table').DataTable();
	} );

	$(document).on('click', '#close', function (e) {
		$('#EDITTaskModal').modal('hide');
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteTaskModal').modal('hide');
	});
</script>

@endsection


	
