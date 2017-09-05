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
    <script type="text/javascript" src="{{ asset('js/gmaps.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh6CkG-HEePl8SMVMAPMacGLsZyReK4Y4"></script>

    <!-- BEGIN STYLESHEETS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/theme-1/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/materialadmin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/libs/DataTables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/libs/DataTables/extensions/dataTables.colVis.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/libs/DataTables/extensions/dataTables.tableTools.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-1/libs/dropzone/dropzone-theme.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/theme-1/libs/wizard/wizard.css') }}" rel="stylesheet" type='text/css'>
    <link href="{{ asset('css/theme-1/libs/bootstrap-datepicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loading-bar.css') }}" rel="stylesheet">


    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/libs/utils/html5shiv.js?1403934957') }}"></script>
    <script src="{{ asset('js/libs/utils/respond.min.js?1403934956') }}"></script>
    <![endif]-->

    <!-- BEGIN JAVASCRIPT -->
    <script src="{{ asset('js/libs/jquery/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('js/libs/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/libs/spin.js/spin.min.js') }}"></script>
    <script src="{{ asset('js/libs/autosize/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('js/libs/nanoscroller/jquery.nanoscroller.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/core/source/App.js') }}"></script>
    <script src="{{ asset('js/core/source/AppNavigation.js') }}"></script>
    <script src="{{ asset('js/core/source/AppOffcanvas.js') }}"></script>
    <script src="{{ asset('js/core/source/AppCard.js') }}"></script>
    <script src="{{ asset('js/core/source/AppForm.js') }}"></script>
    <script src="{{ asset('js/core/source/AppNavSearch.js') }}"></script>
    <script src="{{ asset('js/core/source/AppVendor.js') }}"></script>
    <script src="{{ asset('js/core/demo/Demo.js') }}"></script>
    <script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js') }}"></script>
    <script src="{{ asset('js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
    <script src="{{ asset('js/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/loading-bar.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>





    <!-- END JAVASCRIPT -->

</head>
<body class="menubar-hoverable header-fixed menubar-pin ">
@include('components.header')
<!-- BEGIN BASE-->
<div id="base">
    <!-- BEGIN CONTENT-->
    <div id="content">
        @include('components.messages')
        @yield('content')
    </div><!--end #content-->
    <!-- END CONTENT -->
    @include('components.menubar')
</div><!--end #base-->
<!-- END BASE -->


</body>
</html>