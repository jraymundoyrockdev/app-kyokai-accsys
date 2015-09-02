@extends('layouts.master')

@section('main-body')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-b-md text-center">
                <h1 class="font-bold no-margins text-muted">
                    2015
                </h1>
            </div>
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
                            
                            <?php for($i=0;$i<4;$i++) : ?><!--foreach here-->

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
@endsection