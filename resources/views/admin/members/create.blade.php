@extends('layouts.master')
@section('breadcrumbs')@include('layouts.partials.breadcrumbs', ['title' => 'Members'])@endsection
@section('main-body')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Member</h5>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(['route' => 'admin.members.store','class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('apellation', 'Apellation', ['class' => 'col-sm-2 control-label'. session('apellationErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('apellation', session('apellation'),
                                ['class' => 'form-control '. session('apellationErrorClass') ]) !!}
                                {!! Form::label('', session('apellationError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('firstname', 'Firstname', ['class' => 'col-sm-2 control-label'. session('firstnameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('firstname', session('firstname'),
                                ['class' => 'form-control '. session('firstnameErrorClass') ]) !!}
                                {!! Form::label('', session('firstnameError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('lastname', 'Lastname', ['class' => 'col-sm-2 control-label'. session('lastnameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('lastname', session('lastname'),
                                ['class' => 'form-control '. session('lastnameErrorClass') ]) !!}
                                {!! Form::label('', session('lastnameError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('middlename', 'Middlename', ['class' => 'col-sm-2 control-label'. session('middlenameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('middlename', session('middlename'),
                                ['class' => 'form-control '. session('middlenameErrorClass') ]) !!}
                                {!! Form::label('', session('middlenameError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class' => 'col-sm-2 control-label'. session('addressErrorClass')]) !!}

                            <div class="col-sm-5">
                                {!! Form::textarea('address', session('address'), ['class' => 'form-control'. session('addressErrorClass')]) !!}
                                {!! Form::label('', session('addressError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone_mobile', 'Phone Mobile', ['class' => 'col-sm-2 control-label'. session('middlenameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('phone_mobile', session('phone_mobile'),
                                ['class' => 'form-control '. session('phone_mobileErrorClass') ]) !!}
                                {!! Form::label('', session('phone_mobileError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label'. session('middlenameErrorClass')]) !!}
                            <div class="col-sm-5">
                                {!! Form::text('email', session('email'),
                                ['class' => 'form-control '. session('emailErrorClass') ]) !!}
                                {!! Form::label('', session('emailError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('ministry_id', 'Ministry', ['class' => 'col-sm-2 control-label'. session('ministry_idErrorClass')]) !!}
                            <div class="col-sm-5">

                                {!! Form::select('ministry_id', $ministries, null, ['class' => 'form-control '. session('ministry_idErrorClass') ]) !!}
                                {!! Form::label('', session('ministry_idError'), ['class' => 'error']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                {!! link_to_route('admin.members.index', 'Cancel', [], ['class' => 'btn btn-white'])!!}
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