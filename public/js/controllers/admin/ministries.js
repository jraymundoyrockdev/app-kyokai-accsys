var adminSettingMinistries = angular.module(
    'AdminMinistries',
    ['commons', 'MinistryRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

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