@extends('layouts.login')
@section('main-body')
    {!! Form::open(['route' => 'login']) !!}
        <div class="form-group">
            {!! Session::get('errorMessage') !!}
        {!! Form::text('username', '', ['class' => 'form-control','placeholder' => 'Username', 'id' => 'login-username']) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Password', 'id' => 'login-password']) !!}
        </div>
        {!! Form::submit('Login', ['class' => 'btn btn-primary block full-width m-b','id' => 'losgin']) !!}
    {!! Form::close() !!}
@endsection