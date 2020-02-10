<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="{!! (Request::is(ADMIN_SLUG.'/dashboard') ? 'active' : '') !!}">
                <a href="{!!url(ADMIN_SLUG)!!}">
                    <i class="fa fa-dashboard"></i> <span>{!! trans('admin/sidebar.dashboard') !!}</span>
                </a>
            </li>
            
            <li class="treeview {!! (Request::is(ADMIN_SLUG.'/settings*') || Request::is(ADMIN_SLUG.'/paymentsettings*') || Request::is(ADMIN_SLUG.'/paypalsettings*') || Request::is(ADMIN_SLUG.'/password/change') ? ' active' : '') !!}">
                <a href="javascript:;">
                    <i class="fa fa-wrench"></i>
                    <span>{!! trans('admin/sidebar.settings') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! (Request::is(ADMIN_SLUG.'/settings*') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/settings')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.general_setting') !!}</a></li>
                    <li class="{!! (Request::is(ADMIN_SLUG.'/paymentsettings*') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/paymentsettings')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.payment_setting') !!}</a></li>
                    <li class="{!! (Request::is(ADMIN_SLUG.'/paypalsettings*') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/paypalsettings')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.paypal_setting') !!}</a></li>
                    <li class="{!! (Request::is(ADMIN_SLUG.'/password/change') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/password/change')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.change_password') !!}</a></li>
                </ul>
            </li>
            <li class="treeview {!! (Request::is(ADMIN_SLUG.'/currency*') ? ' active' : '') !!}">
                <a href="javascript:;">
                    <i class="fa fa-money"></i>
                    <span>{!! trans('admin/sidebar.currency_management') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! (Request::is(ADMIN_SLUG.'/currency/create') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/currency/create')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.add_currency') !!}</a></li>
                    <li class="{!! (Request::is(ADMIN_SLUG.'/currency') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/currency')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.currency_list') !!}</a></li>
                </ul>
            </li>
            <li class="treeview {!! (Request::is(ADMIN_SLUG.'/services*') ? ' active' : '') !!}">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>{!! trans('admin/sidebar.services_management') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! (Request::is(ADMIN_SLUG.'/services/create') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/services/create')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.add_service') !!}</a></li>
                    <li class="{!! (Request::is(ADMIN_SLUG.'/services') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/services')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.services_list') !!}</a></li>
                </ul>
            </li>
            <li class="{!! (Request::is(ADMIN_SLUG.'/users') ? 'active' : '') !!}">
                <a href="{!!url(ADMIN_SLUG.'/users')!!}">
                    <i class="fa fa-user"></i><span>{!! trans('admin/sidebar.users_list') !!}</span>
                </a>
            </li>
            <li class="{!! (Request::is(ADMIN_SLUG.'/booking') ? 'active' : '') !!}">
                <a href="{!!url(ADMIN_SLUG.'/booking')!!}">
                    <i class="fa fa-dollar"></i><span>{!! trans('admin/sidebar.booking_list') !!}</span>
                </a>
            </li>
            <li class="{!! (Request::is(ADMIN_SLUG.'/transaction') ? 'active' : '') !!}">
                <a href="{!!url(ADMIN_SLUG.'/transaction')!!}">
                    <i class="fa fa-dollar"></i><span>{!! trans('admin/sidebar.transaction_list') !!}</span>
                </a>
            </li>
            <li class="{!! (Request::is(ADMIN_SLUG.'/chatboard/*') ? 'active' : '') !!}">
                <a href="{!!url(ADMIN_SLUG.'/chatboard')!!}">
                    <i class="fa fa-comment"></i> <span>{!! trans('admin/sidebar.chat_dashboard') !!}</span>
                </a>
            </li>
            <li class="treeview {!! (Request::is(ADMIN_SLUG.'/enquiry*') ? ' active' : '') !!}">
                <a href="javascript:;">
                    <i class="fa fa-question-circle"></i>
                    <span>{!! trans('admin/sidebar.enquiry_management') !!}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! (Request::is(ADMIN_SLUG.'/enquiry') ? 'active' : '') !!}"><a href="{!!url(ADMIN_SLUG.'/enquiry')!!}"><i class="fa fa-angle-double-right"></i>{!! trans('admin/sidebar.enquiry_list') !!}</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>