@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Ministry Transactions'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="MinistryTransactions">
        <div class="row" ng-controller="MinistryTransactionsCtrl" ng-init="getMinistryCashFlow({!! $id !!}, {!! date('Y') !!})">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transactions List</h5>
                        <a class="btn btn-primary btn-xs pull-right"
                           ng-href="/ministry-transactions/{!! $id !!}/create">
                            Create New
                            Transaction
                        </a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTablisizer">
                            <thead>
                            <tr>
                                <th>Description</th>
                                <th class="text-center">Transaction Date</th>
                                <th class="text-center">Cash In</th>
                                <th class="text-center">Cash Out</th>
                                <th class="text-center">Running Balance</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr ng-repeat="ministryTransaction in ministryTransactions">
                                <td><%ministryTransaction.description%></td>
                                <td class="text-center"><%ministryTransaction.transaction_date | date: 'MMM dd, yyyy'%></td>
                                <td class="text-center"><%ministryTransaction.cash_in | number:2%></td>
                                <td class="text-center"><%ministryTransaction.cash_out | number:2%></td>
                                <td class="text-center"><%ministryTransaction.running_balance | number:2%></td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs"
                                       ng-href="/admin/ministry-transactions/<%ministryTransaction.id%>/edit">Edit</a>
                                </td>
                            </tr>
                            <tr ng-hide="ministryTransactions.length">
                                <td colspan="6">No Data Found</td>
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
    {!! Html::script('js/services/MinistryTransactionService.js') !!}
    {!! Html::script('js/controllers/ministry-transactions.js') !!}
@endsection
