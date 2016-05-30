angular.module('JWTServiceRepository', ['angular-jwt']).factory('JWTService', ['$http', 'jwtHelper', function ($http, jwtHelper) {

    //$http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    function test(){
        alert('asdf');
    }
    /*this.authenticateUserJWT = function () {

        var jwtToken = localStorage.getItem('userJWT');

        if (!jwtHelper.isTokenExpired(jwtToken)) {
            $http.post(BASE + 'api-token-refresh').then(
                (res) => {
                    localStorage.setItem('userJWT', res.token);
                }
            );
        }
    }*/

}]);
