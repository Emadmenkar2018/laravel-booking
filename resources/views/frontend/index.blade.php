@extends('frontend.layouts.default')

@section('content')
<section id="home" >
    <div id="tt-home-carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000"> 

        <!-- Next and previous button --> 
        <a class="item-prev" href="#tt-home-carousel" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a class="item-next" href="#tt-home-carousel" role="button" data-slide="next"> <i class="fa fa-angle-right"></i> </a> 

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active"> <img src="{!!asset('assets/images/slide-1.jpg')!!}" alt="Booking Calendar" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Booking </span></h1>
                    <p class="animated fadeInDown delay-3">Easy & Fast booking with system</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Buy Now</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-2.jpg')!!}" alt="Appointment Calendar" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Calendar </span></h1>
                    <p class="animated fadeInDown delay-3">Calendar view of services</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Buy Now</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-3.jpg')!!}" alt="Live Chat" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Live Chat</span></h1>
                    <p class="animated fadeInDown delay-3">Live Chat with system administrator</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Buy Now</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-4.jpg')!!}" alt="PayPal Payment" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>PayPal Payment</span></h1>
                    <p class="animated fadeInDown delay-3">PayPal express checkout for payment</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Buy Now</a> </div>
            </div>
        </div>
        <!-- /.carousel-inner --> 
    </div>
    <!-- /.carousel --> 
</section>

<section class="creative-section">
    <div class="container">
        <div class="service-tab"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active col-xs-3"> <a href="#booking-tab" role="tab" data-toggle="tab"> <i class="fa fa-bookmark"></i> <span>Booking</span> </a> </li>
                <li class="col-xs-3"> <a href="#calendar-tab" role="tab" data-toggle="tab"> <i class="fa fa-calendar"></i> <span>Calendar</span> </a> </li>
                <li class="col-xs-3"> <a href="#chat-tab" role="tab" data-toggle="tab"> <i class="fa fa-comment"></i> <span>Live Chat</span> </a> </li>
                <li class="col-xs-3"> <a href="#paypal-tab" role="tab" data-toggle="tab"> <i class="fa fa-paypal"></i> <span>PayPal Payment</span> </a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content"> 
                <!-- tab content for booking -->
                <div class="row tab-pane fade in active" id="booking-tab">
                    <div class="col-sm-6">
                        <h2>Booking</h2>
                        <p>Laravel Booking System is great for booking and make appointments or schedule appointments for all professional and business entrepreneur.</p>
                        <p>Are you deliver your service to your clients? Let your clients easily book your service with booking calendar.</p>
                        <p>Does your office receive customers by appointment? You can create a booking calendar for every professional</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> BUY Now</a>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/booking.png')!!}" alt="Booking"> </div>
                    </div>
                </div>

                <!-- tab content for calendar -->
                <div class="row tab-pane fade" id="calendar-tab">
                    <div class="col-sm-6">
                        <h2>Calendar</h2>
                        <p>Users are able to view services by day and months with calendar view. Users can view future services and book from calendar. Every services are display in calendar by different colors so users will get quick idea about each services.</p>
                        <p>Responsive design for calendar so users are able to view calendar from any devices that they have and book services from anywhere fast and easily.</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> BUY Now</a>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/calendar.png')!!}" alt="Calendar"> </div>
                    </div>
                </div>

                <!-- tab content for live chat -->
                <div class="row tab-pane fade" id="chat-tab">
                    <div class="col-sm-6">
                        <h2>Live Chat</h2>
                        <p>Live Chat is the key feature of the system. When user create their account and login to their dashboard then users are able to directly chat with system administrator for any enquires or query.</p>
                        <p>System Administrator will get notification on admin dashboard when any user send message using Live Chat and also admin dashboard display online users and notification for number of unread messages. System Administrator can able to view past chat history of every users</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> BUY Now</a>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/live-chat.png')!!}" alt="Live Chat" style="width: 270px;"> </div>
                    </div>
                </div>

                <!-- tab content for paypal -->
                <div class="row tab-pane fade" id="paypal-tab">
                    <div class="col-sm-6">
                        <h2>PayPal Payment</h2>
                        <p>Users can able to buy credits(points) from PayPal payment option. Users can book services using credits(points) available in their accounts. They will get email notifications of every transactions made for buy credit using PayPal Payment.</p>
                        <p>Users dashboard will display Payment/Transaction history with easy filter options. Users are able to view past transactions and they can search transactions by date.</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> BUY Now</a>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/paypal.png')!!}" alt="PayPal"> </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-content --> 
        </div>
        <!-- /.service-tab --> 
    </div>
    <!-- /.container --> 
