var incomeService = angular.module(
    'incomeServiceCreate',
    ['commons', 'IncomeServiceRepository', 'ServiceRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

incomeService
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

incomeService.controller(
    'incomeServiceCreateCtrl',
    function ($scope, ValidatorErrorService, toastBoxMsg, IncomeServiceService, ServiceService) {

        $scope.services = {};
        $scope.incomeServiceModel = {};
        $scope.validationError = [];

        $scope.init = function () {
            $scope.setDate();
            $scope.getServices();
        };

        $scope.getServices = function () {
            ServiceService.getAll().then(
                (res) => {
                    $scope.services = res.data.Services;
                },
                handleErrors
            );
        };

        $scope.saveService = function () {

            IncomeServiceService.createIncomeService($scope.incomeServiceModel).then(
                (res) => {
                    window.location.href = '/income-services/' + res.data.IncomeService.shift().id + '/edit';
                },
                handleErrors
            )
        };

        $scope.setDate = function () {

            angular.element('.form_datetime').datepicker({
                keyboardNavigation: false,
                autoclose: true,
                format: 'yyyy-mm-dd',
                clearBtn: true,
                endDate: "0d"
            });
        };

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }

    });

angular.bootstrap(document.getElementById("mainModule"), ['incomeServiceCreate']);