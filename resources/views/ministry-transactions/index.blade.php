@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Ministry Transactions'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="MinistryTransactions">
        <div class="row" ng-controller="MinistryTransactionsCtrl" ng-init="getMinistriesCurrentBalances()">

            <div class="col-lg-4" ng-repeat="ministry in ministryCurrentBalances">
                <div class="ibox">

                    <div class="ibox-title">
                        <h5><%ministry.ministry_name%></h5>
                    </div>

                    <div class="ibox-content">

                        <div class="row m-t-sm">
                            <div class="col-sm-6 text-right">
                                <img src="http://static.wixstatic.com/media/d0f3d1_a5d7a4c5cfa846949f3b6d0923d15e24.jpg_srz_600_348_85_22_0.50_1.20_0.00_jpg_srz"
                                     class="img-responsive" alt="Responsive image" style="height: 150px;">
                            </div>

                            <div class="col-sm-6 text-right">
                                <div>&nbsp;</div>
                                <div class="font-bold"><h4>Current Balance</h4></div>
                                <h2><%ministry.running_balance | number:2%></h2>
                                <div>
                                    <a class="btn btn-info btn-xs"
                                       ng-href="/ministry-transactions/<%ministry.ministry_id%>">Details</a>
                                    &nbsp;
                                    <a class="btn btn-primary btn-xs pull-right"
                                       ng-href="/ministry-transactions/<%ministry.ministry_id%>/create">
                                        Create
                                    </a>
                                </div>
                            </div>
                        </div>

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
