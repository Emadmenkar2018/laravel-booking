<header class="main-header">
    <!-- Logo -->
    <a href="{!! URL::to(ADMIN_SLUG) !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{!! ADMIN_IMAGE_ROOT.auth()->guard('admin')->user()->image !!}" alt="Logo" width="100%"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{!! config('settings.logo') !='' ? LOGO_ROOT.config('settings.logo') : LOGO_ROOT.'default.png' !!}" alt="Logo" width="100%"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if(config('services.paypal.client_id')=='' || config('services.paypal.secret')=='')
                <li style="position: fixed;left: 0; bottom: 0">
                    <div class="alert alert-danger">
                        <i class="fa fa-ban"></i>
                        <span class="">{!! trans('admin/header.paypal_notice1') !!}
                            <a href="/{!! ADMIN_SLUG !!}/paypalsettings">{!! trans('admin/header.click_here') !!}</a>.<br> 
                            {!! trans('admin/header.paypal_notice2') !!}
                        </span>
                    </div>
                </li>
                @endif
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <?php $totalCount = App\Chat::where('message_read', '0')->where('message_type', 'in-msg')->count(); ?>
                        <span class="label label-success" id="total-count">{!! $totalCount !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{!! trans('admin/header.online_users') !!}</li>
                        <li id="online-list-notification">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id="user-list-notification">
                                <?php $users = App\User::active()->online()->get(); ?>
                                <?php foreach ($users as $data): ?>
                                    <?php $msgCount = App\Chat::where('user_id', $data->id)->where('message_read', '0')->where('message_type', 'in-msg')->count(); ?>
                                    <li>
                                        <a href="{!! url(ADMIN_SLUG.'/chatboard/'.$data->id) !!}">
                                            <div class="pull-left">
                                                <?php $img = $data->image!="" ? USER_IMAGE_ROOT.$data->image : USER_IMAGE_ROOT.'default.png';?>
                                                <img src="{!! $img !!}" width="100" alt="User Image">
                                            </div>
                                            <h4>
                                                {!! $data->firstname .' '. $data->lastname !!}
                                                <span class="online-status"><img src="/assets/admin/img/online.png"></span>
                                                <small class="text-danger"> {!! $msgCount !!}</small>
                                            </h4>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{!! Auth::guard('admin')->user()->firstname .' '. Auth::guard('admin')->user()->lastname  !!} <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! URL(ADMIN_SLUG.'/profile') !!}" class="btn btn-primary btn-flat">{!! trans('admin/header.profile') !!}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{!! URL(ADMIN_SLUG.'/logout') !!}" class="btn btn-danger btn-flat">{!! trans('admin/header.logout') !!}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>