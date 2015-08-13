@extends('layouts.login')
@section('main-body')
    <form class="m-t" role="form" action="index.html">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Username" required="" id="login-username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="" id="login-password">
        </div>
        <button type="button" class="btn btn-primary block full-width m-b" id="login">Login</button>
    </form>
@endsection