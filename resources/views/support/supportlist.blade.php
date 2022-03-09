@extends('layouts.master')
@section('title', 'Support List')

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
	                <h5 class="m-0">Support List</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->                	
                	
                    <div class="pt-2">
											<table id="support_table" class="display">
											    <thead>
											        <tr>
										            <th>Name</th>
										            <th>Email</th>
										            <th>Subject</th>
										            <th>Message</th>
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

    <!-- Delete Modal --> 

    <div class="modal fade" id="DeleteSupportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">

		      
						<form id="DeleteSupportFORM" method="POST" enctype="multipart/form-data">

								{{ csrf_field() }}
								{{ method_field('DELETE') }}
							

						    <div class="modal-body"> 
						    	<input type="hidden" name="" id="supportid"> 
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

</div><!-- content-wrapper -->
				
@endsection

@section('script')
<script type="text/javascript" src="js/supportlist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#support_table').DataTable();
	});

	$(document).on('click', '.cancel_btn', function (e) {
		$('#DeleteSupportModal').modal('hide');
	});
</script>

@endsection


	
