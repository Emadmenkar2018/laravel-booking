@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/booking.booking_details') !!}
@stop
@section('styles')
<style>
    .detailBox > .row:nth-of-type(2n+1) {
        background-color: #f9f9f9;
    }
    .detailBox > .row{
        margin: 0px 0px 5px 0px !important;
    }
    .detailBox > .row{
        padding: 10px !important;
    }
</style>
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/booking.booking_details') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li><a href="/{!! ADMIN_SLUG !!}/booking"><i class="fa fa-bookmark"></i> {!! trans('admin/booking.bookings_list') !!}</a></li>
            <li class="active">{!! trans('admin/booking.booking_details') !!}</li>
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
                    <div class="box-body detailBox">
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.user_name') !!}</div>
                            <div class="col-md-10">{!! $booking->user->firstname.' '.$booking->user->lastname !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_name') !!}</div>
                            <div class="col-md-10">{!! $booking->full_name !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_email') !!}</div>
                            <div class="col-md-10">{!! $booking->email !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_mobile') !!}</div>
                            <div class="col-md-10">{!! $booking->phone !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_address') !!}</div>
                            <div class="col-md-10">{!! $booking->address !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.service') !!}</div>
                            <div class="col-md-10">{!! $booking->service->title !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_date') !!}</div>
                            <div class="col-md-10">
                                <?php $spots = $booking->bookingDetail?>
                                <?php foreach ($spots as $key => $spot):?>
                                <span>{!! date('d-m-Y h:i A', strtotime($spot->start_time)) !!} to {!! date('d-m-Y h:i A', strtotime($spot->end_time)) !!}</span><br>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.credits') !!}</div>
                            <div class="col-md-10">{!! $booking->amount !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/booking.booking_status') !!}</div>
                            <div class="col-md-10">
                                @if($booking->status == 'pending')
                                <button class="btn btn-default">{!! trans('admin/booking.'.$booking->status) !!}</button>
                                @elseif($booking->status == 'cancel')
                                <button class="btn btn-danger">{!! trans('admin/booking.'.$booking->status) !!}</button>
                                @elseif($booking->status == 'confirm')
                                <button class="btn btn-success">{!! trans('admin/booking.'.$booking->status) !!}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! url(ADMIN_SLUG.'/booking') !!}" class="btn btn-primary">{!! trans('admin/common.back') !!}</a>
                    </div>
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop