@extends('layouts.login')
@section('main-body')
    <form ng-submit="login()" role="form">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" ng-model="loginModel.username">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" ng-model="loginModel.password">
        </div>
        <input type="submit" name="login" class="btn btn-primary block full-width m-b" value="Login">
    </form>
@endsection

@section('module-scripts')
    {!! Html::script('js/modules/login/login.js') !!}
@endsection