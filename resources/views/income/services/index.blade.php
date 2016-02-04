@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight" ng-app="incomeServiceTotals">

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="m-b-md text-center">
                    <h5 class="font-bold logo-name no-margins"><?php echo date('Y');?></h5>
                </div>
            </div>
            <div class="col-lg-4">
                {!! link_to_route('income-services.create','Create New Service', [], [
                'class' => 'btn btn-primary pull-right'])!!}
            </div>
        </div>
        <div class="row">

            <div ng-controller="IncomeServiceTotalsCtrl"
                 ng-init="init('{!! Session::get("userToken")!!}',{!! date('Y') !!})">

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">

                            <div class="vertical-timeline-block" ng-repeat="months in monthsTotal">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <div class="vertical-timeline-content">

                                    <div class="col-lg-12">
                                        <h2 class="text-center"><%months.month%></h2>
                                        <hr>
                                        <ul class="stat-list">
                                            <li>
                                                <h2 class="no-margins">
                                                    <strong><%months.tithes | number:2%></strong>
                                                </h2>
                                                <span>Tithes</span>

                                                <div class="stat-percent"><%getPercentage(months.tithes, months.total) | number%>
                                                    % <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <%getPercentage(months.tithes, months.total)%>%;"
                                                         class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins"><strong><%months.offering | number:2%></strong>
                                                </h2>
                                                <span>Offering</span>

                                                <div class="stat-percent"><%getPercentage(months.offering, months.total) | number%>
                                                    % <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <%getPercentage(months.offering, months.total)%>%;"
                                                         class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins"><strong><%months.other_fund | number:2%></strong>
                                                </h2>
                                                <span>Others</span>

                                                <div class="stat-percent"><%getPercentage(months.other_fund, months.total) | number%>
                                                    % <i class="fa fa-bolt text-navy"></i></div>
                                                <div class="progress progress-mini">
                                                    <div style="width: <%getPercentage(months.other_fund, months.total)%>%;"
                                                         class="progress-bar"></div>
                                                </div>
                                            </li>
                                            <li>
                                                <h2 class="no-margins">TOTAL:
                                                    <strong><%months.total | number:2%></strong>
                                                    <a href="#" class="btn btn-sm btn-primary pull-right">More info</a>
                                                </h2>
                                            </li>
                                        </ul>
                                    </div>
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
    {!! Html::script('js/modules/service/income-totals.js') !!}
@endsection