</section>

<section class="process-section section-padding">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box">
                    <span class="icon-arrow-cu icon-arrow-border-red"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-user-plus"></i>
                    <h3>Register</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new">
                    <span class="icon-arrow-cu icon-arrow-border-blue"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-key"></i>
                    <h3>Login</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box">
                    <span class="icon-arrow-cu icon-arrow-border-red"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-calendar"></i>
                    <h3>Calendar</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new"> 
                    <span class="icon-arrow-cu icon-arrow-border-blue"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-life-ring"></i>
                    <h3>Service</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box">
                    <span class="icon-arrow-cu icon-arrow-border-red"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-bookmark-o"></i>
                    <h3>Booking</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new">
                    <i class="fa fa-gift"></i>
                    <h3>Payment</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 --> 
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section>

<section id="about" class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="section-title  text-center">About System</h2>
                <p class="sub-title">
                    <strong>Laravel Booking System</strong> is great for booking and make appointments or schedule appointments for all professional and business entrepreneur
                    i.e. Chefs, Clubs, Dance Instructors, Dentists, Doctors, Estheticians, Hairdresser, Health Clubs, Lawyers, Make-up Specialists, Massage Therapists, 
                    Nail Salons, Personal Trainers, Pet Care, Photographers, Real Estate Agent, Restaurants, Spas, Sport Coaches, Teachers etc..
                </p>
                <br>
                <p><strong>Laravel Booking System Administrator</strong> will be able to control entire system. They will have login screen and once they login into their dashboard they will manage all the things i.e. site settings, payment settings. paypal settings, change password, service management, user management, booking management, enquiry management.</p>
                <br>
                <p class="sub-title"><strong>Live Chat</strong> is the key feature of the system. When user create their account and login to their dashboard then users are able to directly chat with system administrator for any enquiries or query.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mocup-bg"> <img alt="Laravel Booking System" src="{!!asset('assets/images/mac-large-bg.png')!!}" class="img-responsive"> </div>
        </div>
        <!-- /.row --> 
    </div>
</section>

<!-- Responsive Action -->
<section class="responsive-preview">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div class="responsive-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/live-chat.png')!!}" alt="Live Chat" style="width: 70%;"> </div>
            </div>
            <div class="col-sm-7">
                <h2>Support <span class="big-text">Live Chat</span></h2>
                <p><strong>Live Chat</strong> is the key feature of the system. When user create their account and login to their dashboard then users are able to directly chat with system administrator for any enquires or query.
                </p>
                <p>System Administrator will get notification on admin dashboard when any user send message using <strong>Live Chat</strong> and also admin dashboard display online users and notification for number of unread messages. System Administrator can able to view past chat history of every users</p>
            </div>
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section>
<!-- /.responsive-preview -->

<!-- Responsive Action -->
<section class="responsive-preview section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h2>Responsive <span class="big-text">on all devices</span></h2>
                <p>Surfing the internet with a mobile device is the norm nowadays and knowing how to make a mobile responsive website has become more and more important.
                    As more people are beginning to use mobile devices for every task, <strong>Laravel Booking System</strong> has been created by considering current market trend of responsive design.
                </p>
                <p><strong>Laravel Booking System</strong> support almost all the devices to make users experience better and access the system from anywhere and anytime with their device.</p>
            </div>
            <div class="col-sm-4 col-sm-offset-1">
                <div class="responsive-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/mobile-first-responsive.jpg')!!}" alt="Responsive"> </div>
            </div>
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section>
<!-- /.responsive-preview -->

