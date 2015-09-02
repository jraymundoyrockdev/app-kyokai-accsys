@extends('layouts.master')

@section('main-body')

<div class="wrapper wrapper-content animated fadeInRight">
    <!-- <div class="middle-box text-center animated fadeInDown no-padding">
        <h1>2015</h1>
    </div> -->
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
                    <div class="ibox float-e-margins month-box product-box">
                        <div class="ibox-title">
                            <h5>January</h5>
                        </div>
                        <div class="ibox-content ibox-heading no-padding">
                            <h3>
                                <div class="text-center text-navy">PHP 100,000</div>
                            </h3>
                        </div>
                        <div class="ibox-content inspinia-timeline">
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-xs-2 date">
                                        <i class="font-bold">10</i>
                                    </div>

                                    <div class="col-xs-9 content no-top-border"><!--foreach here-->
                                        <div>
                                            <span class="m-b-xs">
                                                1st
                                                <a href="#"  class="pull-right">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                </a>
                                                <strong class="pull-right text-info">50,000</strong>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="m-b-xs">
                                                2nd
                                                <a href="#"  class="pull-right">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                </a>
                                                <strong class="pull-right text-info">50,000</strong>
                                            </span>
                                                
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="row">
                                    <div class="col-xs-2 date">
                                        <i class="font-bold">17</i>
                                    </div>

                                    <div class="col-xs-9 content"><!--foreach here-->
                                        <div>
                                            <span class="m-b-xs">
                                                1st
                                                <a href="#"  class="pull-right">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                </a>
                                                <strong class="pull-right text-info">50,000</strong>
                                            </span>
                                        </div>
                                        <div>
                                            <span class="m-b-xs">
                                                2nd
                                                <a href="#"  class="pull-right">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i>
                                                </a>
                                                <strong class="pull-right text-info">50,000</strong>
                                            </span>
                                                
                                        </div>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                        <div class="ibox-footer">
                            <span class="text-left">
                                <a href="#" class="btn btn-xs btn-outline btn-info">Info <i class="fa fa-long-arrow-right"></i> </a>
                            </span>
                            <span class="pull-right">
                                <a href="#" class="btn btn-xs btn-outline btn-primary">Edit <i class="fa fa-pencil"></i> </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection