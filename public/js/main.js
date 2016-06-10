var kyokaiNavigation = angular.module('kyokaiNavigation', ['AuthRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

kyokaiNavigation.controller('kyokaiNavigationCtrl', function ($scope, AuthService) {

    $scope.moduleList = {};
    $scope.userLoggedIn = '';
    $scope.userAvatar = 'default-avatar.jpg';

    $scope.logOut = function () {
        AuthService.logout().then(
            (res) => {
                localStorage.setItem('username', '');
                localStorage.setItem('modules', '');
                localStorage.setItem('isKyokaiAccountant', false);

                window.location.href = '/auth/login';
            },
            () => {
                window.location.href = '/auth/login';
            }
        );
    };
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


var kyokaiHeader = angular.module('kyokaiHeader', ['AuthRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

kyokaiHeader.controller('kyokaiHeaderCtrl', function ($scope, AuthService) {
    $scope.isKyokaiAccountant = false;

    $scope.setHeader = function () {
        $scope.isKyokaiAccountant = (localStorage.getItem('isKyokaiAccountant') == 'true');
    };

    $scope.logOut = function () {
        AuthService.logout().then(
            (res) => {
                localStorage.setItem('username', '');
                localStorage.setItem('modules', '');
                localStorage.setItem('isKyokaiAccountant', false);

                window.location.href = '/auth/login';
            },
            () => {
                window.location.href = '/auth/login';
            }
        );
    };
});

angular.bootstrap(document.getElementById("headerModule"), ['kyokaiHeader']);