<section class="cta-one-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"><img src="{!!asset('assets/images/our-services.png')!!}" alt="Our Services"></div>
            <div class="col-sm-8">
                <h2><span>Laravel Booking System Customization</span></h2>
                <p>If you need customization in current system then we are ready to assist you with our expertise to deliver High Quality & Result Oriented solutions. You can drop me a line.</p>
                <a class="btn btn-primary" href="#contact">Drop Me A Line</a> </div>
            <!-- /.col-md-9 --> 
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section> 

<section id="features" class="feature-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section-title">our awesome features</h2>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <h2 class="feature-heading">Users Features</h2>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">User Dashboard</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Profile & Change Password</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media">
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Live Chat</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Booking/Reservation Calendar</h3>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Bookings List/History</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Export Bookings</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Transactions List/History</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Export Transactions</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">PayPal Payment</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <h2 class="feature-heading" style="margin-top: 20px;">Admin Features</h2>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Admin Dashboard</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Profile & Change Password</h3>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Live Chat & Notifications</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Payment & Paypal Settings</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Services Management</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Users Management</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Bookings Management</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Export Bookings</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Transactions Management</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Export Transactions</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Enquiries Management</h3>
                        </div>
                    </div>
                </div>
                <!-- /.row --> 
            </div>
            <!-- /.col-## --> 
        </div>
        <!-- /.row-content --> 
    </div>
    <!-- /.container --> 
</section>

<!-- Call to Action -->
<section class="cta-two-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h2>Ready to work with us?</h2>
                <p>Let's Talk!</p>
            </div>
            <div class="col-sm-3"> <a href="#contact" class="page-scroll btn btn-primary">Message Us</a> </div>
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section>
<!-- /.cta-two-section -->

