@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Fund Items'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminFundItems" id="mainModule">
        <div class="row" ng-controller="AdminItemFundsCtrl" ng-init="getFund({!! $id !!})">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Fund Items List - <% fundModel.name %></h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/funds/{!! $id !!}/items/create">
                            Create New Item
                        </a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th class="table100 text-center">Status</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="item in fundModel.item">
                                <td><%item.name%></td>
                                <td class="text-center"><%item.status%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/funds/<%item.fund_id%>/items/<%item.id%>/edit">Edit</a>
                                </td>
                            </tr>

                            <tr ng-hide="fundModel.item.length">
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
    {!! Html::script('js/services/admin/FundItemService.js') !!}
    {!! Html::script('js/controllers/admin/fund-items.js') !!}
@endsection
