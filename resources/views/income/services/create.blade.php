@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

@section('module-styles')
    {!! Html::style('css/vendor/bootstrap/bootstrap-datetimepicker.min.css') !!}
@endsection

<div class="wrapper wrapper-content animated fadeInRight" ng-app="incomeServiceCreate">
    <div ng-controller="incomeServiceCreateCtrl" ng-init="init('{!! Session::get("userToken")!!}')">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">

                        {!! Form::open(['route' => 'income-services.store','class' => 'form-horizontal']) !!}

                        <h2 class="text-center">Create New Income Service</h2>
                        <hr/>
                        <div class="form-group">
                            {!! Form::label('service_id', 'Service', [
                            'class' => 'col-sm-4 control-label']) !!}

                            <div class="col-sm-4">
                                <select name="service_id" ng-model="incomeServiceModel.service_id"
                                        class="form-control <%validationError['service_id'] ? 'error' : ''%>">
                                    <option ng-repeat="service in services"
                                            value="<%service.id%>"><%service.name%></option>
                                </select>
                                <label class="error" for="service_id"
                                       ng-show="validationError['service_id']"><%validationError['service_id']%></label>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            {!! Form::label('service_date', 'Date', [
                            'class' => 'col-sm-4 control-label']) !!}

                            <div class="input-group date form_datetime col-sm-4">
                                <input type="text" id="service_date" name="service_date" readonly=""
                                       class="incomeServiceDateField form-control <%validationError['service_date'] ? 'error' : ''%>"
                                       ng-model="incomeServiceModel.service_date">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <input type="button" ng-click="saveService()" class="btn btn-primary btn-lg btn-block"
                                       value="Save">
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('module-scripts')
    {!! Html::script('js/modules/service/income-create.js') !!}
@endsection
