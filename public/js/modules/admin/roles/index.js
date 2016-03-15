var adminSettingsRoles = angular.module('AdminRoles', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingsRoles.controller('AdminRolesCtrl', function ($scope, $http, toastBoxMsg) {

    $scope.roles = {};

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    $scope.getRoles = function () {
        $http.get(BASE + 'roles').then(function (result, statusCode) {
            $scope.roles = result.data.Roles;
        }, function (result, statusCode) {
            toastBoxMsg.popUp('error', result, statusCode);
        });
    };
});