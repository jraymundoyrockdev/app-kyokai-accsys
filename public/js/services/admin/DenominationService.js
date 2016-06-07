angular.module('DenominationRepository', []).service('DenominationService', ['$http', function ($http) {
    
    this.getAll = function () {
        return $http.get(BASE + 'denominations');
    };

    this.getById = function (id) {
        return $http.get(BASE + 'denominations/' + id);
    };

    this.insert = function (denomination) {
        return $http.post(BASE + 'denominations', denomination);
    };

    this.update = function (id, denomination) {
        return $http.put(BASE + 'denominations/' + id, denomination);
    }

}]);
