@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/credit.buy_credit_with_paypal') !!}
@stop

{{-- Content --}}
@section('content')
{{-- Dashboard Wrapper Start --}}
<div class="dashboard-wrapper">
    {{-- Row Start --}}
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        {!! trans('user/credit.buy_credit_with_paypal') !!}
                    </div>
                    <a href="{!! url('/credit') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/common.back') !!}</a>
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
                    </div>
                    <div class="row {!! $disabled !!}">
                        <div class="col-lg-8 col-md-8">
                            @include('admin.includes.notifications')
                            {!! Form::open(array('route' => 'credit.paypal', 'name'=>'paypal-form', 'id' =>'paypal-form', 'class' => 'form-horizontal no-margin', 'files'=>'true')) !!}
                            <div class="form-group">
                                {!! Form::label('no_of_credit',trans('user/credit.number_of_credit'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('no_of_credit',old('no_of_credit'),array('id' => 'no_of_credit', 'class'=>'form-control numberInput','autocomplete'=>'off')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit(trans('user/credit.buy_now'), array('name'=>'buy-now','id'=>'buy-now','class' =>'btn btn-lbs btn-lg buy-now','disabled'=>'true')) !!}
                                </div>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">{!! trans('user/credit.cart_total') !!}</div>
                                    <span class="tools">{!! config('settings.payment.currency') !!}</span>
                                </div>
                                <div class="widget-body">
                                    <h3 class="text-center text-success">
                                        <span id="amount">0</span>
                                        <span>{!! config('settings.payment.currency') !!}</span>
                                    </h3>
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
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(".numberInput").forceNumeric(); // for number input force enter numeric
        $("#no_of_credit").keyup(function () {
            var $totalCredit = $(this).val();
            var $amount = "{!! config('settings.payment.price') !!}";
            var $totalAmount = $totalCredit * $amount;
            if($totalCredit > 0){
                $("#amount").text($totalAmount);
                $("#buy-now").attr('disabled',false);
            }else{
                $("#amount").text(0);
                $("#buy-now").attr('disabled',true);
            }
        });
    });
</script>
@stop