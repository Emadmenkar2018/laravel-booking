@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/booking.my_bookings_list') !!}
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
                        {!! trans('user/booking.my_bookings_list') !!}
                    </div>
                    <a href="{!! url('/reservation') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/booking.reservation') !!}</a>
                </div>
                <div class="width_full mrgn_15t">
                    <div class="col-md-12">
                         @include('frontend.includes.notifications')
                    </div>
                    <div class="col-md-8">
                        {!! Form::open(array('route' => 'booking.search', 'id' => 'booking-search-form', 'class' => 'form-inline','method' => 'POST')) !!}
                        <div class="form-group">
                            {!! Form::label('search', trans('user/common.search')) !!}
                            {!! Form::select('search_by',array(''=>trans('user/common.search_by'), 'service' => trans('user/booking.service'), 'name' => trans('user/booking.booking_name'), 'email' => trans('user/booking.booking_email'),  'phone' => trans('user/booking.booking_mobile'), 'booking_date' => trans('user/booking.booking_date')), session('SEARCH.SEARCH_BY') , array('class'=>'form-control', 'id' => 'search_by')) !!}
                        </div>
                        <div class="form-group">
                        <?php if (session('SEARCH.SEARCH_BY') == 'service' || session('SEARCH.SEARCH_BY') == 'booking_date'): ?>
                            {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control', 'style' => 'display:none;')) !!}
                        <?php else: ?>
                            {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control','placeholder'=>trans('user/common.search'))) !!}
                        <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <?php if (session('SEARCH.SEARCH_BY') == 'service'): ?>
                                {!! Form::select('service_id',$serviceList, session('SEARCH.SERVICE_ID') , array('class'=>'form-control', 'id' => 'service_id', 'style' => 'display:inline-block;')) !!}
                            <?php else: ?>
                                {!! Form::select('service_id',$serviceList, session('SEARCH.SERVICE_ID') , array('class'=>'form-control', 'id' => 'service_id', 'style' => 'display:none;')) !!}
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <?php if(session('SEARCH.SEARCH_BY')=='booking_date'):?>
                            <div class="input-group search_date" style="display:inline-table;">
                                {!! Form::text('search_date',session('SEARCH.SEARCH_DATE'),['id' => 'search_date','class' => 'datepicker form-control',]) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                            <?php else:?>
                            <div class="input-group search_date" style="display:none;">
                                {!! Form::text('search_date',session('SEARCH.SEARCH_DATE'),['id' => 'search_date','class' => 'datepicker form-control',]) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                            <?php endif;?>
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('user/common.search'), array('id' => 'search', 'name' => '', 'class' => 'btn btn-lbs')) !!}
                            {!! Form::button(trans('user/common.reset'),array('type'=>'submit','id' => 'reset', 'name' => 'reset', 'value' => '1', 'class' => 'btn btn-defult')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">
                        <a href="{!! url('/booking/export') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/booking.export_csv') !!}</a>
                    </div>
                </div>
                <div class="widget-body"> 
                    <div class="table-responsive">  
                        <table class="table table-condensed table-striped table-bordered no-margin table-custome">
                            <thead>
                                <tr class="table-head">
                                    <th>{!! trans('user/booking.service') !!}</th>
                                    <th>{!! trans('user/booking.booking_name') !!}</th>
                                    <th>{!! trans('user/booking.booking_email') !!}</th>
                                    <th>{!! trans('user/booking.booking_mobile') !!}</th>
                                    <th>{!! trans('user/booking.credits') !!}</th>
                                    <th>{!! trans('user/booking.booking_date') !!}</th>
                                    <th>{!! trans('user/common.status') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($bookings))
                                @foreach ($bookings as $data)
                                    <tr>
                                        <td>{!! $data->service->title !!}</td>
                                        <td>{!! $data->full_name !!}</td>
                                        <td>{!! $data->email !!}</td>
                                        <td>{!! $data->phone !!}</td>
                                        <td>{!! $data->amount !!}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="spnToggle" id="bookingDetail_<?php echo $data->id; ?>">{!! trans('user/common.view') !!}</a>
                                            <span id="bookingDetail_<?php echo $data->id; ?>" style="display:none;" class="">
                                                <table class="table table-bordered table-condensed">
                                                    <tbody>
                                                        <?php $spots = $data->bookingDetail?>
                                                        <?php foreach ($spots as $key => $spot):?>
                                                            <tr>
                                                                <td width='115'>{!! date('d-m-Y h:i A', strtotime($spot->start_time)) !!} to {!! date('d-m-Y h:i A', strtotime($spot->end_time)) !!}</td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </span>
                                        </td>
                                        <td width='100'>
                                            @if($data->status == 'pending')
                                            <button class="btn btn-default" title="{!! trans('user/booking.pending_booking') !!}" data-toggle="tooltip">{!! trans('user/booking.pending') !!}</button>
                                            @elseif($data->status == 'cancel')
                                            <button class="btn btn-danger" title="{!! trans('user/booking.cancelled_booking') !!}" data-toggle="tooltip">{!! trans('user/booking.cancel') !!}</button>
                                            @elseif($data->status == 'confirm')
                                            <button class="btn btn-success" title="{!! trans('user/booking.confirmed_booking') !!}" data-toggle="tooltip">{!! trans('user/booking.confirm') !!}</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        {!! trans('user/booking.no_bookings_found') !!}
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-center pagination no-margin">
            @if($bookings)
                {!! $bookings->render() !!} 
            @endif
        </div>
        <div class="col-md-12 text-center">
            <a class="btn">{!! trans('user/common.total') !!} {!! $bookings->total() !!} </a>
        </div>
    </div>
    {{-- Row End --}}
</div>
{{-- Dashboard Wrapper End --}}
@stop
{{-- Scripts --}}
@section('scripts')
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({
            //placement: "bottom"
        });
        
        $(".spnToggle").click(function(){
           $('span#'+$(this).attr('id')).toggle();
        });
        
        $('#search_by').change(function () {
            if ($('#search_by').val() == 'service') {
                $("#service_id").show();
                $("#search_txt").hide();
                $(".search_date").hide();
            }else if ($('#search_by').val() == 'booking_date') {
                $("#service_id").hide();
                $("#search_txt").hide();
                $(".search_date").show();
            } else {
                $("#service_id").hide();
                $(".search_date").hide();
                $("#search_txt").show();
            }
        });
        
        $(window).on('load',function(){
            $('#search_by').trigger('change');
        });
        
        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            //startDate: "od",
            todayHighlight: true,
            todayBtn : true,
            autoclose: true
        }).inputmask('dd-mm-yyyy', {"placeholder": "dd-mm-yyyy", alias: "date", "clearIncomplete": true});
    });
</script>
@stop