<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bulma -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hero is-fullheight is-light">
<div class="hero-body">
    <div class="container has-text-centered">
        <div class="columns is-centered">
            <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                <a href="/">
                    <figure class="image is-128x128 has-text-centered mb-6 mx-auto">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="m-auto" style="max-width:128px; max-height:128px;">
                    </figure>
                </a>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
