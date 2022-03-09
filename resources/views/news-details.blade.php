<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Details</title>

    <link rel="stylesheet" href="../assets/css/bootstrap-4.5.0.min.css">

    <!-- <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css"> -->

    <link rel="stylesheet" href="../assets/css/material.min.css">

    <link rel="stylesheet" href="../assets/css/ripples.min.css">

    <link rel="stylesheet" href="../assets/css/owl.carousel.2.3.4.min.css">

    <link rel="stylesheet" href="../assets/css/magnific-popup.css">

    <link rel="stylesheet" href="../assets/css/animate.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet" href="../assets/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/colors/indigo.css" media="screen" />

    <!-- Previous Libraries -->
    <!-- Icons -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.4.95/css/materialdesignicons.min.css">

    <!-- News Ticker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/site.css" /> 
    



    <style type="text/css">
        .fas {
          margin-right: 4px !important; /*override*/
        }

        .fas .glyphicon {
          margin-right: 0px !important; /*override*/
        }

        .pagination a {
          color: #555;
        }

        .card ul {
          padding: 0px;
          margin: 0px;
          list-style: none;
        }

        .news-item {
          padding: 4px 4px;
          margin: 0px;
          border-bottom: 1px dotted #555;
        }
    </style>


</head>
<body>
    <header id="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand brand-link" href="/">
                                <img src="../assets/images/AHRlogo.png" height="60px" width="70px" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">

                                    <li class="nav-item active">
                                        <a class="page-scroll" href="/">Home <span><i class="mdi mdi-chevron-down"></i></span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Services <span><i class="mdi mdi-chevron-down"></i></span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Visa Process <span><i class="mdi mdi-chevron-down"></i></span></a>
                                        <ul class="sub-menu">
                                            <li class="nav-item"><a href="/visa-process">Visa Process</a></li>
                                            <li class="nav-item"><a href="/visa-documents">Documents Required</a></li>
                                            <li class="nav-item"><a href="/visa-workers">Workers Category</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Vendors <span><i class="mdi mdi-chevron-down"></i></span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">About Us <span><i class="mdi mdi-chevron-down"></i></span></a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#">Contact <span><i class="mdi mdi-chevron-down"></i></span></a>
                                    </li>

                                </ul>
                            </div> 
                        </nav> 
                    </div>
                </div> 
            </div> 
        </div> 
    </header>

    <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <!-- {{$j = 0}} -->
            @foreach($sliders as $slider)
                @if($j == 0)
                    <li data-target="#myCarousel" data-slide-to="{{$j}}" class="active"></li>
                
                @else
                    <li data-target="#myCarousel" data-slide-to="{{$j}}"></li>
                
                @endif
                <!-- {{$j++}} -->
                    
            @endforeach

        </ol>


        <div class="carousel-inner">

            {{$i = 0}}
                @foreach($sliders as $slider)
                    @if($i == 0){
                    <div class="carousel-item active">
                        <img src="{{url('uploads/sliderimage/', $slider->slider_image)}}" class="d-block w-100"  alt="..."> 
                        <div class="carousel-caption d-md-block">

                            
                            <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">AHR INTERNATIONAL (PVT.) CO.</h1>
                            <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">Authentic Human Resource Company</h5>
                            <a href="javascript:void(0)" class="animated fadeInUp wow btn" data-wow-delay=".8s">
                                <img class="rounded-circle elevation-3" src="../assets/images/AHRlogo.jpg" height="200px" width="200px" alt="Logo">
                                
                                <div class="ripple-container"></div>
                            </a>
                            
                        </div>
                    </div>
                    }
                    @else{
                    <div class="carousel-item">
                        <img src="{{url('uploads/sliderimage/', $slider->slider_image)}}" class="d-block w-100"  alt="..."> 
                        <div class="carousel-caption d-md-block">
                            <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">AHR INTERNATIONAL (PVT.) CO.</h1>
                            <h5 class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">Authentic Human Resource Company</h5>
                            <a href="javascript:void(0)" class="animated fadeInUp wow btn" data-wow-delay=".8s">
                                <img class="rounded-circle elevation-3" src="../assets/images/AHRlogo.jpg" height="200px" width="200px" alt="Logo">
                                
                                <div class="ripple-container"></div>
                            </a>
                        </div>
                    </div>
                    }
                    @endif
                    {{$i++}}
                    
                @endforeach
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
        <span class="carousel-control" aria-hidden="true"><i class="mdi mdi-arrow-left" data-ripple-color="#F0F0F0"></i></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
        <span class="carousel-control" aria-hidden="true"><i class="mdi mdi-arrow-right" data-ripple-color="#F0F0F0"></i></span>
        <span class="sr-only">Next</span>
        </a>
    </div>



	<section class="welcome-section section-padding">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 col-lg-12 col-xs-12 welcome-column">
                    <div class="card">
                      <div class="card-header">
                        <span class="glyphicon glyphicon-list-alt"></span><b>Details</b>
                      </div>
                      <div class="card-body">
                      	<table id="" class="table table-borderless">
	                      <thead>
	                          <tr class="row">
	                              <th class="col-3">Job Name:</th>
	                              <td>{{$details->job_name}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Company Name</th>
	                              <td>{{$details->visa_company_name}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Company Address</th>
	                              <td>{{$details->visa_company_address}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Available Visa</th>
	                              <td>{{$details->number_of_visa}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Country</th>
	                              <td>{{$details->country}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">City</th>
	                              <td>{{$details->city}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Working Hour</th>
	                              <td>{{$details->working_hour}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Salary</th>
	                              <td>{{$details->salary}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Bonus</th>
	                              <td>{{$details->bonus}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Description</th>
	                              <td>{{$details->description}}</td>
	                          </tr>
	                          <tr class="row">
	                              <th class="col-3">Weekend Day</th>
	                              <td>{{$details->weekend_day}}</td>
	                          </tr>
	                      </thead>

	                      <tbody>

	                      </tbody>
                    	</table>
                      </div>
                      <div class="card-footer">

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<footer class="page-footer center-on-small-only  pt-0 footer-widget-container">

    <div class="container pt-5 mb-5">
    <div class="row">

    <div class="col-md-6 col-lg-3 col-xl-3 footer-contact-widget">
	    <h3 class="footer-title">About Us</h3>
	    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates eos minus expedita illo recusandae
	    	esse labore obcaecati nisi amet quia odio sapiente! Fugiat, voluptatibus nemo necessitatibus porro.</p>
	    <ul>
		    <li>
		    	<a href="#"><i class="mdi mdi-facebook"></i></a>
		    </li>
		    <li>
		    	<a href="#"><i class="mdi mdi-twitter"></i></a>
		    </li>
		    <li>
		    	<a href="#"><i class="mdi mdi-instagram"></i></a>
		    </li>
		    <li>
		    	<a href="#"><i class="mdi mdi-github"></i></a>
		    </li>
		    <li>
		    	<a href="#"><i class="mdi mdi-linkedin"></i></a>
		    </li>
	    </ul>
    </div>

   <div class="col-md-6 col-lg-3 col-xl-3 link-widget">
    <h3 class="footer-title">Get in Touch</h3>
    <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada
    magna mollis euismod. Praesent commodo cursus.</p>
    <div class="mt-3"></div>
    <ul class="icon-list">
    <li><i class="mdi mdi-map-marker"></i> 548 San Francisco, CA </li>
    <li><i class="mdi mdi-email"></i> <a href="/cdn-cgi/l/email-protection#1c717d75705c717d68796e757d70327f7371" class="nocolor"><span class="__cf_email__" data-cfemail="aac7cbc3c6eac7cbdecfd8c3cbc684c9c5c7">[email&#160;protected]</span></a>
    </li>
    <li><i class="mdi mdi-phone-classic"></i> +00 (123) 456 78 90 </li>
    <li><i class="mdi mdi-cellphone-iphone"></i> +00 (121) 455 47 54 </li>
    </ul>
    </div>

    <div class="col-md-6 col-lg-3 col-xl-3 link-widget">
    <h3 class="footer-title">Get in Touch</h3>
    <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada
    magna mollis euismod. Praesent commodo cursus.</p>
    <div class="mt-3"></div>
    <ul class="icon-list">
    <li><i class="mdi mdi-map-marker"></i> 548 San Francisco, CA </li>
    <li><i class="mdi mdi-email"></i> <a href="/cdn-cgi/l/email-protection#1c717d75705c717d68796e757d70327f7371" class="nocolor"><span class="__cf_email__" data-cfemail="aac7cbc3c6eac7cbdecfd8c3cbc684c9c5c7">[email&#160;protected]</span></a>
    </li>
    <li><i class="mdi mdi-phone-classic"></i> +00 (123) 456 78 90 </li>
    <li><i class="mdi mdi-cellphone-iphone"></i> +00 (121) 455 47 54 </li>
    </ul>
    </div>


    <div class="col-md-6 col-lg-3 col-xl-3 footer-contact">
    <h3 class="footer-title">Subscribe</h3>
    <div class="widget">
    <div class="newsletter-wrapper">
    <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
    <div class="form-group">
    <input type="email" value="" name="EMAIL" class="email form-control" id="EMAIL" placeholder="Email Address" required="">
    <button type="submit" name="subscribe" id="subscribe" class="btn btn-common pull-right">Join</button>
    <div class="clearfix"></div>
    </div>
    </form>
    </div>
    </div>

    <div class="widget">
    <h5 class="widget-title">Useful Links</h5>
    <ul class="unordered-list">
    <li><a href="#" class="nocolor">Terms of Use</a></li>
    <li><a href="#" class="nocolor">Privacy Policy</a></li>
    <li><a href="#" class="nocolor">Company Profile</a></li>
    <li><a href="#" class="nocolor">Why Choose Us</a></li>
    </ul>
    </div>
    </div>

    </div>
    </div>


    <div class="footer-copyright">
    <div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
    <p>Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
    </div>
    </div>
    </div>
    </div>

    </footer>

    <a href="#" class="back-to-top">
        <div class="ripple-container"></div>
        <i class="mdi mdi-arrow-up"></i>
    </a>

    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"> </script>
<script src="../assets/js/vendor/modernizr-3.7.1.min.js"></script>
<script src="../assets/js/vendor/jquery-3.5.1-min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap-4.5.0.min.js"></script>
<script src="../assets/js/jquery.mixitup.min.js"></script>
<script src="../assets/js/jquery.inview.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/material.min.js"></script>
<script src="../assets/js/ripples.min.js"></script>
<script src="../assets/js/owl.carousel.2.3.4.min.js"></script>
<script src="../assets/js/form-validator.min.js"></script>
<script src="../assets/js/contact-form-script.min.js"></script>
<script src="../assets/js/wow.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/main.js"></script>

<!-- News Ticker -->
<script src="../scripts/jquery.bootstrap.newsbox.js"></script>


</body>
</html>