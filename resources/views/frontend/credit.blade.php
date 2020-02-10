@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/credit.buy_credit') !!}
@stop

@section('content')
{{-- Dashboard Wrapper Start --}}
<div class="dashboard-wrapper">
    {{-- Row Start --}}
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">{!! trans('user/credit.buy_credit') !!}</div>
                </div>
                <div class="clearfix"></div> 
                <div class="widget-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            <div class="alert alert-info alert-block">
                                <i class="fa fa-info-circle"></i>
                                <strong>{!! trans('user/common.info') !!}</strong>
                                {!! trans('user/credit.price_info') !!} {!! config('settings.payment.price') .' '. config('settings.payment.currency') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(config('services.paypal.client_id')=='' || config('services.paypal.secret')=='')
                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
                            <div class="alert alert-danger alert-block">
                                <i class="fa fa-ban"></i>
                                <strong>{!! trans('user/common.note') !!}</strong>
                                {!! trans('user/credit.paypal_notice') !!}
                            </div>
                        </div>
                        <?php $disabled = 'disabled';?>
                        @else
                        <?php $disabled = '';?>
                        @endif
                        <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12 {!! $disabled !!}">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="icon ion-clock text-success"></i> {!! trans('user/credit.paypal_payment') !!}</h4>
                                </div>
                                <div class="panel-body">
                                    <a href="credit/paypal">
                                        <img src="{!! asset('assets/user/img/paypal.png') !!}" style="width: 100%;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-sx-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="icon ion-clock text-success"></i> {!! trans('user/credit.direct_payment') !!}</h4>
                                </div>
                                <div class="panel-body">
                                    <p>{!! trans('user/credit.direct_payment_info_1') !!}</p>
                                    <p>{!! trans('user/credit.direct_payment_info_2') !!}</p>
                                    <p>{!! trans('user/credit.direct_payment_info_3') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- widget-body End --}}
            </div>
        </div>
    </div>
    {{-- Row End --}}
</div>
{{-- Dashboard Wrapper End --}}
@stop