<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>

    <title>Kyokai AccSys</title>

    <link rel="stylesheet" type="text/css" href="/css/libraries.css"/>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
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


    <script src="/js/vendor/jquery/jquery-2.1.4.min.js"></script>
    <script src="/js/vendor/bootstrap/bootstrap.js"></script>

</body>

</html>