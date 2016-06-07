angular.module('IncomeServiceRepository', []).service('IncomeServiceService', ['$http', function ($http) {

    this.getAllIncomeServices = function (year, month) {
        return $http.get(BASE + 'income-services/list/' + year + '/' + month);
    };

    this.getIncomeServicesTotals = function (year) {
        return $http.get(BASE + 'income-services/total/' + year);
    };

    this.createIncomeService = function (incomeService) {
        return $http.post(BASE + 'income-services', incomeService);
    };

    this.getIncomeService = function (incomeServiceId) {
        return $http.get(BASE + 'income-services/' + incomeServiceId);
    };

    this.saveIncomeService = function (incomeServiceId, memberId, incomeService) {
        return $http.post(BASE + 'income-services/' + incomeServiceId + '/member-fund/' + memberId + '/update', incomeService)
    };

    this.removeMember = function (incomeServiceId, memberId) {
        return $http.delete(BASE + 'income-services/' + incomeServiceId + '/member-fund/' + memberId);
    };

    this.saveDenomination = function (incomeServiceId, denomination) {
        return $http.post(BASE + 'income-services/' + incomeServiceId + '/denomination', denomination)
    };
}]);
