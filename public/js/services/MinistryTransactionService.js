angular.module('ministryTransactionRepository', []).service('MinistryTransactionService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAllMinistriesCurrentBalance = function () {
        return $http.get(BASE + 'ministry-transactions/running-balance');
    };

    this.getMinistryCashFlow = function (id, year) {
        return $http.get(BASE + 'ministry-transactions/' + id + '/cash-flow/' + year);
    };

    this.insert = function (ministryTransactions) {
        return $http.post(BASE + 'ministry-transactions', ministryTransactions);
    }

}]);
