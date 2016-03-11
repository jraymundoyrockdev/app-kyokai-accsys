var incomeService = angular.module('incomeServiceMonthList', ['commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('incomeServiceMonthListCtrl', function ($scope, $http, toastBoxMsg) {

    $scope.services = {};
    $scope.token = localStorage.getItem('userJWT');

    $scope.init = function (year, month) {
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
            toastBoxMsg.popUp(status, 'error');
        })
    };

});