angular.module('FundRepository', []).service('FundService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAll = function () {
        return $http.get(BASE + 'funds');
    };

    this.getById = function (id) {
        return $http.get(BASE + 'funds/' + id);
    };

    this.insert = function (fund) {
        return $http.post(BASE + 'funds', fund);
    };

    this.update = function (id, fund) {
        return $http.put(BASE + 'funds/' + id, fund);
    }

}]);
