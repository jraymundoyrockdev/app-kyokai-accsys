var ministryTransactions = angular.module(
    'MinistryTransactions',
    ['commons', 'MinistryTransactionRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);


ministryTransactions.controller(
    'MinistryTransactionsCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, MinistryTransactionService) {

        $scope.ministryTransactionModel = {};
        $scope.validationError = [];
        $scope.ministryTransactions = {};
        $scope.ministryCurrentBalances = {};
        $scope.transactionTypes = {'cash_in': 'Cash In', 'cash_out': 'Cash Out'};

        $scope.initCreate = function (ministryId) {
            $scope.ministryTransactionModel.ministry_id = ministryId;
            $scope.ministryTransactionModel.type = 'cash_in';

            setDate();
        };

        $scope.getMinistriesCurrentBalances = function () {
            MinistryTransactionService.getAllMinistriesCurrentBalance().then(
                (res) => {
                    $scope.ministryCurrentBalances = res.data.MinistryCurrentBalances;
                },
                handleErrors
            )
        };

        $scope.getMinistryCashFlow = function (id, year) {
            MinistryTransactionService.getMinistryCashFlow(id, year).then(
                (res) => {
                    $scope.ministryTransactions = res.data.MinistryTransactions;
                },
                handleErrors
            )
        };

        $scope.store = function (ministryId) {
            MinistryTransactionService.insert($scope.ministryTransactionModel).then(
                (res) => {
                    window.location.href = '/ministry-transactions/' + ministryId;
                },
                handleErrors
            )
        };

        function setDate() {
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
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['MinistryTransactions']);