@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

    <div ng-app="incomeServiceMonthList">
        <div class="wrapper wrapper-content" ng-controller="incomeServiceMonthListCtrl"
             ng-init="init({!! $year !!}, {!! $month !!})">
            <div class="row">
                <div class="col-lg-12">

                    <div class="wrapper wrapper-content animated fadeInRight">

                        <div class="forum-post-info">
                            <h2 class="text-center" style="margin-top:10px">
                                <span>{!! date('F Y', strtotime($year.'-'.$month)) !!}</span>
                            </h2>
                        </div>
                        <div>&nbsp;</div>

                        <div class="faq-item" ng-repeat="service in services">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="faq-question">
                                        <% service.service_date | date : 'dd EEEE' %>
                                        <% service.service_name %>
                                    </span>
                                    <h4><% service.service_start_time %> - <% service.service_end_time %></h4>

                                    <p>
                                        <small>Reported by <strong><% service.created_by %></strong></small>
                                    </p>
                                </div>

                                <div class="col-md-2">
                                    <span class="font-bold">TITHES</span>

                                    <p><% service.tithes | number:2 %></p>
                                </div>

                                <div class="col-md-2">
                                    <span class="font-bold">OFFERING</span>

                                    <p><% service.offering | number:2 %></p>
                                </div>

                                <div class="col-md-2">
                                    <span class="font-bold">OTHER FUND</span>

                                    <p><% service.other_fund | number:2 %></p>
                                </div>

                                <div class="col-md-2">
                                    <span class="font-bold">TOTAL</span>

                                    <p><% service.total | number:2 %></p>
                                </div>

                                <div class="col-md-12">
                                    <a class="btn btn-xs btn-success"
                                       href="#"><i class="fa fa-info"></i> Service Info</a>

                                    <a class="btn btn-xs btn-primary"
                                       href="/income-services/<%service.id%>/edit"><i class="fa fa-pencil"></i> Edit</a>

                                    <a class="btn btn-xs btn-danger pull-right"
                                       href="#"><i class="fa fa-trash-o"></i> Delete</a>
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
    {!! Html::script('js/modules/service/income-month-list.js') !!}
@endsection
