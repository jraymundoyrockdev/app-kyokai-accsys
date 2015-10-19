@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Services'])@endsection
@section('main-body')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update Service</h5>
                    </div>
                    <div class="ibox-content">

                        {!! Form::open([
                            'route' => ['admin.services.update', $service->id],
                            'class' => 'form-horizontal',
                            'method' => 'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-2 control-label'. session('nameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('name', session('name') ?: $service->name,
                                ['class' => 'form-control '. session('nameErrorClass') ]) !!}
                                {!! Form::label('', session('nameError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label'. session('descriptionErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::textarea('description', session('description') ?: $service->description, ['class' => 'form-control'. session('descriptionErrorClass')]) !!}
                                {!! Form::label('', session('descriptionError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! link_to_route('admin.services.index', 'Cancel', [], ['class' => 'btn btn-white'])!!}
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