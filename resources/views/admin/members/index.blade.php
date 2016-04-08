@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Members'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminMembers">
        <div class="row" ng-controller="AdminMembersCtrl" ng-init="getAll()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Members List</h5>
                        <a class="btn btn-primary btn-xs pull-right" ng-href="/admin/members/create">
                            Create New Member
                        </a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Apellation</th>
                                <th>Address</th>
                                <th class="table100 text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr ng-repeat="member in members">
                                <td><%member.fullname%></td>
                                <td><%member.apellation%></td>
                                <td><%member.address%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/members/<%member.id%>/edit">Edit</a>
                                </td>
                            </tr>

                            <tr ng-hide="members.length">
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
    {!! Html::script('js/services/admin/MemberService.js') !!}
    {!! Html::script('js/controllers/admin/members.js') !!}
@endsection
