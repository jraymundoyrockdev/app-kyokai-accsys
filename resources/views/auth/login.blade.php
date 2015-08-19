@extends('layouts.login')
@section('main-body')
    {!! Form::open(['route' => 'login']) !!}
        <div class="form-group">
        {!! Form::text('username', '', ['class' => 'form-control','placeholder' => 'Username']) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Password']) !!}
        </div>
        {!! Form::submit('Login', ['class' => 'btn btn-primary block full-width m-b']) !!}
    {!! Form::close() !!}
@endsection