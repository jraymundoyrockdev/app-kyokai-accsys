$(document).ready(function () {
    $('#login').click(function () {

        $.post("http://kyokai.accsys.dev/api/api-token-auth",
            {
                username: $('#login-username').val(),
                password: $('#login-password').val()
            }, function (data) {
                console.log(data);
            }).fail(function(data) {
                console.log(data);
            });
    });
});