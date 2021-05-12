<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;1,100;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased font-plex italic">

<div class="min-h-screen bg-gradient-to-bl from-paige-50 via-paige-100 to-paige-200 dark:from-paige-800 dark:via-paige-800 dark:to-paige-700">

    @include('layouts.nav')
    @include('layouts.filters')

    <div class="w-2/3 mx-auto px-8 px-4 py-8 sm:px-0">
        <ul class="grid gap-6 grid-cols-4">
            @foreach($directories as $dir)
                <x-site-item :dir="$dir"/>
            @endforeach
        </ul>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
