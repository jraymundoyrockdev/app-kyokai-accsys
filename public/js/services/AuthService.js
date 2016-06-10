angular.module('AuthRepository', []).service('AuthService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');
    
    this.login = function (loginCredentials){
        return $http.post(BASE + 'api-token-auth', loginCredentials);
    };

    this.logout = function (){
        return $http.post(BASE + 'api-token-invalidate');
    };
}]);
