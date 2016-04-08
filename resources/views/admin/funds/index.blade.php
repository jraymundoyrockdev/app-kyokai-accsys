@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Funds'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminFunds">
        <div class="row" ng-controller="AdminFundsCtrl" ng-init="getAll()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Funds List</h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/funds/create">
                            Create New Fund
                        </a>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="table100 text-center">Category</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr ng-repeat="fund in funds">
                                <td><%fund.name%></td>
                                <td><%fund.description%></td>
                                <td><%fund.category%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/funds/<%fund.id%>/edit">Edit</a>
                                    <a class="btn btn-warning btn-xs"
                                       ng-href="/admin/funds/<%fund.id%>/items/">Items</a>
                                </td>
                            </tr>

                            <tr ng-hide="funds.length">
                                <td colspan="2">No Data Found</td>
                            </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('module-scripts')
    {!! Html::script('js/services/admin/FundService.js') !!}
    {!! Html::script('js/controllers/admin/funds.js') !!}
@endsection
