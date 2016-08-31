angular.module('FundItemRepository', []).service('FundItemService', ['$http', function ($http) {

    this.getByFundId = function (fundId) {
        return $http.get(BASE + 'fund/' + fundId + '/items');
    };

    this.insert = function (fundItem) {
        return $http.post(BASE + 'fund-items', fundItem);
    };

    this.update = function (id,  fundItem) {
        return $http.put(BASE + 'fund-items' + '/' + id, fundItem);
    };

}]);
