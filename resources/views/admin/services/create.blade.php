@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Services'])@endsection
@section('main-body')

    <div ng-app="AdminServices">
        <div class="wrapper wrapper-content animated fadeInRight" ng-controller="AdminServicesCtrl" ng-init="init()">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Create New Service</h5>
                        </div>
                        <div class="ibox-content">

                            <form class="form-horizontal" ng-submit="store()">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="name">Name</label>
                                    <div class="col-sm-5">
                                        <input type="text" id="name" name="name"
                                               class="form-control <%validationError['name'] ? 'error' : ''%>"
                                               ng-model="serviceModel.name">
                                        <label class="error" for="service_id"
                                               ng-show="validationError['name']"><%validationError['name']%></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="start_time">Start Time</label>

                                    <div class="col-sm-5">
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" name="start_time"
                                                   class="form-control <%validationError['start_time'] ? 'error' : ''%>"
                                                   ng-model="serviceModel.start_time" ng-readonly="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        </div>
                                        <label class="error" for="start_time"
                                               ng-show="validationError['start_time']"><%validationError['start_time']%></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="end_time">End Time</label>

                                    <div class="col-sm-5">
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" name="end_time"
                                                   class="form-control <%validationError['end_time'] ? 'error' : ''%>"
                                                   ng-model="serviceModel.end_time" ng-readonly="true">
                                        <span class="input-group-addon">
                                            <span class="fa fa-clock-o"></span>
                                        </span>
                                        </div>
                                        <label class="error" for="end_time"
                                               ng-show="validationError['end_time']"><%validationError['end_time']%></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="description">Description</label>

                                    <div class="col-sm-5">
                                    <textarea rows="3" cols="30" name="description"
                                              class="form-control <%validationError['description'] ? 'error' : ''%>"
                                              ng-model="serviceModel.description"></textarea>
                                        <label class="error" for="description"
                                               ng-show="validationError['description']"><%validationError['description']%></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <a class="btn btn-white" ng-href="/admin/services">Cancel</a>
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
    </div>
@endsection

@section('module-scripts')
    {!! Html::script('js/services/admin/ServiceService.js') !!}
    {!! Html::script('js/controllers/admin/services.js') !!}
@endsection
