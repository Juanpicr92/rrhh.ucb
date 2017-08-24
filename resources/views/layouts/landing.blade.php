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
    <link href="libraries/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="libraries/slick/slick-theme.css" rel="stylesheet" type="text/css">
    <link href="css/trackpad-scroll-emulator.css" rel="stylesheet" type="text/css">
    <link href="css/chartist.min.css" rel="stylesheet" type="text/css">
    <link href="css/jquery.raty.css" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/nouislider.min.css" rel="stylesheet" type="text/css">
    <link href="css/explorer-orange.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/libs/utils/html5shiv.js?1403934957"></script>
    <script type="text/javascript" src="js/libs/utils/respond.min.js?1403934956"></script>
    <![endif]-->

</head>
<body class="">
<div class="page-wrapper">
    <div class="header-wrapper">
        <div class="header">
            <div class="container">
                <div class="header-inner">
                    <div class="navigation-toggle toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- /.header-toggle -->
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="img/logo.svg" class="svg" alt="Home">
                        </a>
                        <a href="{{ route('home') }}" class="header-title">MIGAS</a>
                    </div>
                    <div class="header-actions">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="btn btn-block btn-raised btn-primary" href="{{ route('register') }}"><i class="fa fa-plus"></i> <span>Regístrate</span></a>
                            </li>
                            <li class="nav-item" style="margin-left: 10px">
                                <a class="btn btn-block btn-raised btn-primary" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <span>Login</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.header-actions -->
                </div>
                <!-- /.header-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.header -->
    </div>
    <!-- /.header-wrapper -->
    @yield('content')
    <!-- /.map-wrapper -->
</div>
<!-- /.page-wrapper -->


<!-- BEGIN JAVASCRIPT -->
<script src="//maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&key=AIzaSyDM1H06rZM41q8mey3xVqGrZ932DXktKT0" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/chartist.min.js"></script>
<script type="text/javascript" src="js/google-map-richmarker.min.js"></script>
<script type="text/javascript" src="js/google-map-infobox.min.js"></script>
<script type="text/javascript" src="js/google-map-markerclusterer.js"></script>
<script type="text/javascript" src="js/google-map.js"></script>
<script type="text/javascript" src="js/jquery.trackpad-scroll-emulator.min.js"></script>
<script type="text/javascript" src="js/jquery.inlinesvg.min.js"></script>
<script type="text/javascript" src="js/jquery.affix.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="libraries/slick/slick.min.js"></script>
<script type="text/javascript" src="js/nouislider.min.js"></script>
<script type="text/javascript" src="js/jquery.raty.js"></script>
<script type="text/javascript" src="js/wNumb.js"></script>
<script type="text/javascript" src="js/particles.min.js"></script>
<script type="text/javascript" src="js/explorer.js"></script>
<script type="text/javascript" src="js/explorer-map-search.js"></script>
<!-- END JAVASCRIPT -->

</body>
</html>