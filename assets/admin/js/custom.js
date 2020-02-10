$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
        cache: false	//use for i.e browser to clean cache
    });
    $(setInterval(function () {
        //refresh notification count for each user
        $('#online-list-notification').load(location.href + " #user-list-notification");
        $('#online-list-notification').prop({scrollTop: $('#online-list-notification').prop('scrollHeight')})

        $.ajax({
            type: "POST",
            url: "/admin/chatboard/notificationCount",
            dataType: 'json',
            cache: false,
            data: {
               
            },
            success: function (data) {
                if(data){
                    $('#total-count').show();
                    $('#total-count').html(data);
                }else{
                    $('#total-count').hide();
                }
            }
        });
        
        //refresh online user list
        $('#online-list').load(location.href + " #user-list");
        
        //refresh message box
        $('#msg-box').load(location.href + " #message-list", function () {
            $('#message-list').prop({scrollTop: $('#message-list').prop('scrollHeight')}) //if the messages overflowed this line tells the textarea to focus the latest message
        });
        
    }, 2000));
});