var adminSettingsRoles = angular.module(
    'AdminRoles',
    ['commons', 'RoleRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingsRoles
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

adminSettingsRoles.controller('AdminRolesCtrl', function ($scope, $http, toastBoxMsg, RoleService) {

        $scope.roles = {};

        $scope.getRoles = function () {

            RoleService.getAll().then(
                (res) => {
                    $scope.roles = res.data.Roles;
                },
                (res) => {
                    if (res.status == 422) {
                        $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
                    }

                    toastBoxMsg.popUp('error', res.data, res.status);
                }
            );
        };

    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminRoles']);