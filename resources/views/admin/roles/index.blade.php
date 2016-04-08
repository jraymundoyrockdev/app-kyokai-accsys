@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'User Roles'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminRoles">
        <div class="row" ng-controller="AdminRolesCtrl" ng-init="getRoles()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>User Roles</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="role in roles">
                                <td><%role.name%></td>
                                <td><%role.name%></td>
                            </tr>
                            <tr ng-hide="roles.length">
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
    {!! Html::script('js/services/admin/RoleService.js') !!}
    {!! Html::script('js/controllers/admin/roles.js') !!}
@endsection
