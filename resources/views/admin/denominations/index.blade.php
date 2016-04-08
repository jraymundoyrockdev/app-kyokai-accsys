@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Denominations'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminDenominations">
        <div class="row" ng-controller="AdminDenominationsCtrl" ng-init="getAll()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Denomination List</h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/denominations/create">Create New
                            Denomination</a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Description</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="denomination in denominations">
                                <td><%denomination.amount%></td>
                                <td><%denomination.description%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/denominations/<%denomination.id%>/edit">Edit</a>
                                </td>
                            </tr>
                            <tr ng-hide="denominations.length">
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
    {!! Html::script('js/services/admin/DenominationService.js') !!}
    {!! Html::script('js/controllers/admin/denominations.js') !!}
@endsection
