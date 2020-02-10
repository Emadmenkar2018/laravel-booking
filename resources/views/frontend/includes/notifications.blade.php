@if (count($errors->all()) > 0)
<div class="alert alert-danger alert-block">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
    <strong>{!! trans('user/common.error') !!}</strong>
    <ul>
        @foreach($errors->all() as $message)
        <li>{!! $message !!}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($message = Session::get('success_message'))
<div class="alert alert-success alert-block">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
    <strong>{!! trans('admin/common.success') !!}</strong>
    @if(is_array($message))
    @foreach ($message as $m)
    {!! $m !!}
    @endforeach
    @else
    {!! $message !!}
    @endif
</div>
@endif

@if ($message = Session::get('error_message'))
<div class="alert alert-danger alert-block">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
    <strong>{!! trans('admin/common.error') !!}</strong>
    @if(is_array($message))
    @foreach ($message as $m)
    {!! $m !!}
    @endforeach
    @else
    {!! $message !!}
@endif
</div>
@endif

@if ($message = Session::get('warning_message'))
<div class="alert alert-warning alert-block">
    <i class="fa fa-warning"></i>
    <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
    <strong>{!! trans('admin/common.warning') !!}</strong>
    @if(is_array($message))
    @foreach ($message as $m)
    {!! $m !!}
    @endforeach
    @else
    {!! $message !!}
    @endif
</div>
@endif

@if ($message = Session::get('info_message'))
<div class="alert alert-info alert-block">
    <i class="fa fa-info"></i>
    <button type="button" class="close" data-dismiss="alert"><i class="glyphicon glyphicon-remove"></i></button>
    <strong>{!! trans('admin/common.info') !!}</strong>	
    @if(is_array($message))
    @foreach ($message as $m)
    {!! $m !!}
    @endforeach
    @else
    {!! $message !!}
    @endif
</div>
@endif

<!--ajax response message-->
<div class="alert alert-danger hide">
    <i class="fa fa-ban"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-success hide">
    <i class="fa fa-check"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-info hide">
    <i class="fa fa-info"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<div class="alert alert-warning hide">
    <i class="fa fa-warning"></i>
    <button type="button" aria-hidden="true" class="close"><i class="glyphicon glyphicon-remove"></i></button>
    <span class="msg-content"></span>
</div>
<!--Ajax response message over-->
