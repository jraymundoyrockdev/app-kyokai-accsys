angular.module('JWTServiceRepository', ['angular-jwt']).service('JWTService', ['$http', 'jwtHelper', function ($http, jwtHelper) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.authenticateUserJWT = function () {
        if (jwtHelper.isTokenExpired(localStorage.getItem('userJWT'))) {

            return $http.post(BASE + 'api-token-refresh').then(
                (res) => {
                    localStorage.setItem('userJWT', res.data.token);
                    return localStorage.getItem('userJWT');
                }
            );
        } else {
            return localStorage.getItem('userJWT');
        }
    }
}]);
