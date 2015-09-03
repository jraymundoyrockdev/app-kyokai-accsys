<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" content="{{ Session::token() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Kyokai Accsys</title>

    <link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/font-awesome/font-awesome.css"/>

    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.tableTools.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/animate/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/css/inspinia.css"/>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>


</head>

<body>
<div id="wrapper">

    {!! csrf_field() !!}

    @include('layouts.partials.nav')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.partials.header')
        @include('layouts.partials.breadcrumbs')

        @section('main-body')
      
        @show

        @include('layouts.partials.footer')

        @yield('breadcrumbs')
    </div>

</div>

<script src="/js/vendor/jquery/jquery-2.1.4.min.js"></script>
<script src="/js/vendor/bootstrap/bootstrap.js"></script>
<script src="/js/vendor/metis/metisMenu.min.js"></script>
<script src="/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/vendor/dataTables/jquery.dataTables.js"></script>
<script src="/js/vendor/dataTables/dataTables.bootstrap.js"></script>
<script src="/js/vendor/dataTables/dataTables.responsive.js"></script>
<script src="/js/vendor/dataTables/dataTables.tableTools.min.js"></script>

<script src="/js/vendor/cookie/js.cookie.js"></script>

<script src="/js/inspinia.js"></script>
<script src="/js/vendor/pace/pace.min.js"></script>

<script src="/js/main.js"></script>

</body>
</html>