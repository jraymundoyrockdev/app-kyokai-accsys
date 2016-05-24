@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Ministry Transactions'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="MinistryTransactions" id="mainModule">
        <div class="row" ng-controller="MinistryTransactionsCtrl" ng-init="initCreate({!! $ministryId !!})">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Transaction</h5>
                    </div>
                    <div class="ibox-content">

                        <form class="form-horizontal" ng-submit="store({!! $ministryId !!})">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="name">Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="ministry_id" id="ministry_id"
                                            ng-model="ministryTransactionModel.type">
                                        <option ng-repeat="(key, value) in transactionTypes" value="<%key%>">
                                            <%value%>
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label" for="transaction_date">Date</label>

                                <div class="input-group date form_datetime col-sm-4">
                                    <input type="text" id="transaction_date" name="transaction_date" readonly=""
                                           class="incomeServiceDateField form-control <%validationError['transaction_date'] ? 'error' : ''%>"
                                           ng-model="ministryTransactionModel.transaction_date">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label" for="amount">Amount</label>

                                <div class="col-sm-4">
                                    <input type="text" id="amount" name="amount"
                                           class="form-control <%validationError['amount'] ? 'error' : ''%>"
                                           ng-model="ministryTransactionModel.amount">
                                    <label class="error" for="amount"
                                           ng-show="validationError['amount']"><%validationError['amount']%></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="description">Description</label>
                                <div class="col-sm-4">
                                    <textarea id="description" name="description"
                                              class="form-control <%validationError['description'] ? 'error' : ''%>"
                                              ng-model="ministryTransactionModel.description">
                                    </textarea>
                                    <label class="error" for="description"
                                           ng-show="validationError['description']"><%validationError['description']%>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a class="btn btn-white" ng-href="/ministry-transactions/{!! $ministryId !!}">Cancel</a>
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
    {!! Html::script('js/services/MinistryTransactionService.js') !!}
    {!! Html::script('js/controllers/ministry-transactions.js') !!}
@endsection
