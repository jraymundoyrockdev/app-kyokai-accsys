var incomeService = angular.module('incomeServiceTotals', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('IncomeServiceTotalsCtrl', function ($scope, $http, KyokaiHelpers) {

    $scope.monthsTotal = {};
    $scope.token = localStorage.getItem('userJWT');

    $scope.init = function (yearToday) {
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

    $scope.getMonthName = function (month) {
        return KyokaiHelpers.mapMonths(month);
    }

});