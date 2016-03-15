angular.module('repositoryService', []).service('RoleService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAll = function () {
        return $http.get(BASE + 'roles');
    };

}]);
