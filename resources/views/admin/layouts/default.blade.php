<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            @section('title')
            Administration
            @show
        </title>
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link rel="shortcut icon" href="{!!asset('assets/admin/img/favicon.png')!!}" >
        
        {{-- Bootstrap 3.3.4 --}}
        <link href="{!! asset('assets/admin/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />

        {{-- font Awesome --}}
        <link href="{!! asset('assets/admin/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />

        {{-- Ionicons --}}
        <link href="{!!asset('assets/admin/ionicons/css/ionicons.min.css')!!}" rel="stylesheet" type="text/css" />

        {{-- fullCalendar --}}
        <link href="{!!asset('assets/admin/plugins/fullcalendar/fullcalendar.css')!!}" rel="stylesheet" type="text/css" />

        {{-- Date Picker --}}
        <link href="{!!asset('assets/admin/plugins/datepicker/css/bootstrap-datepicker3.min.css')!!}" rel="stylesheet" type="text/css" />

        {{-- Datetime Picker --}}
        <link href="{!!asset('assets/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')!!}" rel="stylesheet" type="text/css" />

        {{-- bootstrap dataTables --}}
        <link href="{!!asset('assets/admin/plugins/datatables_1.10.8/dataTables.bootstrap.css')!!}" rel="stylesheet" type="text/css" />

        {{-- Theme style --}}
        <link href="{!!asset('assets/admin/dist/css/AdminLTE.min.css')!!}" rel="stylesheet" type="text/css" />
        <link href="{!!asset('assets/admin/dist/css/skins/_all-skins.min.css')!!}" rel="stylesheet" type="text/css" />

        <link href="{!!asset('assets/admin/css/style.css')!!}" rel="stylesheet" type="text/css" />
        <link href="{!!asset('assets/admin/css/grid.css')!!}" rel="stylesheet" type="text/css" />
        {{-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
        {{--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]--}}
        @yield('styles')
    </head>
    <body class="skin-purple sidebar-mini">
        {{-- header logo: style can be found in header.less --}}
        <div class="wrapper">
            @include('admin.includes.header')
            {{-- Left side column. contains the logo and sidebar --}}
            @include('admin.includes.sidebar')
            {{-- Right side column. Contains the navbar and content of the page --}}
            @yield('content')
            @include('admin.includes.footer')
        </div>{{-- ./wrapper --}}
        
        {{-- jQuery 2.1.4 --}}
        <script src="{!!asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')!!}" type="text/javascript"></script>
        
        {{-- jQuery UI 1.11.4 --}}
        <script src="{!!asset('assets/admin/plugins/jQueryUI/jquery-ui.min.js')!!}" type="text/javascript"></script>

        {{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
        <script type="text/javascript">
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        {{-- Bootstrap 3.3.2 JS --}}
        <script src="{!!asset('assets/admin/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>

        {{-- InputMask --}}
        <script src="{!!asset('assets/admin/plugins/input-mask/jquery.inputmask.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/input-mask/jquery.inputmask.extensions.js')!!}" type="text/javascript"></script>

        {{-- for number input field force numeric --}}
        <script src="{!!asset('assets/admin/js/numeric.js')!!}" type="text/javascript"></script>

        {{-- date-picker --}}
        <script src="{!!asset('assets/admin/plugins/datepicker/js/bootstrap-datepicker.js')!!}" type="text/javascript"></script>

        {{-- Datetime Picker --}}
        <script src="{!!asset('assets/admin/plugins/bootstrap-datetimepicker/js/moment.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')!!}" type="text/javascript"></script>

        {{-- jQuery Validation js --}}
        <script src="{!!asset('assets/admin/plugins/validation/jquery.validate.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/validation/additional-methods.js')!!}" type="text/javascript"></script>
        @if(config('app.locale')!='en')
        <script src="{!!asset('assets/admin/plugins/validation/localization/messages_'.config('app.locale').'.js')!!}" type="text/javascript"></script>
        @endif
        
        {{-- jQuery dataTables js --}}
        <script src="{!!asset('assets/admin/plugins/datatables_1.10.8/jquery.dataTables.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/datatables_1.10.8/dataTables.bootstrap.js')!!}" type="text/javascript"></script>

        {{-- ckeditor --}}
        <script type="text/javascript" src="{!!asset('assets/admin/plugins/ckeditor/ckeditor.js')!!}"></script>

        {{-- AdminLTE App --}}
        <script src="{!!asset('assets/admin/dist/js/app.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/js/common.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/js/custom.js')!!}" type="text/javascript"></script>

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
