@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Ministries'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminMinistries" id="mainModule">
        <div class="row" ng-controller="AdminMinistriesCtrl" ng-init="getAll()">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>Ministries</h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/ministry/create">
                            Create New Ministry
                        </a>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="ministry in ministries">
                                <td><%ministry.name%></td>
                                <td><%ministry.description%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs" ng-href="/admin/ministry/<%ministry.id%>/edit">Edit</a>
                                </td>
                            </tr>
                            <tr ng-hide="ministries.length">
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
    {!! Html::script('js/services/admin/MinistryService.js') !!}
    {!! Html::script('js/controllers/admin/ministries.js') !!}
@endsection
