var incomeService = angular.module(
    'incomeServiceMonthList',
    ['commons', 'IncomeServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

incomeService.controller(
    'incomeServiceMonthListCtrl', 
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, IncomeServiceService) {

        $scope.services = {};

        $scope.init = function (year, month) {
            IncomeServiceService.getAllIncomeServices(year, month).then(
                (res) => {
                    $scope.services = res.data.IncomeServiceLists;
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

angular.bootstrap(document.getElementById("mainModule"), ['incomeServiceMonthList']);