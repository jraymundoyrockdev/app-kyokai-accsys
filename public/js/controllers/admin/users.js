var adminSettingUsers = angular.module('AdminUsers', ['commons', 'userRepository'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

adminSettingUsers.controller('AdminUsersCtrl', function ($scope,
                                                         toastBoxMsg,
                                                         ValidatorErrorService,
                                                         UserService) {

    $scope.userChecked = {};
    $scope.users = {};
    $scope.userModel = {};
    $scope.validationError = [];

    $scope.getAll = function () {
        UserService.getAll().then(
            (res) => {
                $scope.users = res.data.Users;

            },
            handleErrors)
    };

    $scope.isActive = function (state) {
        return (state == 'active') ? true : false;
    };

    $scope.changeUserState = function (userId, state) {

        UserService.changeState(userId, state.inactive).then(
            (res) => {
                toastBoxMsg.popUp('success', res.data, res.status, 'User state changed');
            },
            handleErrors
        )
    };

    function handleErrors(res) {
        toastBoxMsg.popUp('error', res.data, res.status);
    }

})
;