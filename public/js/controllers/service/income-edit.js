var incomeServiceEdit = angular.module(
    'incomeServiceEdit',
    ['ui.bootstrap', 'commons', 'MemberRepository', 'JWTServiceRepository', 'IncomeServiceRepository'],
    function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


incomeServiceEdit
    .config(function Config($httpProvider, jwtInterceptorProvider) {
        jwtInterceptorProvider.tokenGetter = ['JWTService', function (JWTService) {
            return JWTService.authenticateUserJWT();
        }];
        $httpProvider.interceptors.push('jwtInterceptor');
    });

incomeServiceEdit.controller(
    'IncomeServiceEditCtrl',
    function ($scope, toastBoxMsg, ValidatorErrorService, IncomeServiceService, MemberService) {
        $scope.incomeServiceId = null;
        $scope.incomeService = {};
        $scope.members = {};
        $scope.selectedMember = '';
        $scope.showMinistriesMemberFund = false;
        $scope.showSpecialFund = false;
        $scope.totalTithes = 0;
        $scope.totalOffering = 0;
        $scope.totalOtherFund = 0;
        $scope.totalFunds = 0;
        $scope.denominationTotal = 0;

        $scope.init = function (incomeServiceId) {
            $scope.incomeServiceId = incomeServiceId;

            setIncomeService();
            getMembers();
        };

        function setIncomeService() {
            IncomeServiceService.getIncomeService($scope.incomeServiceId).then(
                (res) => {
                    $scope.incomeService = res.data.IncomeService[0];
                    setUpMemberFundValidation($scope.incomeService.funds_structure);
                    setUpDenominationValidation($scope.incomeService.denominations_structure);
                    setTotals($scope.incomeService);
                },
                handleErrors
            );
        };

        function getMembers() {
            MemberService.getAll().then(
                (res) => {
                    $scope.members = res.data;
                },
                handleErrors
            );
        };

        $scope.addMemberToList = function () {
            var fundStructure = $scope.incomeService.funds_structure;
            var fundStructureInput = getFundStructureInput(fundStructure);

            $scope.save(fundStructureInput);
        };

        $scope.save = function (fundStructureInput) {

            IncomeServiceService.saveIncomeService(
                $scope.incomeServiceId,
                $scope.selectedMember.id,
                fundStructureInput).then(
                (res) => {
                    res.data.memberFundTotal.member = $scope.selectedMember.fullname;

                    $scope.incomeService.member_fund_total.push(res.data.memberFundTotal);

                    setTotals(res.data.fundTotal);

                    $scope.clearFields();

                    toastr.success('Successfully Saved.', 'Aw yeah! :)');
                },
                (res)=> {
                    if (res.status == 422) {
                        if (res.data.errors.hasOwnProperty('member_id')) {
                            $scope.selectedMember = '';
                            angular.element('[name=selectedMember]').addClass('error').focus();
                            angular.element('#selectedMember-error').removeClass('hide-me').show().text(res.data.errors.member_id[0]);
                        }
                    }
                    toastBoxMsg.popUp('error', res.data, res.status);
                }
            );
        };

        function getFundStructureInput(fundStructure) {

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
            swal({
                title: "Are you sure?",
                text: "You will have to input the data again if you wish to add this person.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, remove it!",
                closeOnConfirm: false
            }, function () {
                IncomeServiceService.removeMember(member.income_service_id, member.member_id).then(
                    (res) => {
                        $scope.incomeService.member_fund_total.splice(
                            $scope.incomeService.member_fund_total.indexOf(member),
                            1
                        );
                        setTotals(res.data.fundTotal);
                        swal("Deleted!", "", "success");
                    },
                    handleErrors
                );
            });
        };

        function setUpMemberFundValidation(fundStructure) {
            angular.element('#fundStructureForm').validate({

                rules: getFieldsForMemberFundValidation(fundStructure),

                submitHandler: function (form) {
                    angular.element('#addMemberToListBtn').trigger('click');
                }
            });
        };

        function getFieldsForMemberFundValidation(fundStructure) {

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

        function setTotals(incomeService) {
            $scope.totalTithes = incomeService.tithes;
            $scope.totalOffering = incomeService.offering;
            $scope.totalOtherFund = incomeService.other_fund;
            $scope.totalFunds = incomeService.total;
        };

        $scope.toggleMinistriesMemberFund = function (toggleValue) {
            $scope.showMinistriesMemberFund = (!toggleValue) ? false : true;
        };

        $scope.toggleSpecialFund = function (toggleValue) {
            $scope.showSpecialFund = (!toggleValue) ? false : true;
        };

        function setUpDenominationValidation(denomination) {
            angular.element('#denominationStructureForm').validate({

                rules: getDenominationFieldsForValidation(denomination),

                submitHandler: function (form) {
                    angular.element('#saveDenominationBtn').trigger('click');
                }
            });
        };

        function getDenominationFieldsForValidation(denomination) {

            var ruleSet = {};
            var item = [];

            angular.forEach(denomination, function (item, key) {
                ruleSet['denomination_' + item.id] = {number: true};
            }, item);

            return ruleSet;
        };

        $scope.saveDenomination = function () {
            IncomeServiceService.saveDenomination(
                $scope.incomeServiceId,
                $scope.incomeService.denominations_structure
            ).then(
                (res) => {
                    toastr.success('Successfully Saved.', 'Aw yeah! :)');
                },
                handleErrors
            );
        };

        $scope.sumDenomination = function () {

            var total = 0;

            angular.forEach($scope.incomeService.denominations_structure, function (field, key) {
                total += field.total;
            });

            $scope.denominationTotal = total;
        };

        $scope.updateDenominationObject = function (key, amount, field) {

            var amount = parseInt(amount);

            if (field == 'piece') {
                return $scope.incomeService.denominations_structure[key].piece = parseInt(amount);
            }

            return $scope.incomeService.denominations_structure[key].total = parseInt(amount);
        };

        function handleErrors(res) {
            $scope.validationError = ValidatorErrorService.mapErrors(res.data.errors);
            toastBoxMsg.popUp('error', res.data, res.status);
        }

    })
;

angular.bootstrap(document.getElementById("mainModule"), ['incomeServiceEdit']);