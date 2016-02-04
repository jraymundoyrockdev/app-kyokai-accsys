@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="m-b-md text-center">
                    <h5 class="font-bold logo-name no-margins">2015</h5>
                </div>
            </div>
            <div class="col-lg-4">
                {!! link_to_route('income-services.create','Create New Service', [], [
                'class' => 'btn btn-primary pull-right'])!!}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div id="vertical-timeline" class="vertical-container light-timeline center-orientation">

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="col-lg-12">
                                    <ul class="stat-list">
                                        <li>
                                            <h2 class="no-margins"><strong>110,000</strong></h2>
                                            <span>Tithes</span>

                                            <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins"><strong>85,000</strong></h2>
                                            <span>Offering</span>

                                            <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i>
                                            </div>
                                            <div class="progress progress-mini">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins"><strong>9,000</strong></h2>
                                            <span>Others</span>

                                            <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                            <div class="progress progress-mini">
                                                <div style="width: 22%;" class="progress-bar"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins">TOTAL: <strong>200,000</strong>
                                                <a href="#" class="btn btn-sm btn-primary pull-right"> More info</a>
                                            </h2>
                                        </li>
                                    </ul>
                                </div>

                                <span class="vertical-date">
                                    January <br/>
                                    <small>1 - 30</small>
                                </span>
                            </div>
                        </div>

                        <div class="vertical-timeline-block">
                            <div class="vertical-timeline-icon blue-bg">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="vertical-timeline-content">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins"><strong>110,000</strong></h2>
                                        <span>Tithes</span>

                                        <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins"><strong>85,000</strong></h2>
                                        <span>Offering</span>

                                        <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins"><strong>9,000</strong></h2>
                                        <span>Others</span>

                                        <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins">TOTAL: <strong>200,000</strong>
                                            <a href="#" class="btn btn-sm btn-primary pull-right"> More info</a></h2>
                                    </li>
                                </ul>
                                    <span class="vertical-date">
                                        Today <br/>
                                        <small>Dec 24</small>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('module-scripts')
    {!! Html::script('js/modules/service/income.js') !!}
@endsection

