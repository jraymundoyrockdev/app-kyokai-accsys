@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Fund Items'])@endsection
@section('main-body')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Fund Item</h5>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open([
                            'route' => ['admin.fund-items.update', $item->id],
                            'class' => 'form-horizontal',
                            'method' => 'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label'. session('nameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('name', session('name') ?: $item->name,
                                ['class' => 'form-control '. session('nameErrorClass') ]) !!}
                                {!! Form::label('', session('nameError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-sm-2 control-label']) !!}

                            <div class="col-sm-5">
                                {!! Form::hidden('fund_id', $item->fund_id, ['class' => 'form-control' ]) !!}
                                {!! Form::text('status', 'active', ['class' => 'form-control','readonly' ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! link_to_route('admin-fund-items', 'Cancel', [$id], ['class' => 'btn btn-white'])!!}
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