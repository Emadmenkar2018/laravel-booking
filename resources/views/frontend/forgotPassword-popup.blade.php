<p>{!! trans('user/password.forgot_password_info') !!}</p>
@include('frontend.includes.notifications')
{!! Form::open(array('url' => 'password/email', 'id' => 'password-form', 'name' => 'password-form')) !!}
<div class="form-group has-feedback">
    {!! Form::text('email', old('email'),array('class'=>'form-control', 'placeholder' => trans('user/password.email'))) !!}
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <button type="submit" class="btn btn-primary" id="password-form-submit">{!! trans('user/common.submit') !!}</button>&nbsp;
    <a href="javascript:;" data-dismiss="modal" data-target="#sign-in" data-toggle="modal" class="xs-block btn btn-danger">{!! trans('user/common.cancel') !!}</a>
</div>
{!! Form::close()!!}
