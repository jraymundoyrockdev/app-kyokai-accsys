var incomeService = angular.module(
    'incomeServiceTotals',
    ['commons', 'IncomeServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

incomeService.controller(
    'IncomeServiceTotalsCtrl',
    function ($scope, $http, KyokaiHelpers, toastBoxMsg, ValidatorErrorService, IncomeServiceService) {

        $scope.monthsTotal = {};

        $scope.init = function (year) {
            IncomeServiceService.getIncomeServicesTotals(year).then(
                (res) => {
                    $scope.monthsTotal = res.data;
                },
                handleErrors
            );
        };

        $scope.getPercentage = function (transactionAmount, total) {
            return parseFloat((transactionAmount / total) * 100).toFixed(2);
        };

        $scope.getMonthName = function (month) {
            return KyokaiHelpers.mapMonths(month);
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['incomeServiceTotals']);