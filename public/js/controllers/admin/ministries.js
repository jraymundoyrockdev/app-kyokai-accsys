var adminSettingMinistries = angular.module('AdminMinistries', ['commons', 'repositoryService'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingMinistries.controller('AdminMinistriesCtrl', function ($scope,
                                                                   $http,
                                                                   toastBoxMsg,
                                                                   ValidatorErrorService,
                                                                   MinistryService) {

    $scope.ministries = {};
    $scope.ministryModel = {};
    $scope.validationError = [];

    $scope.getMinistries = function () {
        MinistryService.getAll().then(
            (res) => {
                $scope.ministries = res.data.Ministries;
            },
            handleErrors)
    };

    $scope.getMinistry = function (id) {
        MinistryService.getById(id).then(
            (res) => {
                $scope.ministryModel = res.data.Ministry.shift();
            },
            handleErrors)
    };

    $scope.store = function () {
        MinistryService.insert($scope.ministryModel).then(
            returnToIndex,
            handleErrors
        );
    };

    $scope.update = function (id) {
        MinistryService.update(id, $scope.ministryModel).then(
            returnToIndex,
            handleErrors
        );
    };

    function returnToIndex() {
        window.location.href = '/admin/ministry';
    };

    function handleErrors(result) {
        if (result.status == 422) {
            $scope.validationError = ValidatorErrorService.mapErrors(result.data.errors);
        }

        toastBoxMsg.popUp('error', result.data, result.status);
    };
});