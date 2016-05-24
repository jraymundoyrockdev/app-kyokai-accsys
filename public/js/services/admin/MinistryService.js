angular.module('MinistryRepository', []).service('MinistryService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAll = function () {
        return $http.get(BASE + 'ministry');
    };

    this.getById = function (id) {
        return $http.get(BASE + 'ministry/' + id);
    };

    this.insert = function (ministry) {
        return $http.post(BASE + 'ministry', ministry);
    };

    this.update = function (id, ministry) {
        return $http.put(BASE + 'ministry/' + id, ministry);
    }

}]);
