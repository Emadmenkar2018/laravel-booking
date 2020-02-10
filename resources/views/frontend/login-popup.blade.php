<p>{!! trans('user/login.dont_have_account') !!} &nbsp; <a href="javascript:;" data-dismiss="modal" data-target="#register" data-toggle="modal" class="xs-block">{!! trans('user/login.register') !!}</a></p>
@include('frontend.includes.notifications')
{!! Form::open(['url' => 'login', 'id' => 'login-form', 'class' => 'form']) !!}
<div class="form-group">
    <div class="form-icon has-feedback">
        {!! Form::text('email', old('email'),array('class'=>'form-control', 'placeholder'=>trans('user/login.email'))) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
</div>
<div class="form-group">
    <div class="form-icon has-feedback">
        {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>trans('user/login.password'))) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    </div>
</div>

<div class="form-group has-feedback">
    <button type="submit" class="btn btn-primary" id="login-form-submit">{!! trans('user/login.sign_in') !!}</button>&nbsp;
    <a href="javascript:;" data-dismiss="modal" data-target="#forgot-password" data-toggle="modal" class="xs-block">{!! trans('user/login.i_forgot_my_password') !!}</a>
</div>
{!! Form::close()!!}
