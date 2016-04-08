var adminSettingDenominations = angular.module('AdminDenominations', ['commons', 'denominationRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingDenominations.controller('AdminDenominationsCtrl', function ($scope,
                                                                   $http,
                                                                   toastBoxMsg,
                                                                   ValidatorErrorService,
                                                                   DenominationService) {

    $scope.denominations = {};
    $scope.denominationModel = {};
    $scope.validationError = [];

    $scope.getAll = function () {
        DenominationService.getAll().then(
            (res) => {
                $scope.denominations = res.data.Denominations;
            },
            handleErrors)
    };

    $scope.getOne = function (id) {
        DenominationService.getById(id).then(
            (res) => {
                $scope.denominationModel = res.data.Denomination.shift();
            },
            handleErrors)
    };

    $scope.store = function () {
        DenominationService.insert($scope.denominationModel).then(
            returnToIndex,
            handleErrors
        );
    };

    $scope.update = function (id) {
        DenominationService.update(id, $scope.denominationModel).then(
            returnToIndex,
            handleErrors
        );
    };

    function returnToIndex() {
        window.location.href = '/admin/denominations';
    }

    function handleErrors(res) {
        if (res.status == 422) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
        }

        toastBoxMsg.popUp('error', res.data, res.status);
    }
});