angular.module('RoleRepository', []).service('RoleService', ['$http', function ($http) {
    
    this.getAll = function () {
        return $http.get(BASE + 'roles');
    };

}]);
