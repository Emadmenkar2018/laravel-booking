<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{!! trans('admin/login.sitename') !!} :: {!! trans('admin/password.forgot_password') !!}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
                 {!! config('settings.sitename') !!}
            </div><!-- /.login-logo -->
            <div class="login-box-header bg-blue-gradient">{!! trans('admin/password.forgot_password') !!}</div>
            <div class="login-box-body">
                <p class="help-block">{!! trans('admin/password.forgot_password_info') !!}</p>
                <!-- Notifications -->
                @include('admin.includes.notifications')
                <!-- ./ notifications -->
                    {!! Form::open(array('url' => ADMIN_SLUG.'/password/email', 'id' => 'password-form', 'name' => 'password-form')) !!}
                    <div class="form-group has-feedback">
                        {!! Form::text('email', old('email'),array('class'=>'form-control', 'placeholder' => trans('admin/password.email'))) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Form::submit(trans('admin/common.submit'), array('class'=>'btn bg-blue-gradient btn-block')) !!}
                        </div>
                        <div class="col-xs-6">
                            <a href="{!!URL::to(ADMIN_SLUG)!!}" class="btn btn-danger btn-block">{!! trans('admin/common.cancel') !!}</a>
                        </div>
                        
                    </div>
                {!! Form::close() !!}
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="{!!asset('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')!!}" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{!!asset('assets/admin/bootstrap/js/bootstrap.min.js')!!}" type="text/javascript"></script>

        <!-- jQuery Validation js -->
        <script src="{!!asset('assets/admin/plugins/validation/jquery.validate.min.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/admin/plugins/validation/additional-methods.js')!!}" type="text/javascript"></script>

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