<section id="video" class="video-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h2 class="section-title">User Dashboard</h2>
                <video width="100%" poster="{!!asset('assets/images/user-dashboard.png')!!}" controls>
                    <source src="{!!asset('assets/lbs-user.mp4')!!}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12"> 
                <h2 class="section-title">Admin Dashboard</h2>
                <video width="100%" poster="{!!asset('assets/images/admin-dashboard.png')!!}" controls>
                    <source src="{!!asset('assets/lbs-admin.mp4')!!}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container --> 
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section-title">System Screen Layouts</h2>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container -->

    <div class="portfolio-container text-center">
        <ul id="filter" class="list-inline">
            <li class="active" data-group="all">All</li>
            <li data-group="frontend">Frontend</li>
            <li data-group="user">User Dashboard</li>
            <li data-group="admin">Admin Dashboard</li>
        </ul>

        <ul id="grid">
            <li class="portfolio-item" data-groups='["all", "frontend"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/landing-page.png')!!}" alt="Landing Page">
                    <div class="portfolio-info">
                        <h3 class="project-title">Landing Page</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/landing-page.png')!!}" class="btn btn-primary swipebox" title="Landing Page"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "frontend"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-register.png')!!}" alt="User Register">
                    <div class="portfolio-info">
                        <h3 class="project-title">Register Form</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-register.png')!!}" class="btn btn-primary swipebox" title="Register Form"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "frontend"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-login.png')!!}" alt="User Login">
                    <div class="portfolio-info">
                        <h3 class="project-title">Login Form</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-login.png')!!}" class="btn btn-primary swipebox" title="Login Form"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "frontend"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/contact-form.png')!!}" alt="Contact Form">
                    <div class="portfolio-info">
                        <h3 class="project-title">Contact Form</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/contact-form.png')!!}" class="btn btn-primary swipebox" title="Contact Form"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-dashboard.png')!!}" alt="User Dashboard">
                    <div class="portfolio-info">
                        <h3 class="project-title">User Dashboard</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-dashboard.png')!!}" class="btn btn-primary swipebox" title="User Dashboard"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-buy-credit.png')!!}" alt="Buy Credit">
                    <div class="portfolio-info">
                        <h3 class="project-title">Buy Credit</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-buy-credit.png')!!}" class="btn btn-primary swipebox" title="Buy Credit"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-booking-calendar.png')!!}" alt="Booking Calendar">
                    <div class="portfolio-info">
                        <h3 class="project-title">Booking Calendar</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-booking-calendar.png')!!}" class="btn btn-primary swipebox" title="Booking Calendar"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>

            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-booking-form.png')!!}" alt="Booking Form">
                    <div class="portfolio-info">
                        <h3 class="project-title">Booking Form</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-booking-form.png')!!}" class="btn btn-primary swipebox" title="Booking Form"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-booking-list.png')!!}" alt="Booking List">
                    <div class="portfolio-info">
                        <h3 class="project-title">Bookings History</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-booking-list.png')!!}" class="btn btn-primary swipebox" title="Bookings History"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-transaction-list.png')!!}" alt="Transaction List">
                    <div class="portfolio-info">
                        <h3 class="project-title">Transactions History</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-transaction-list.png')!!}" class="btn btn-primary swipebox" title="Transactions History"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-chat.png')!!}" alt="Chat Boards">
                    <div class="portfolio-info">
                        <h3 class="project-title">Live Chat</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-chat.png')!!}" class="btn btn-primary swipebox" title="Live Chat"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-profile.png')!!}" alt="User Profile">
                    <div class="portfolio-info">
                        <h3 class="project-title">User Profile</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-profile.png')!!}" class="btn btn-primary swipebox" title="User Profile"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "user"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/user-change-password.png')!!}" alt="User Change Password">
                    <div class="portfolio-info">
                        <h3 class="project-title">Change Password</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/user-change-password.png')!!}" class="btn btn-primary swipebox" title="Change Password"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <!-- /.portfolio-item -->
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-login.png')!!}" alt="Admin Login">
                    <div class="portfolio-info">
                        <h3 class="project-title">Admin Login</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-login.png')!!}" class="btn btn-primary swipebox" title="Admin Login"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-dashboard.png')!!}" alt="Admin Dashboard">
                    <div class="portfolio-info">
                        <h3 class="project-title">Admin Dashboard</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-dashboard.png')!!}" class="btn btn-primary swipebox" title="Admin Dashboard"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-profile.png')!!}" alt="Admin Profile">
                    <div class="portfolio-info">
                        <h3 class="project-title">Admin Profile</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-profile.png')!!}" class="btn btn-primary swipebox" title="Admin Profile"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-change-password.png')!!}" alt="Admin Change Passwords">
                    <div class="portfolio-info">
                        <h3 class="project-title">Change Password</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-change-password.png')!!}" class="btn btn-primary swipebox" title="Change Password"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-general-settings.png')!!}" alt="General Settings">
                    <div class="portfolio-info">
                        <h3 class="project-title">General Settings</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-general-settings.png')!!}" class="btn btn-primary swipebox" title="General Settings"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-payment-settings.png')!!}" alt="Payment Settings">
                    <div class="portfolio-info">
                        <h3 class="project-title">Payment Settings</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-payment-settings.png')!!}" class="btn btn-primary swipebox" title="Payment Settings"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <!-- /.portfolio-item -->
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-paypal-settings.png')!!}" alt="PayPal Settings">
                    <div class="portfolio-info">
                        <h3 class="project-title">PayPal Settings</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-paypal-settings.png')!!}" class="btn btn-primary swipebox" title="PayPal Settings"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-service-add.png')!!}" alt="Service">
                    <div class="portfolio-info">
                        <h3 class="project-title">Service Form</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-service-add.png')!!}" class="btn btn-primary swipebox" title="Service Form"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-service-list.png')!!}" alt="Services List">
                    <div class="portfolio-info">
                        <h3 class="project-title">Services List</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-service-list.png')!!}" class="btn btn-primary swipebox" title="Services List"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-users-list.png')!!}" alt="Users List">
                    <div class="portfolio-info">
                        <h3 class="project-title">Users List</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-users-list.png')!!}" class="btn btn-primary swipebox" title="Users List"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-booking-list.png')!!}" alt="Booking Management">
                    <div class="portfolio-info">
                        <h3 class="project-title">Bookings List</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-booking-list.png')!!}" class="btn btn-primary swipebox" title="Bookings List"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-transaction-list.png')!!}" alt="Transactions Management">
                    <div class="portfolio-info">
                        <h3 class="project-title">Transactions List</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-transaction-list.png')!!}" class="btn btn-primary swipebox" title="Transactions List"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-enquiry-list.png')!!}" alt="Enquiry List">
                    <div class="portfolio-info">
                        <h3 class="project-title">Enquiry List</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-enquiry-list.png')!!}" class="btn btn-primary swipebox" title="Enquiry List"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>
            <li class="portfolio-item" data-groups='["all", "admin"]'>
                <div class="portfolio">
                    <div class="tt-overlay"></div>
                    <img class="img-responsive" src="{!!asset('assets/images/portfolio/admin-chatboard.png')!!}" alt="Admin Chatboards">
                    <div class="portfolio-info">
                        <h3 class="project-title">Chat Dashboard</h3>
                        <div class="links"> 
                            <a href="{!!asset('assets/images/portfolio/admin-chatboard.png')!!}" class="btn btn-primary swipebox" title="Chat Dashboard"><i class="fa fa-picture-o"></i></a> 
                        </div>
                        <!-- /.links --> 
                    </div>
                    <!-- /.portfolio-info --> 
                </div>
                <!-- /.portfolio --> 
            </li>


        </ul>
    </div>
    <!-- portfolio-container --> 
