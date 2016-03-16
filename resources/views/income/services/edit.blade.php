@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs',['title' => 'Income'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight editIncomeService" ng-app="incomeService">
        <div ng-controller="IncomeServiceCtrl" ng-init="init()">

            @include('income.services.edit-partials.members-typehead-template')

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
                                        <div class="col-lg-3">

                                            {!! Form::open(['class' => 'form-horizontal', 'id' => 'fundStructureForm']) !!}

                                            <h5 class="font-bold text-muted">Search Member</h5>

                                            <div class="form-group ">
                                                <div class="col-md-12">
                                                    <input type="text"
                                                           autocomplete="off"
                                                           name="selectedMember"
                                                           ng-model="selectedMember"
                                                           placeholder="Name"
                                                           typeahead="c as c.fullname_with_apellation for c in members.Members | filter:$viewValue | limitTo:10"
                                                           typeahead-min-length='1'
                                                           typeahead-on-select='onSelectPart($item, $model, $label)'
                                                           typeahead-template-url="membersTypeheadTemplate.html"
                                                           class="form-control">

                                                    <label id="selectedMember-error" class="error hide-me">
                                                        Member does not exists.</label>
                                                </div>
                                            </div>

                                            <hr>

                                            @include('income.services.edit-partials.fund-structures')

                                            <div class="form-group text-right">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-default input-sm" type="button"
                                                            ng-click="clearFields()"><i
                                                                class="fa fa-refresh"></i>&nbsp;Reset
                                                    </button>
                                                    <button class="btn btn-success input-sm" type="submit"><i
                                                                class="fa fa-plus"></i>&nbsp;Add to List
                                                    </button>

                                                    <button class="btn btn-success input-sm hide-me" type="button"
                                                            ng-click="addMemberToList()" id="addMemberToListBtn">
                                                        <i class="fa fa-plus"></i>&nbsp;Add to List2
                                                    </button>
                                                </div>
                                            </div>

                                            {!! Form::close() !!}

                                        </div>

                                        <div class="col-lg-9">
                                            <div class="scroll_content" style="overflow-y: scroll;">
                                                <div class="table-responsive">
                                                    @include('income.services.edit-partials.members')
                                                </div>
                                            </div>
                                            <div class="slimScrollBar slimScrollBarModified"></div>
                                            <div class="slimScrollRail slimScrollRailModified"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    @include('income.services.edit-partials.denominations')
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
    <script type="text/javascript">
        var incomeServiceId = parseInt({!!$id!!});
    </script>
    {!! Html::script('js/controllers/service/income-edit.js') !!}
@endsection