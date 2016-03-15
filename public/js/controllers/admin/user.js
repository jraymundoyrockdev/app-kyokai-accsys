$(document).ready(function () {
    $(".user-switch").on('switchChange.bootstrapSwitch', function (event, state) {

        var userId = $(this).attr('id');
        var state = (state) ? 'active' : 'inactive';

        $.ajax({
            url: 'http://api-gfccm-systems.com/api/users/' + userId,
            beforeSend: function (request) {
                request.setRequestHeader('Authorization', 'Bearer ' + userToken);
                request.setRequestHeader('Accept', 'application/json');
            },
            data: {'status': state},
            type: 'PUT',
            success: function (data) {
            },
            error: function () {
            }
        });

    });
});