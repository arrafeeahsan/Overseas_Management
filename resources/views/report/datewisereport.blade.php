@extends('layouts.master')
@section('title', 'Datewise Expense Report')

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
	                <h5 class="m-0">Datewise Expense Report</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->

	                <div class="">

										<form id="DatewiseReportFORM" method="POST" enctype="multipart/form-data">
											<!-- @csrf -->

											<div class="row">
			                	<div class="form-group pt-2 col-3 ">
													    <label for="datewiseform">From</label>
													    <input class="form-control" type="date" name="startdatewise" id="startdatewise">   
												</div>

												<div class="form-group pt-2 col-3">
													    <label for="datewiseto">To</label>
													    <input class="form-control" type="date" name="enddatewise" id="enddatewise"> 
												</div>

												<div class="form-group pt-2 col-2">
													 <label for="">Click here to genereate report</label>
													<button type="submit" class="btn btn-outline-primary">Generate</button>
												</div>

												<div class="form-group pt-2 col-4">
													<label for=""></label>
													<label for="totalexpense">Total Expense: </label>
													<h4 class="totalexpense" name="totalexpense" id="totalexpense">00.00</h4>
												</div>
											</div>

										  
										</form>

								</div>

	                <!-- Table -->
                	<!-- <a href="/payment-add"><button type="button" class="btn btn-primary">Add Payment</button></a> -->
                	
                	
                    <div class="pt-2">
											<table id="datewisereport_table" class="display">
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
<script type="text/javascript" src="js/datewisereportlist.js">

</script>



@endsection