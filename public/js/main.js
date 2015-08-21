$(document).ready(function () {


    $('#login').click(function () {

        $.post("http://api-gfccm-systems.com:8080/api/api-token-auth",
            {
                username: $('#login-username').val(),
                password: $('#login-password').val()
            }, function (data) {
                localStorage.setItem('userToken', data.token);
            }).fail(function (data) {
                console.log(data);
            });
    });


    $('#test').click(function () {

        $.ajax({
            url: 'http://kyokai.accsys.dev/api/users',
            beforeSend: function (request) {
                request.setRequestHeader('Authorization', 'Bearer ' + localStorage.getItem('userToken'));
            },
            type: 'GET',
            success: function (data) {
                console.log(data);
            },
            error: function () {

            }
        });
    });
});