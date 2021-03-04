<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="-----" />
        <meta name="keywords" content="scholarship,learning,aid,charity" />
        <meta name="author" content="Brendan Ejike (@@f0rx)" />

        {{-- <link rel="shortcut icon" href="/favicon.ico"> --}}

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <title>{{ config('app.name', 'Arise Global Scholarship') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/private.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="wrapper">
            @inertia
        </div>

        <script src="{{ asset('js/bundle.min.js') }}"></script>
        <script src="{{ asset('js/button.min.js') }}"></script>
    </body>
</html>
