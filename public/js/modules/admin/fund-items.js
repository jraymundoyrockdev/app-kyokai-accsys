$(document).ready(function () {

    $(".fund-item-switch").on('switchChange.bootstrapSwitch', function (event, state) {

        var itemId = $(this).attr('id');
        var state = (state) ? 'active' : 'inactive';

        $.ajax({
            url: 'http://api-gfccm-systems.com/api/fund-items/' + itemId,
            beforeSend: function (request) {
                request.setRequestHeader('Authorization', 'Bearer ' + userToken);
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