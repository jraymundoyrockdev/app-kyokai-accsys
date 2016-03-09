<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>

    <title>Kyokai AccSys</title>

    {!! Html::style('css/libraries.css') !!}
</head>

<body class="gray-bg" ng-app="kyokaiLogin">

    <div class="middle-box text-center loginscreen animated fadeInDown" ng-controller="kyokaiLoginCtrl">
        <div>
            <div>
                <h1 class="logo-name">KA</h1>
            </div>
            <h3>Welcome to Kyokai AccSys</h3>

            <p>Accounting System</p>

            @section('main-body')
                <div class="col-lg-6">
                    default page
                </div>
            @show
            <p class="m-t">
                <small> 2015</small>
            </p>
        </div>
    </div>

    <script type="text/javascript">
        var BASE = "{!! Config::get('api-server.gfccm.local') !!}";
    </script>

    {!! Html::script('js/libraries.js') !!}
    {!! Html::script('js/services/commons.js') !!}

    @section('module-scripts')@show

</body>

</html>