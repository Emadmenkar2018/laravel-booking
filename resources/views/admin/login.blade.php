<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{!! trans('admin/login.sitename') !!} :: {!! trans('admin/login.sign_in') !!}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <link rel="shortcut icon" href="{!!asset('assets/admin/img/favicon.png')!!}" >
        
        <!-- bootstrap 3.2.0 -->
        <link href="{!! asset('assets/admin/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{!! asset('assets/admin/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{!!asset('assets/admin/dist/css/AdminLTE.min.css')!!}" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="{!!asset('assets/admin/css/style.css')!!}" rel="stylesheet" type="text/css" />
    </head>
    <body class="login-page bg-black">
        <div class="login-box">
            <div class="login-logo">
              {!! trans('admin/login.sitename') !!}
            </div><!-- /.login-logo -->
            <div class="login-box-header bg-purple">{!! trans('admin/login.sign_in') !!}</div>
            <div class="login-box-body">
                <!-- Notifications -->
                @include('admin.includes.notifications')
                <!-- ./ notifications -->
                    {!! Form::open(array('method' => 'POST','url' => ADMIN_SLUG.'/login', 'id' => 'login-form','novalidate' => 'novalidate')) !!}
                    <div class="form-group has-feedback">
                        {!! Form::text('username', null,array('class'=>'form-control', 'placeholder' => trans('admin/login.username'))) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::password('password', array('class'=>'form-control','id' => 'password', 'placeholder' => trans('admin/login.password'))) !!}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Form::submit(trans('admin/login.sign_in'), array('class'=>'btn bg-purple btn-block')) !!}
                        </div>
                    </div>
                {!! Form::close() !!}

                <a href="{!! URL::to(ADMIN_SLUG.'/password/reset') !!}">{!! trans('admin/login.i_forgot_my_password') !!}</a><br>
                <!--<a href="#" class="text-center">Register a new membership</a>-->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="{!!asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')!!}" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{!!asset('assets/admin/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>

        <!-- jQuery Validation js -->
        <script src="{!!asset('assets/admin/plugins/validation/jquery.validate.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/validation/additional-methods.js')!!}" type="text/javascript"></script>
        @if(config('app.locale')!='en')
        <script src="{!!asset('assets/admin/plugins/validation/localization/messages_'.config('app.locale').'.js')!!}" type="text/javascript"></script>
        @endif
        <!-- AdminLTE App -->
        <script src="{!!asset('assets/admin/dist/js/app.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/js/common.js')!!}" type="text/javascript"></script>
    </body>
</html>
<script>
$(function () {
    //hide alert message when click on remove icon
    $(".close").click(function () {
        $(this).closest('.alert').addClass('hide');
    });
});
</script>