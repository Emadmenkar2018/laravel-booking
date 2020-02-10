@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/chat.online_users_list') !!}
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/chat.online_users_list') !!}</h1>
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
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-body" id="online-list">
                        <ul class="products-list product-list-in-box" id="user-list">
                            <?php foreach ($users as $data): ?>
                                <?php 
                                $img = $data->image!="" ? USER_IMAGE_ROOT.$data->image : USER_IMAGE_ROOT.'default.png';
                                $msgCount = App\Chat::where('user_id', $data->id)->where('message_read', '0')->where('message_type', 'in-msg')->count();
                                ?>
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{!! $img !!}" width="100" alt="User Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="{!! url(ADMIN_SLUG.'/chatboard/'.$data->id) !!}" class="product-title">{!! $data->firstname .' '. $data->lastname !!} 
                                            <span class="online-status"><img src="/assets/admin/img/online.png"></span>
                                            @if($msgCount)
                                            <span class="label label-danger pull-right">{!! $msgCount !!}</span>
                                            @endif
                                        </a>
                                    </div>
                                </li><!-- /.item -->
                            <?php endforeach; ?>
                        </ul>
                    </div> <!-- /. box body -->
                </div> <!-- /.box -->
            </div> <!-- /.col-sm-4 -->
            <?php if ($user): ?>
                <div class="col-md-8">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{!! $user->firstname .' '. $user->lastname !!}<span class="online-status"><img src="/assets/admin/img/online.png"></span></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="msg-box">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="message-list">
                                <?php foreach ($chatMessages as $message): ?>
                                    <?php
                                    $time = date("Y-m-d", strtotime($message->created_at));
                                    $now = date("Y-m-d");

                                    if ($time == $now) {
                                        $time = date("h:i A", strtotime($message->created_at));
                                    } else {
                                        $time = date("d-m-Y", strtotime($message->created_at));
                                    }
                                    if ($message->message_type == 'in-msg') {
                                        $name = $user->firstname . ' ' . $user->lastname;
                                        $msgType = '';
                                        $nameClass = 'pull-left';
                                        $timeClass = 'pull-right';
                                        $img = $user->image!="" ? USER_IMAGE_ROOT.$user->image : USER_IMAGE_ROOT.'default.png';
                                    } else {
                                        $name = auth()->guard('admin')->user()->firstname . ' ' . auth()->guard('admin')->user()->lastname;
                                        $msgType = 'right';
                                        $nameClass = 'pull-right';
                                        $timeClass = 'pull-left';
                                        $img = ADMIN_IMAGE_ROOT.auth()->guard('admin')->user()->image;
                                    }
                                    ?>
                                    <div class="direct-chat-msg {!! $msgType !!}">
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name {!! $nameClass !!}">{!! $name !!}</span>
                                            <span class="direct-chat-timestamp {!! $timeClass !!}">{!! $time !!}</span>
                                        </div>
                                        <img class="direct-chat-img" src="{!! $img !!}" width="100" alt="Image" />
                                        <div class="direct-chat-text">
                                            {!! $message->message_content !!}
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div><!--/.direct-chat-messages-->
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <form onsubmit="return false" action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="messages_content" id="messages_content" placeholder="{!! trans('admin/chat.type_message') !!}" class="form-control" />
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-warning btn-flat" id="sendMessage">{!! trans('admin/chat.send') !!}</button>
                                    </span>
                                </div>
                            </form>
                        </div><!-- /.box-footer-->
                    </div><!--/.direct-chat -->
                </div><!-- /.col -->
            <?php else: ?>
                <div class="col-md-8">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-primary">
                        <div class="box-body direct-chat-messages">
                            <h3 class="text-center">{!! trans('admin/chat.start_chat') !!}</h3>
                        </div><!-- /.box-body -->
                    </div><!--/.direct-chat -->
                </div><!-- /.col -->
            <?php endif; ?>
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
{{-- Scripts --}}
@section('scripts')
<script>
$(function () {
    $('#sendMessage').click(function () {
        var message = $('#messages_content').val();

        if (message == "") {
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/{!! ADMIN_SLUG !!}/chatboard/store",
            data: {
                id: '{!! request()->segment("3") !!}',
                message: message,
                _token: "{!! csrf_token() !!}"
            },
            success: function () {
                $('#messages_content').val('');
            }
        });
    });
});
</script>
@stop