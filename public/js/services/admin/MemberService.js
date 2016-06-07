angular.module('MemberRepository', []).service('MemberService', ['$http', function ($http) {
    
    this.getAll = function () {
        return $http.get(BASE + 'members');
    };

    this.getById = function (id) {
        return $http.get(BASE + 'members/' + id);
    };

    this.insert = function (member) {
        return $http.post(BASE + 'members', member);
    };

    this.update = function (id, member) {
        return $http.put(BASE + 'members/' + id, member);
    }

}]);
