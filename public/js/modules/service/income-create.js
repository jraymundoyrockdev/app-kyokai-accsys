var incomeService = angular.module('incomeServiceCreate', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('incomeServiceCreateCtrl', function ($scope, $http, ValidatorErrorService, toastBoxMsg) {

    $scope.token = localStorage.getItem('userJWT');
    $scope.services = {};
    $scope.incomeServiceModel = {};
    $scope.validationError = [];

    $scope.init = function () {
        $scope.setDate();
        $scope.getServices();
    };

    $scope.getServices = function () {
        $http({
            method: 'GET',
            url: BASE + 'services',
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            $scope.services = data.Services;
        }).error(function (data, status) {
            toastBoxMsg.popUp(status, 'error');
        })
    };

    $scope.saveService = function () {

        $http({
            method: 'POST',
            url: BASE + 'income-services',
            data: $scope.incomeServiceModel,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            window.location.href = '/income-services/' + data.IncomeService.shift().id + '/edit';
        }).error(function (data, status) {

            if (status == 422) {
                $scope.validationError = ValidatorErrorService.mapErrors(data.errors);
            }

            toastBoxMsg.popUp(status, 'error');
        })
    };

    $scope.setDate = function () {

        angular.element('.form_datetime').datetimepicker({
            showMeridian: 1,
            format: "hh:ii:ss",
            weekStart: 0,
            todayBtn: 0,
            autoclose: 1,
            todayHighlight: 0,
            startView: 1,
            forceParse: 1
        });
    };

});