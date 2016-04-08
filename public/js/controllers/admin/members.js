var adminSettingMembers = angular.module('AdminMembers', ['commons', 'memberRepository', 'ministryRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingMembers.controller('AdminMembersCtrl', function ($scope,
                                                             $http,
                                                             toastBoxMsg,
                                                             ValidatorErrorService,
                                                             MemberService,
                                                             MinistryService) {

    $scope.ministries = {};
    $scope.members = {};
    $scope.memberModel = {};
    $scope.validationError = [];

    $scope.getAll = function () {
        MemberService.getAll().then(
            (res) => {
                $scope.members = res.data.Members;
            },
            handleErrors)
    };

    $scope.getOne = function (id) {
        MemberService.getById(id).then(
            (res) => {
                $scope.memberModel = res.data.Member.shift();
            },
            handleErrors)
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
            handleErrors)
    };


    function returnToIndex() {
        window.location.href = '/admin/members';
    }

    function handleErrors(res) {
        if (res.status == 422) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
        }

        toastBoxMsg.popUp('error', res.data, res.status);
    }
});