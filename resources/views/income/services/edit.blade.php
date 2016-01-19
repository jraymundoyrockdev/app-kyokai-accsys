@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs',['title' => 'Income'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight editIncomeService" ng-app="incomeService">
        <div ng-controller="IncomeServiceCtrl">

            @include('income.services.edit-partials.members-typehead-template')

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Income</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Denomination</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!--@include('income.services.edit-partials.totals')-->
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-lg-3">

                                            {!! Form::open(['class' => 'form-horizontal', 'id' => 'fundStructureForm']) !!}


                                            <h5 class="font-bold text-muted">Search Member</h5>

                                            <div class="form-group ">


                                                <div class="col-md-12">
                                                    <input type="text"
                                                           autocomplete="off"
                                                           name="selectedMember"
                                                           ng-model="selectedMember"
                                                           placeholder="Name"
                                                           typeahead="c as c.fullname_with_apellation for c in members.Members | filter:$viewValue | limitTo:10"
                                                           typeahead-min-length='1'
                                                           typeahead-on-select='onSelectPart($item, $model, $label)'
                                                           typeahead-template-url="membersTypeheadTemplate.html"
                                                           class="form-control">

                                                    <label id="selectedMember-error" class="error"
                                                           style="display: none;">Member does not exists.</label>
                                                </div>

                                            </div>

                                            <hr>

                                            @include('income.services.edit-partials.fund-structures')

                                            <div class="form-group text-right">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-default input-sm" type="button"><i
                                                                class="fa fa-refresh"></i>&nbsp;Reset
                                                    </button>
                                                    <button class="btn btn-success input-sm" type="submit"><i
                                                                class="fa fa-plus"></i>&nbsp;Add to List
                                                    </button>

                                                    <button class="btn btn-success input-sm" type="button"
                                                            ng-click="addMemberToList()" id="addMemberToListBtn"
                                                            style="display:none;"><i
                                                                class="fa fa-plus"></i>&nbsp;Add to List2
                                                    </button>
                                                </div>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>


                                        <div class="col-lg-9">
                                            <div class="scroll_content" style="overflow-y: scroll;">
                                                <div class="table-responsive">
                                                    @include('income.services.edit-partials.members')
                                                </div>
                                            </div>
                                            <div class="slimScrollBar slimScrollBarModified"></div>
                                            <div class="slimScrollRail slimScrollRailModified"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    @include('income.services.edit-partials.denominations')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('module-scripts')

    <script type="text/javascript">

        var incomeService = angular.module('incomeService', ['ui.bootstrap'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

        incomeService.controller('IncomeServiceCtrl', function ($scope, $http) {
            $scope.incomeServiceId = parseInt({!! $id !!});
            $scope.incomeService = {};
            $scope.members = {};
            $scope.selectedMember = '';
            $scope.showMinistriesMemberFund = false;
            $scope.totalTithes = 0;
            $scope.totalOffering = 0;
            $scope.totalOtherFund = 0;
            $scope.totalFunds = 0;

            $scope.setIncomeService = function () {
                $http({
                    method: 'GET',
                    url: BASE + 'income-services/' + $scope.incomeServiceId,
                    headers: {'Authorization': 'Bearer ' + localStorage.getItem('userToken')}
                }).success(function (data, status) {

                    $scope.incomeService = data.IncomeService[0];
                    $scope.setUpValidation($scope.incomeService.funds_structure); //Set-Up validation on page load
                    $scope.setTotals($scope.incomeService);

                }).error(function (data, status) {
                    if (status == 401) {
                        alert('@todo create a 404 page')
                    }
                })
            };

            $scope.getFieldsForValidation = function (fundStructure) {

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

            $scope.getMembers = function () {
                $http({
                    method: 'GET',
                    url: BASE + 'members',
                    headers: {'Authorization': 'Bearer ' + localStorage.getItem('userToken')}
                }).success(function (data, status) {
                    $scope.members = data;
                }).error(function (data, status) {
                    alert('Failed to load! Refresh page!')
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
                    headers: {'Authorization': 'Bearer ' + localStorage.getItem('userToken')}
                }).success(function (data, status) {

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
                            angular.element('#selectedMember-error').show().text('Member does not exists.');
                        }
                    }
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
                            amount: parseFloat(item.amount),
                            created_at: '<?php echo date("Y-m-d H:i:s");?>',
                            updated_at: '<?php echo date("Y-m-d H:i:s");?>'
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
                        headers: {'Authorization': 'Bearer ' + localStorage.getItem('userToken')}
                    }).success(function (data, status) {

                        //remove member from the list
                        $scope.incomeService.member_fund_total.splice(member, 1);

                        //set Total
                        $scope.setTotals(data.fundTotal);

                        swal("Deleted!", "", "success");

                    }).error(function (data, status) {
                    });
                });
            };

            $scope.setUpValidation = function (fundStructure) {
                angular.element('#fundStructureForm').validate({

                    rules: $scope.getFieldsForValidation(fundStructure),

                    submitHandler: function (form) {
                        angular.element('#addMemberToListBtn').trigger('click');
                    }
                });
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

            $scope.setIncomeService();
            $scope.getMembers();

        });


    </script>
@endsection