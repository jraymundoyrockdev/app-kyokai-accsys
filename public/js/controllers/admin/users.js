var adminSettingUsers = angular.module(
    'AdminUsers',
    ['commons', 'UserRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingUsers
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

adminSettingUsers.controller(
    'AdminUsersCtrl',
    function ($scope, toastBoxMsg, ValidatorErrorService, UserService) {
        
        $scope.userChecked = [];
        $scope.users = {};
        $scope.userModel = {};
        $scope.validationError = [];

        $scope.getAll = function () {

            UserService.getAll().then(
                (res) => {
                    $scope.users = res.data.Users;

                    angular.forEach($scope.users, function (value, key) {
                        $scope.userChecked.push(value.id + ':' + value.status);
                    });
                },
                handleErrors
            )
        };

        $scope.isActive = function (state) {
            return (state == 'active') ? true : false;
        };

        $scope.changeUserState = function (userId, state) {

            UserService.changeState(userId, state).then(
                (res) => {
                    toastBoxMsg.popUp('success', res.data, res.status, 'User state changed');
                },
                handleErrors
            )
        };

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminUsers']);