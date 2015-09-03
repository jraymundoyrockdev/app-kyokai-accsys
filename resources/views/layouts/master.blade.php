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

        {!! Html::script('js/libraries.js') !!}

        @section('module-validation')@show
        @section('module-scripts')@show

        <script src="/js/main.js"></script>
    </div>
</body>
</html>