var adminSettingFundItems = angular.module(
    'AdminFundItems',
    ['commons', 'FundRepository', 'FundItemRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingFundItems
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

adminSettingFundItems.controller(
    'AdminItemFundsCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, FundItemService) {

        $scope.fundItems = {};
        $scope.fundModel = {};
        $scope.fundItemModel = {};
        $scope.validationError = [];

        $scope.getFundItemsByFundId = function (fundId) {
            FundItemService.getByFundId(fundId).then(
                (res) => {
                    console.log(res.data.FundItems);
                    $scope.fundItemModel = res.data.FundItems;
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
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminFundItems']);