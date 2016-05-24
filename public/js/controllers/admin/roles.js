var adminSettingsRoles = angular.module(
    'AdminRoles',
    ['commons', 'RoleRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

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