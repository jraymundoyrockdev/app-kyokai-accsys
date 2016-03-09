var kyokaiLogin = angular.module('kyokaiLogin', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

kyokaiLogin.controller('kyokaiLoginCtrl', function ($scope, $http) {

    $scope.loginModel = {};

    $scope.login = function () {

        $http({
            method: 'POST',
            url: BASE + 'api-token-auth',
            data: $scope.loginModel,
        }).success(function (data, status) {
            localStorage.setItem('userJWT', data.token);
            window.location.href = '/income-services';
        }).error(function (data, status) {
            if (status == 401) {
                toastr.error('Unauthorized', 'Aww something went wrong :(');
            }
        })
    };
});