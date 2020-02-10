@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/transaction.transactions_list') !!}
@stop

{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/transaction.transactions_list') !!}</h1>
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
                    <div class="box-body table-responsive">
                        <div class="row no-gutters mrgn_10b">
                            <div class="col-md-8">
                                {!! Form::open(array('route' => ADMIN_SLUG.'.transaction.search', 'id' => 'transaction-search-form', 'class' => 'form-inline','method' => 'POST')) !!}
                                <div class="form-group">
                                    {!! Form::label('search', trans('admin/common.search')) !!}
                                    {!! Form::select('search_by',array(''=>trans('admin/common.search_by'), 'user' => trans('admin/transaction.user_name'), 'trans_id' => trans('admin/transaction.transaction_id'), 'transaction_date' => trans('admin/transaction.transaction_date')), session('SEARCH.SEARCH_BY') , array('class'=>'form-control', 'id' => 'search_by')) !!}
                                </div>
                                <div class="form-group">
                                <?php if (session('SEARCH.SEARCH_BY') == 'user' || session('SEARCH.SEARCH_BY') == 'transaction_date'): ?>
                                    {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control', 'style' => 'display:none;')) !!}
                                <?php else: ?>
                                    {!! Form::text('search_txt', session('SEARCH.SEARCH_TXT') ,array('id' => 'search_txt', 'class' => 'form-control','placeholder'=>trans('admin/common.search'))) !!}
                                <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if (session('SEARCH.SEARCH_BY') == 'user'): ?>
                                        {!! Form::select('user_id',$userList, session('SEARCH.USER_ID') , array('class'=>'form-control', 'id' => 'user_id', 'style' => 'display:inline-block;')) !!}
                                    <?php else: ?>
                                        {!! Form::select('user_id',$userList, session('SEARCH.USER_ID') , array('class'=>'form-control', 'id' => 'user_id', 'style' => 'display:none;')) !!}
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <?php if(session('SEARCH.SEARCH_BY')=='transaction_date'):?>
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
                                    {!! Form::submit(trans('admin/common.search'), array('id' => 'search', 'name' => '', 'class' => 'btn btn-info')) !!}
                                    {!! Form::button(trans('admin/common.reset'),array('type'=>'submit','id' => 'reset', 'name' => 'reset', 'value' => '1', 'class' => 'btn btn-defult')) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-4">
                                <a href="{!! url(ADMIN_SLUG.'/transaction/export') !!}" class="btn btn-sm btn-info pull-right">{!! trans('admin/transaction.export_csv') !!}</a>
                            </div>
                        </div>
                        <table id="transaction_list" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{!! trans('admin/transaction.transaction_id') !!}</th>
                                    <th>{!! trans('admin/transaction.user_name') !!}</th>
                                    <th>{!! trans('admin/transaction.payment_method') !!}</th>
                                    <th>{!! trans('admin/transaction.credit') !!}</th>
                                    <th>{!! trans('admin/transaction.amount') !!}</th>
                                    <th>{!! trans('admin/transaction.transaction_date') !!}</th>
                                    <th width="12%">{!! trans('admin/common.status') !!}</th>
                                    <th width="5%">{!! trans('admin/common.action') !!}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($transactions))
                                @foreach ($transactions as $data)
                                    <tr>
                                        <td>{!! $data->trans_id !!}</td>
                                        <td>{!! $data->user->firstname.' '.$data->user->lastname !!}</td>
                                        <td>{!! $data->payment_method !!}</td>
                                        <td>{!! $data->credit !!}</td>
                                        <td>{!! $data->amount .' '. $data->currency !!}</td>
                                        <td>{!! date('d-m-Y h:i:s A',strtotime($data->created_at)) !!}</td>
                                        <td>
                                            @if($data->status == 'success')
                                            <a class="btn btn-success" title="{!! trans('admin/transaction.success_transaction') !!}" data-toggle="tooltip">{!! trans('admin/transaction.success') !!}</a>
                                            @else
                                            {!! $data->status !!}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/{!! ADMIN_SLUG !!}/transaction/{!! $data->id !!}" id="{!! $data->id !!}" class="btn btn-primary view-btn" title="{!! trans('admin/common.view') !!}" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        {!! trans('admin/transaction.no_transactions_found') !!}
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div> <!-- /. box body -->
                    <div class="box-footer clearfix">
                        <div class="col-md-12 text-center pagination pagination-sm no-margin">
                            @if($transactions)
                                {!! $transactions->render() !!} 
                            @endif
                        </div>
                        <div class="col-md-12 text-center">
                            <a class="btn">{!! trans('admin/common.total') !!} {!! $transactions->total() !!} </a>
                        </div>
                  </div><!-- /. box-footer -->
                </div> <!-- /.box -->
            </div> <!-- /.col-xs-12 -->
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $("#transaction_list").on('click', '.delete-btn', function() {
            var $btn = $(this);
            var id = $(this).attr('id');
            var r = confirm("{!! trans('admin/common.delete_confirmation') !!}");
            if (!r) {
                return false
            }
            $.ajax({
                type: "POST",
                url: "/{!! ADMIN_SLUG !!}/transaction/" + id,
                data: {
                    _method: 'DELETE',
                    _token: "{!! csrf_token() !!}"
                },
                dataType: 'json',
                beforeSend: function() {
                    $btn.attr('disabled', true);
                    $('.alert .msg-content').html('');
                    $('.alert').hide();
                },
                success: function(resp) {
                    window.location.href = window.location.href;
                },
                error: function(e) {
                    alert('Error: ' + e);
                }
            });
        });
        
        $('#search_by').change(function () {
            if ($('#search_by').val() == 'user') {
                $("#user_id").show();
                $("#search_txt").hide();
                $(".search_date").hide();
            } else if ($('#search_by').val() == 'transaction_date') {
                $("#user_id").hide();
                $("#search_txt").hide();
                $(".search_date").show();
            } else {
                $("#user_id").hide();
                $("#search_txt").show();
                $(".search_date").hide();
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