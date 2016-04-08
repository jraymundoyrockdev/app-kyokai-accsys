@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Members'])@endsection
@section('main-body')
    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminMembers">
        <div class="row" ng-controller="AdminMembersCtrl" ng-init="getAllMinistry()">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Member</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal" ng-submit="store()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Apellation</label>
                                <div class="col-sm-5">
                                    <input type="text" id="apellation" name="apellation"
                                           class="form-control <%validationError['apellation'] ? 'error' : ''%>"
                                           ng-model="memberModel.apellation">
                                    <label class="error" for="apellation"
                                           ng-show="validationError['apellation']"><%validationError['apellation']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">First Name</label>
                                <div class="col-sm-5">
                                    <input type="text" id="firstname" name="firstname"
                                           class="form-control <%validationError['firstname'] ? 'error' : ''%>"
                                           ng-model="memberModel.firstname">
                                    <label class="error" for="firstname"
                                           ng-show="validationError['firstname']"><%validationError['firstname']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Last Name</label>
                                <div class="col-sm-5">
                                    <input type="text" id="lastname" name="lastname"
                                           class="form-control <%validationError['lastname'] ? 'error' : ''%>"
                                           ng-model="memberModel.lastname">
                                    <label class="error" for="lastname"
                                           ng-show="validationError['lastname']"><%validationError['lastname']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Middle Name</label>
                                <div class="col-sm-5">
                                    <input type="text" id="middlename" name="middlename"
                                           class="form-control <%validationError['middlename'] ? 'error' : ''%>"
                                           ng-model="memberModel.middlename">
                                    <label class="error" for="middlename"
                                           ng-show="validationError['middlename']"><%validationError['middlename']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Address</label>
                                <div class="col-sm-5">
                                    <textarea id="address" name="address"
                                              class="form-control <%validationError['address'] ? 'error' : ''%>"
                                              ng-model="memberModel.address">
                                    </textarea>
                                    <label class="error" for="address"
                                           ng-show="validationError['address']"><%validationError['address']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Phone Mobile</label>
                                <div class="col-sm-5">
                                    <input type="text" id="phone_mobile" name="phone_mobile"
                                           class="form-control <%validationError['phone_mobile'] ? 'error' : ''%>"
                                           ng-model="memberModel.phone_mobile">
                                    <label class="error" for="phone_mobile"
                                           ng-show="validationError['phone_mobile']"><%validationError['phone_mobile']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" id="email" name="email"
                                           class="form-control <%validationError['email'] ? 'error' : ''%>"
                                           ng-model="memberModel.email">
                                    <label class="error" for="email"
                                           ng-show="validationError['email']"><%validationError['email']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Ministry</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="ministry_id" id="ministry_id">
                                        <option ng-repeat="ministry in ministries">
                                            <%ministry.name%>
                                        </option>
                                    </select>
                                    <label class="error" for="email"
                                           ng-show="validationError['ministry_id']"><%validationError['ministry_id']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white" ng-href="/admin/members">Cancel</a>
                                    <input type="submit"
                                           class="btn btn-primary"
                                           value="Save">
                                </div>
                            </div>

                        </form>
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
