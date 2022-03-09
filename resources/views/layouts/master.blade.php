<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- app.blade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <!-- <link rel="stylesheet" type="text/css" href="css/adminlte.css"> -->


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Select2 -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  



</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link notification" data-toggle="dropdown" href="#">
          <!-- <i class="far fa-bell fa-2x pl-2"></i> -->
          <i class="fas fa-bars"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">Settings</span>
          <div class="dropdown-divider"></div>
          <a href="change-password" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>Profile
          </a>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i>
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
          </form>
        
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="img/AHRlogo.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AHR </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">    
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="/client-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>Clients</p>
                </a>
              </li> <!-- Clients -->

              <li class="nav-item">
                <a href="/passport-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-passport nav-icon"></i>
                  <p>Passport</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/vendor-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-folder nav-icon"></i>
                  <p>Vendor</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/supplier-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-users nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/task-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-tasks nav-icon"></i>
                  <p>Tasks</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/visa-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-universal-access nav-icon"></i>
                  <p>Visa</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/visarate-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-dollar-sign nav-icon"></i>
                  <p>Visa Rate</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/payment-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-history nav-icon"></i>
                  <p>Payment History</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <!-- <i class="fas fa-money-bill-wave nav-icon"></i> -->
                  <!-- <i class="fa-solid fa-bangladeshi-taka-sign nav-icon"></i> -->
                  <!-- <i class="fa fa-money nav-icon"></i> -->
                  <i class='fas fa-hand-holding-usd nav-icon'></i>
                  <p>Expense
                  <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/expense-list" class="nav-link">
                      <i class="fas fa-clipboard-list nav-icon"></i>
                      
                      <p>Expense List</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/expensetype-list" class="nav-link">
                      <i class="fas fa-money-check-alt nav-icon"></i>
                      <p>Expense Types</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-cog nav-icon"></i>
                  <p>Admin Settings
                  <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/slider-image-list" class="nav-link">
                      <i class="fas fa-images nav-icon"></i>
                   
                      
                      <p>Slider Image</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/visa-news-list" class="nav-link">
                      <i class="fas fa-newspaper nav-icon"></i>
                      
                      <p>Visa News</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Report
                  <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="datewise-report" class="nav-link">
                      <i class="fas fa-calendar-alt nav-icon"></i>
                   
                      
                      <p>Datewise Report</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="typewise-report" class="nav-link">
                      <i class="fas fa-th nav-icon"></i>
                      
                      <p>Typewise Report</p>
                    </a>
                  </li>
                </ul>
                <li class="nav-item">
                <a href="/support-list" class="nav-link">
                  <!-- <i class="fas fa-user-circle nav-icon "></i> -->
                  <i class="fas fa-envelope nav-icon"></i>
                  <p>Support Messages</p>
                </a>
              </li>
              </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 @yield('content')
 
  

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="/home">AHR INT. (PVT.) CO.</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<!-- REQUIRED SCRIPTS -->
@yield('script')

<!-- jQuery -->
@yield('jQuery')

<script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- DataTable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<!-- Select2 -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>







</body>
</html>
