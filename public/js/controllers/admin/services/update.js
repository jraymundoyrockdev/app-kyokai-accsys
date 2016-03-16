var incomeService = angular.module('adminServicesUpdate', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('adminServicesUpdateCtrl', function ($scope, $http, ValidatorErrorService) {

    $scope.token = '';
    $scope.id = 0;
    $scope.serviceModel = {};

    $scope.init = function (token, id) {

        $scope.token = token;
        $scope.id = id;

        $scope.setUpClockPicker();
        $scope.show(id);
    };

    $scope.save = function () {

        $http({
            method: 'PUT',
            url: BASE + 'services/' + $scope.id,
            data: $scope.serviceModel,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            window.location.href = '/admin/services';
        }).error(function (data, status) {

            if (status == 422) {
                $scope.validationError = ValidatorErrorService.mapErrors(data.errors);

                toastr.error('Validation Error', 'Aww something went wrong :(');
            }
        });
    };

    $scope.show = function () {

        $http({
            method: 'GET',
            url: BASE + 'services/' + $scope.id,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            console.log(data.Service[0]);
            $scope.serviceModel = data.Service.shift();
        }).error(function (data, status) {
        });
    };

    $scope.setUpClockPicker = function () {
        angular.element('.clockpicker').clockpicker();
    }

});