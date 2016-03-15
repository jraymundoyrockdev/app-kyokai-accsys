var adminSettingMinistries = angular.module('AdminMinistries', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingMinistries.controller('AdminMinistriesCtrl', function ($scope, $http, toastBoxMsg, ValidatorErrorService) {

    $scope.ministries = {};
    $scope.ministryModel = {};
    $scope.validationError = [];

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    $scope.getMinistries = function () {

        $http.get(BASE + 'ministry').then(function (result) {
            $scope.ministries = result.data.Ministries;
        }, handleErrors);
    };

    $scope.getMinistry = function (id) {

        $http.get(BASE + 'ministry/' + id).then(function (result) {

            var ministry = result.data.Ministry;

            $scope.ministryModel = ministry.shift();
        }, handleErrors);
    };

    $scope.save = function () {
        $http.post(BASE + 'ministry', $scope.ministryModel).then(handleSuccess, handleErrors);
    };

    $scope.update = function (id) {
        $http.put(BASE + 'ministry/' + id, $scope.ministryModel).then(handleSuccess, handleErrors);
    };

    function handleSuccess() {
        window.location.href = '/admin/ministry';
    };

    function handleErrors(result) {
        if (result.status == 422) {
            $scope.validationError = ValidatorErrorService.mapErrors(result.data.errors);
        }

        toastBoxMsg.popUp('error', result.data, result.status);
    };
});