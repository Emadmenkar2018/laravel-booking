$(function () {
    //hide alert message when click on remove icon
    $(".close").click(function () {
        $(this).closest('.alert').addClass('hide');
    });
            
    var myFormDiv;
    $('.modal').on('hide.bs.modal', function (e) {
        if ($(this).find("form").length) {
            $(this).find("form")[0].reset();
            $(this).find("form").validate().resetForm();
            $('.alert').addClass('hide');
            $('.alert .msg-content').html('');
        }
    });

    $('.modal').on('shown.bs.modal', function (e) {
        $('.alert').addClass('hide');
        $('.alert .msg-content').html('');
    });
    
    //registration-user
    $("#register-form-submit").click(function (e) {
        myFormDiv = $("#register-form").closest('div');
        e.preventDefault();
        if (!$(this).closest('form').valid()) {
            return false;
        }
        var formData = new FormData($("#register-form")[0]);
        //var formData = $("#register-form").serialize();

        $.ajax({
            type: "POST",
            url: "/users",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(this).attr('disabled', true);
                myFormDiv.find('.alert .msg-content').html('');
                myFormDiv.find('.alert').addClass('hide');
            },
            success: function (resp) {
                if (resp.success) {
                    $("#register-form")[0].reset();
                    $("#register-form").validate().resetForm();

                    myFormDiv.find('.alert-success .msg-content').html(resp.message);
                    myFormDiv.find('.alert-success').removeClass('hide');
                    
                    setTimeout(function () {
                        $("#register-form").closest('.modal').modal('hide');
                        $('#sign-in').modal('show');
                    }, 2000);
                    
                } else if (resp.success == false) {
                    myFormDiv.find('.alert-danger .msg-content').html(resp.message);
                    myFormDiv.find('.alert-danger').removeClass('hide');
                } else {
                    var message = 'Errors!';
                    for (var i = 0; i < resp.length; i++) {
                        message += '<li>' + resp[i] + '</li>';
                    }
                    myFormDiv.find('.alert-danger .msg-content').html(message);
                    myFormDiv.find(".msg-content li").wrapAll("<ul/>");
                    myFormDiv.find('.alert-danger').removeClass('hide');
                }
            },
            error: function (e) {
                myFormDiv.find(".alert-danger msg").html('error: ' + JSON.stringify(e));
                myFormDiv.find('.alert-danger').removeClass('hide');
            }
        });
    });

    //login
    $("#login-form-submit").click(function (e) {
        myFormDiv = $("#login-form").closest('div');
        e.preventDefault();
        if (!$(this).closest('form').valid()) {
            return false;
        }
        var formData = new FormData($("#login-form")[0]);
        //var formData = $("#login-form").serialize(),

        $.ajax({
            type: "POST",
            //url: "{!! URL::route('frontend.login') !!}",
            url: "/login",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(this).attr('disabled', true);
                myFormDiv.find('.alert .msg-content').html('');
                myFormDiv.find('.alert').addClass('hide');
            },
            success: function (resp) {
                if (resp.success) {
                    $("#login-form")[0].reset();
                    $("#login-form").validate().resetForm();

                    myFormDiv.find('.alert-success .msg-content').html(resp.message);
                    myFormDiv.find('.alert-success').removeClass('hide');

                    setTimeout(function () {
                        $("#login-form").closest('.modal').modal('hide');
                        window.location.href = '/dashboard';
                    }, 1000);

                } else if (resp.success == false && resp.warning == true) {
                    myFormDiv.find('.alert-warning .msg-content').html(resp.message);
                    myFormDiv.find('.alert-warning').removeClass('hide');
                } else {
                    myFormDiv.find('.alert-danger .msg-content').html(resp.message);
                    myFormDiv.find('.alert-danger').removeClass('hide');
                }
            },
            error: function (e) {
                myFormDiv.find(".alert-danger msg").html('error: ' + JSON.stringify(e));
                myFormDiv.find('.alert-danger').removeClass('hide');
            }
        });
    });
    //end code
    
    //forgot password
    $("#password-form-submit").click(function (e) {
        myFormDiv = $("#password-form").closest('div');
        e.preventDefault();
        if (!$(this).closest('form').valid()) {
            return false;
        }
        var formData = new FormData($("#password-form")[0]);
        //var formData = $("#password-form").serialize();

        $.ajax({
            type: "POST",
            //url: "{!! URL::route('frontend.login') !!}",
            url: "/password/email",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(this).attr('disabled', true);
                myFormDiv.find('.alert .msg-content').html('');
                myFormDiv.find('.alert').addClass('hide');
            },
            success: function (resp) {
                if (resp.success) {
                    $("#password-form")[0].reset();
                    $("#password-form").validate().resetForm();

                    myFormDiv.find('.alert-success .msg-content').html(resp.message);
                    myFormDiv.find('.alert-success').removeClass('hide');

                } else {
                    myFormDiv.find('.alert-danger .msg-content').html(resp.message);
                    myFormDiv.find('.alert-danger').removeClass('hide');
                }
            },
            error: function (e) {
                myFormDiv.find(".alert-danger msg").html('error: ' + JSON.stringify(e));
                myFormDiv.find('.alert-danger').removeClass('hide');
            }
        });
    });
    //end code
    
    //contact-form
    $("#contact-form-submit").click(function (e) {
        myFormDiv = $("#contact-form").closest('div');
        e.preventDefault();
        if (!$(this).closest('form').valid()) {
            return false;
        }
        var formData = new FormData($("#contact-form")[0]);
        //var formData = $("#contact-form").serialize(),

        $.ajax({
            type: "POST",
            url: "/contact",
            data: formData,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(this).attr('disabled', true);
                myFormDiv.find('.alert .msg-content').html('');
                myFormDiv.find('.alert').addClass('hide');
            },
            success: function (resp) {
                if (resp.success) {
                    $("#contact-form")[0].reset();
                    $("#contact-form").validate().resetForm();

                    myFormDiv.find('.alert-success .msg-content').html(resp.message);
                    myFormDiv.find('.alert-success').removeClass('hide');

                } else {
                    myFormDiv.find('.alert-danger .msg-content').html(resp.message);
                    myFormDiv.find('.alert-danger').removeClass('hide');
                }
            },
            error: function (e) {
                myFormDiv.find(".alert-danger msg").html('error: ' + JSON.stringify(e));
                myFormDiv.find('.alert-danger').removeClass('hide');
            }
        });
    });
    //end code
});