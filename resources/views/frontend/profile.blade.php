@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/profile.profile') !!}
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
                    <div class="title">{!! trans('user/profile.profile') !!}</div>
                    <a href="{!! url('/password/change') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/changePassword.change_password') !!}</a>
                </div>
                <div class="clearfix"></div> 
                <div class="widget-body">
                    @include('admin.includes.notifications')
                    {!! Form::model($profile, ['route' => array('users.update', $profile->id),'method' => 'PATCH', 'id' => 'profile-form','class' => 'form-horizontal no-margin', 'files' => true]) !!}
                    <div class="form-group has-feedback">
                        {!! Form::label('email', trans('user/profile.email'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('email', old('email'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('firstname', trans('user/profile.firstname'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('firstname', old('firstname'), array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('lastname', trans('user/profile.lastname'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                        <div class="col-sm-10">
                            {!! Form::text('lastname', old('lastname'), array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('image', trans('user/profile.photo'), array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::file('image', array('class'=>'form-control','style'=>'height:auto;')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>

                    @if(isset($profile))
                    <div class="form-group">
                        @if($profile->image)
                        <div class="col-sm-offset-2 col-sm-10">
                            <img src="{!! USER_IMAGE_ROOT.$profile->image !!}" width="100">
                        </div>
                        @else
                        <div class="col-sm-offset-2 col-sm-10">
                            <img src="{!! USER_IMAGE_ROOT.'default.png' !!}" width="100">
                        </div>
                        @endif
                    </div>
                    @endif

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