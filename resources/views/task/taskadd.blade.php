@extends('layouts.master')
@section('title', 'Add Necessary Task')

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
	                <h5 class="m-0">Add Necessary Task</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">

										<form id="AddTaskFORM" method="POST" enctype="multipart/form-data">
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

										<!-- Interview -->
										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="interviewdate">Interview Date</label>
										    <input type="date" name="interviewdate" id="interviewdate" class="form-control">
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="interviewstatus">Interview Status</label>
										    <select class="form-select" aria-label="Default select example" name="interviewstatus" id="interviewstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Selected">Selected</option>
												  <option value="Return">Return</option>
												</select>
										  </div>
										</div>

										<!-- Medical -->
										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="medicaldate">Medical Date</label>
										    <input type="date" name="medicaldate" id="medicaldate" class="form-control">
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="medicalstatus">Medical Status</label>
										    <select class="form-select" aria-label="Default select example" name="medicalstatus" id="medicalstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="FIT">FIT</option>
												  <option value="Return">Return</option>
												</select>
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="medicalexpiredate">Medical Expire Date</label>
										    <input type="date" name="medicalexpiredate" id="medicalexpiredate" class="form-control">
										  </div>
										</div>

										<!-- Training -->
										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="trainingstartdate">Training Start Date</label>
										    <input type="date" name="trainingstartdate" id="trainingstartdate" class="form-control">
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="trainingcardstatus">Training Card Status</label>
										    <select class="form-select" aria-label="Default select example" name="trainingcardstatus" id="trainingcardstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Valid">Valid</option>
												  <option value="Invalid">Invalid</option>
												</select>
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="trainingcardpaidstatus">Training Card Paid Status</label>
										    <select class="form-select" aria-label="Default select example" name="trainingcardpaidstatus" id="trainingcardpaidstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Paid">Paid</option>
												  <option value="Not paid">Not paid</option>
												</select>
										  </div>
										</div>

										<!-- Finger -->
										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="fingerdate">Finger Date</label>
										    <input type="date" name="fingerdate" id="fingerdate" class="form-control">
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="fingerstatus">Finger Status</label>
										    <select class="form-select" aria-label="Default select example" name="fingerstatus" id="fingerstatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
										  </div>
										</div>

										<!-- Vaccine -->
										<div class="row">
										  <div class="form-group pt-2 col-4">
										    <label for="firstvaccinestatus">First Vaccine Status</label>
										    <select class="form-select" aria-label="Default select example" name="firstvaccinestatus" id="firstvaccinestatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
										  </div>
										  <div class="form-group pt-2 col-4">
										    <label for="secondvaccinestatus">Second Vaccine Status</label>
										    <select class="form-select" aria-label="Default select example" name="secondvaccinestatus" id="secondvaccinestatus">
												  <option disabled selected>Set Status</option>
												  <option value="Flight done">Flight done</option>
												  <option value="Yes">Yes</option>
												  <option value="No">No</option>
												</select>
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

			function fetchTask(){
				$.ajax({
					type: "GET",
					url: "/task-list",
					dataType:"json",
					success: function(response){
						//console.log(response.task);
						$('tbody').html("");
						$.each(response.task, function(key, item) {
							$('tbody').append('<tr>\
		        	<td>'+item.id+'</td>\
		        	<td>'+item.client_id+'</td>\
							<td>'+item.interview_date+'</td>\
							<td>'+item.interview_status+'</td>\
							<td>'+item.medical_date+'</td>\
							<td>'+item.medical_status+'</td>\
							<td>'+item.medical_expire_date+'</td>\
							<td>'+item.training_start_date+'</td>\
							<td>'+item.training_card_status+'</td>\
							<td>'+item.training_card_paid_status+'</td>\
							<td>'+item.finger_date+'</td>\
							<td>'+item.finger_status+'</td>\
							<td>'+item.first_vaccine_status+'</td>\
							<td>'+item.second_vaccine_status+'</td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="btn btn-outline-warning btn-sm">Edit\
		                    	</button>\
		                    	<button type="button" value="'+item.id+'" class="btn btn-outline-danger btn-sm">Update\
		                    	</button>\
		        			</td>\
		        		</tr>');
						})
					}
				});
			}


			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
			

			$(document).on('submit', '#AddTaskFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddTaskFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/task-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/task-list');
						fetchTask();
						//console.log(response.message);
					}
				});

			});
		});
	</script>

@endsection

		



