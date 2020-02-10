<p>{!! trans('user/register.already_have_account') !!} &nbsp; <a  href="javascript:;" data-dismiss="modal" data-target="#sign-in" data-toggle="modal" class="xs-block">{!! trans('user/register.sign_in') !!}</a></p>
@include('frontend.includes.notifications')
{!! Form::open(['route' => 'users.store', 'id' => 'register-form', 'class' => 'form', 'files' => true]) !!}

<div class="form-group has-feedback">
    {!! Form::text('firstname', old('firstname'),array('class'=>'form-control', 'placeholder'=>trans('user/register.firstname'))) !!}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class="form-group has-feedback">
    {!! Form::text('lastname', old('lastname'),array('class'=>'form-control', 'placeholder'=>trans('user/register.lastname'))) !!}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class="form-group has-feedback">
    {!! Form::text('email', old('email'),array('class'=>'form-control', 'placeholder'=>trans('user/register.email'))) !!}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <span id="loader" class="help-block"></span>
</div>

<div class="form-group has-feedback">
    {!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>trans('user/register.password'))) !!}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>
<div class="form-group has-feedback">
    {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>trans('user/register.confirm_password'))) !!}
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
</div>

<div class="form-group has-feedback">
    <button type="submit" class="btn btn-primary" id="register-form-submit">{!! trans('user/register.register') !!}</button>
</div>
{!! Form::close()!!}