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

                        <?php for($i = 0;$i <= 6;$i++):?>
                        <div class="timeline-item">
                            <div class="row">
                                <div class="col-xs-3 date">
                                    <p class="m-b-xs"><strong> Feb 17</strong></p>
                                    <i class="fa fa-file-text"></i>
                                    <small class="text-navy">Sunday</small>
                                    <br>
                                    <small class="text-navy">7:00 AM</small>
                                </div>
                                <div class="col-xs-9 content">
                                    <div>
                                        <p class="m-b-xs"><strong>YROCK Service</strong>
                                            <a class="btn btn-primary btn-xs pull-right" href="#"><i
                                                        class="fa fa-pencil"></i> Edit </a>
                                        </p>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-3">
                                            <small class="stats-label">Pages / Visit</small>
                                            <h4>236 321.80</h4>
                                        </div>

                                        <div class="col-xs-3">
                                            <small class="stats-label">% New Visits</small>
                                            <h4>46.11%</h4>
                                        </div>
                                        <div class="col-xs-3">
                                            <small class="stats-label">Last week</small>
                                            <h4>432.021</h4>
                                        </div>
                                        <div class="col-xs-3">
                                            <small class="stats-label">Last week</small>
                                            <h4>432.021</h4>
                                        </div>

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
