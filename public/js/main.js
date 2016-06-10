var kyokaiNavigation = angular.module('kyokaiNavigation', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

kyokaiNavigation.controller('kyokaiNavigationCtrl', function ($scope, $http) {

    $scope.moduleList = {};
    $scope.userLoggedIn = '';

    $scope.setNavigation = function () {
        setNavigationModules();
        setUserLoggedIn();
    };

    function setNavigationModules() {
        var modules = JSON.parse(localStorage.getItem('modules'));
        var moduleList = [];

        for (var prop in modules) {
            moduleList.push(modules[prop]);
        }

        $scope.moduleList = modules;
    }

    function setUserLoggedIn() {
        $scope.userLoggedIn = localStorage.getItem('username');
    }
});

kyokaiNavigation.filter('isEmpty', [function () {
    return function (object) {
        return angular.equals({}, object);
    }
}]);


var kyokaiHeader = angular.module('kyokaiHeader', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

kyokaiHeader.controller('kyokaiHeaderCtrl', function ($scope, $http) {
    $scope.isKyokaiAccountant = false;

    $scope.setHeader = function () {
        $scope.isKyokaiAccountant = (localStorage.getItem('isKyokaiAccountant') == 'true');
    }
});

angular.bootstrap(document.getElementById("headerModule"), ['kyokaiHeader']);