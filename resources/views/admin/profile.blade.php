@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/profile.admin_profile') !!}
@stop
@section('styles')
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/profile.admin_profile') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li class="active">{!! trans('admin/profile.admin_profile') !!}</li>
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
            <?php // print_r($profile); ?>
            <div class="col-xs-12">
                <div class="box">
                    @if(isset($profile))
                        {!! Form::model($profile, ['route' => array('profile.update', $profile->id),'method' => 'PATCH', 'id' => 'profile-form', 'files' => true]) !!}
                   @endif
                    
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?php echo $profile->id; ?>" >
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('image', trans('admin/profile.photo')) !!}
                            {!! Form::file('image', array('class'=>'form-control','style'=>'height:auto;')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        
                        @if(isset($profile))
                        <div class="form-group">
                            @if($profile->image)
                                <img src="{!! ADMIN_IMAGE_ROOT.$profile->image !!}" width="100">
                            @endif
                        </div>
                        @endif
                        
                        <div class="form-group has-feedback">
                            {!! Form::label('firstname', trans('admin/profile.firstname')) !!}
                            {!! Form::text('firstname', old('firstname'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('lastname', trans('admin/profile.lastname')) !!}
                            {!! Form::text('lastname', old('lastname'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('email', trans('admin/profile.email')) !!}
                            {!! Form::text('email', old('email'),array('class'=>'form-control')) !!}
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <span id="loader" class="help-block"></span>
                        </div>
                       
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Submit',array('class'=>'btn btn-primary', 'id'=>'submitform')) !!}
                         <a href="{!! URL(ADMIN_SLUG) !!}" class="btn btn-default">Cancel</a> 
                   </div>
                    
                    {!! Form::close() !!}
                </div>  
            </div>  
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop