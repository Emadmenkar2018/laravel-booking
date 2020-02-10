<ul>
    <li class="hidden-sm {!! Request::is('dashboard') ? ' active' : '' !!}">
        <a href="{!! url('/dashboard') !!}">
            <i class="fa fa-dashboard"></i>
            {!! trans('user/menu.dashboard')!!}
        </a>
    </li>
    <li class="hidden-sm {!! Request::is('credit*') ? ' active' : '' !!}">
        <a href="{!! url('/credit') !!}">
            <i class="fa fa-dollar"></i>
            {!! trans('user/menu.buy_credit')!!}
        </a>
    </li>
    <li class="hidden-sm {!! Request::is('transaction*') ? ' active' : '' !!}">
        <a href="{!! url('/transaction') !!}">
            <i class="fa fa-dollar"></i>
            {!! trans('user/menu.transaction')!!}
        </a>
    </li>
    <li class="hidden-sm {!! Request::is('reservation*') ? ' active' : '' !!}">
        <a href="{!! url('/reservation') !!}">
            <i class="fa fa-calendar"></i>
            {!! trans('user/menu.reservation')!!}
        </a>
    </li>
    <li class="hidden-sm {!! Request::is('booking*') ? ' active' : '' !!}">
        <a href="{!! url('/booking') !!}">
            <i class="fa fa-bookmark"></i>
            {!! trans('user/menu.my_bookings')!!}
        </a>
    </li>
    <li class="hidden-sm {!! Request::is('chat*') ? ' active' : '' !!}">
        <a href="{!! url('/chat') !!}">
            <i class="fa fa-comment"></i>
            {!! trans('user/menu.start_chat')!!}
        </a>
    </li>
</ul>