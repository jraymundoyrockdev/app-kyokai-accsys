var incomeService = angular.module('incomeServiceMonthList', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('incomeServiceMonthListCtrl', function ($scope, $http, $filter, KyokaiHelpers) {

    $scope.services = {};
    $scope.token = '';

    $scope.init = function (token, year, month) {

        $scope.token = token;

        $scope.getAllIncomeServices(year, month);
    };

    $scope.getAllIncomeServices = function (year, month) {

        $http({
            method: 'GET',
            url: BASE + 'income-services/list/' + year + '/' + month,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            $scope.services = data.IncomeServiceLists;
        }).error(function (data, status) {
        })
    };

});