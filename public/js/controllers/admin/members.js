var adminSettingMembers = angular.module(
    'AdminMembers',
    ['commons', 'MemberRepository', 'MinistryRepository', 'JWTServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
);

adminSettingMembers
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

adminSettingMembers.controller(
    'AdminMembersCtrl',
    function ($scope, $http, toastBoxMsg, ValidatorErrorService, MemberService, MinistryService) {

        $scope.ministries = {};
        $scope.members = {};
        $scope.memberModel = {};
        $scope.validationError = [];

        $scope.getAll = function () {
            MemberService.getAll().then(
                (res) => {
                    $scope.members = res.data.Members;
                },
                handleErrors
            )
        };

        $scope.getOne = function (id) {
            MemberService.getById(id).then(
                (res) => {
                    $scope.memberModel = res.data.Member.shift();
                },
                handleErrors
            )
        };

        $scope.store = function () {
            MemberService.insert($scope.memberModel).then(
                returnToIndex,
                handleErrors
            );
        };

        $scope.update = function (id) {
            MemberService.update(id, $scope.memberModel).then(
                returnToIndex,
                handleErrors
            );
        };

        $scope.getAllMinistry = function () {
            MinistryService.getAll().then(
                (res) => {
                    $scope.ministries = res.data.Ministries;
                },
                handleErrors
            )
        };

        function returnToIndex() {
            window.location.href = '/admin/members';
        }

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }
    }
);

angular.bootstrap(document.getElementById("mainModule"), ['AdminMembers']);