</section>
<!-- /.portfolio-section --> 

<!-- faq Section -->
<section id="faq" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="faq-section">
                    <h2 class="section-title text-center">FAQ</h2>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingOne">
                                <h3 class="panel-title"> 
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> 
                                        Is Laravel Booking System required coding skill to operate? 
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <b>No</b> there is no coding skills needed to operate the system. Even non-technical person can do all the things easily and fast.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingTwo">
                                <h3 class="panel-title"> 
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 
                                        Is there any user guide about whole laravel booking system? 
                                    </a> 
                                </h3>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body"> 
                                    <b>Yes</b> we have created user guide and manuals about whole system. So everyone can get details of how to operate the whole system. We have online documentation for users to guide each and every module and functions of the system.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingThree">
                                <h3 class="panel-title"> 
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 
                                        Is Laravel booking system secured? 
                                    </a> 
                                </h3>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body"> 
                                    <b>Yes</b> It is fully secured. user dashboard and admin dashboard will not be accessible without login credentials. User and admin authentication made with encryption technology so hackers will not be able to hack the system.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.faq Section -->

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section-title">Need Help?</h2>
                <p class="sub-title">Drop me a line. We will be glad to assist you!</p>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row -->

        <div class="row margin-top-50">
            <div class="col-xs-12 text-center">
                @include('frontend.includes.notifications')
                {!! Form::open(array('route' => 'contact', 'class' => 'form', 'id'=>'contact-form', 'novalidate' => 'novalidate')) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only" for="name">Your Name</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only" for="subject">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="message">Message</label>
                        <textarea name="message" class="form-control" id="messages" rows="7" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" id="contact-form-submit">Submit</button>
                {!! Form::close()!!}
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row --> 

    </div>
    <!-- /.container --> 
</section>
<!-- /.contact-section -->
@stop
