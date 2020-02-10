@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/enquiry.enquiry_details') !!}
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
        <h1>{!! trans('admin/enquiry.enquiry_details') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li><a href="/{!! ADMIN_SLUG !!}/enquiry"><i class="fa fa-envelope"></i> {!! trans('admin/enquiry.enquiry_list') !!}</a></li>
            <li class="active">{!! trans('admin/enquiry.enquiry_details') !!}</li>
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
                            <div class="col-md-2">{!! trans('admin/enquiry.enquiry_date') !!}</div>
                            <div class="col-md-10">{!! date('d-m-Y h:i:s A', strtotime($enquiry->created_at)) !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/enquiry.fullname') !!}</div>
                            <div class="col-md-10">{!! $enquiry->fullname !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/enquiry.email') !!}</div>
                            <div class="col-md-10">{!! $enquiry->email !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/enquiry.subject') !!}</div>
                            <div class="col-md-10">{!! $enquiry->subject !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/enquiry.message') !!}</div>
                            <div class="col-md-10">{!! $enquiry->message !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/enquiry.enquiry_status') !!}</div>
                            <div class="col-md-10">
                                @if($enquiry->status == 'pending')
                                <button class="btn btn-danger">{!! trans('admin/enquiry.'.$enquiry->status) !!}</button>
                                @else
                                <button class="btn btn-success">{!! trans('admin/enquiry.'.$enquiry->status) !!}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! url(ADMIN_SLUG.'/enquiry') !!}" class="btn btn-primary">{!! trans('admin/common.back') !!}</a>
                    </div>
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop