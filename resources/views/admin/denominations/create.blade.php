@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Denominations'])@endsection
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

                            {!! Form::label('amount', 'Amount', ['class' => 'col-sm-2 control-label'. session('amountErrorClass')]) !!}

                            <div class="col-sm-5">
                                {!! Form::text('amount', session('amount'),
                                ['class' => 'form-control '. session('amountErrorClass') ]) !!}
                                {!! Form::label('', session('amountError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label'. session('descriptionErrorClass')]) !!}

                            <div class="col-sm-5">
                                {!! Form::textarea('description', session('description'), ['class' => 'form-control'. session('descriptionErrorClass')]) !!}
                                {!! Form::label('', session('descriptionError'), ['class' => 'error']) !!}
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