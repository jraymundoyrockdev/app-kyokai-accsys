angular.module('LoginRepository', []).service('LoginService', ['$http', function ($http) {

    this.login = function (loginCredentials){
        return $http.post(BASE + 'api-token-auth', loginCredentials);
    }

}]);
