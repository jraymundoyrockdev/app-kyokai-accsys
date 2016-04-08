angular.module('userRepository', []).service('UserService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getAll = function () {
        return $http.get(BASE + 'users');
    };

    this.changeState = function (userId, status) {
        var state = (status) ? 'active' : 'inactive';

        return $http.put(BASE + 'users/' + userId, {id: userId, status: state});
    };
}]);
