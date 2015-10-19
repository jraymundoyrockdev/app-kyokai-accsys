@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs',['title' => 'Income'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="incomeService">
        <div ng-controller="IncomeServiceCtrl">

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
                                        <div class="col-lg-3 b-r">
                                            <div class="form-group ">
                                                <div class="input-group m-b">
                                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                </div>
                                            </div>

                                            {!! Form::open(['class' => 'form-horizontal']) !!}

                                            <div ng-repeat="fund in fundss.funds_structure">

                                                <h5 class="font-bold text-muted"><% fund.name %></h5>

                                                <div class="form-group" ng-repeat="item in fund.item">
                                                    <div class="col-md-12">
                                                        <input type="text" name="<% item.name %>"
                                                               class="form-control text-right input-sm"
                                                               placeholder="<% item.name %>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-default input-sm" type="button"><i
                                                                class="fa fa-refresh"></i>&nbsp;Reset
                                                    </button>
                                                    <button class="btn btn-success input-sm" type="button"><i
                                                                class="fa fa-plus"></i>&nbsp;Add to List
                                                    </button>
                                                </div>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>


                                        <div class="col-lg-9">
                                            <div class="scroll_content" style="overflow-y: scroll;">
                                                <div class="table-responsive">
                                                    <!-- @include('income.services.edit-partials.members')-->
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

        var incomeService = angular.module('incomeService', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });

        incomeService.controller('IncomeServiceCtrl', function ($scope, $http) {

            $scope.fundss = {};

            $scope.getFunds = function () {
                $http({
                    method: 'GET',
                    url: 'http://api-gfccm-systems.com/api/income-services/' + "{!! $id !!}",
                    headers: {'Authorization': 'Bearer ' + localStorage.getItem('userToken')}
                }).success(function (data, status) {
                    console.log(data)
                    $scope.fundss = data.IncomeService[0];
                }).error(function (data, status) {
                    alert('Failed to load! Refresh page!')
                })
            }

            $scope.getFunds();

        });


    </script>
@endsection