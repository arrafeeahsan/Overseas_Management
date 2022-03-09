@extends('index-master')
@section('title', 'Welcome to Overseas')

@section('content')
<section class="welcome-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-xs-12">
                    <div class="Material-tab">

                        

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="business" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam nesciunt dolores quibusdam, officia
                            sed mollitia, illo, quis, vel veniam officiis qui repellendus. Perferendis et, veritatis enim
                            voluptatem libero consequuntur eveniet alias nesciunt fugit doloremque tempora id Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, aut ut totam quam inventore
                            suscipit ullam nostrum quisquam corrupti nesciunt voluptas necessitatibus, ab porro cupiditate optio
                            mollitia, expedita, omnis? Quasi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, aut ut totam quam inventore
                            suscipit ullam nostrum quisquam corrupti nesciunt voluptas necessitatibus, ab porro cupiditate optio
                            mollitia, expedita, omnis? Quasi.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, aut ut totam quam inventore
                            suscipit ullam nostrum quisquam corrupti nesciunt voluptas necessitatibus, ab porro cupiditate optio
                            mollitia, expedita, omnis? Quasi.</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-xs-12 welcome-column">
                    <div class="card">
                      <div class="card-header">
                       <span class="glyphicon glyphicon-list-alt"></span><b> News</b> </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-xs-12">
                            <ul class="demo1">
                            @foreach($tickers as $ticker)
                              <li class="news-item">
                                <table cellpadding="4">
                                
                                  <tr>
                                    <td><img src="img/newsticker.png" width="60" class="rounded-circle" /></td>
                                    
                                    <td><b>Country:</b> {{$ticker->country}}, <b>Available Visa:</b> {{$ticker->number_of_visa}}, <b>Job name:</b> {{$ticker->job_name}} <a href="/news-details/{{$ticker->id}}">Read more...</a></td>
                                    
                                 </tr>
                                </table>
                              </li>
                            @endforeach
                              
                              
                              
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Material-service-section section-padding  section-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Why Choose</h1>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="media">
                        <div class="media-left">
                            <i class="material-icons pulse-shrink mdi mdi-arrange-send-backward"></i>
                        </div>
                        <div class="media-body">
                            <h2 class="subtitle"><a href="#">Refreshing Design</a></h2>
                            <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".4s">
                    <div class="media">
                        <div class="media-left">
                            <i class="material-icons pulse-shrink mdi mdi-code-tags-check"></i>
                        </div>
                        <div class="media-body">
                            <h2 class="subtitle"><a href="#">Solid Bootstrap 4</a></h2>
                            <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".5s">
                    <div class="media">
                        <div class="media-left">
                            <i class="material-icons pulse-shrink mdi mdi-grid"></i>
                        </div>
                        <div class="media-body">
                            <h2 class="subtitle"><a href="#">100+ Components</a></h2>
                            <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".6s">
                <div class="media">
                <div class="media-left">
                <i class="material-icons pulse-shrink mdi mdi-update"></i>
                </div>
                <div class="media-body">
                <h2 class="subtitle"><a href="#">Regular Updates</a></h2>
                <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".7s">
                <div class="media">
                <div class="media-left">
                <i class="material-icons pulse-shrink mdi mdi-speedometer"></i>
                </div>
                <div class="media-body">
                <h2 class="subtitle"><a href="#">Speed Optimized</a></h2>
                <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                </div>
                </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-4 single-service-widget wow animated fadeInUp" data-wow-delay=".8s">
                <div class="media">
                <div class="media-left">
                <i class="material-icons pulse-shrink mdi mdi-shape-plus"></i>
                </div>
                <div class="media-body">
                <h2 class="subtitle"><a href="#">Fully Customizable</a></h2>
                <p>Excepteur sint occaecat cupi datat non proidt, sunt in culpa qui offi cia deserunt</p>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section class="work-counter-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".2s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-account-group"></i></div>
                        <div class="timer">{{count($clients)}}</div>
                        <p>Total Clients</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".3s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-clock"></i></div>
                        <div class="timer">{{count($visainprogress)}}</div>
                        <p>Visa in progress</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".4s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-airplane"></i></div>
                        <div class="timer">{{count($hasgone)}}</div>
                        <p>Has gone</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 work-counter-widget text-center wow animated fadeInUp" data-wow-delay=".5s">
                    <div class="counter">
                        <div class="icon"><i class="material-icons mdi mdi-check-all"></i></div>
                        <div class="timer">{{count($stamplingdone)}}</div>
                        <p>Visa stampling done</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <section class="Material-contact-section section-padding section-dark">
        <div class="container">
            <div class="row">

                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
                    letters, as opposed to using Content.</p>
                    <div class="find-widget">
                        <a href="#"><i class="material-icons mdi mdi-map-marker"></i>4435 Berkshire Circle Knoxville</a>
                    </div>
                    <div class="find-widget">
                        <a href="#"><i class="material-icons mdi mdi-phone"></i> + 879-890-9767</a>
                    </div>
                    <div class="find-widget">
                        <a href="#"><i class="material-icons mdi mdi-email-open mr-3"></i> <span class="__cf_email__" data-cfemail="7a090f0a0a15080e3a371b0e1f08131b1654191517">[email&#160;protected]</span></a>
                    </div>
                    <div class="find-widget">
                        <a href="#"><i class="material-icons mdi mdi-clock"></i> Mon to Sat: 09:30 AM - 10.30 PM</a>
                    </div>
                </div>

                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator" enctype="multipart/form-data">

                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-submit mt-5">
                            <button class="btn btn-common" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        $(".demo1").bootstrapNews({
            newsPerPage: 4,
            autoplay: true,
            pauseOnHover:true,
            direction: 'up',
            newsTickerInterval: 3000,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>
@endsection