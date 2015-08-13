$(function () {
    $('#datepicker').datepicker({
        autoclose: true,
        startDate: new Date()
    });
});

$(document).ready(function () {
    $('#otherService').hide();

    $("#service").change(function () {

        $('#otherService').hide();

        if (this.value == 'others')
            $('#otherService').show();
    });
});