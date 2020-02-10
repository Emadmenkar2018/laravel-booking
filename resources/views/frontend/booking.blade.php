@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/booking.booking') !!}
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
                    <div class="title">
                        <?php
                        $service_id = request()->segment('2');
                        $service = App\Service::find($service_id);
                        $timestamp = request()->segment('3');
                        //$date = date('l jS \of F Y', $timestamp);
                        $date = date('m/d/Y',$timestamp);
                        $day = strtolower(date('l',$timestamp));
                        ?>
                        {!! trans('user/booking.book_spot') !!}: {!! $date !!} ({!! trans('user/booking.'.$day) !!})
                    </div>
                    <a href="{!! url('/reservation') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/common.back') !!}</a>
                </div>
                <div class="clearfix"></div> 
                <div class="widget-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            @include('admin.includes.notifications')
                            {!! Form::open(array('route' => 'booking.store', 'name'=>'booking-form', 'id' =>'booking-form', 'class' => 'form-horizontal no-margin', 'files'=>'true')) !!}
                            {!! Form::hidden('service_id',$service_id) !!}
                            {!! Form::hidden('reservation_date',$timestamp) !!}
                            <?php
                            //$scheduleArray = App\Http\Controllers\Frontend\ReservationController::getScheduleService($service_id, $timestamp);
                            $availabilityArr = $scheduleArray['availability'];
                            $bookedArr = $scheduleArray['booked'];
                            $totalSpots = $scheduleArray['total_spots'];
                            $int = $scheduleArray['duration'];
                            ?>
                            <div class="form-group">
                                {!! Form::label('role',trans('user/booking.spots'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10 checkbox">
                                    <?php foreach ($availabilityArr as $k => $v): ?>
                                        <?php echo '<label class="col-sm-6">'; ?>
                                        <?php
                                        $chk = $disabled = in_array($v, $bookedArr) ? true : false;
                                        $chkName = in_array($v, $bookedArr) ? 'booked[]' : 'spots[]';
                                        $chkClass = in_array($v, $bookedArr) ? 'booked' : '';
                                        ?>
                                        {!! Form::checkbox($chkName, $v.'-'.date("H:i",strtotime($v . " +" . $int . " minutes")),$chk, array('id'=>'spots_'.$k,'class' => 'chbox '.$chkClass, 'disabled'=>$disabled)) !!} 
                                        {!! date("h:i A",strtotime($v)).' - '. date("h:i A",strtotime($v . " +" . $int . " minutes")) !!} 
                                        {!! $chk ? ' - Already Booked' : ''!!}
                                        <?php echo '</label>'; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10 error-msg"></div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('full_name',trans('user/booking.full_name'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('full_name',old('full_name'),array('id' => 'full_name', 'class'=>'form-control')) !!}   
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('user/booking.email'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('email',old('email'),array('id'=>'email','class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('mobile', trans('user/booking.mobile_number'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('phone',old('phone'),array('id'=>'mobile','class' => 'form-control numberInput')) !!}
                                    <span class="msgNumber"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('address', trans('user/booking.address'), array('class' => 'col-sm-2 control-label required-sign')) !!}
                                <div class="col-sm-10">
                                    {!! Form::textarea('address',old('address'),['id'=>'address','class'=>'form-control', 'rows' => 5, 'style' => "height:auto !important"]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {!! Form::submit(trans('user/booking.book_now'), array('name'=>'save','id'=>'save','class' =>'btn btn-lbs btn-lg')) !!}
                                </div>
                            </div>
                            {!! Form::close()!!}
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">{!! trans('user/booking.service_details') !!}</div>
                                    <span class="tools"><i class="fa fa-bars"></i></span>
                                </div>
                                <div class="widget-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">{!! trans('user/booking.price_details') !!} <strong>{!! $service->price !!}/Cr</strong></li>
                                        <li class="list-group-item">{!! trans('user/booking.maximum_spot_details') !!} <strong>{!! $service->max_spot_limit !!} spot</strong></li>
                                    </ul>
                                    {!! $service->description !!}
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">{!! trans('user/booking.cart_total') !!}</div>
                                    <span class="tools">Cr</span>
                                </div>
                                <div class="widget-body">
                                    <h3 class="text-center text-success">
                                        <span id="amount">0</span>
                                        <span>Cr</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- widget-body End --}}
            </div>
        </div>
    </div>
    {{-- Row End --}}
</div>
{{-- Dashboard Wrapper End --}}
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(".numberInput").forceNumeric(); // for number input force enter numeric
        var $chkArray = [];
        $("input[type='checkbox'][name='spots[]']").click(function () {
            var $this = $(this);

            var $totalSpots = $("input[type='checkbox'][name='spots[]']:checked").not(":disabled").length;
            var $amount = '{!! $service->price !!}';
            var $totalAmount = $amount * $totalSpots;
            $("#amount").text($totalAmount);

            if ($(this).is(':checked')) {
                $chkArray.push($(this).attr('id'));
            } else {
                $chkArray = $chkArray.filter(function (i) {
                    return i != $this.attr('id')
                });
            }
            var $max_spot = '{!! $service->max_spot_limit !!}';
            if ($totalSpots >= $max_spot) {
                $("input[type='checkbox'][name='spots[]']").attr('disabled', 'disabled');
                for (var i = 0; i < $chkArray.length; i++) {
                    $("#" + $chkArray[i]).attr('disabled', false);
                }
            } else {
                $("input[type='checkbox'][name='spots[]']:not('.booked')").attr('disabled', false);
            }
        });
    });
</script>
@stop