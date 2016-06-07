angular.module('UserRepository', []).service('UserService', ['$http', function ($http) {

    this.getAll = function () {
        return $http.get(BASE + 'users');
    };

    this.changeState = function (userId, status) {
        var state = (status) ? 'active' : 'inactive';

        return $http.put(BASE + 'users/' + userId, {id: userId, status: state});
    };
}]);
