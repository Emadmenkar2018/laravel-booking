@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('admin/chat.chat_history') !!}
@stop
{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{!! trans('admin/chat.chat_history') !!}</h1>
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
            <?php if ($user): ?>
                <div class="col-md-12">
                    <!-- DIRECT CHAT -->
                    <div class="box box-warning direct-chat direct-chat-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">{!! $user->firstname .' '. $user->lastname !!} <span class="online-status"><img src="/assets/admin/img/online.png"></span></h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" id="">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages" id="">
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
                    </div><!--/.direct-chat -->
                </div><!-- /.col -->
            <?php endif; ?>
        </div><!-- /.row (main row) -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop