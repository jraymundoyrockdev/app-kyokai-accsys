@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Ministries'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminMinistries">
        <div class="row" ng-controller="AdminMinistriesCtrl">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Ministry</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" ng-submit="store()">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name"
                                           class="form-control <%validationError['name'] ? 'error' : ''%>"
                                           ng-model="ministryModel.name">
                                    <label class="error" for="service_id"
                                           ng-show="validationError['name']"><%validationError['name']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description</label>
                                <div class="col-sm-5">
                                    <textarea id="description" name="description"
                                              class="form-control <%validationError['description'] ? 'error' : ''%>"
                                              ng-model="ministryModel.description">
                                    </textarea>
                                    <label class="error" for="description"
                                           ng-show="validationError['description']"><%validationError['description']%>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white" ng-href="/admin/ministry">Cancel</a>
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
    {!! Html::script('js/controllers/admin/ministries.js') !!}
@endsection
