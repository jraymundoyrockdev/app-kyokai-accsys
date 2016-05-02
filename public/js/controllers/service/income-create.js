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
        }).error(function (data, statusCode) {
            toastBoxMsg.popUp('error', data, statusCode);
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
        }).error(function (data, statusCode) {

            if (status == 422) {
                $scope.validationError = ValidatorErrorService.mapErrors(data.errors);
            }

            toastBoxMsg.popUp('error', data, statusCode);
        })
    };

    $scope.setDate = function () {

        angular.element('.form_datetime').datepicker({
            keyboardNavigation: false,
            autoclose: true,
            format: 'yyyy-mm-dd',
            clearBtn: true,
            endDate: "0d"
        });
    };

});