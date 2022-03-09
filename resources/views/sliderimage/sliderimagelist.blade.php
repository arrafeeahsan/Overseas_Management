@extends('layouts.master')
@section('title', 'Slider Image List')

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
	                <h5 class="m-0">Slider Image List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	<a href="/slider-image-add"><button type="button" class="btn btn-primary">Add Image</button></a>
                	
                	
                    <div class="pt-2">
											<table id="slider_image_table" class="display">
											    <thead>
											        <tr>
											            <th>ID</th>
											            <th>Status</th>
											            <th>Slider Image</th>
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


					<!-- Edit Image Modal -->
					<div class="modal fade" id="EDITImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>	        
					      </div>


					      <!-- Image Form -->
					      <form id="UpdateImageFORM" enctype="multipart/form-data">
					      	
					      	<input type="hidden" name="_method" value="PUT">
				    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
					      	
					      	<div class="modal-body">

					      		<input type="hidden" name="imageid" id="imageid">

					      		<div class="form-group mb-3">
					      			<label>Image Status</label>
					      			<select class="form-control" id="edit_imagestatus" name="imagestatus">
													<option value="option_select" disabled selected>Select Image</option>
													<option value="enable">Enable</option>
													<option value="disable">Disable</option>
											</select>
					      		</div>

										<div class="form-group mb-3">
					      			<label>Slider Image</label>
					      			<input type="file" name="sliderimage" id="edit_sliderimage" class="form-control">
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
					<!-- End Edit Image Modal -->

					<!-- Delete Modal --> 

			    <div class="modal fade" id="DeleteSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">

					      
									<form id="DeleteSliderFORM" method="POST" enctype="multipart/form-data">

											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										

									    <div class="modal-body"> 
									    	<input type="hidden" name="" id="sliderid"> 
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
<script type="text/javascript" src="js/sliderimagelist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#slider_image_table').DataTable();
	});

	$(document).on('click', '#close', function (e) {
		$('#EDITImageModal').modal('hide');
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteSliderModal').modal('hide');
	});
</script>

@endsection


	
