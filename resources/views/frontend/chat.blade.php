@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/chat.chat_now') !!}
@stop
@section('content')
<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper">
    <!-- Row starts -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header" id="client-name">
                    <div class="widget-header" id="client-name">
                        <div class="title"> {!! auth()->guard('user')->user()->firstname .' '. auth()->guard('user')->user()->lastname !!}</div>
                    </div>
                </div>
                <div class="widget-body chat-scroll" id="msg-box">
                    <ul class="messages-list clearfix mrgn_20b" id="message-list">
                        <!--<div class="refresh"></div>-->
                        <?php
                        foreach ($chatMessages as $message) {
                            $time = date("Y-m-d", strtotime($message->created_at));
                            $now = date("Y-m-d");

                            if ($time == $now) {
                                $time = date("h:i A", strtotime($message->created_at));
                            } else {
                                $time = date("d-m-Y", strtotime($message->created_at));
                            }
                            if ($message->message_type == 'in-msg') {
                                $msgType = 'out-msg';
                                $img = auth()->guard('user')->user()->image !="" ? USER_IMAGE_ROOT.auth()->guard('user')->user()->image : USER_IMAGE_ROOT.'default.png';
                            } else {
                                $msgType = 'in-msg';
                                $img = ADMIN_IMAGE_ROOT.config('settings.admin.image');
                            }
                            echo '<li class="' . $msgType . '"><img src="'. $img . '" class="chat-img-client">' . $message->message_content . ' <span class="msg-time">(' . $time . ')</span></li>';
                        }
                        ?>
                    </ul>
                </div>
                <div class="panel-footer" style="margin-top: 15px;">
                    <form onsubmit="return false" action="" class="newMessage" name="newMessage">
                        <div class="input-group" id="client-messager">
                            <input type="text" name="messages_content" id="messages_content" class="form-control input-lg" placeholder="{!! trans('user/chat.type_message') !!}"  style="height:46px !important;">
                            <span class="input-group-btn">
                                <input name="submit" value="{!! trans('user/chat.send') !!}" id="sendMessage" class="btn btn-lbs btn-lg" type="submit">
                            </span> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>
<!-- Dashboard Wrapper End -->
@stop
@section('scripts')
<script>
    //refresh chatbox
    $.ajaxSetup({
        cache: false	//use for i.e browser to clean cache
    });

    $(setInterval(function () {
        $('#msg-box').load(location.href + " #message-list", function () {
            $('#msg-box').prop({scrollTop: $('#msg-box').prop('scrollHeight')}) //if the messages overflowed this line tells the textarea to focus the latest message
        });
    }, 2000));
    //end code

    $(function () {
        $('#sendMessage').click(function () {
            var message = $('#messages_content').val();

            if (message == "") {
                return false;
            }
            $.ajax({
                type: "POST",
                url: "/chat/store",
                data: {
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