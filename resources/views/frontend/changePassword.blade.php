@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/changePassword.change_password') !!}
@stop
@section('styles')
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
                    <div class="title">{!! trans('user/changePassword.change_password') !!}</div>
                    <a href="{!! url('/profile') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/common.back') !!}</a>
                </div>
                <div class="clearfix"></div> 
                <div class="widget-body">
                    @include('admin.includes.notifications')
                    {!! Form::open(['route' => array('password.change'), 'id' => 'change-password-form','class' => 'form-horizontal no-margin', 'novalidate' => 'novalidate']) !!}
                    <div class="form-group has-feedback">
                        {!! Form::label('old_password', trans('user/changePassword.old_password'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::password('old_password', array('class'=>'form-control','id' => 'old_password')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('password', trans('user/changePassword.new_password'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', array('class'=>'form-control','id' => 'password')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('cpassword', trans('user/changePassword.confirm_password'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password_confirmation', array('class'=>'form-control','id' => 'password_confirmation')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit(trans('user/common.save'), array('class'=>'btn btn-lbs btn-lg')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div> {{-- widget-body End --}}
            </div>
        </div>
    </div>
    {{-- Row End --}}
</div>
{{-- Dashboard Wrapper End --}}
@stop