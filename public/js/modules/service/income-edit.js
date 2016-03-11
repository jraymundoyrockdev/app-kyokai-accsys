var incomeService = angular.module('incomeService', ['ui.bootstrap', 'commons'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

incomeService.controller('IncomeServiceCtrl', function ($scope, $http, toastBoxMsg) {
    $scope.incomeServiceId = incomeServiceId;
    $scope.incomeService = {};
    $scope.members = {};
    $scope.selectedMember = '';
    $scope.showMinistriesMemberFund = false;
    $scope.totalTithes = 0;
    $scope.totalOffering = 0;
    $scope.totalOtherFund = 0;
    $scope.totalFunds = 0;
    $scope.denominationTotal = 0;
    $scope.token = localStorage.getItem('userJWT');

    $scope.init = function () {
        $scope.setIncomeService();
        $scope.getMembers();
    };
    $scope.setIncomeService = function () {
        $http({
            method: 'GET',
            url: BASE + 'income-services/' + $scope.incomeServiceId,
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {

            $scope.incomeService = data.IncomeService[0];
            $scope.setUpMemberFundValidation($scope.incomeService.funds_structure);
            $scope.setUpDenominationValidation($scope.incomeService.denominations_structure);
            $scope.setTotals($scope.incomeService);

        }).error(function (data, status) {
            if (status == 401) {
                alert('@todo create a 404 page')
            }
        })
    };

    $scope.getMembers = function () {
        $http({
            method: 'GET',
            url: BASE + 'members',
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            $scope.members = data;
        }).error(function (data, status) {
            toastBoxMsg.popUp(status, 'error');
        })
    };

    $scope.addMemberToList = function () {
        var fundStructure = $scope.incomeService.funds_structure;
        var fundStructureInput = this.getFundStructureInput(fundStructure);
        $scope.save(fundStructureInput);
    };

    $scope.save = function (fundStructureInput) {

        $http({
            method: 'POST',
            data: fundStructureInput,
            url: BASE + 'income-services/' + $scope.incomeServiceId + '/member-fund/' + $scope.selectedMember.id + '/update',
            dataType: 'json',
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {

            toastr.success('Successfully Saved.', 'Aw yeah! :)');

            //add selected member to push payload
            data.memberFundTotal.member = $scope.selectedMember.fullname;

            //push payload to member list
            $scope.incomeService.member_fund_total.push(data.memberFundTotal);

            //set Total
            $scope.setTotals(data.fundTotal);

            //clear fields
            $scope.clearFields();

        }).error(function (data, status) {

            if (status == 422) {
                if (data.errors.hasOwnProperty('member_id')) {
                    $scope.selectedMember = '';
                    angular.element('[name=selectedMember]').addClass('error').focus();
                    angular.element('#selectedMember-error').removeClass('hide-me').show().text(data.errors.member_id[0]);
                }
            }

            toastBoxMsg.popUp(status, 'error');
        });

    };

    $scope.getFundStructureInput = function (fundStructure) {

        var memberFunds = [];
        var fund = [];

        angular.forEach(fundStructure, function (fund, key) {

            var item = [];

            angular.forEach(fund.item, function (item, key) {
                memberFunds.push({
                    income_service_id: $scope.incomeServiceId,
                    member_id: $scope.selectedMember.id,
                    fund_id: fund.id,
                    fund_item_id: item.fund_item_id,
                    amount: parseFloat(item.amount)
                });
            }, item);

        }, fund);

        return memberFunds;
    };

    $scope.clearFields = function () {

        var fund = [];

        angular.forEach($scope.incomeService.funds_structure, function (fund, key) {

            var item = [];

            angular.forEach(fund.item, function (item, key) {
                item.amount = 0;
            }, item);

        }, fund);

        $scope.selectedMember = '';
    };

    $scope.removeMember = function (member) {

        var incomeServiceId = member.income_service_id;
        var memberId = member.member_id;

        swal({
            title: "Are you sure?",
            text: "You will have to input the data again if you wish to add this person.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, remove it!",
            closeOnConfirm: false
        }, function () {

            $http({
                method: 'DELETE',
                url: BASE + 'income-services/' + incomeServiceId + '/member-fund/' + memberId,
                dataType: 'json',
                headers: {'Authorization': 'Bearer ' + $scope.token}
            }).success(function (data, status) {

                //remove member from the list
                $scope.incomeService.member_fund_total.splice($scope.incomeService.member_fund_total.indexOf(member), 1);

                //set Total
                $scope.setTotals(data.fundTotal);

                swal("Deleted!", "", "success");

            }).error(function (data, status) {
                toastBoxMsg.popUp(status, 'error');
            });
        });
    };

    $scope.setUpMemberFundValidation = function (fundStructure) {
        angular.element('#fundStructureForm').validate({

            rules: $scope.getFieldsForMemberFundValidation(fundStructure),

            submitHandler: function (form) {
                angular.element('#addMemberToListBtn').trigger('click');
            }
        });
    };

    $scope.getFieldsForMemberFundValidation = function (fundStructure) {

        var ruleSet = {selectedMember: {required: true}};
        var fund = [];

        angular.forEach(fundStructure, function (fund, key) {

            var item = [];

            angular.forEach(fund.item, function (item, key) {
                ruleSet[item.name] = {number: true};
            }, item);
        }, fund);

        return ruleSet;
    };

    $scope.setUpDenominationValidation = function (denomination) {
        angular.element('#denominationStructureForm').validate({

            rules: $scope.getDenominationFieldsForValidation(denomination),

            submitHandler: function (form) {
                angular.element('#saveDenominationBtn').trigger('click');
            }
        });
    };

    $scope.getDenominationFieldsForValidation = function (denomination) {

        var ruleSet = {};
        var item = [];

        angular.forEach(denomination, function (item, key) {
            ruleSet['denomination_' + item.id] = {number: true};
        }, item);

        return ruleSet;
    };

    $scope.setTotals = function (incomeService) {
        $scope.totalTithes = incomeService.tithes;
        $scope.totalOffering = incomeService.offering;
        $scope.totalOtherFund = incomeService.other_fund;
        $scope.totalFunds = incomeService.total;
    };

    $scope.toggleMinistriesMemberFund = function (toggleValue) {
        $scope.showMinistriesMemberFund = (!toggleValue) ? false : true;
    };

    $scope.saveDenomination = function () {

        $http({
            method: 'POST',
            data: $scope.incomeService.denominations_structure,
            url: BASE + 'income-services/' + $scope.incomeServiceId + '/denomination',
            dataType: 'json',
            headers: {'Authorization': 'Bearer ' + $scope.token}
        }).success(function (data, status) {
            toastr.success('Successfully Saved.', 'Aw yeah! :)');
        }).error(function (data, status) {
            toastBoxMsg.popUp(status, 'error');
        });
    };

    $scope.sumDenomination = function () {

        var total = 0;

        angular.forEach($scope.incomeService.denominations_structure, function (field, key) {
            total += field.total;
        });

        $scope.denominationTotal = total;
    };

    $scope.updateDenominationObject = function (key, amount, field) {

        amount = parseInt(amount);

        if (field == 'piece') {
            return $scope.incomeService.denominations_structure[key].piece = parseInt(amount);
        }

        return $scope.incomeService.denominations_structure[key].total = parseInt(amount);
    };

});