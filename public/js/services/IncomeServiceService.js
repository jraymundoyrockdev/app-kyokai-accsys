angular.module('IncomeServiceRepository', []).service('IncomeServiceService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAllIncomeServices = function (year, month) {
        return $http.get(BASE + 'income-services/list/' + year + '/' + month);
    };

    this.getIncomeServicesTotals = function (year) {
        return $http.get(BASE + 'income-services/total/' + year);
    };

    this.createIncomeService = function (incomeService) {
        return $http.post(BASE + 'income-services', incomeService);
    };
    /* this.getAllMinistriesCurrentBalance = function () {
     return $http.get(BASE + 'ministry-transactions/running-balance');
     };

     this.getMinistryCashFlow = function (id, year) {
     return $http.get(BASE + 'ministry-transactions/' + id + '/cash-flow/' + year);
     };

     this.insert = function (ministryTransactions) {
     return $http.post(BASE + 'ministry-transactions', ministryTransactions);
     }
     */
}]);
