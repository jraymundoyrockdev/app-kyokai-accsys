@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="m-b-md text-center">
                    <h5 class="font-bold logo-name no-margins">
                        2015
                    </h5>
                </div>
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                        data-target="#createServiceModeal">
                    <i class="fa fa-plus"></i> Create
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="ibox float-e-margins product-box">
                            <div class="ibox-title text-center">
                                <h2>January</h2>
                            </div>
                            <div class="ibox-content ibox-heading no-padding">
                                <h3>
                                    <div class="text-center text-navy">PHP 100,000</div>
                                </h3>
                            </div>
                            <div class="ibox-content inspinia-timeline">

                                <?php for($i = 0;$i < 4;$i++) : ?><!--foreach here-->

                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-2 date">
                                            <i class="font-bold">10</i>
                                        </div>
                                        <div class="col-xs-9 content ">
                                            <div class="service-content">
                                                <span class="m-b-xs">
                                                    1st
                                                    <a href="#" class="pull-right">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                    </a>
                                                    <strong class="pull-right text-info">50,000</strong>
                                                </span>
                                            </div>
                                            <div class="service-content">
                                                <span class="m-b-xs">
                                                    2nd
                                                    <a href="#" class="pull-right">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                    </a>
                                                    <strong class="pull-right text-info">50,000</strong>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endfor; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="ibox float-e-margins product-box">
                            <div class="ibox-title text-center">
                                <h2>January</h2>
                            </div>
                            <div class="ibox-content ibox-heading no-padding">
                                <h3>
                                    <div class="text-center text-navy">PHP 100,000</div>
                                </h3>
                            </div>
                            <div class="ibox-content inspinia-timeline">

                                <?php for($i = 0;$i < 4;$i++) : ?><!--foreach here-->

                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-xs-2 date">
                                            <i class="font-bold">10</i>
                                        </div>
                                        <div class="col-xs-9 content ">
                                            <div class="service-content">
                                                <span class="m-b-xs">
                                                    1st
                                                    <a href="#" class="pull-right">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                    </a>
                                                    <strong class="pull-right text-info">50,000</strong>
                                                </span>
                                            </div>
                                            <div class="service-content">
                                                <span class="m-b-xs">
                                                    2nd
                                                    <a href="#" class="pull-right">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                    </a>
                                                    <strong class="pull-right text-info">50,000</strong>
                                                </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endfor; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal inmodal fade" id="createServiceModeal" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title">Create New Service</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">

                            {!! Form::open(['class' => 'form-horizontal']) !!}

                            <div class="form-group ">
                                <label class="col-sm-2 control-label">Service</label>

                                <div class="col-sm-10">
                                    {!! Form::select('service',['first_service' => '1st Service', 'second_service' => '2nd Service', 'others' => 'Others'], null, ['class' => 'form-control', 'id' => 'service']); !!}
                                    {!! Form::text('others', null, ['class' => 'form-control', 'id' => 'otherService', 'placeholder' => 'Please type other service']); !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Date</label>

                                <div class="col-sm-10">
                                    <div class="input-group date m-b" id="datepicker">
                                        {!! Form::text('date', null, ['class' => 'form-control']) !!}<span
                                                class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('module-scripts')
    {!! Html::script('js/modules/service/service.js') !!}
@endsection

