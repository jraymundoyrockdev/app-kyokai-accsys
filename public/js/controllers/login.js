var kyokaiLogin = angular.module(
    'kyokaiLogin',
    ['commons', 'AuthRepository', 'angular-jwt'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

kyokaiLogin.controller(
    'kyokaiLoginCtrl',
    function ($scope, $http, toastBoxMsg, AuthService, ValidatorErrorService, jwtHelper) {

        $scope.loginModel = {};

        $scope.moduleAccessMapping = {
            '2': 'member',
            '3': 'kyokai'
        };

        $scope.login = function () {
            AuthService.login($scope.loginModel).then(
                (res) => {
                    setLocalStorageData(res.data.token);
                    window.location.href = '/income-services';
                },
                handleErrors
            )
        };

        function setLocalStorageData(token) {

            var decodedJWT = jwtHelper.decodeToken(token);

            localStorage.setItem('userJWT', token);
            localStorage.setItem('username', decodedJWT.username);
            localStorage.setItem('userAvatar', decodedJWT.userAvatar);
            localStorage.setItem('modules', JSON.stringify(getModuleByUserRole(decodedJWT.userRoles)));
            localStorage.setItem('isKyokaiAccountant', isKyokaiAccountant(decodedJWT.userRoles));
        }

        function isKyokaiAccountant(userRoles) {
            return (angular.element.inArray("3", userRoles) > -1) ? true : false;
        }

        function getModuleByUserRole(userRoles) {

            var modules = {};
            var ministryTransactionRoles = ['4', '5', '6', '7', '8', '9', '10', '11', '12'];

            for (var key in userRoles) {

                if (angular.element.inArray(userRoles[key], ministryTransactionRoles) > -1) {
                    angular.extend(modules, ministryTransactions());
                }
                else {
                    angular.extend(modules, eval($scope.moduleAccessMapping[userRoles[key]])());
                }
            }

            return modules;
        }

        function kyokai() {
            return {
                'income': {
                    'name': 'Income',
                    'link': '#',
                    'icon': 'fa fa-money',
                    'child': {
                        'services': {
                            'name': 'Services',
                            'link': '/income-services'
                        }
                    }
                },
                'expense': {
                    'name': 'Expense',
                    'link': '#',
                    'icon': 'fa fa-cart-plus',
                    'child': {}
                }
            };
        }

        function ministryTransactions() {
            return {
                'ministry-transactions': {
                    'name': 'Ministry Transactions',
                    'link': '/ministry-transactions',
                    'icon': 'fa fa-fighter-jet',
                    'child': {}
                }
            }
        }

        function member() {
            return {}
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);