@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Income Services'])@endsection
@section('main-body')

@section('module-styles')
    {!! Html::style('css/vendor/bootstrap/bootstrap-datetimepicker.min.css') !!}
@endsection

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    {!! Form::open(['route' => 'income-services.store','class' => 'form-horizontal']) !!}

                    <h2 class="text-center">Create New Service Income</h2>
                    <hr/>
                    <div class="form-group">
                        {!! Form::label('service_id', 'Service', [
                        'class' => 'col-sm-4 control-label'. session('serviceErrorClass')]) !!}

                        <div class="col-sm-4">
                            {!! Form::select('service_id',$services, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        {!! Form::label('service_date', 'Date', [
                        'class' => 'col-sm-4 control-label'. session('dateErrorClass')]) !!}

                        <div class="input-group date form_datetime col-sm-4">
                            {!! Form::text('service_date', session('service_date'),
                                ['class' => 'incomeServiceDateField form-control '. session('service_dateErrorClass'), 'readonly'=>'' ]) !!}
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4">
                            {!! Form::submit('Save',['class' => 'btn btn-primary btn-lg btn-block']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('module-scripts')
    {!! Html::script('js/modules/service/income.js') !!}
@endsection
