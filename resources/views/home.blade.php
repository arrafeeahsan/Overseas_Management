@extends('layouts.master')

@section('title', 'Home')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page Header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Page</h1>
                </div><!-- /.col -->
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->

            <div class="row">
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>{{count($clients)}}</h3>

                    <p>Total Clients</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a class="small-box-footer">Total Clients </a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{count($visainprogress)}}</h3>

                    <p class="p">Visa in progress</p>
                  </div>
                  <div class="icon">
                    <!-- <i class="fas fa-users"></i> -->
                  </div>
                  <a href="visastatus-moreinfo/Visa in progress" class="small-box-footer homemoreinfo">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->

              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{count($hasgone)}}</h3>
                    

                    <p>Has gone</p>
                  </div>
                  <div class="icon">
                    <!-- <i class="fas fa-coins"></i> -->
                  </div>
                  <a href="visastatus-moreinfo/Has gone" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-secondary">
                  <div class="inner">
                    <h3>{{count($return)}}</h3>
                    

                    <p>Return</p>
                  </div>
                  <div class="icon">
                    <!-- <i class="fas fa-dollar-sign"></i> -->
                  </div>
                  <a href="visastatus-moreinfo/Return" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <!-- ./col -->
              <div class="col-lg-2 col-4">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">   
                    <h3>{{count($stamplingdone)}}</h3>
                    

                    <p>Visa stampling done</p>
                  </div>
                  <div class="icon">
                    <!-- <i class="fas fa-file-invoice-dollar"></i> -->
                  </div>
                  <a href="visastatus-moreinfo/Visa stampling done" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              
              <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
            
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h5 class="m-0">Clients</h5>
                      </div>
                        <div class="card-body">
                            <!-- <h6 class="card-title">Special title treatment</h6> -->

                            <!-- Table -->
                        
                            <div class="pt-2">
                                <table id="homeclient_table" class="display">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>Address</th>
                                            <th>Phone No.</th>
                                            <th>National ID</th>
                                            <th>Date of Birth</th>
                                            <th>Status</th>
                                            <th>Supplier name</th>
                                            <th>Profile Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($clientstatus as $client)
                                        <tr>
                                        
                                          <td><a href="client-details/{{$client->id}}">{{$client->client_name}}</a></td>
                                          <td>{{$client->client_father}}</td>
                                          <td>{{$client->client_address}}</td>
                                          <td>{{$client->client_phone}}</td>
                                          <td>{{$client->client_nid}}</td>
                                          <td>{{$client->client_dob}}</td>
                                          
                                          <!-- @if($client->payment_status == 'Paid'){ -->
                                             <td><i style="color: #26ff00;" class="fas fa-check"></i></td>
                                           <!-- } -->
                                           <!-- @else{ -->
                                             <td><i style="color: #fc3003;" class="fas fa-times"></i></td>
                                           <!-- } -->
                                           <!-- @endif -->

                                          <td>{{$client->client_supplier}}</td>
                                          <td><img src="uploads/client/{{$client->client_pp}}" width="50px" height="50px" alt="image" class="rounded-circle"></td>
                                        </tr>
                                      @endforeach
                                    </tbody>                                
                                    
                                </table>
                            </div>
                        </div> <!-- Card-body -->
                    </div>  <!-- Card -->           
                </div>   <!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div>
    </div>

</div><!-- /.content-wrapper -->

@endsection



@section('script')
<script type="text/javascript" src="js/homeclientlist.js"></script>

@endsection




