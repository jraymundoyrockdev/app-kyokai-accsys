<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>Kyokai Accsys</title>

    <link rel="stylesheet" type="text/css" href="/css/vendor/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/font-awesome/font-awesome.css"/>

    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.responsive.css"/>
    <link rel="stylesheet" type="text/css" href="/css/vendor/dataTables/dataTables.tableTools.min.css"/>

    <link rel="stylesheet" type="text/css" href="/css/vendor/animate/animate.css"/>
    <link rel="stylesheet" type="text/css" href="/css/inspinia.css"/>


</head>

<body>
<div id="wrapper">

    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    @include('layouts.partials.nav')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.partials.header')

        @section('main-body')
            <div class="col-lg-6">
                default page
            </div>
        @show

        @include('layouts.partials.footer')
    </div>

</div>

<script src="js/vendor/jquery/jquery-2.1.4.min.js"></script>
<script src="js/vendor/bootstrap/bootstrap.js"></script>
<script src="js/vendor/metis/metisMenu.min.js"></script>
<script src="js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/vendor/dataTables/jquery.dataTables.js"></script>
<script src="js/vendor/dataTables/dataTables.bootstrap.js"></script>
<script src="js/vendor/dataTables/dataTables.responsive.js"></script>
<script src="js/vendor/dataTables/dataTables.tableTools.min.js"></script>

<script src="js/inspinia.js"></script>
<script src="js/vendor/pace/pace.min.js"></script>

</body>
</html>