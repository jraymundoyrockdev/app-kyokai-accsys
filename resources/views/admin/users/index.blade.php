@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Users Account'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminUsers">
        <div class="row" ng-controller="AdminUsersCtrl" ng-init="getAll()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Users Account List</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Ministry</th>
                                <th>Account Status</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr ng-repeat="user in users">
                                <td><%user.username%></td>
                                <td><%user.member.fullname%></td>
                                <td>
                                    <span ng-repeat="role in user.user_role">
                                        <%role.name%>
                                    </span>
                                </td>
                                <td>
                                    <span ng-repeat="ministry in user.member.ministry">
                                        <%ministry.name%>
                                    </span>
                                </td>
                                <td>

                                    <div class="switch">
                                        <div class="onoffswitch">
                                            <input type="checkbox" ng-checked="isActive(user.status)"
                                                   ng-model="userChecked[user.status]"
                                                   ng-click="changeUserState(user.id, userChecked)"
                                                   class="onoffswitch-checkbox"
                                                   id="status">
                                            <label class="onoffswitch-label" for="status">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr ng-hide="users.length">
                                <td colspan="5">No Data Found</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('module-scripts')
    {!! Html::script('js/services/admin/UserService.js') !!}
    {!! Html::script('js/controllers/admin/users.js') !!}
@endsection
