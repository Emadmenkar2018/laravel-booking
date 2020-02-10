@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/changePassword.change_password') !!}
@stop
@section('styles')
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/changePassword.change_password') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li class="active">{!! trans('admin/changePassword.change_password') !!}</li>
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
                        {!! Form::open(['route' => ADMIN_SLUG.'.password.change', 'id' => 'change-password-form', 'novalidate' => 'novalidate']) !!}
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            {!! Form::label('password',trans('admin/changePassword.old_password')) !!}
                            {!! Form::password('old_password', array('class'=>'form-control','id' => 'old_password')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('password',trans('admin/changePassword.new_password')) !!}
                            {!! Form::password('password', array('class'=>'form-control','id' => 'password')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('cpassword',trans('admin/changePassword.confirm_password')) !!}
                            {!! Form::password('password_confirmation', array('class'=>'form-control','id' => 'password_confirmation')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit(trans('admin/common.submit'),array('class'=>'btn btn-primary', 'id'=>'submitform')) !!}
                        <a href="{!! URL::route(ADMIN_SLUG.'.password.change') !!}" class="btn btn-default">{!! trans('admin/common.cancel') !!}</a>
                    </div>
                    {!! Form::close()!!}
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop