<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            {!! config('settings.title') !!}
            @show
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes'>
        <meta name="title" content="{!! config('settings.metaTitle') !!}" />
        <meta name="description" content="{!! config('settings.metaDescription') !!}" />
        <meta name="keywords" content="{!! config('settings.metaKeywords') !!}" />
        
        <link rel="shortcut icon" href="{!! asset('assets/images/favicon.png') !!}" >
        
        {{-- bootstrap --}}
        <link href="{!! asset('assets/user/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
        
        {{-- fullcalendar --}}
        <link href="{!! asset('assets/user/css/fullcalendar/fullcalendar.min.css') !!}" rel="stylesheet">
        
        {{-- Date Picker --}}
        <link href="{!! asset('assets/user/plugins/datepicker/css/bootstrap-datepicker3.min.css') !!}" rel="stylesheet" type="text/css" />

        {{-- Theme style --}}
        <link href="{!! asset('assets/user/css/new.css') !!}" rel="stylesheet" type="text/css" />

        {{-- font Awesome --}}
        <link href="{!! asset('assets/user/fonts/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />

        <link href="{!! asset('assets/user/css/grid.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/user/css/style.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/user/css/responsive.css') !!}" rel="stylesheet" type="text/css" />

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>

        @yield('styles')
    </head>
    <?php date_default_timezone_set("Asia/Kolkata"); ?>
    <body>
        {{-- Header Start --}}
        <header>
            <a href="/" class="logo">
                <img src="{!! config('settings.logo') !='' ? LOGO_ROOT.config('settings.logo') : LOGO_ROOT.'default.png' !!}" alt="Logo">
            </a>
            <div class="pull-right">
                <ul id="mini-nav" class="clearfix">
                    <li class="list-box">
                        <a><span class="text-white credit-header">{!! auth()->guard('user')->user()->credit !!}</span> Cr</a>
                    </li>
                    <li class="list-box user-profile">
                        <?php
                        $name = auth()->guard('user')->user()->firstname.' '.auth()->guard('user')->user()->lastname;
                        $image = auth()->guard('user')->user()->image != "" ? USER_IMAGE_ROOT . auth()->guard('user')->user()->image : USER_IMAGE_ROOT.'default.png';
                        ?>
                        <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
                            <img src="{!! $image !!}">
                        </a>
                        <ul class="dropdown-menu server-activity">
                            <li>
                                <p><i class="fa fa-user text-info"></i>  {!! trans('user/profile.welcome') !!} <b>{!! $name !!}</b></p>
                            </li>
                            <li>
                                <div>
                                    <input class="btn btn-lbs" title="{!! trans('user/profile.profile') !!}" value="{!! trans('user/profile.profile') !!}" onclick="document.location.href = '/profile';" type="button">
                                    <input class="btn btn-danger pull-right" title="{!! trans('user/profile.sign_out') !!}" value="{!! trans('user/profile.sign_out') !!}" onclick="document.location.href = '/logout';" type="button">
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        {{-- Header End --}}
        <div class="dashboard-container">
            <div class="container">
                {{-- Top Nav Start --}}
                <div id='cssmenu'>
                    @include('frontend.includes.menu')
                </div>
                {{-- Top Nav End --}}

                {{--Start Body Content --}}
                @yield('content')
                {{--End Body Content --}}

                {{--Start Footer --}}
                <footer>
                    <p>{!! trans('user/common.copyright') !!} &copy; {!! date("Y") !!} <a href="{!! url('/') !!}" target="_blank">{!! config('settings.title') !!}</a> - {!! trans('user/common.right_reserved') !!} </p>
                </footer>
                {{--End Footer --}}

            </div>{{-- ./container --}}
        </div>{{-- ./dashboard-container --}}

        {{-- jQuery --}}
        <script src="{!! asset('assets/user/js/jquery.min.js') !!}" type="text/javascript"></script>

        {{-- jQuery migrate-1.2.1--}}
        <script src="{!! asset('assets/user/js/jquery-migrate-1.2.1.js') !!}" type="text/javascript"></script>

        {{-- jQuery UI 1.9.2 --}}
        <script src="{!! asset('assets/user/js/jquery-ui-1.9.2.custom.min.js') !!}" type="text/javascript"></script>

        {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        {{-- Bootstrap JS --}}
        <script src="{!! asset('assets/user/js/bootstrap.min.js') !!}" type="text/javascript"></script>

        {{-- scrollUp JS --}}
        <script src="{!! asset('assets/user/js/jquery.scrollUp.js') !!}" type="text/javascript"></script>
        
         {{-- Calendar JS --}}
        <script src="{!! asset('assets/user/js/fullcalendar/moment.min.js') !!}"></script>
        <script src="{!! asset('assets/user/js/fullcalendar/fullcalendar.min.js') !!}"></script>
        <script src="{!! asset('assets/user/js/fullcalendar/locale-all.js') !!}"></script>
        
        {{-- InputMask --}}
        <script src="{!! asset('assets/user/plugins/input-mask/jquery.inputmask.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('assets/user/plugins/input-mask/jquery.inputmask.date.extensions.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('assets/user/plugins/input-mask/jquery.inputmask.extensions.js') !!}" type="text/javascript"></script>

        {{-- date-picker --}}
        <script src="{!! asset('assets/user/plugins/datepicker/js/bootstrap-datepicker.js') !!}" type="text/javascript"></script>

        {{-- menu JS --}}
        <script src="{!! asset('assets/user/js/menu.js') !!}" type="text/javascript"></script>
        
        {{-- jQuery Validation js --}}
        <script src="{!! asset('assets/user/js/validation/jquery.validate.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('assets/user/js/validation/additional-methods.js') !!}" type="text/javascript"></script>
        @if(config('app.locale')!='en')
        <script src="{!! asset('assets/user/js/validation/localization/messages_'.config('app.locale').'.js') !!}" type="text/javascript"></script>
        @endif
        
        {{-- common for validation --}}
        <script src="{!! asset('assets/user/js/common.js') !!}" type="text/javascript"></script>
        
        {{-- custom --}}
        <script src="{!! asset('assets/user/js/custom.js') !!}" type="text/javascript"></script>
        
        {{-- numeric --}}
        <script src="{!! asset('assets/user/js/numeric.js') !!}" type="text/javascript"></script>

        <script type="text/javascript">
            $(function () {
                //hide alert message when click on remove icon
                $(".close").click(function () {
                    $(this).closest('.alert').addClass('hide');
                });
            });
        </script>
        @yield('scripts')
    </body>
</html>
