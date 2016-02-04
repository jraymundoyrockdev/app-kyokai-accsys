var incomeService = angular.module('incomeServiceTotals', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('IncomeServiceTotalsCtrl', function ($scope, $http) {

    $scope.monthsTotal = {};
    $scope.token = '';

    $scope.init = function (token, yearToday) {

        $scope.token = token;

        $scope.getIncomeServicesTotals(yearToday);
    };

    $scope.getIncomeServicesTotals = function (yearToday) {

        $http({
            method: 'GET',
            url: BASE + 'income-services/total/' + yearToday,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            $scope.monthsTotal = data;
        }).error(function (data, status) {
        })
    };

    $scope.getPercentage = function (transactionAmount, total) {
        return parseFloat((transactionAmount / total) * 100).toFixed(2);
    };
});