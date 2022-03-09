@extends('layouts.master')
@section('title', 'Add Slider Image')

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
	                <h5 class="m-0">Add Slider Image</h5>
	              </div>

	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Form -->
	                <div class="container">
										<form id="AddImageFORM" method="POST" enctype="multipart/form-data">
										<!-- @csrf -->										  

										  <div class="form-group">
										    <label for="sliderimage">Upload Slider Image</label>
										    <input type="file" name="sliderimage" id="sliderimage" class="form-control">
										  </div>

										  <div class="form-group pt-2">
										  	<label for="imagestatus">Image Status</label>
										  	<select class="form-select" id="imagestatus" name="imagestatus">
													<option value="option_select" disabled selected>Set Status</option>
													<option value="enable">Enable</option>
													<option value="disable">Disable</option>
												</select>
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
			

			$(document).on('submit', '#AddImageFORM', function (e) {
				e.preventDefault();

				let formData = new FormData($('#AddImageFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/slider-image-add",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						$(location).attr('href','/slider-image-list');
						//fetchSliderImage();
					}
				});

			});
		});
	</script>

@endsection

		



