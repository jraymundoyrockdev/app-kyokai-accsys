var incomeService = angular.module('incomeServiceCreate', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('incomeServiceCreateCtrl', function ($scope, $http, ValidatorErrorService) {

    $scope.token = '';
    $scope.services = {};
    $scope.incomeServiceModel = {};
    $scope.validationError = [];

    $scope.init = function (token) {

        $scope.token = token;

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

                toastr.error('Validation Error', 'Aww something went wrong :(');
            }
        })
    };

    $scope.setDate = function () {

        angular.element('.form_datetime').datetimepicker({
            showMeridian: 1,
            format: "yyyy-mm-dd hh:ii",
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0
        });
    };

});