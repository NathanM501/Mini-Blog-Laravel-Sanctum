<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <meta name="author" content="MANGUITHRE501">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />



    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-misc.css') }}" />

</head>

<body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h2 class="mb-2 mx-2">Page non trouvée :(</h2>
            <p class="mb-4 mx-2">Oops! 😖 L'URL demandée n'a pas été trouvée sur ce serveur.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Retour au page d'accueil</a>
            <div class="mt-3">
                <img src="{{ asset('images/page-misc-error-light.png') }}" alt="page-misc-error-light" width="500"
                    class="img-fluid" data-app-light-img="{{ asset('images/page-misc-error-light.png') }}" />
            </div>
        </div>
    </div>

</body>

</html>