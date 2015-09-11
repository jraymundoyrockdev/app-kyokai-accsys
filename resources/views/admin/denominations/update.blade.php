@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs',['title' => 'Denominations'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update Denomination</h5>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open([
                            'route' => ['admin.denominations.update', $denomination->id],
                            'class' => 'form-horizontal',
                            'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label class="col-sm-2 control-label {!! !session('amountError') ?: 'error' !!}">Amount</label>

                            <div class="col-sm-5">
                                <input type="text" name="amount" id="amount"
                                       class="form-control {!! session('errorClass') !!}"
                                       value="{!! session('amount') ?: $denomination->amount !!}">
                                <label id="-error" class="error" for="">{!! session('amountError') !!}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label {!! !session('descriptionError') ?: 'error' !!}">
                                Description
                            </label>

                            <div class="col-sm-5">
                                {!! Form::textarea('description', session('description') ?: $denomination->description, ['class' => 'form-control']) !!}
                            </div>
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