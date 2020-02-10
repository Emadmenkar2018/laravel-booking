@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/paypalSettings.paypal_settings') !!}
@stop
@section('styles')
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/paypalSettings.paypal_settings') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li class="active">{!! trans('admin/paypalSettings.paypal_settings') !!}</li>
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
                    @if(isset($paypalsetting))
                        {!! Form::model($paypalsetting, array('route' => array('paypalsettings.update', $paypalsetting->id), 'method' => 'PATCH', 'id' => 'paypalsetting-form', 'files' => true )) !!}
                    @else
                        {!! Form::open(array('route' => 'paypalsettings.store', 'id' => 'paypalsetting-form', 'files' => true)) !!}
                    @endif
                    <div class="box-body">
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! Form::label('mode', trans('admin/paypalSettings.payment_mode')) !!}
                                </div>
                                <div class="col-sm-12">
                                    <label class="radio-inline">
                                        {!! Form::radio('mode', 'test', true, array('class'=>'service_type')) !!} {!! trans('admin/paypalSettings.test') !!}
                                    </label>
                                    <label class="radio-inline">
                                      {!! Form::radio('mode', 'live', false, array('class'=>'service_type')) !!} {!! trans('admin/paypalSettings.live') !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('client_id_sandbox', trans('admin/paypalSettings.sandbox_client_id')) !!}
                            {!! Form::text('client_id_sandbox', old('client_id_sandbox'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('secret_sandbox', trans('admin/paypalSettings.sandbox_secret')) !!}
                            {!! Form::text('secret_sandbox', old('secret_sandbox'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('client_id_live', trans('admin/paypalSettings.live_client_id')) !!}
                            {!! Form::text('client_id_live', old('client_id_live'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('secret_live', trans('admin/paypalSettings.live_secret')) !!}
                            {!! Form::text('secret_live', old('secret_live'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit(trans('admin/common.submit'),array('class'=>'btn btn-primary', 'id'=>'submitform')) !!}
                        <a href="{!! URL::route('paypalsettings.index') !!}" class="btn btn-default">{!! trans('admin/common.cancel') !!}</a>
                    </div>
                    {!! Form::close()!!}
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop