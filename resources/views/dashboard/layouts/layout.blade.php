<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!------------- Start generated favicon --------->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('landing/assets/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('landing/assets/img/favicon/android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('landing/assets/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('landing/assets/img/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('landing/assets/img/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('landing/assets/img/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('landing/assets/img/favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    <!------------- End generated favicon --------->
    <title>@yield('title')</title>

    @include('dashboard.layouts.styles')
    @yield('styles')
    @stack('styles')
    <link href="{{asset('admin/assets/scss/customize.css')}}" rel="stylesheet" type="text/css"/>

</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        @include('dashboard.layouts.top-bar')
        @include('dashboard.layouts.right-side-menu')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->
            <footer class="footer text-right">
                <a href="https://www.panorama-q.com" target="_blank">Panorama Alqassim</a> © {{date('Y')}}
            </footer>
        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    @include('dashboard.layouts.scripts')
    @stack('my-js')

</body>

</html>