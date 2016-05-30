var adminSettingMinistries = angular.module(
    'AdminMinistries',
    ['commons', 'MinistryRepository', 'angular-jwt', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingMinistries
    .config(function Config($httpProvider, JWTServiceRepository) {
        /*$httpProvider.interceptors.push('$location', function ($location) {
            return {
                'request': function (config) {

                    config.headers = config.headers || {};

                    var jwt = localStorage.getItem('userJWT');

                    config.headers.Authorization = 'Bearer ' + jwt;

                    //JWTService.authenticateUserJWT();

                    return config;
                },
                'responseError': function (response) {
                    if (response.status === 401 || response.status === 403) {
                        $location.path('/signin');
                    }
                }
            };

        });*/
    });

adminSettingMinistries.controller(
    'AdminMinistriesCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, MinistryService) {

        $scope.ministries = {};
        $scope.ministryModel = {};
        $scope.validationError = [];

        $scope.getAll = function () {
            MinistryService.getAll().then(
                (res) => {
                    $scope.ministries = res.data.Ministries;
                },
                handleErrors
            )
        };

        $scope.getOne = function (id) {
            MinistryService.getById(id).then(
                (res) => {
                    $scope.ministryModel = res.data.Ministry.shift();
                },
                handleErrors
            )
        };

        $scope.store = function () {
            MinistryService.insert($scope.ministryModel).then(
                returnToIndex,
                handleErrors
            );
        };

        $scope.update = function (id) {
            MinistryService.update(id, $scope.ministryModel).then(
                returnToIndex,
                handleErrors
            );
        };

        function returnToIndex() {
            window.location.href = '/admin/ministry';
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminMinistries']);