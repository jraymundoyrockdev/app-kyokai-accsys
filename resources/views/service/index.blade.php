@extends('layouts.master')

@section('main-body')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true">Income</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Denomination</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                 <div class="row">
                                    
                                    <div class="col-sm-12">
                                        <div class="widget lazur-bg no-padding">
                                            <div class="row text-center">
                                                 <div class="col-xs-4">
                                                    <h2 class="font-bold">26'C</h2>
                                                    <small> Total Offering </small>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h2 class="font-bold">26'C</h2>
                                                    <small> Total Tithes </small>
                                                </div>
                                                <div class="col-xs-4">
                                                    <h2 class="font-bold">26'C</h2>
                                                    <small> Total Income </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Name']) !!}
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="row">
                                    <div class="col-lg-3 b-r">
                                        <h5 class="font-bold text-muted">General/Operational Fund</h5>
                                        {!! Form::open(['class' => 'form-horizontal']) !!}

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('tithes', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Tithes']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('offerings', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Offerings']) !!}
                                            </div>
                                        </div>

                                        <h5 class="font-bold text-muted">Special&nbsp;Fund</h5>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('mission', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Mission']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('building', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Building']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('scholarship', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Scholarship']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('ministry', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Choose ministry']) !!}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::text('equipping', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Equipping/Training']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                {!! Form::textarea('others', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Others', 'rows'=>'2']) !!}
                                            </div>
                                        </div>
                                        <h5 class="font-bold text-muted">Pastor's&nbsp;Fund</h5>
                                        <div class="form-group">

                                            <div class="col-md-12">
                                                {!! Form::text('pastor_fund', null, ['class' => 'form-control text-right input-sm', 'placeholder' => "Pastor's Fund"]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <div class="col-sm-12">
                                                <button class="btn btn-default input-sm" type="button"><i
                                                            class="fa fa-refresh"></i>&nbsp;Reset
                                                </button>
                                                <button class="btn btn-success input-sm" type="button"><i
                                                            class="fa fa-plus"></i>&nbsp;Add to List
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}
                                
                                    <div class="col-lg-9">
                                        <div class="scroll_content" style="overflow-y: scroll;">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Tithes</th>
                                                        <th>Offering</th>
                                                        <th>Special Fund</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php for($i = 0;$i < 40;$i++) :?>
                                                    <tr>
                                                        <td><a data-toggle="tab" href="#contact-1" class="client-link">Anthony Jackson</a>
                                                        </td>
                                                        <td> Tellus Institute</td>
                                                        <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                        <td> gravida@rbisit.com</td>
                                                        <td class="client-status"><span class="label label-primary">Active</span></td>
                                                    </tr>
                                                    <?php endfor; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="slimScrollBar"
                                             style="width: 7px; position: absolute; top: 52px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 129.032258064516px; background: rgb(0, 0, 0);"></div>
                                        <div class="slimScrollRail"
                                             style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">10</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('tens', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Tens']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">20</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('twentys', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Twentys']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">50</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('fiftys', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Fiftys']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">100</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('on_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'One Hundreds']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">200</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('two_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Two Hundreds']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">500</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('five_hundreds', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'Five Hundreds']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">1000</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('one_thousands', null, ['class' => 'form-control text-right input-sm', 'placeholder' => 'One Thousands']) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection