{{-- Navigation --}}
<nav class="navbar navbar-default main-nav" role="navigation" style="position:fixed; z-index:999; left:0; right:0; top:0;">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".mobile-toggle"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <img src="{!! config('settings.logo') !='' ? LOGO_ROOT.config('settings.logo') : LOGO_ROOT.'default.png' !!}" alt="Logo">
            </a>
        </div>

        {{-- Collect the nav links, forms, and other content for toggling --}}
        <div class="collapse navbar-collapse mobile-toggle">
            <ul class="nav navbar-nav navbar-right">
                <li> <a class="page-scroll" href="#home">{!! trans('frontend/header.home') !!}</a> </li>
                <li> <a class="page-scroll" href="#about">{!! trans('frontend/header.about_system') !!}</a> </li>
                <li> <a class="page-scroll" href="#features">{!! trans('frontend/header.features') !!}</a> </li>
                <li> <a class="page-scroll" href="#video">{!! trans('frontend/header.video') !!}</a> </li>
                <li> <a class="page-scroll" href="#portfolio">{!! trans('frontend/header.screen_layouts') !!}</a> </li>
                <li><a class="page-scroll" href="#faq">{!! trans('frontend/header.faq') !!}</a></li>
                <li> <a class="page-scroll" href="#contact">{!! trans('frontend/header.need_help') !!}</a> </li>
                <li><a href="javascript:;" data-target="#sign-in" data-toggle="modal" class="login-link">{!! trans('frontend/header.login') !!}</a></li>
                <li><a href="javascript:;" data-target="#register" data-toggle="modal" class="last register-link">{!! trans('frontend/header.register') !!}</a></li>
            </ul>
        </div>
        {{-- /.navbar-collapse --}} 
    </div>
    {{-- /.container --}} 
</nav>