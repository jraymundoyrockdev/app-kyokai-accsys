@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs',['title' => 'Denominations'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Denomination</h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['route' => 'admin.denominations.store','class' => 'form-horizontal']) !!}
                        <div class="form-group">

                            <label class="col-sm-2 control-label {!! !session('amount') ?: 'error' !!}">Amount</label>

                            <div class="col-sm-5">
                                <input type="text" name="amount" id="amount"
                                       class="form-control {!! !session('amount') ?: 'error' !!}"
                                       value="{!! session('amountError') !!}">
                                <label id="-error" class="error" for="">{!! session('amount') !!}</label>
                            </div>

                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-5">{!! Form::textarea('description', '', ['class' => 'form-control']) !!}</div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! link_to_route('admin.denominations.index', 'Cancel', [], ['class' => 'btn btn-white'])!!}
                                {!! Form::submit('Save',['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection