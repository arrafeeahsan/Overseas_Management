@extends('layouts.master')
@section('title', 'Typewise Expense Report')

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
	                <h5 class="m-0">Typewise Expense Report</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <!-- Table -->
                	<!-- <a href="/payment-add"><button type="button" class="btn btn-primary">Add Payment</button></a> -->
                	<div class="row">
	                	<div class="form-group pt-2 col-4">
											    <label for="expensetype">Select expense type to see typewise report</label>
											    <select class="form-control s-states browser-default selectpicker" data-live-search="true" aria-label="Default select example" name="expensetype" id="expensetype">
													  <option value="option_select" disabled selected>Expense Types</option>
													  @foreach($types as $type)
							            	<option value="{{ $type->expense_type_name}}">
							            		{{ $type->expense_type_name }}
							            	</option>
							        			@endforeach
													</select>
										</div>
										<div class="form-group pt-2 col-4">
											<label for="totalexpense">Total Expense: </label>
											<!-- <input class="form-control" type="text" name="totalexpense" id="totalexpense"> -->
											
											<h4 class="totalexpense" name="totalexpense" id="totalexpense">00.00</h4>
										</div>
									</div>
                	
                    <div class="pt-2">
											<table id="typewisereport_table" class="display">
										    <thead>
										        <tr>
										            <th>Expense Type</th>
										            <th>Expense Amount</th> 
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
	
@endsection

@section('script')
<script type="text/javascript" src="js/typewisereportlist.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    	$('#typewisereport_table').DataTable();
	});
</script>

@endsection