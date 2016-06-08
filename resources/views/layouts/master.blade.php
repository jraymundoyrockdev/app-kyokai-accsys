<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Kyokai AccSys</title>

    {!! Html::style('css/libraries.css') !!}

    @section('module-styles')@show

</head>

<body>
<div id="wrapper">
    {!! csrf_field() !!}
    @include('layouts.partials.nav')

    <div id="page-wrapper" class="gray-bg">
        @include('layouts.partials.header')

        @section('breadcrumbs')@show

        @section('main-body')@show

        @include('layouts.partials.footer')
    </div>

    <script type="text/javascript">
        var BASE = "{!! Config::get('api-server.gfccm.local') !!}";
    </script>

    {!! Html::script('js/libraries.js') !!}
    {!! Html::script('js/services/commons.js') !!}


    <script type="text/javascript" src="https://cdn.rawgit.com/auth0/angular-jwt/master/dist/angular-jwt.js"></script>

    {!! Html::script('js/services/AuthService.js') !!}
    {!! Html::script('js/services/JWTService.js') !!}

    @section('module-scripts')@show

    {!! Html::script('js/main.js') !!}
</div>
</body>
</html>
