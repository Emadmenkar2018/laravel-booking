<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="{!! config('settings.metaTitle') !!}" />
        <meta name="description" content="{!! config('settings.metaDescription') !!}" />
        <meta name="keywords" content="{!! config('settings.metaKeywords') !!}" />
            <title>
                @section('title')
                {!! config('settings.title') !!}
                @show
            </title>
            
            <link rel="shortcut icon" href="{!!asset('assets/images/favicon.png')!!}" >
            
            {{-- Bootstrap Core CSS --}}
            <link href="{!!asset('assets/css/bootstrap.min.css')!!}" rel="stylesheet">
            
            {{-- Fornt-awesome Fonts --}}
            <link href="{!!asset('assets/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css">
            
            {{-- animate CSS --}}
            <link href="{!!asset('assets/css/animate.css')!!}" rel="stylesheet">
            
            {{-- owl.carousel --}}
            <link href="{!!asset('assets/css/owl.carousel.css')!!}" rel="stylesheet">
            <link href="{!!asset('assets/css/owl.theme.css')!!}" rel="stylesheet">
            
            {{-- swipebox CSS --}}
            <link href="{!!asset('assets/css/swipebox.css')!!}" rel="stylesheet">
            
            {{-- Style CSS --}}
            <link href="{!!asset('assets/css/style.css')!!}" rel="stylesheet">
            
            {{-- Responsive CSS --}}
            <link href="{!!asset('assets/css/responsive.css')!!}" rel="stylesheet">
            
            {{-- Live google fonts CSS --}}
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Cabin:400,500' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar">
        @include('frontend.includes.header')
        @yield('styles')
        @yield('content')
        
        {{-- jquery --}}
        <script src="{!!asset('assets/js/jquery-2.1.3.min.js')!!}"></script>
        <script src="{!!asset('assets/js/jquery-migrate-1.2.1.js')!!}"></script>

        {{-- Bootstrap Core JavaScript --}}
        <script src="{!!asset('assets/js/bootstrap.min.js')!!}"></script>
        
        {{-- Scrolling Nav JavaScript --}}
        <script src="{!!asset('assets/js/jquery.easing.min.js')!!}"></script> 
        
        {{-- all lib JS --}}
        <script src="{!!asset('assets/js/jquery.inview.min.js')!!}"></script> 
        <script src="{!!asset('assets/js/jquery.countTo.min.js')!!}"></script> 
        <script src="{!!asset('assets/js/jquery.shuffle.min.js')!!}"></script> 
        <script src="{!!asset('assets/js/jquery.BlackAndWhite.min.js')!!}"></script> 
        <script src="{!!asset('assets/js/owl.carousel.min.js')!!}"></script> 
        <script src="{!!asset('assets/js/jquery.swipebox.js')!!}"></script>  
        
        {{-- script JS --}}
        <script src="{!!asset('assets/js/scripts.js')!!}"></script> 
        
        {{-- jQuery Validation js --}}
        <script src="{!!asset('assets/js/validation/jquery.validate.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/js/validation/additional-methods.js')!!}" type="text/javascript"></script>
        @if(config('app.locale')!='en')
        <script src="{!!asset('assets/js/validation/localization/messages_'.config('app.locale').'.js')!!}" type="text/javascript"></script>
        @endif
        
        {{-- common for validation --}}
        <script src="{!!asset('assets/js/common.js')!!}" type="text/javascript"></script>
        
        {{-- custom --}}
        <script src="{!!asset('assets/js/custom.js')!!}" type="text/javascript"></script>

        @yield('scripts')
        @include('frontend.includes.footer')

    </body>
    </html>
