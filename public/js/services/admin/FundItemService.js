angular.module('FundItemRepository', []).service('FundItemService', ['$http', function ($http) {

    $http.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('userJWT');

    this.getById = function (id) {
        return $http.get(BASE + 'fund-items/' + id);
    };

    this.insert = function (fundItem) {
        return $http.post(BASE + 'fund-items', fundItem);
    };

    this.update = function (id,  fundItem) {
        return $http.put(BASE + 'fund-items' + '/' + id, fundItem);
    };

}]);
