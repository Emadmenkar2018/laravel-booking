@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/paymentSettings.payment_settings') !!}
@stop
@section('styles')
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/paymentSettings.payment_settings') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li class="active">{!! trans('admin/paymentSettings.payment_settings') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Notifications -->
                @include('admin.includes.notifications')
                <!-- ./ notifications -->
            </div>
            <div class="col-xs-12">
                <div class="box">
                    @if(isset($paymentsetting))
                        {!! Form::model($paymentsetting, array('route' => array('paymentsettings.update', $paymentsetting->id), 'method' => 'PATCH', 'id' => 'paymentsetting-form', 'files' => true )) !!}
                    @else
                        {!! Form::open(array('route' => 'paymentsettings.store', 'id' => 'paymentsetting-form', 'files' => true)) !!}
                    @endif
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('currency', trans('admin/paymentSettings.currency_code')) !!} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="{!! trans('admin/paymentSettings.currency_info') !!}"></i>
                            <select name="currency_id" class="form-control" id="currency_id">
                                <option value="">{!! trans('admin/paymentSettings.select_currency') !!}</option>
                                @foreach($currencyList as $key => $value)
                                    <?php $selected = isset($paymentsetting) && $paymentsetting->currency_id == $value['id'] ? 'selected' : ''?>
                                <option value="{!! $value['id'] !!}" data-code="{!! $value['code'] !!}" <?php echo $selected;?> >{!! $value['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            {!! Form::label('price', trans('admin/paymentSettings.price_per_credit')) !!} <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="{!! trans('admin/paymentSettings.price_info') !!}"></i>
                            <div class="input-group">
                                <span class="input-group-addon currency-symbol">{!! old('currency') !!}</span>
                                {!! Form::text('price', old('price'),array('class'=>'form-control numberInput')) !!}
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit(trans('admin/common.submit'),array('class'=>'btn btn-primary', 'id'=>'submitform')) !!}
                        <a href="{!! URL::route('paymentsettings.index') !!}" class="btn btn-default">{!! trans('admin/common.cancel') !!}</a>
                    </div>
                    {!! Form::close()!!}
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover'
        }).tooltip('show');
        
        $("#currency_id").change(function(){
           var currency = $('option:selected', this).attr('data-code');
           $(".currency-symbol").text(currency);
        });
        $("#currency_id").change();
        $(".numberInput").forceNumeric(); // for number input force enter numeric
    });
</script>
@stop