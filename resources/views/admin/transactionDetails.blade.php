@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/transaction.transaction_details') !!}
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
        <h1>{!! trans('admin/transaction.transaction_details') !!}</h1>
        <ol class="breadcrumb">
            <li><a href="/{!! ADMIN_SLUG !!}"><i class="fa fa-dashboard"></i> {!! trans('admin/common.home') !!}</a></li>
            <li><a href="/{!! ADMIN_SLUG !!}/transaction"><i class="fa fa-dollar"></i> {!! trans('admin/transaction.transactions_list') !!}</a></li>
            <li class="active">{!! trans('admin/transaction.transaction_details') !!}</li>
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
                            <div class="col-md-2">{!! trans('admin/transaction.user_name') !!}</div>
                            <div class="col-md-10">{!! $transaction->user->firstname.' '.$transaction->user->lastname !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.user_email') !!}</div>
                            <div class="col-md-10">{!! $transaction->user->email !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.user_photo') !!}</div>
                            <div class="col-md-10">
                                <?php $img = $transaction->user->image!="" ? USER_IMAGE_ROOT.$transaction->user->image: USER_IMAGE_ROOT.'default.png';?>
                                <img src="{!! $img !!}" width="100">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.transaction_id') !!}</div>
                            <div class="col-md-10">{!! $transaction->trans_id !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.payment_method') !!}</div>
                            <div class="col-md-10">{!! $transaction->payment_method !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.credit') !!}</div>
                            <div class="col-md-10">{!! $transaction->credit !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.amount') !!}</div>
                            <div class="col-md-10">{!! $transaction->amount.' '.$transaction->currency !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">{!! trans('admin/transaction.transaction_status') !!}</div>
                            <div class="col-md-10">
                                @if($transaction->status == 'success')
                                <button class="btn btn-success">{!! trans('admin/transaction.success') !!}</button>
                                @else
                                {!! $transaction->status !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! url(ADMIN_SLUG.'/transaction') !!}" class="btn btn-primary">{!! trans('admin/common.back') !!}</a>
                    </div>
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop