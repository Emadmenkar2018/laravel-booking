{{-- Footer --}}
<footer class="footer-section text-center">
    <div class="container"> <a class="page-scroll backToTop" href="#page-top"><i class="fa fa-angle-up"></i></a>
        <div class="row">
            <div class="col-xs-12">
                <div class="footer-logo"> 
                    <img src="{!! config('settings.logo') !='' ? LOGO_ROOT.config('settings.logo') : LOGO_ROOT.'default.png' !!}" alt="Logo">
                    <p>{!! trans('frontend/footer.develop_by') !!} <span>{!! config('settings.title') !!}</span></p>
                </div>
                <div class="social-icon clearfix">
                    <ul class="list-inline">
                        @if(config('settings.facebook') !="")
                        <li><a href="{!! config('settings.facebook') !!}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if(config('settings.linkedin') !="")
                        <li><a href="{!! config('settings.linkedin') !!}" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                        @if(config('settings.twitter') !="")
                        <li><a href="{!! config('settings.twitter') !!}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if(config('settings.googleplus') !="")
                        <li><a href="{!! config('settings.googleplus') !!}" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                        @endif
                    </ul>
                </div>
                <div class="copyright">
                    <p>{!! trans('user/common.copyright') !!} &copy; {!! date('Y') !!} <a href="{!! url('/') !!}" target="_blank">{!! config('settings.title') !!}</a> - {!! trans('user/common.right_reserved') !!}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- / Footer --}}

{{-- Preloader --}}
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

{{-- sign-in modal-popup --}}
<div id="sign-in" class="modal fade custome-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">{!! trans('user/login.sign_in_to_your_account') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('frontend.login-popup')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- forgot-password modal-popup --}}
<div id="forgot-password" class="modal fade custome-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">{!! trans('user/password.forgot_password') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('frontend.forgotPassword-popup')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- register modal-popup --}}
<div id="register" class="modal fade custome-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">{!! trans('user/register.create_account') !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('frontend.register-popup')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>