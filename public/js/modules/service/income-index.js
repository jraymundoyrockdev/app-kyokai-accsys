var incomeService = angular.module('incomeServiceTotals', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('IncomeServiceTotalsCtrl', function ($scope, $http, KyokaiHelpers, toastBoxMsg) {

    $scope.monthsTotal = {};

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    $scope.init = function (yearToday) {
        $scope.getIncomeServicesTotals(yearToday);
    };

    $scope.getIncomeServicesTotals = function (yearToday) {

        $http({
            method: 'GET', url: BASE + 'income-services/total/' + yearToday,
        }).success(function (data, statusCode) {
            $scope.monthsTotal = data;
        }).error(function (data, statusCode) {
            toastBoxMsg.popUp('error', data, statusCode);
        })
    };

    $scope.getPercentage = function (transactionAmount, total) {
        return parseFloat((transactionAmount / total) * 100).toFixed(2);
    };

    $scope.getMonthName = function (month) {
        return KyokaiHelpers.mapMonths(month);
    }

});