@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/transaction.my_transactions_list') !!}
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
                        {!! trans('user/transaction.my_transactions_list') !!}
                    </div>
                    <a href="{!! url('/reservation') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/transaction.reservation') !!}</a>
                </div>
                <div class="width_full mrgn_15t">
                    <div class="col-md-12">
                        @include('frontend.includes.notifications')
                    </div>
                    <div class="col-md-8">
                        {!! Form::open(array('route' => 'transaction.search', 'id' => 'transaction-search-form', 'class' => 'form-inline','method' => 'POST')) !!}
                        <div class="form-group">
                            {!! Form::label('search', trans('user/common.search')) !!}
                            {!! Form::select('search_by',array(''=>trans('user/common.search_by'), 'trans_id' => trans('user/transaction.transaction_id'),  'transaction_date' => trans('user/transaction.transaction_date')), session('SEARCH.SEARCH_BY') , array('class'=>'form-control', 'id' => 'search_by')) !!}
                        </div>
                        <div class="form-group">
                            <?php if (session('SEARCH.SEARCH_BY') == 'transaction_date'): ?>
                                {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control', 'style' => 'display:none;')) !!}
                            <?php else: ?>
                                {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control','placeholder'=>trans('user/common.search'))) !!}
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <?php if (session('SEARCH.SEARCH_BY') == 'transaction_date'): ?>
                                <div class="input-group search_date" style="display:inline-table;">
                                    {!! Form::text('search_date',session('SEARCH.SEARCH_DATE'),['id' => 'search_date','class' => 'datepicker form-control',]) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            <?php else: ?>
                                <div class="input-group search_date" style="display:none;">
                                    {!! Form::text('search_date',session('SEARCH.SEARCH_DATE'),['id' => 'search_date','class' => 'datepicker form-control',]) !!}
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            {!! Form::submit(trans('user/common.search'), array('id' => 'search', 'name' => '', 'class' => 'btn btn-lbs')) !!}
                            {!! Form::button(trans('user/common.reset'),array('type'=>'submit','id' => 'reset', 'name' => 'reset', 'value' => '1', 'class' => 'btn btn-defult')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4">
                        <a href="{!! url('/transaction/export') !!}" class="btn btn-sm btn-lbs mrgn_5t pull-right">{!! trans('user/transaction.export_csv') !!}</a>
                    </div>
                </div>
                <div class="widget-body"> 
                    <div class="table-responsive">  
                        <table class="table table-condensed table-striped table-bordered no-margin table-custome">
                            <thead>
                                <tr class="table-head">
                                    <th>{!! trans('user/transaction.transaction_id') !!}</th>
                                    <th>{!! trans('user/transaction.payment_method') !!}</th>
                                    <th>{!! trans('user/transaction.credit') !!}</th>
                                    <th>{!! trans('user/transaction.amount') !!}</th>
                                    <th>{!! trans('user/transaction.transaction_date') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($transactions))
                                @foreach ($transactions as $data)
                                    <tr>
                                        <td>{!! $data->trans_id !!}</td>
                                        <td>{!! $data->payment_method !!}</td>
                                        <td>{!! $data->credit !!}</td>
                                        <td>{!! $data->amount .' '. $data->currency !!}</td>
                                        <td>{!! date('d-m-Y h:i:s A',strtotime($data->created_at)) !!}</td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        {!! trans('user/transaction.no_transactions_found') !!}
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
            @if($transactions)
            {!! $transactions->render() !!} 
            @endif
        </div>
        <div class="col-md-12 text-center">
            <a class="btn">{!! trans('user/common.total') !!} {!! $transactions->total() !!} </a>
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
        $('#search_by').change(function () {
            if ($('#search_by').val() == 'transaction_date') {
                $("#search_txt").hide();
                $(".search_date").show();
            } else {
                $(".search_date").hide();
                $("#search_txt").show();
            }
        });

        $(window).on('load', function () {
            $('#search_by').trigger('change');
        });

        $('.datepicker').datepicker({
            format: "dd-mm-yyyy",
            //startDate: "od",
            todayHighlight: true,
            todayBtn: true,
            autoclose: true
        }).inputmask('dd-mm-yyyy', {"placeholder": "dd-mm-yyyy", alias: "date", "clearIncomplete": true});
    });
</script>
@stop