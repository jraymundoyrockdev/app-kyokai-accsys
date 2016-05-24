angular.module('ServiceRepository', []).service('ServiceService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAll = function () {
        return $http.get(BASE + 'services');
    };

    this.getById = function (id) {
        return $http.get(BASE + 'services/' + id);
    };

    this.insert = function (service) {
        return $http.post(BASE + 'services', service);
    };

    this.update = function (id, service) {
        return $http.put(BASE + 'services/' + id, service);
    }

}]);
