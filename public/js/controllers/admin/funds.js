var adminSettingFunds = angular.module(
    'AdminFunds',
    ['commons', 'FundRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingFunds.controller(
    'AdminFundsCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, FundService) {

        $scope.funds = {};
        $scope.fundModel = {category: 'service'};
        $scope.validationError = [];

        $scope.getAll = function () {
            FundService.getAll().then(
                (res) => {
                    $scope.funds = res.data.Funds;
                },
                handleErrors
            )
        };

        $scope.getOne = function (id) {
            FundService.getById(id).then(
                (res) => {
                    $scope.fundModel = res.data.Fund.shift();
                },
                handleErrors
            )
        };

        $scope.store = function () {
            FundService.insert($scope.fundModel).then(
                returnToIndex,
                handleErrors
            );
        };

        $scope.update = function (id) {
            FundService.update(id, $scope.fundModel).then(
                returnToIndex,
                handleErrors
            );
        };

        function returnToIndex() {
            window.location.href = '/admin/funds';
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminFunds']);