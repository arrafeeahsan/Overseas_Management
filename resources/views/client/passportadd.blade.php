@extends('layouts.master')
@section('title', 'Add Passport')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page Header) -->
    <div class="content-header ml-4">
    	<h2>Add Passport</h2>
    </div><!-- /.content-header -->
    	<div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">

					<div class="container pt-2">
						<form id="AddPassportFORM" method="POST" enctype="multipart/form-data">
						<!-- @csrf -->
						  <div class="form-group">
						    <label for="client_id">Client ID</label>
						    <input type="id" name="client_id" id="client_id" class="form-control"   placeholder="Enter Client ID">
						  </div>

						  <div class="form-group pt-2">
						    <label for="passport_number">Passport Number</label>
						    <input type="text" name="passport_number" id="passport_number" class="form-control"  placeholder="Enter passport number">
						  </div>

						  <div class="form-group pt-2">
						    <label for="submission_date">Submission Date</label>
						    <input type="date" name="submission_date" id="submission_date" class="form-control">
						  </div>

						  <div class="form-group pt-2">
						    <label for="withdraw_date">Withdraw Date</label>
						    <input type="date" name="withdraw_date" id="withdraw_date" class="form-control">
						  </div>

						  <button type="submit" class="btn btn-outline-primary">Save</button>
						  <button type="reset" value="Reset" class="btn btn-primary">Reset</button>
						</form>
					</div>	
				</div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
	
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
			

			$(document).on('submit', '#AddPassportFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddPassportFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/passport-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/client-list');
						//fetchClient();
					}
				});

			});
		});
	</script>

@endsection

		



