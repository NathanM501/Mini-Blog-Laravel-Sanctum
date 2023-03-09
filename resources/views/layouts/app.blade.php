<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style @guest
    customizer-hide
@endguest @auth
layout-menu-fixed
@endauth " dir="ltr" data-theme="theme-default">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="author" content="MANGUITHRE501">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @guest
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
    @endguest


    <script src="{{ asset('vendor/js/helpers.js') }}" defer></script>

    <script src="{{ asset('js/config.js') }}" defer></script>
</head>

<body>
    <div id="app">
        @auth
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @auth
                @include('Partials.Sidebar')
                @endauth
                <div class="layout-page">
                    <!-- Navbar -->
                    @auth
                    @include('Partials.Header')
                    @endauth
                    <!-- END: Header-->

                    <div class="content-wrapper">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
        @endauth


        @guest
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest

    </div>

    <script src="{{ asset('vendor/libs/jquery/jquery.js')}}" defer></script>
    <script src="{{ asset('vendor/libs/popper/popper.js')}}" defer></script>
    <script src="{{ asset('vendor/js/bootstrap.js')}}" defer></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}" defer></script>
    <script src="{{ asset('vendor/js/menu.js')}}" defer></script>

    <script src="{{ asset('js/main.js')}}" defer></script>

</body>

</html>