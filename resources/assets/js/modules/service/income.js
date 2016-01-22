$(document).ready(function () {
    $('.form_datetime').datetimepicker({
        showMeridian: 1,
        format: "yyyy-mm-dd hh:ii",
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0
    });
});