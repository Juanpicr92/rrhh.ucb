<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Migas') }}</title>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- BEGIN STYLESHEETS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="css/theme-1/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/theme-1/materialadmin.css" />
    <link type="text/css" rel="stylesheet" href="css/theme-1/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/theme-1/material-design-iconic-font.min.css" />
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->

</head>
<body class="menubar-hoverable header-fixed menubar-pin body-public">

    <!-- BEGIN CONTENT-->
    <div id="content">
        @yield('content')
    </div><!--end #content-->
    <!-- END CONTENT -->
<!-- BEGIN JAVASCRIPT -->
<script src="js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="js/libs/bootstrap/bootstrap.min.js"></script>
<script src="js/libs/spin.js/spin.min.js"></script>
<script src="js/libs/autosize/jquery.autosize.min.js"></script>
<script src="js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="js/core/source/App.js"></script>
<script src="js/core/source/AppNavigation.js"></script>
<script src="js/core/source/AppOffcanvas.js"></script>
<script src="js/core/source/AppCard.js"></script>
<script src="js/core/source/AppForm.js"></script>
<script src="js/core/source/AppNavSearch.js"></script>
<script src="js/core/source/AppVendor.js"></script>
<script src="js/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->

</body>
</html>