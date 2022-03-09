@extends('layouts.master')

@section('title', 'Client Details')
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
            <div class="col-lg-5">
            
              <div class="card card-outline">
                <div class="card-header">
                  <h5 class="m-0">Passport Info</h5>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-title">Special title treatment</h6> -->                  
                  <!-- Table -->
                  
                  
                  <div class="pt-2">
                    <table id="passportinfo_table" class="table table-bordered">
                      <thead>
                        @if($passports == null)
                          <tr>
                              <th>Passport Number</th>
                              <td>Not Inserted</td>                         
                          </tr>
                          <tr>
                              <th>Submission Date</th>
                              <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Withdraw Date</th>
                              <td>Not Inserted</td>
                          </tr>
                        
                        @else
                          <tr>
                              <th>Passport Number</th>
                              <td>{{$passports['passport_number']}}</td>                         
                          </tr>
                          <tr>
                              <th>Submission Date</th>
                              <td>{{$passports['submission_date']}}</td>
                          </tr>
                          <tr>
                              <th>Withdraw Date</th>
                              <td>{{$passports['withdraw_date']}}</td>
                          </tr>
                          
                        @endif
                      </thead>

                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div> <!-- Card-body -->
              </div>  <!-- Card -->
          </div>   <!-- /.col-lg-6 -->

          <div class="col-lg-4">
            
              <div class="card card-outline">
                <div class="card-header">
                  <h5 class="m-0">Payment Info</h5>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-title">Special title treatment</h6> -->                  
                  <!-- Table -->
                  @if($visarates == null)
                  <h6 class=""><strong>Passenger Rate:</strong> 00.00 </h6>
                  <h6 class=""><strong> Due Amount:</strong> 00.00 </h6>
                  @else
                  <h6 class=""><strong>Passenger Rate:</strong> {{$visarates['passenger_rate']}} </h6>
                  <h6 class=""><strong> Due Amount:</strong> {{$visarates['due_amount']}}</h6>
                  @endif
                  <div class="pt-2">
                    <table id="paymentinfo_table" class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Payment Amount</th>
                              <th>Payment Date</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($payments as $payment)
                        <tr>
                          <td>{{$payment->amount}}</td>
                          <td>{{$payment->payment_date}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                </div> <!-- Card-body -->
              </div>  <!-- Card -->
            
          </div>   <!-- /.col-lg-6 -->
        </div><!-- /.row -->


        <div class="row">
          <div class="col-lg-5">
            
              <div class="card card-outline">
                <div class="card-header">
                  <h5 class="m-0">Visa Info</h5>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-title">Special title treatment</h6> -->                  
                  <!-- Table -->
                  
                  
                  <div class="pt-2">
                    <table id="visainfo_table" class="table table-bordered">
                      <thead>
                        @if($visas == null)
                          <tr>
                            <th>Visa Number</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                            <th>Company Name</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>    
                            <th>Visa Type</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                            <th>Vendor Name</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                            <th>Visa Status</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                            <th>Ambassador Paid Date</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                          
                            <th>Visa Expiry Date</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>

                            <th>Applied Peron Name</th>
                            <td>Not Inserted</td>

                          </tr>
                          <tr>
                            <th>Refernece Supplier</th>
                            <td>Not Inserted</td>
                          </tr>
                        
                        @else
                        <tr>
                            <th>Visa Number</th>
                            <td>{{$visas['visa_number']}}</td>

                          </tr>
                          <tr>
                            <th>Company Name</th>
                            <td>{{$visas['company_name']}}</td>

                          </tr>
                          <tr>    
                            <th>Visa Type</th>
                            <td>{{$visas['visa_type']}}</td>

                          </tr>
                          <tr>
                            <th>Vendor Name</th>
                            <td>{{$visas['vendor_name']}}</td>

                          </tr>
                          <tr>
                            <th>Visa Status</th>
                            <td>{{$visas['visa_status']}}</td>

                          </tr>
                          <tr>
                            <th>Ambassador Paid Date</th>
                            <td>{{$visas['ambassador_paid_date']}}</td>

                          </tr>
                          <tr>
                          
                            <th>Visa Expiry Date</th>
                            <td>{{$visas['visa_expiry_date']}}</td>

                          </tr>
                          <tr>

                            <th>Applied Peron Name</th>
                            <td>{{$visas['applied_person_name']}}</td>

                          </tr>
                          <tr>
                            <th>Refernece Supplier</th>
                            <td>{{$visas['reference_supplier']}}</td>
                          </tr>
                        
                        @endif
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div> <!-- Card-body -->
              </div>  <!-- Card -->
            
          </div>   <!-- /.col-lg-6 -->

        

     
          <div class="col-lg-4">
            
              <div class="card card-outline">
                <div class="card-header">
                  <h5 class="m-0">Task Info</h5>
                </div>
                <div class="card-body">
                  <!-- <h6 class="card-title">Special title treatment</h6> -->                  
                  <!-- Table -->
                  
                  
                  <div class="pt-2">
                    <table id="taskinfo_table" class="table table-bordered">
                      <thead>
                        @if($tasks == null)
                          
                          <tr>
                            <th>Interview Date</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Interview Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>    
                              <th>Medical Date</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Medical Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Medical Expire Date</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Training Start Date</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>                         
                              <th>Training Card Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Training Card Paid Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Finger Date</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Finger Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>First Vaccine Status</th>
                            <td>Not Inserted</td>
                          </tr>
                          <tr>
                              <th>Second Vaccine Status</th>
                            <td>Not Inserted</td>
                          </tr>                              
                        
                        @else
                          
                          <tr>
                            <th>Interview Date</th>
                            <td>{{$tasks['interview_date']}}</td>
                          </tr>
                          <tr>
                              <th>Interview Status</th>
                            <td>{{$tasks['interview_status']}}</td>
                          </tr>
                          <tr>    
                              <th>Medical Date</th>
                            <td>{{$tasks['medical_date']}}</td>
                          </tr>
                          <tr>
                              <th>Medical Status</th>
                            <td>{{$tasks['medical_status']}}</td>
                          </tr>
                          <tr>
                              <th>Medical Expire Date</th>
                            <td>{{$tasks['medical_expire_date']}}</td>
                          </tr>
                          <tr>
                              <th>Training Start Date</th>
                            <td>{{$tasks['training_start_date']}}</td>
                          </tr>
                          <tr>                         
                              <th>Training Card Status</th>
                            <td>{{$tasks['training_card_status']}}</td>
                          </tr>
                          <tr>
                              <th>Training Card Paid Status</th>
                            <td>{{$tasks['training_card_paid_status']}}</td>
                          </tr>
                          <tr>
                              <th>Finger Date</th>
                            <td>{{$tasks['finger_date']}}</td>
                          </tr>
                          <tr>
                              <th>Finger Status</th>
                            <td>{{$tasks['finger_status']}}</td>
                          </tr>
                          <tr>
                              <th>First Vaccine Status</th>
                            <td>{{$tasks['first_vaccine_status']}}</td>
                          </tr>
                          <tr>
                              <th>Second Vaccine Status</th>
                            <td>{{$tasks['second_vaccine_status']}}</td>
                          </tr> 
                        
                        @endif
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>

                </div> <!-- Card-body -->
              </div>  <!-- Card -->
            
          </div>   <!-- /.col-lg-6 -->
        </div><!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
</div><!-- content-wrapper -->
         
@endsection



@section('script')



@endsection




