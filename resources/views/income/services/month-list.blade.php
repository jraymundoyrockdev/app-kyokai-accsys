@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content">
        <div class="row animated fadeInRight">
            <div class="col-lg-12">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Services List</h5>
                    </div>

                    <div class="ibox-content inspinia-timeline">

                        <?php for($i=0;$i<=6;$i++):?>
                        <div class="timeline-item">
                            <div class="row">
                                <div class="col-xs-3 date">
                                    <p class="m-b-xs"><strong> Feb 17</strong></p>
                                    <i class="fa fa-file-text"></i>
                                    <small class="text-navy">Sunday</small>
                                    <br>
                                    <small class="text-navy">7:00 AM</small>
                                </div>
                                <div class="col-xs-7 content">
                                    <p class="m-b-xs"><strong>YROCK Service</strong></p>
                                    <ul class="list-group clear-list m-t">
                                        <li class="list-group-item fist-item">
                                <span class="pull-right">
                                    15,000
                                </span>
                                            <span class="label label-success">1</span>Tithes
                                        </li>
                                        <li class="list-group-item">
                                <span class="pull-right">
                                    10:16 am
                                </span>
                                            <span class="label label-info">2</span> Offering
                                        </li>
                                        <li class="list-group-item">
                                <span class="pull-right">
                                    08:22 pm
                                </span>
                                            <span class="label label-primary">3</span> Other Funds
                                        </li>
                                        <li class="list-group-item">
                                <span class="pull-right">
                                    11:06 pm
                                </span>
                                            <span class="label label-default">4</span> Total
                                        </li>

                                        <li class="list-group-item">
                                            <span class="pull-right">
                                                 <input type="button" class="btn btn-sm btn-primary pull-right" value="Edit">
                                            </span>
                                        </li>

                                    </ul>

                                </div>

                            </div>
                        </div>
                        <?php endfor;?>



                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('module-scripts')

@endsection
