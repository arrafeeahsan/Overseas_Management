@extends('layouts.master')
@section('title', 'Visa Info')

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
	                <h5 class="m-0">Visa Info</h5>
	              </div>
	              <div class="card-body">
	                <!-- <h6 class="card-title">Special title treatment</h6> -->
	                <!-- Table -->
                	
                	
                	
                    <div class="pt-2">
											<table id="visa_table" class="display">
											    <thead>
											        <tr>
											            <th>Client Name</th>
											            <th>Visa Number</th>
											            <th>Company Name</th>
											            <th>Visa Type</th>
											            <th>Vendor Name</th>
											            <th>Visa Status</th>
											            <th>Ambassador Paid Date</th>
											            <th>Visa Expiry Date</th>
											            <th>Applied Person Name</th>
											            <th>Reference Supplier</th>
											        </tr>
											    </thead>
											    
											    <tbody>
											    	@foreach($visas as $visa)
											    	<tr>
												    	<td>{{$visa['client_name']}}</td>
												    	<td>{{$visa['visa_number']}}</td>
												    	<td>{{$visa['company_name']}}</td>
												    	<td>{{$visa['visa_type']}}</td>
												    	<td>{{$visa['vendor_name']}}</td>
												    	<td>{{$visa['visa_status']}}</td>
												    	<td>{{$visa['ambassador_paid_date']}}</td>
												    	<td>{{$visa['visa_expiry_date']}}</td>
												    	<td>{{$visa['applied_person_name']}}</td>
												    	<td>{{$visa['reference_supplier']}}</td>
												    </tr>
														@endforeach
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

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready( function () {
    			$('#visa_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});
</script>

@endsection


	
