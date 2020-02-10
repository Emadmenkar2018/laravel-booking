@extends('frontend.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/password.reset_password') !!}
@stop
@section('content')
<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container margin-top-50">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2 class="section-title">{!! trans('user/password.reset_password') !!}</h2>
                <p class="sub-title">{!! trans('user/password.reset_password_info') !!}</p>
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row -->

        <div class="row margin-top-50">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                @include('frontend.includes.notifications')
                {!! Form::open(array('route' => array('password.reset', $token),'id' => 'reset-password-form')) !!}
                {!! Form::hidden('token', $token) !!}
                <div class="form-group">
                    {!! Form::text('email', $email or old('email') ,array('class'=>'form-control', 'placeholder' => trans('user/password.email'))) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', array('class'=>'form-control','id' => 'password', 'placeholder' => trans('user/password.new_password'))) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', array('class'=>'form-control','id' => 'password_confirmation', 'placeholder' => trans('user/password.confirm_password'))) !!}
                </div>
                <div class="form-group text-center">
                    {!! Form::submit(trans('user/common.save'), array('class'=>'btn btn-primary btn-lg')) !!}
                </div>
                {!! Form::close()!!}
            </div>
            <!-- /.col-xs-12 --> 
        </div>
        <!-- /.row --> 

    </div>
    <!-- /.container --> 
</section>
<!-- /.contact-section -->
@stop
