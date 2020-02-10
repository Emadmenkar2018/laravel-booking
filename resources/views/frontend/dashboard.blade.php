@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/dashboard.dashboard') !!}
@stop

@section('content')
<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper">
    <!-- Row starts -->
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-widget mini-widget-green">
                <div class="mini-widget-heading clearfix">
                    <div class="pull-left">{!! trans('user/dashboard.total_services') !!}</div>
                </div>
                <div class="mini-widget-body clearfix">
                    <div class="pull-left">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="pull-right number">{!! $services !!}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                    <span><a href="{!!url('reservation')!!}" class="text_white">{!! trans('user/dashboard.go_to') !!}</a></span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-widget">
                <div class="mini-widget-heading clearfix">
                    <div class="pull-left">{!! trans('user/dashboard.total_bookings') !!}</div>
                </div>
                <div class="mini-widget-body clearfix">
                    <div class="pull-left">
                        <i class="fa fa-bookmark"></i>
                    </div>
                    <div class="pull-right number">{!! $bookings !!}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                    <span><a href="{!!url('booking')!!}" class="text_white">{!! trans('user/dashboard.go_to') !!}</a></span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-widget mini-widget-red">
                <div class="mini-widget-heading clearfix">
                    <div class="pull-left">{!! trans('user/dashboard.total_transactions') !!}</div>
                </div>
                <div class="mini-widget-body clearfix">
                    <div class="pull-left">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <div class="pull-right number">{!! $transactions !!}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                    <span><a href="{!!url('transaction')!!}" class="text_white">{!! trans('user/dashboard.go_to') !!}</a></span>
                </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="mini-widget mini-widget-grey">
                <div class="mini-widget-heading clearfix">
                    <div class="pull-left">{!! trans('user/dashboard.total_credits') !!}</div>
                </div>
                <div class="mini-widget-body clearfix">
                    <div class="pull-left">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="pull-right number">{!! auth()->guard('user')->user()->credit !!}</div>
                </div>
                <div class="mini-widget-footer center-align-text">
                    <span><a href="{!!url('credit')!!}" class="text_white">{!! trans('user/dashboard.buy_more_credits') !!}</a></span>
                </div> 
            </div>
        </div>
    </div>
    <!-- Row ends -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        {!! trans('user/dashboard.contact_admin') !!}
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="widget-body">
                    <!-- Row starts -->
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            @if(config('settings.map') !="")
                            {!! config('settings.map') !!}
                            @else
                            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                            @endif
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <h3>{!! trans('user/dashboard.contact_us') !!}</h3>
                            <hr>
                            <p>
                                @if(config('settings.address') !="")
                                {!! config('settings.address') !!}<br>
                                @endif
                            </p>
                            <p>
                                @if(config('settings.email') !="")
                                <i class="fa fa-envelope-o"></i> 
                                <a href="{!! 'mailto:'.config('settings.email') !!}">{!! config('settings.email') !!}</a>
                                @endif
                            </p>
                            <p>
                                @if(config('settings.phone') !="")
                                <i class="fa fa-phone"></i> 
                                {!! config('settings.phone') !!}
                                @endif
                            </p>
                            <div class="clearfix"></div>
                            <ul class="list-inline">
                                @if(config('settings.facebook') !="")
                                <li><a href="{!! config('settings.facebook') !!}" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                                @endif
                                @if(config('settings.linkedin') !="")
                                <li><a href="{!! config('settings.linkedin') !!}" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
                                @endif
                                @if(config('settings.twitter') !="")
                                <li><a href="{!! config('settings.twitter') !!}" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                                @endif
                                @if(config('settings.googleplus') !="")
                                <li><a href="{!! config('settings.googleplus') !!}" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- Row ends -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard Wrapper End -->
@stop