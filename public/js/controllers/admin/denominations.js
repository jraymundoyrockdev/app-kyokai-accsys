var adminSettingDenominations = angular.module(
    'AdminDenominations',
    ['commons', 'DenominationRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingDenominations
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

adminSettingDenominations.controller(
    'AdminDenominationsCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, DenominationService) {

        $scope.denominations = {};
        $scope.denominationModel = {};
        $scope.validationError = [];

        $scope.getAll = function () {
            DenominationService.getAll().then(
                (res) => {
                    $scope.denominations = res.data.Denominations;
                },
                handleErrors
            )
        };

        $scope.getOne = function (id) {
            DenominationService.getById(id).then(
                (res) => {
                    $scope.denominationModel = res.data.Denomination.shift();
                },
                handleErrors
            )
        };

        $scope.store = function () {
            DenominationService.insert($scope.denominationModel).then(
                returnToIndex,
                handleErrors
            );
        };

        $scope.update = function (id) {
            DenominationService.update(id, $scope.denominationModel).then(
                returnToIndex,
                handleErrors
            );
        };

        function returnToIndex() {
            window.location.href = '/admin/denominations';
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminDenominations']);