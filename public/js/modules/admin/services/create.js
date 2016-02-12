var incomeService = angular.module('adminServicesCreate', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('adminServicesCreateCtrl', function ($scope, $http, ValidatorErrorService) {

    $scope.token = '';
    $scope.serviceModel = {};

    $scope.init = function (token) {

        $scope.token = token;

        $scope.setUpClockPicker();
    };

    $scope.save = function () {
        $http({
            method: 'POST',
            url: BASE + 'services',
            data: $scope.serviceModel,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            window.location.href = '/admin/services';
        }).error(function (data, status) {

            if (status == 422) {
                $scope.validationError = ValidatorErrorService.mapErrors(data.errors);

                toastr.error('Validation Error', 'Aww something went wrong :(');
            }
        })
    };

    $scope.setUpClockPicker = function () {
        angular.element('.clockpicker').clockpicker();
    }

});