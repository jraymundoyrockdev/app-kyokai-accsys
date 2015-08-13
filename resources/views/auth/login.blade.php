@extends('layouts.login')
@section('main-body')
    <form class="m-t" role="form" action="index.html">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Username" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
    </form>
@endsection