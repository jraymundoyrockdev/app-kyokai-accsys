@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Fund Items'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="AdminFundItems">
        <div class="row" ng-controller="AdminItemFundsCtrl" ng-init="getOne({!! $id !!})">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Fund Item</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" ng-submit="update({!! $id !!})">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Name</label>

                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name"
                                           class="form-control <%validationError['name'] ? 'error' : ''%>"
                                           ng-model="fundItemModel.name">
                                    <label class="error" for="name" ng-show="validationError['name']">
                                        <%validationError['name']%>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Status</label>

                                <div class="col-sm-5">
                                    <input type="text" id="status" name="status"
                                           class="form-control <%validationError['status'] ? 'error' : ''%>"
                                           ng-model="fundItemModel.status" readonly="readonly">

                                    <input type="hidden" id="fund_id" name="fund_id"
                                           class="form-control"
                                           ng-model="fundItemModel.fund_id">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white" ng-href="/admin/funds/<%fundItemModel.fund_id%>/items">Cancel</a>
                                    <input type="submit" class="btn btn-primary" value="Save">
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
    {!! Html::script('js/services/admin/FundService.js') !!}
    {!! Html::script('js/services/admin/FundItemService.js') !!}
    {!! Html::script('js/controllers/admin/fund-items.js') !!}
@endsection