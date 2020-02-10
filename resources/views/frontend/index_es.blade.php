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
                    <h1 class="animated fadeInDown delay-1"><span>Reserva </span></h1>
                    <p class="animated fadeInDown delay-3">Reserva fácil y rápida con sistema</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Compra ahora</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-2.jpg')!!}" alt="Appointment Calendar" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Calendario </span></h1>
                    <p class="animated fadeInDown delay-3">Vista de calendario de servicios</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Compra ahora</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-3.jpg')!!}" alt="Live Chat" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Chat en vivo</span></h1>
                    <p class="animated fadeInDown delay-3">Chat en vivo con el administrador del sistema</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Compra ahora</a> </div>
            </div>
            <div class="item"> <img src="{!!asset('assets/images/slide-4.jpg')!!}" alt="PayPal Payment" class="img-responsive">
                <div class="carousel-caption">
                    <h1 class="animated fadeInDown delay-1"><span>Pago PayPal</span></h1>
                    <p class="animated fadeInDown delay-3">Pago exprés de PayPal para el pago</p>
                    <a class="btn animated fadeInUp delay-4" href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank">Compra ahora</a> </div>
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
                <li class="active col-xs-3"> <a href="#booking-tab" role="tab" data-toggle="tab"> <i class="fa fa-bookmark"></i> <span>Reserva</span> </a> </li>
                <li class="col-xs-3"> <a href="#calendar-tab" role="tab" data-toggle="tab"> <i class="fa fa-calendar"></i> <span>Calendario</span> </a> </li>
                <li class="col-xs-3"> <a href="#chat-tab" role="tab" data-toggle="tab"> <i class="fa fa-comment"></i> <span>Chat en vivo</span> </a> </li>
                <li class="col-xs-3"> <a href="#paypal-tab" role="tab" data-toggle="tab"> <i class="fa fa-paypal"></i> <span>Pago PayPal</span> </a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content"> 
                <!-- tab content for booking -->
                <div class="row tab-pane fade in active" id="booking-tab">
                    <div class="col-sm-6">
                        <h2>Reserva</h2>
                        <p>Laravel Booking System es ideal para reservar y concertar citas o programar citas para todos los profesionales y empresarios.</p>
                        <p>¿Le entregas tu servicio a tus clientes? Permita que sus clientes reserven fácilmente su servicio con el calendario de reserva.</p>
                        <p>¿Su oficina recibe clientes por cita? Puede crear un calendario de reserva para cada profesional</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Compra ahora</a>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/booking.png')!!}" alt="Booking"> </div>
                    </div>
                </div>

                <!-- tab content for calendar -->
                <div class="row tab-pane fade" id="calendar-tab">
                    <div class="col-sm-6">
                        <h2>Calendario</h2>
                        <p>Los usuarios pueden ver los servicios por día y por mes con la vista de calendario. Los usuarios pueden ver los servicios futuros y reservar desde el calendario. Todos los servicios se muestran en el calendario por diferentes colores para que los usuarios tengan una idea rápida de cada servicio.</p>
                        <p>Diseño receptivo para el calendario para que los usuarios puedan ver el calendario desde cualquier dispositivo que tengan y reservar servicios desde cualquier lugar rápida y fácilmente.</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Compra ahora</a>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/calendar.png')!!}" alt="Calendar"> </div>
                    </div>
                </div>

                <!-- tab content for live chat -->
                <div class="row tab-pane fade" id="chat-tab">
                    <div class="col-sm-6">
                        <h2>Chat en vivo</h2>
                        <p>El chat en vivo es la característica clave del sistema. Cuando el usuario crea su cuenta e inicia sesión en su tablero de instrumentos, los usuarios pueden chatear directamente con el administrador del sistema para cualquier pregunta o consulta.</p>
                        <p>El administrador del sistema recibirá una notificación en el panel de administración cuando cualquier usuario envíe un mensaje usando Live Chat y también el panel de administración muestra usuarios en línea y notificaciones para la cantidad de mensajes no leídos. El administrador del sistema puede ver el historial de chat pasado de cada usuario</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Compra ahora</a>
                    </div>
                    <div class="col-sm-4 col-sm-offset-2">
                        <div class="mac-screenshot"> <img class="img-responsive" src="{!!asset('assets/images/live-chat.png')!!}" alt="Live Chat" style="width: 270px;"> </div>
                    </div>
                </div>

                <!-- tab content for paypal -->
                <div class="row tab-pane fade" id="paypal-tab">
                    <div class="col-sm-6">
                        <h2>Pago PayPal</h2>
                        <p>Los usuarios pueden comprar créditos (puntos) desde la opción de pago de PayPal. Los usuarios pueden reservar servicios utilizando créditos (puntos) disponibles en sus cuentas. Recibirán notificaciones por correo electrónico de cada transacción realizada para comprar crédito mediante PayPal Payment.</p>
                        <p>El panel de usuarios mostrará el historial de pagos / transacciones con opciones de filtro fáciles. Los usuarios pueden ver transacciones pasadas y pueden buscar transacciones por fecha.</p>
                        <a href="https://codecanyon.net/item/laravel-booking-system-with-live-chat-appointment-booking-calendar/20657642" target="_blank" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Compra ahora</a>
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
                    <h3>Registro</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new">
                    <span class="icon-arrow-cu icon-arrow-border-blue"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-key"></i>
                    <h3>sesión</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box">
                    <span class="icon-arrow-cu icon-arrow-border-red"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-calendar"></i>
                    <h3>Calendario</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new"> 
                    <span class="icon-arrow-cu icon-arrow-border-blue"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-life-ring"></i>
                    <h3>Servicio</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box">
                    <span class="icon-arrow-cu icon-arrow-border-red"><i class="fa fa-angle-right"></i></span>
                    <i class="fa fa-bookmark-o"></i>
                    <h3>Reserva</h3>
                </div>
                <!-- /.process-box --> 
            </div>
            <!-- /.col-xs-2 -->

            <div class="col-xs-6 col-sm-4 col-md-2">
                <div class="process-box bg_blue_new">
                    <i class="fa fa-gift"></i>
                    <h3>Pago</h3>
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
                <h2 class="section-title  text-center">Acerca del sistema</h2>
                <p class="sub-title">
                    <strong>Laravel Booking System</strong> es ideal para reservar y concertar citas o programar citas para todo empresario profesional y de negocios
                    es decir, Chefs, Clubes, Instructores de Baile, Dentistas, Doctores, Esteticistas, Peluquero, Clubes de Salud, Abogados, Especialistas en Maquillaje, Terapeutas de Masaje,
                    Manicura y pedicura, Entrenadores personales, Cuidado de mascotas, Fotógrafos, Agente de bienes raíces, Restaurantes, Spas, Entrenadores deportivos, Maestros, etc.
                </p>
                <br>
                <p><strong>Laravel Booking System Administrator</strong> podrá controlar todo el sistema. Tendrán una pantalla de inicio de sesión y una vez que inicien sesión en su tablero de instrumentos, administrarán todas las cosas, es decir, la configuración del sitio, la configuración de pago. configuración de PayPal, cambio de contraseña, gestión de servicios, gestión de usuarios, gestión de reservas, gestión de consultas.</p>
                <br>
                <p class="sub-title"><strong>Chat en vivo</strong> Cuando los usuarios crean su cuenta e inician sesión en su tablero, los usuarios pueden chatear directamente con el administrador del sistema para cualquier consulta o consulta.</p>
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
                <h2>Support <span class="big-text">Chat en vivo</span></h2>
                <p><strong>chat en vivo</strong> es la característica clave del sistema. Cuando el usuario crea su cuenta e inicia sesión en su tablero de instrumentos, los usuarios pueden chatear directamente con el administrador del sistema para cualquier pregunta o consulta.
                </p>
                <p>El administrador del sistema recibirá una notificación en el panel de administración cuando cualquier usuario envíe un mensaje usando <strong> Chat en vivo </ strong> y también usuarios de la pantalla del panel de administración en línea y notificaciones de la cantidad de mensajes no leídos. El administrador del sistema puede ver el historial de chat pasado de cada usuario</p>
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
                <h2>Responsive <span class = "big-text"> en todos los dispositivos </ span></h2>
                <p>Navegar por Internet con un dispositivo móvil es la norma hoy en día y saber cómo hacer que un sitio web móvil sea más y más importante.
                    A medida que más personas comienzan a usar dispositivos móviles para cada tarea, se ha creado <strong> Laravel Booking System </strong> al considerar la tendencia actual del mercado de diseño receptivo.
                </p>
                <p><strong>Laravel Booking System</strong> admite casi todos los dispositivos para que los usuarios experimenten mejor y accedan al sistema desde cualquier lugar y en cualquier momento con su dispositivo.</p>
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
                <p>Si necesita personalización en el sistema actual, estamos listos para ayudarlo con nuestra experiencia para brindar soluciones orientadas a resultados y de alta calidad. Puedes dejarme una línea.</p>
                <a class="btn btn-primary" href="#contact">Tócame una línea</a> </div>
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
                <h2 class="section-title">nuestras increíbles funciones</h2>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <h2 class="feature-heading">Características de los usuarios</h2>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Tablero de usuario</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Perfil y cambio de contraseña</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media">
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Chat en vivo</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Calendario de Reserva</h3>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Lista de reservas</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Reservas de Exportación</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Lista de transacciones</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Transacciones de exportación</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Pago PayPal</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <h2 class="feature-heading" style="margin-top: 20px;">Funciones de administración</h2>
                    </div>
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Tablero de administración</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Perfil y cambio de contraseña</h3>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Chat en vivo y notificaciones</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Configuración de pago y Paypal</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Gestión de servicios</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Gestión de usuarios</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Gestión de reservas</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Reservas de Exportación</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Gestión de transacciones</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Transacciones de exportación</h3>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-sm-6 col-xs-12 media"> 
                        <span class="media-left"> <i class="fa fa-arrow-right"></i> </span>
                        <div class="media-body">
                            <h3 class="media-heading">Gestión de consultas</h3>
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
                <h2>¿Listo para trabajar con nosotros?</h2>
                <p>¡Hablemos!</p>
            </div>
            <div class="col-sm-3"> <a href="#contact" class="page-scroll btn btn-primary">Mensaje nosotros</a> </div>
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
                <h2 class="section-title">Tablero de usuario</h2>
                <video width="100%" poster="{!!asset('assets/images/user-dashboard.png')!!}" controls>
                    <source src="{!!asset('assets/lbs-user.mp4')!!}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12"> 
                <h2 class="section-title">Tablero de administración</h2>
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
                <h2 class="section-title">Diseños de pantalla del sistema</h2>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row --> 
    </div>
    <!-- /.container -->

    <div class="portfolio-container text-center">
        <ul id="filter" class="list-inline">
            <li class="active" data-group="all">Todas</li>
            <li data-group="frontend">Interfaz</li>
            <li data-group="user">Tablero de usuario</li>
            <li data-group="admin">Tablero de administración</li>
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
                    <h2 class="section-title text-center">Preguntas más frecuentes</h2>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingOne">
                                <h3 class="panel-title"> 
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> 
                                        ¿el Laravel Booking System requiere habilidades de codificación para operar? 
                                    </a>
                                </h3>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <b> No </b> no se necesitan habilidades de codificación para operar el sistema. Incluso una persona no técnica puede hacer todas las cosas fácil y rápidamente.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingTwo">
                                <h3 class="panel-title"> 
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 
                                        ¿Hay alguna guía de usuario sobre todo el Laravel Booking System? 
                                    </a> 
                                </h3>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body"> 
                                    <b> Sí </b> hemos creado una guía de usuario y manuales sobre todo el sistema. Para que todos puedan obtener detalles sobre cómo operar todo el sistema. Tenemos documentación en línea para que los usuarios guíen todos y cada uno de los módulos y funciones del sistema.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-link" role="tab" id="headingThree">
                                <h3 class="panel-title"> 
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> 
                                        ¿El Laravel Booking System es seguro? 
                                    </a> 
                                </h3>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body"> 
                                    <b> Sí </b> está completamente asegurado. panel de usuario y tablero de administración no serán accesibles sin credenciales de inicio de sesión. Autenticación de usuario y administración hecha con tecnología de encriptación para que los hackers no puedan piratear el sistema.
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
                <h2 class="section-title">¿Necesitas ayuda?</h2>
                <p class="sub-title">Déjame una línea. ¡Estaremos encantados de ayudarle!</p>
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
                                <label class="sr-only" for="name">Tu nombre</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Tu nombre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only" for="email">correo electrónico</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Tu correo electrónico">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only" for="subject">Tema</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Tu asunto">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="message">Mensaje</label>
                        <textarea name="message" class="form-control" id="messages" rows="7" placeholder="Tu mensaje"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" id="contact-form-submit">Enviar</button>
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
