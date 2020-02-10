@extends('admin.layouts.default')
@section('title')
@parent :: {!! trans('admin/dashboard.dashboard') !!}
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {!! trans('admin/dashboard.dashboard') !!}
            <small>{!! trans('admin/dashboard.control_panel') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li class="active">{!! trans('admin/dashboard.dashboard') !!}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{!! $users !!}</h3>
                        <p>{!! trans('admin/dashboard.total_users') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/users')!!}" class="small-box-footer">{!! trans('admin/dashboard.go_to') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{!! $onlineUsers !!}</h3>
                        <p>{!! trans('admin/dashboard.online_users') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/chatboard')!!}" class="small-box-footer">{!! trans('admin/dashboard.chat_now') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{!! $services !!}</h3>
                        <p>{!! trans('admin/dashboard.total_services') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cube"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/services')!!}" class="small-box-footer">{!! trans('admin/dashboard.go_to') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{!! $bookings !!}</h3>
                        <p>{!! trans('admin/dashboard.total_bookings') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bookmark"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/booking')!!}" class="small-box-footer">{!! trans('admin/dashboard.go_to') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3>{!! $transactions !!}</h3>
                        <p>{!! trans('admin/dashboard.total_transactions') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/transaction')!!}" class="small-box-footer">{!! trans('admin/dashboard.go_to') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{!! $enquiries !!}</h3>
                        <p>{!! trans('admin/dashboard.total_enquiries') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="{!!url(ADMIN_SLUG.'/enquiry')!!}" class="small-box-footer">{!! trans('admin/dashboard.respond_now') !!} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <!-- Main row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
