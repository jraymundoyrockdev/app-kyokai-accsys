@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminServices" id="mainModule">
        <div class="row" ng-controller="AdminServicesCtrl" ng-init="getAll()">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>Services</h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/services/create">
                            Create New Service
                        </a>
                    </div>

                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="service in services">
                                <td><%service.name%></td>
                                <td><%service.description%></td>
                                <td><%service.start_time%></td>
                                <td><%service.end_time%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/services/<%service.id%>/edit">Edit</a>
                                </td>
                            </tr>

                            <tr ng-hide="services.length">
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
    {!! Html::script('js/services/admin/ServiceService.js') !!}
    {!! Html::script('js/controllers/admin/services.js') !!}
@endsection