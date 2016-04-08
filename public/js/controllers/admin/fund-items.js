var adminSettingFundItems = angular.module(
    'AdminFundItems',
    ['commons', 'fundRepository', 'fundItemRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

adminSettingFundItems.controller(
    'AdminItemFundsCtrl',
    function ($scope,
              $http,
              toastBoxMsg,
              ValidatorErrorService,
              FundService,
              FundItemService) {

        $scope.fundItems = {};
        $scope.fundModel = {};
        $scope.fundItemModel = {};
        $scope.validationError = [];

        $scope.getFund = function (id) {
            FundService.getById(id).then(
                (res) => {
                    $scope.fundModel = res.data.Fund.shift();
                },
                handleErrors
            )
        };

        $scope.setUpCreateForm = function (id) {
            $scope.fundItemModel.fund_id = id;
            $scope.fundItemModel.status = 'active';
        };

        $scope.getOne = function (id) {
            FundItemService.getById(id).then(
                (res) => {
                    $scope.fundItemModel = res.data.FundItem.shift();
                },
                handleErrors
            )
        };
        $scope.store = function () {
            FundItemService.insert($scope.fundItemModel).then(
                () => {
                    window.location.href = '/admin/funds/' + $scope.fundItemModel.fund_id + '/items';
                },
                handleErrors
            );
        };

        $scope.update = function (id) {
            FundItemService.update(id, $scope.fundItemModel).then(
                () => {
                    window.location.href = '/admin/funds/' + $scope.fundItemModel.fund_id + '/items';
                },
                handleErrors
            );
        };

        function handleErrors(res) {
            if (res.status == 422) {
                $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            }

            toastBoxMsg.popUp('error', res.data, res.status);
        }
    });