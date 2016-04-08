var adminSettingServices = angular.module('AdminServices', ['commons', 'serviceRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingServices.controller('AdminServicesCtrl', function ($scope,
                                                               $http,
                                                               toastBoxMsg,
                                                               ValidatorErrorService,
                                                               ServiceService) {

    $scope.services = {};
    $scope.serviceModel = {};
    $scope.validationError = [];

    $scope.init = function () {
        angular.element('.clockpicker').clockpicker();
    };

    $scope.getAll = function () {
        ServiceService.getAll().then(
            (res) => {
                $scope.services = res.data.Services;
            },
            handleErrors)
    };

    $scope.getOne = function (id) {

        angular.element('.clockpicker').clockpicker();

        ServiceService.getById(id).then(
            (res) => {
                $scope.serviceModel = res.data.Service.shift();
            },
            handleErrors)
    };

    $scope.store = function () {
        ServiceService.insert($scope.serviceModel).then(
            returnToIndex,
            handleErrors
        );
    };

    $scope.update = function (id) {
        ServiceService.update(id, $scope.serviceModel).then(
            returnToIndex,
            handleErrors
        );
    };

    function returnToIndex() {
        window.location.href = '/admin/services';
    }

    function handleErrors(res) {
        if (res.status == 422) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
        }

        toastBoxMsg.popUp('error', res.data, res.status);
    }
});